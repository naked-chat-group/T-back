<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Facades\Order;

class OrderController extends BaseController
{

    public function index()
    {
        $data = Order::Sel();
        print_r($data);exit;
        return view('order.order');
    }
    public function update()
    {
        return view('order.order_update');
    }
    public function list()
    {
        return view('order.order_list');
    }
}