<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubmenuModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $submenuModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->submenuModel = new SubmenuModel();
    }
    public function index()
    {
        if (!check_login(session('Email'))) return redirect()->to('/login');
        $data = [
            'title' => 'Dashboard',
            'email' => $this->userModel->find(),
            'active' => $this->submenuModel->find(1)->ID
        ];
        return view('Home/Dashboard', $data);
    }
}
