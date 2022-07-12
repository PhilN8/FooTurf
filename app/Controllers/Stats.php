<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Game;
use App\Models\Team;

use CodeIgniter\Database\RawSql;

class Stats extends Controller
{
    public function index()
    {
        $sql = "tbl_teams.team_id=tbl_games.team1_id OR tbl_teams.team_id=tbl_games.team2_id";

        $games = (new Game)->select()
            ->join('tbl_teams', new RawSql($sql))
            ->where('game_date', date('Y-m-d'))->findAll(8);

        // foreach()
        $teams = (new Team)->findAll(8);

        $data = [
            'games' => $games,
            'teams' => $teams
        ];
        return view('frontend/stats', $data);
    }

    public function info(int $team_id)
    {

        $team = (new Team)->where('team_id', $team_id)->first();
        $matches = (new Game)->where("team1_id = $team_id OR team2_id = $team_id")
            // ->where('team2_id', $team_id)
            ->findAll(5);

        $data = ['team' => $team, 'matches' => $matches];
        return view('frontend/team', $data);

        // return $this->response->setJSON($details);
    }
}

// SELECT * FROM `tbl_games` JOIN tbl_teams ON tbl_teams.team_id=tbl_games.team1_id OR tbl_teams.team_id=tbl_games.team2_id GROUP BY `game_id`
