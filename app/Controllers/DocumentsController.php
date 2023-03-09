<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DocumentsController extends BaseController
{
    public function Documents()
    {
        return view("Documents/Documents");
    }
}
