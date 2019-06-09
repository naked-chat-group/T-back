<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommodController extends BaseController
{

    public function index()
    {
        return view('commod.commod');
    }
    public function add()
    {
        return view('commod.commod_add');
    }
}