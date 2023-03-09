<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;


class IndexController extends BaseController
{
    protected $AuthModel;
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }
    public function index()
    {
        if (!check_login(session('Email'))) return redirect()->to('/login');
        $data = [
            'title' => 'Dashboard',
            'email' => $this->AuthModel->find()
        ];
        return view('Home/Dashboard', $data);
    }
}
