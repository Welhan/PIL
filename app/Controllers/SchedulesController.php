<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SchedulesController extends BaseController
{
    public function driverSchedules()
    {
        return view("Schedules/DriverSchedules");
    }
}
