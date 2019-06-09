<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShopController extends BaseController
{

    public function index()
    {
        return view('shop.shop');
    }
    public function add()
    {
        return view('shop.shop_add');
    }
}