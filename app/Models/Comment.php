<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
    protected $table = 'tbl_comments';
    protected $primaryKey = 'comment_id';

    protected $allowedFields = [
        'name',
        'phone_number',
        'comment',
        'comment_status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'is_deleted';
}
