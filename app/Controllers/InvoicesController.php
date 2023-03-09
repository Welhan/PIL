<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InvoicesController extends BaseController
{
    public function Invoices()
    {
        return view("Invoices/Invoices");
    }
}
