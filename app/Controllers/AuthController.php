<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;


class AuthController extends BaseController

{
    protected $AuthModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel;
    }

    public function login()
    {
        return view('Auth/Login');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    public function auth()
    {
        if (check_login(session('Email'))) return redirect()->to('/');
        $Email = $this->request->getPost('Email');
        $password = $this->request->getPost('Password') ? $this->request->getPost('Password') : '';
        $Email = $this->AuthModel->where(['Email' => $Email, 'Password' => $password, 'Active' => 1])->find();

        if ($Email) {
            $session = [
                'Email' => $Email[0]->Email,
                'Nama' => $Email[0]->Nama,
                'Divisi' => $Email[0]->Divisi,
            ];

            session()->set($session);

            return redirect()->to('/');
        } else {
            return redirect()->to('/login');
        }
    }
}
