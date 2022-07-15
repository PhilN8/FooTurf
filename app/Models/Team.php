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
        'contact_info'
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
}
