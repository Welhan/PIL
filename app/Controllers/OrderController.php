<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrderController extends BaseController
{
    public function orderList()
    {
        return view("Order/OrderList");
    }
}
