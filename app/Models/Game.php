<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Team;

class Game extends Model
{
    protected $table = 'tbl_games';
    protected $primaryKey = 'game_id';

    protected $allowedFields = [
        'team1_name',
        'team2_name',
        'team1_score',
        'team2_score',
        'game_date',
        'game_start',
        'game_end'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'is_deleted';

    public function CheckIfGameExists(array $gameDetails): bool
    {
        $game = $this->select('game_id')
            ->where(
                [
                    'game_date' => $gameDetails['game_date'],
                    'game_start' => $gameDetails['game_start'],
                ],
            )->first();

        if ($game != null)
            return true;

        return false;
    }

    public function getStats(string $team)
    {
        $goalsForHome = (db_connect())
            ->query("SELECT SUM(team1_score) AS goals FROM `tbl_games` WHERE `team1_name`='$team'")
            ->getResult()[0]->goals;

        $goalsForAway = (db_connect())
            ->query("SELECT SUM(team2_score) AS goals FROM `tbl_games` WHERE `team2_name`='$team'")
            ->getResult()[0]->goals;

        $goalsAgainstHome = (db_connect())
            ->query("SELECT SUM(team1_score) AS goals FROM `tbl_games` WHERE `team2_name`='$team'")
            ->getResult()[0]->goals;

        $goalsAgainstAway = (db_connect())
            ->query("SELECT SUM(team2_score) AS goals FROM `tbl_games` WHERE `team1_name`='$team'")
            ->getResult()[0]->goals;

        $gamesHome = (db_connect())
            ->query("SELECT COUNT(game_id) AS games FROM `tbl_games` WHERE `team1_name`='$team'")
            ->getResult()[0]->games;

        $gamesAway = (db_connect())
            ->query("SELECT COUNT(game_id) AS games FROM `tbl_games` WHERE `team2_name`='$team'")
            ->getResult()[0]->games;

        $gamesHomeValid = (db_connect())
            ->query("SELECT COUNT(game_id) AS games FROM `tbl_games` WHERE `team1_name`='$team' AND `team1_score` IS NOT NULL")
            ->getResult()[0]->games;

        $gamesAwayValid = (db_connect())
            ->query("SELECT COUNT(game_id) AS games FROM `tbl_games` WHERE `team2_name`='$team' AND `team2_score` IS NOT NULL")
            ->getResult()[0]->games;

        $totalGames = $gamesHome + $gamesAway;
        $totalGoalsFor = $goalsForHome + $goalsForAway;
        $totalGoalsAgainst = $goalsAgainstHome + $goalsAgainstAway;
        $totalGamesValid = $gamesAwayValid + $gamesHomeValid;

        return [
            $totalGames, $totalGamesValid, $totalGoalsFor, $totalGoalsAgainst
        ];
    }

    public function getStatsAll()
    {
        $teams = (new Team)->select('team_name')->findAll();
        $stats = [];
        foreach ($teams as $team) {
            $stats[$team['team_name']] = $this->getStats($team['team_name']);
        }

        return $stats;
    }
}

// => $gameDetails['game_date']
//  => $gameDetails['game_start']