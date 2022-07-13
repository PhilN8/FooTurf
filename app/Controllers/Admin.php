<?php

namespace App\Controllers;

use App\Models\Team;
use App\Models\Game;
use App\Models\Payment;
use Config\Database;

class Admin extends BaseController
{
    public function index()
    {
        $data['teams'] = (new Team)->findAll();
        $data['games'] = (new Game)->where('team1_score', null)->findAll();
        $data['scores'] = (new Game)->where('team1_score !=', null)->findAll();
        $data['payments'] = (new Payment)->join('tbl_games', 'tbl_games.game_id=tbl_payments.game_id')
            // ->where('team1_score !=', null)
            ->findAll();
        $data['cash'] = (db_connect())->query(
            "SELECT SUM(a.total_cost) AS Cash, WEEKDAY(b.`game_date`) AS Day FROM `tbl_payments` AS a INNER JOIN tbl_games AS b ON a.game_id = b.game_id GROUP BY Day"
        )->getResultArray() ?? [];
        $data['gamesPerDay'] = (db_connect())->query(
            "SELECT COUNT(`game_id`) AS Games, WEEKDAY(game_date) as Day FROM tbl_games GROUP BY Day"
        )->getResultArray() ?? [];

        if (count($data['cash']) < 7) {
            $diff = 7 - count($data['cash']);

            for ($i = (7 - $diff); $i < 7; $i++)
                $data['cash'][$i] = [
                    'Cash' => 0
                ];
        }

        if (count($data['gamesPerDay']) < 7) {
            $diff = 7 - count($data['gamesPerDay']);

            for ($i = (7 - $diff); $i < 7; $i++)
                $data['gamesPerDay'][$i] = [
                    'Games' => 0
                ];
        }

        return view('frontend/admin', $data);
    }

    public function editTeam()
    {
        helper(['form']);

        $team_id = $this->request->getVar('team_id');

        (new Team)->update($team_id, [
            'captain_name' => $this->request->getVar('captain'),
            'contact_info' => $this->request->getVar('contact')
        ]);
    }

    public function addScores()
    {
        helper(['form']);
        $game_id = $this->request->getVar('game_id');

        (new Game)->update($game_id, [
            'team1_score' => $this->request->getVar('score1'),
            'team2_score' => $this->request->getVar('score2')
        ]);

        $scores = (new Game)->where('team1_score !=', null)->findAll();
        $games = (new Game)->where('team1_score', null)->findAll();

        return $this->response->setJSON([
            'games' => $games,
            'scores' => $scores
        ]);
    }
}
