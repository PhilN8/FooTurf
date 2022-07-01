<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table = 'tbl_admin';
    protected $primaryKey = 'admin_id';

    protected $allowedFields = [
        'first_name',
        'last_name',
        'user_name',
        'password'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'is_deleted';
}