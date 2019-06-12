<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Facade\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.auth');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $size = $request->input('limit', 10);
//        dd($size);
            $page = $request->input('page', 1);
            $count = Auth::getCount();
            $data = Auth::findAll(($page - 1) * $size, $size);
            return response()->json(['code' => 0, 'msg' => '', 'count' => $count, 'data' => $data]);
//            return view('admin._data', compact('admin'));
        }
    }

    public function addAuth()
    {
        $planList = array();
        $dirRes   = opendir(__DIR__);

        while(false !== ($dir = readdir($dirRes)))
        {
            if(($dir[0] == ".") || !strpos($dir, '.'))
            {
                continue;
            }
            $planList[] = basename($dir,'.php');
        }
        return view('auth.auth_add', compact('planList'));
    }

    public function getAction(Request $request)
    {
        $controller = $request->input('controller');
        if ($controller) {
            $baseContrl = get_class_methods("Illuminate\\Routing\\Controller");
            $advContrl  = get_class_methods("App\\Http\\Controllers\\" . $controller);
            $action = array_diff($advContrl, $baseContrl);

            return response()->json(['code' => 0, 'data' => $action]);
        }
    }
}
