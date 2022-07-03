<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login_id']))
            return view('frontend/admin', $_SESSION);
        else
            return view('frontend/login');
    }
}
