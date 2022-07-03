<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Booking extends Controller
{
    public function index()
    {
        return view('frontend/booking');
    }
}
