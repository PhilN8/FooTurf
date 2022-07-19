<?php

namespace App\Controllers;

use App\Models\Team;
use App\Models\Game;
use App\Models\Payment;
use CodeIgniter\Database\BaseConnection;

class Admin extends BaseController
{
    private BaseConnection $db;

    public function index()
    {
        $this->db = db_connect();

        $data['teams'] = (new Team)->findAll();
        $data['games'] = (new Game)->where('team1_score', null)->orderBy('game_date', 'ASC')->findAll();
        $data['scores'] = (new Game)->where('team1_score !=', null)->orderBy('game_date', 'ASC')->findAll();
        $data['payments'] = (new Payment)->join('tbl_games', 'tbl_games.game_id=tbl_payments.game_id')
            // ->where('team1_score !=', null)
            ->findAll();
        // $data['cash'] = (db_connect())->query(
        $data['cash'] = $this->db->query(
            "SELECT SUM(a.total_cost) AS Cash, WEEKDAY(b.`game_date`) AS Day FROM `tbl_payments` AS a INNER JOIN tbl_games AS b ON a.game_id = b.game_id GROUP BY Day"
        )->getResultArray() ?? [];
        $data['gamesPerDay'] =  $this->db->query(
            "SELECT COUNT(`game_id`) AS Games, WEEKDAY(game_date) as Day FROM tbl_games GROUP BY Day"
        )->getResultArray() ?? [];
        $data['allStats'] = (new Game)->getStatsAll();

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
        $team1 = $this->request->getVar('team1');
        $team2 = $this->request->getVar('team2');

        $score1 = intval($this->request->getVar('score1'));
        $score2 = intval($this->request->getVar('score2'));

        (new Game)->update($game_id, [
            'team1_score' => $this->request->getVar('score1'),
            'team2_score' => $this->request->getVar('score2')
        ]);

        if ($score1 > $score2) {
            (new Team)->addWon($team1);
            (new Team)->addLost($team2);
        } elseif ($score1 < $score2) {
            (new Team)->addLost($team1);
            (new Team)->addWon($team2);
        } else {
            (new Team)->addDrawn($team1);
            (new Team)->addDrawn($team2);
        }

        $scores = (new Game)->where('team1_score !=', null)->findAll();
        $games = (new Game)->where('team1_score', null)->findAll();

        return $this->response->setJSON([
            'games' => $games,
            'scores' => $scores
        ]);
    }

    public function getStats()
    {
        helper(['form']);

        $rules = ['team' => 'is_unique[tbl_teams.team_name]'];
        if ($this->validate($rules))
            return $this->response->setJSON(['error' => true]);

        $team = $this->request->getVar('team');
        // return $this->response->setJSON([
        //     'totalGames' => (new Game)->getStats($team)[0],
        //     'totalGamesValid' => (new Game)->getStats($team)[1],
        //     'totalGoalsFor' => (new Game)->getStats($team)[2],
        //     'totalGoalsAgainst' => (new Game)->getStats($team)[3]
        // ]);
        $teamStats = (new Game)->getStats($team);
        return $this->response->setJSON([
            'gamesBooked' => $teamStats[0],
            'gamesPlayed' => $teamStats[1],
            'goalsFor' => $teamStats[2],
            'goalsAgainst' => $teamStats[3],
            // 'allStats' => (new Game)->getStatsAll()
        ]);
    }

    public function getStatsAll()
    {
        return $this->response->setJSON(['allStats' => (new Game)->getStatsAll()]);
    }
}
