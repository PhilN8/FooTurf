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
        $data['games'] = (new Game)->select()
            ->where('game_date >= CURRENT_DATE')
            ->findAll(8);

        $data['teams'] = (new Team)->findAll(8);
        $data['allStats'] = (new Game)->getStatsAll();
        $data['topTeams'] = $this->ratings();

        return view('frontend/stats', $data);
    }

    public function info(string $team_name)
    {

        $team = (new Team)->where('team_name', $team_name)->first();
        $matches = (new Game)->where("(team1_name = '$team_name' OR team2_name = '$team_name') AND game_date <= CURRENT_DATE")
            ->findAll(5);

        $future = (new Game)->where("(team1_name = '$team_name' OR team2_name = '$team_name') AND game_date > CURRENT_DATE")->findAll(5);

        $data = ['team' => $team, 'matches' => $matches, 'future' => $future];
        $data['stats'] = (new Game)->getStats($team_name);
        $data['similar'] = $this->similarRatings($team_name);

        return view('frontend/team', $data);
    }

    private function ratings()
    {
        // return round((100 * ($goalsFor * 0.5 - $goalsAgainst * 0.3) / $games), 2);
        $topTeams = [];
        $statsCounter = [];
        $teams = (new Game)->getStatsAll();

        foreach ($teams as $name => $team) {
            if ($team[1] < 1) continue;
            $statsCounter[$name] = round((100 * ($team[2] * 0.5 - $team[3] * 0.3) / $team[1]), 2);
        }

        arsort($statsCounter);
        $topTeams = array_slice($statsCounter, 0, 5, true);
        return $topTeams;
    }

    public function similarRatings(string $team_name)
    {
        $similarTeams = [];
        $statsCounter = [];
        $teams = (new Game)->getStatsAll();

        $rating = 0;

        foreach ($teams as $name => $team) {
            if ($team[1] < 1) continue;
            if ($name === $team_name) $rating = round((100 * ($team[2] * 0.5 - $team[3] * 0.3) / $team[1]), 2);
            $statsCounter[$name] = round((100 * ($team[2] * 0.5 - $team[3] * 0.3) / $team[1]), 2);
        }

        arsort($statsCounter);
        $index = array_search($rating, array_values($statsCounter));
        $diff = count($statsCounter) - $index;
        if ($diff < 5)
            $similarTeams = array_slice($statsCounter, $index - 5, $index, true);
        else
            $similarTeams = array_slice($statsCounter, $index, ($index + 5), true);

        return $similarTeams;
    }
}

// SELECT * FROM `tbl_games` JOIN tbl_teams ON tbl_teams.team_id=tbl_games.team1_id OR tbl_teams.team_id=tbl_games.team2_id GROUP BY `game_id`
