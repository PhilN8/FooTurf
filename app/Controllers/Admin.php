<?php

namespace App\Controllers;

use App\Models\Team;
use App\Models\Game;

class Admin extends BaseController
{
    public function index()
    {
        $data['teams'] = (new Team)->findAll();
        $data['games'] = (new Game)->where('team1_score', null)->findAll();
        $data['scores'] = (new Game)->where('team1_score !=', null)->findAll();

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
