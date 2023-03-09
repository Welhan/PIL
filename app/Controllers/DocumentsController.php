<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\DocumentsModel;

class DocumentsController extends BaseController
{
    protected $AuthModel;
    protected $DocumentsModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel;
        $this->DocumentsModel = new DocumentsModel;
    }
    public function Documents()
    {
        $data = [
            'Documents' => $this->DocumentsModel->getDocuments(),
        ];

        return view('Documents/Documents', $data);
    }
    public function addDocuments()
    {
        $Driver = $this->request->getPost('Driver');
        $Destination = $this->request->getPost('Destination');
        $Departure = $this->request->getPost('Departure');
        $Return = $this->request->getPost('Return');
        $PoliceNo = $this->request->getPost('PoliceNo');
        $Vehicle = $this->request->getPost('Vehicle');
        $User = $this->request->getPost('User');
        $Email = $this->request->getPost('Email');
        $Description = $this->request->getPost('Description');

        $add = [
            'Name' => $Driver,
            'Destination' => $Destination,
            'Departure' => $Departure,
            'Return' => $Return,
            'PoliceNo' => $PoliceNo,
            'Vehicle' => $Vehicle,
            'User' => $User,
            'Email' => $Email,
            'Description' => $Description,
            'Active' => 1,
            'DateAdded' => date('Y-m-d H:i:s'),
            'UserAdded' => $User,
            'DateUpdate' => date('Y-m-d H:i:s'),
            'UserUpdate' => $User,
        ];

        $result = $this->DocumentsModel->save($add);
        if ($result === false) {
            // handle error
        }

        return redirect()->to('documents');
    }
}
