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
}
