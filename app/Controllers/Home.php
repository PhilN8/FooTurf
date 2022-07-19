<?php

namespace App\Controllers;

use App\Models\Comment;

class Home extends BaseController
{
    public function index()
    {
        return view('frontend/index');
    }

    public function comment()
    {
        (new Comment)->insert(
            [
                'name' => $this->request->getVar('name'),
                'phone_number' => $this->request->getVar('phone_number'),
                'comment' => $this->request->getVar('comment'),

            ]
        );

        return $this->response->setJSON(['message' => 1]);
    }
}
