<?php

namespace App\Models;

use CodeIgniter\Model;

class Team extends Model
{
    protected $table = 'tbl_teams';
    protected $primaryKey = 'team_id';

    protected $allowedFields = [
        'team_name',
        'captain_name',
        'contact_info',
        'games_won',
        'games_drawn',
        'games_lost',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'is_deleted';

    public function getStats(string $team_name)
    {
        $goalsHome = (db_connect())
            ->query("SELECT a.`team_name` AS team, SUM(b.`team1_score`) as goalsForHome FROM `tbl_teams` AS a 
                INNER JOIN `tbl_games` AS b ON (b.`team1_name`='$team_name')")->getResult()[0]->goalsForHome;

        return $goalsHome;
    }

    public function addWon(string $team_name)
    {
        $info = $this->select('team_id, games_won')->where(['team_name' => $team_name])->first();
        $id = $info['team_id'];
        $gamesWon = $info['games_won'];

        $gamesWon++;
        $this->update($id, ['games_won' => $gamesWon]);
    }

    public function addDrawn(string $team_name)
    {
        $info = $this->select('team_id, games_drawn')->where(['team_name' => $team_name])->first();
        $id = $info['team_id'];
        $gamesDrawn = $info['games_drawn'];

        $gamesDrawn++;
        $this->update($id, ['games_drawn' => $gamesDrawn]);
    }

    public function addLost(string $team_name)
    {
        $info = $this->select('team_id, games_lost')->where(['team_name' => $team_name])->first();
        $id = $info['team_id'];
        $gamesLost = $info['games_lost'];

        $gamesLost++;
        $this->update($id, ['games_lost' => $gamesLost]);
    }
}
