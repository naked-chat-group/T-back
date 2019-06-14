<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Facades\ShopGoodsCats;
use Illuminate\Http\Request;
class CommodController extends BaseController
{

    public function index()
    {
        return view('commod.commod');
    }
    public function add()
    {
        return view('commod.commod_add', ['data' => ShopGoodsCats::two(0)]);
    }
//    二级联动
    public function two(Request $request){
            return ShopGoodsCats::two($request->input('catId'));
    }
}