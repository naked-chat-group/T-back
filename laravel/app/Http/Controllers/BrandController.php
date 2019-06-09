<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BrandController extends BaseController
{

    public function index()
    {
        return view('brand.brand');
    }
    public function add()
    {
        return view('brand.brand_add');
    }
    public function lists()
    {
        return view('brand.brand_list');
    }
}