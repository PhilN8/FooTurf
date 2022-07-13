<?php

namespace App\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Payment;

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

        if ($this->validate($rules)) (new Team())->insert(['team_name' => $team1]);

        $rules = [
            'team2' => 'is_unique[tbl_teams.team_name]',
        ];

        if ($this->validate($rules)) (new Team())->insert(['team_name' => $team2]);

        $gameDetails = [
            'team1_name' => $team1,
            'team2_name' => $team2,
            'game_date' => $game_date,
            'game_start' => $game_start,
            'game_end' => $game_end,
        ];


        $game_id = (new Game())->insert(
            $gameDetails,
            true
        );
        (new Payment)->insert([
            'game_id' => $game_id,
            'no_of_hours' => $this->request->getVar('no_of_hours'),
            'total_cost' => $this->request->getVar('total_cost')
        ]);

        return $this->response->setJSON([
            'game_id' => $game_id,
            'message' => 1
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

        return $this->response->setJSON($gameDetails);
    }
}
