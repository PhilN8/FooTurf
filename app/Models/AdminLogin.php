<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminLogin extends Model
{
    protected $table = 'tbl_adminlogins';
    protected $primaryKey = 'adminlogin_id';

    protected $allowedFields = [
        'admin_id',
        'admin_ip',
        'login_time',
        'logout_time'
    ];

    protected $deletedField = 'is_deleted';

    public function logout(int $login_id)
    {
        $logout = [
            'logout_time' => date('Y-m-d H:i:s')
        ];

        $this->update($login_id, $logout);
    }
}
