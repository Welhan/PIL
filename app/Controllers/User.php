<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\SubmenuModel;
use App\Models\UserAccessModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Exception;

class User extends BaseController
{
    protected $submenuModel;
    protected $userModel;
    protected $menuModel;
    protected $userAccessModel;

    public function __construct()
    {
        $this->submenuModel = new SubmenuModel();
        $this->userModel = new UserModel();
        $this->menuModel = new MenuModel();
        $this->userAccessModel = new UserAccessModel();
    }
    public function index()
    {
        $data = [
            'title' => 'User Management',
            'users' => $this->userModel->getUser(),
            'active' => $this->submenuModel->find(8)->ID
        ];

        return view('user/index', $data);
    }

    public function userAccess()
    {
        if (!check_login(session('Email'))) return redirect()->to('login');
        $user_id = $this->request->getPost('user_id');

        // dd($this->submenuModel->join('mst_menu', 'mst_menu.id = mst_sub_menu.menu_id')->where(['mst_sub_menu.active' => 1])->findAll());

        $data = [
            'title' => 'User',
            'active' => $this->submenuModel->find(7),
            'user' => $this->userModel->join('level', 'users.Level = level.ID')->where(['users.ID' => $user_id])->orderBy('users.ID', 'DESC')->find()[0],
            'menus' => $this->menuModel->findAll()
        ];

        return view('user/access', $data);
    }

    public function access()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getPost('id');
            $subID = $this->request->getPost('subID');
            $flag = $this->request->getPost('flag');
            $akses = $this->userAccessModel->userAccess($user_id, $subID);
            if ($akses) {

                if ($flag == 'view') {
                    $data = [
                        'ID' => $akses[0]->id,
                        'View' => ($akses[0]->flag_view) ? 0 : 1,
                        'UserUpdate' => session('ID'),
                        'DateUpdate' => Time::now()
                    ];
                } elseif ($flag == 'add') {
                    $data = [
                        'ID' => $akses[0]->id,
                        'Add' => ($akses[0]->flag_add) ? 0 : 1,
                        'UserUpdate' => session('ID'),
                        'DateUpdate' => Time::now()
                    ];
                } elseif ($flag == 'edit') {
                    $data = [
                        'ID' => $akses[0]->id,
                        'Edit' => ($akses[0]->flag_edit) ? 0 : 1,
                        'UserUpdate' => session('ID'),
                        'DateUpdate' => Time::now()
                    ];
                } elseif ($flag == 'delete') {
                    $data = [
                        'ID' => $akses[0]->id,
                        'Delete' => ($akses[0]->flag_delete) ? 0 : 1,
                        'UserUpdate' => session('ID'),
                        'DateUpdate' => Time::now()
                    ];
                }

                try {
                    if ($this->userAccessModel->save($data)) {
                        $alert = [
                            'message' => 'Access Updated',
                            'alert' => 'alert-success'
                        ];
                        session()->setFlashdata($alert);

                        $msg = [
                            'status' => 'Process Success'
                        ];
                    }
                } catch (Exception $e) {
                    $alert = [
                        'message' => 'Access Error<br>' . $e->getMessage(),
                        'alert' => 'alert-danger'
                    ];

                    $msg = [
                        'status' => 'Process Terminated'
                    ];
                } finally {
                    echo json_encode($msg);
                }
            } else {
                $menu_id = $this->submenuModel->find($subID)->MenuID;
                $data = [
                    'MenuID' => $menu_id,
                    'SubmenuID' => $subID,
                    'UserID' => $user_id,
                    'View' => ($flag == 'view') ? 1 : 0,
                    'Add' => ($flag == 'add') ? 1 : 0,
                    'Edit' => ($flag == 'edit') ? 1 : 0,
                    'Delete' => ($flag == 'delete') ? 1 : 0,
                    'UserAdded' => session('ID'),
                    'DateAdded' => Time::now()
                ];

                try {
                    if ($this->userAccessModel->save($data)) {
                        $alert = [
                            'message' => 'Access Updated',
                            'alert' => 'alert-success'
                        ];
                        session()->setFlashdata($alert);

                        $msg = [
                            'status' => 'Process Success'
                        ];
                    }
                } catch (Exception $e) {
                    $alert = [
                        'message' => 'Access Error<br>' . $e->getMessage(),
                        'alert' => 'alert-danger'
                    ];
                    session()->setFlashdata($alert);

                    $msg = [
                        'status' => 'Process Terminated'
                    ];
                } finally {
                    echo json_encode($msg);
                }
            }
        } else {
            return redirect()->to(base_url('user'));
        }
    }
}
