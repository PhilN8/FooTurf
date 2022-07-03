<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        session();
        return view('admin', $_SESSION);
    }
}
