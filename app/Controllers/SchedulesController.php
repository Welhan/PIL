<?php

namespace App\Controllers;

use App\Models\DocumentsModel;

use App\Controllers\BaseController;
use App\Models\SubmenuModel;

class SchedulesController extends BaseController
{
    protected $documentsModel;
    protected $submenuModel;

    public function __construct()
    {
        $this->documentsModel = new DocumentsModel;
        $this->submenuModel = new SubmenuModel();
    }
    public function driverSchedules()
    {
        $data = [
            'title' => 'Driver Schedules',
            'Schedules' => $this->documentsModel->getDocuments(),
            'active' => $this->submenuModel->find(3)->ID
        ];

        return view('Schedules/DriverSchedules', $data);
    }
}
