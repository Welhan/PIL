<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if (!check_login(session('Email'))) return redirect()->to('/login');
        $data = [
            'title' => 'Dashboard',
            'email' => $this->userModel->find()
        ];
        return view('Home/Dashboard', $data);
    }
}
