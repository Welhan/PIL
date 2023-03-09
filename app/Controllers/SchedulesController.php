<?php

namespace App\Controllers;

use App\Models\DocumentsModel;

use App\Controllers\BaseController;

class SchedulesController extends BaseController
{
    protected $DocumentsModel;

    public function __construct()
    {
        $this->DocumentsModel = new DocumentsModel;
    }
    public function driverSchedules()
    {
        $data = [
            'Schedules' => $this->DocumentsModel->getDocuments(),
        ];

        return view('Schedules/DriverSchedules', $data);
    }
}
