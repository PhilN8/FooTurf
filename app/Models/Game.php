<?php

namespace App\Models;

use CodeIgniter\Model;

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
}

// => $gameDetails['game_date']
//  => $gameDetails['game_start']