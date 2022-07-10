<?php

namespace App\Controllers;

use App\Models\Game;
use App\Models\Team;

class Booking extends BaseController
{
    public function index()
    {
        return view('frontend/booking');
    }

    public function book()
    {
        helper(['form']);

        $game_start = $this->request->getVar('game_start');
        $game_end = $this->request->getVar('game_end');
        $game_date = $this->request->getVar('game_date');

        $gameDetails = [
            'game_date' => $game_date,
            'game_start' => $game_start,
            // 'game_end' => $game_end,
        ];
        $check = (new Game())->CheckIfGameExists($gameDetails);

        if ($check === TRUE)
            return $this->response->setJSON(['message' => 3]);

        $team1 = $this->request->getVar('team1');
        $team2 = $this->request->getVar('team2');

        $rules = [
            'team1' => 'is_unique[tbl_teams.team_name]',
        ];

        if ($this->validate($rules)) $team1_id = (new Team())->insert(['team_name' => $team1], true);
        else
            $team1_id = (new Team)->select('team_id')->where('team_name', $team1)->first()['team_id'];

        $rules = [
            'team2' => 'is_unique[tbl_teams.team_name]',
        ];

        if ($this->validate($rules)) $team2_id =  (new Team())->insert(['team_name' => $team2], true);
        else
            $team2_id = (new Team)->select('team_id')->where('team_name', $team2)->first()['team_id'];


        $gameDetails = [
            'team1_id' => $team1_id,
            'team2_id' => $team2_id,
            'game_date' => $game_date,
            'game_start' => $game_start,
            'game_end' => $game_end,
        ];


        $game_id = (new Game())->insert(
            $gameDetails,
            true
        );
        return $this->response->setJSON([
            'game_id' => $game_id,
            'message' => 1
            // 'details' => $gameDetails
        ]);
    }

    public function redirect()
    {
        return view('frontend/redirect');
    }

    public function game()
    {
        helper(['form']);
        $id = $this->request->getVar('game_id');

        $gameDetails = (new Game)->select('*')->where('game_id', $id)->first();

        $gameDetails['created_at'] = substr($gameDetails['created_at'], 0, 16);
        $gameDetails['game_start'] = substr($gameDetails['game_start'], 0, 5);
        $gameDetails['game_end'] = substr($gameDetails['game_end'], 0, 5);

        $team1_name = (new Team)->select('team_name')
            ->where('team_id', $gameDetails['team1_id'])->first()['team_name'];
        $team2_name = (new Team)->select('team_name')
            ->where('team_id', $gameDetails['team2_id'])->first()['team_name'];

        $gameDetails['team1'] = $team1_name;
        $gameDetails['team2'] = $team2_name;

        return $this->response->setJSON($gameDetails);
    }
}
