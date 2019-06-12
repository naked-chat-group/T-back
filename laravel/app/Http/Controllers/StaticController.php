<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StaticController extends BaseController
{
    public function index(Request $request)
    {
        $uid = $request->session()->get('uid');
        $arr = Admin::where('id',$uid)->first();
        return view('ancestor.frame',['arr'=>$arr]);
    }
    //退出登录
    public function layout(Request $request){
        $request->session()->flush();
        return view('login.login');
    }
}