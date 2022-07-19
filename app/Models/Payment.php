<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model
{
    protected $table = 'tbl_payments';
    protected $primaryKey = 'payment_id';
    protected $allowedFields = [
        'game_id',
        'no_of_hours',
        'total_cost',
        'phone_number',
        'pay_code'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'is_deleted';
}
