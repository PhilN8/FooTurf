<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\AdminLogin;

class Login extends BaseController
{
    public function index()
    {
        return view('frontend/login');
    }

    public function login()
    {
        helper(['form']);
        $adminModel = new Admin();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $admin = $adminModel->where('user_name', $username)->first();

        if ($admin) {
            $authenticatePassword = password_verify($password, $admin['password']);

            if ($authenticatePassword) {

                $adminLogin = new AdminLogin();
                $login = [
                    'admin_id' => $admin['admin_id'],
                    'admin_ip' => $this->request->getIPAddress(),
                    'login_time' => date('Y-m-d H:i:s')
                ];

                $login_id = $adminLogin->insert($login, true);

                $ses_data = [
                    'id' => $admin['admin_id'],
                    'name' => $admin['first_name'],
                    'user_name' => $admin['user_name'],
                    'login_id' => $login_id
                ];

                $session = session();
                $session->set($ses_data);

                $returnMsg = ['message' => 1];
            } else
                $returnMsg = ['message' => 2];
        } else
            $returnMsg = ['message' => 3];

        return $this->response->setJSON($returnMsg);
    }

    public function logout()
    {
        session();

        if (isset($_SESSION['login_id'])) {
            $user = new AdminLogin();
            $user->logout($_SESSION['login_id']);
        }
        session_destroy();
        $data['logout'] = 1;
        echo view('frontend/login', $data);
    }
}
