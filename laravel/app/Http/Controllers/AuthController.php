<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Facade\Auth;

class AuthController extends Controller
{
    /*
     * 权限资源首页
     */
    public function index()
    {
        return view('auth.auth');
    }

    /*
     * 权限获取数据接口
     */
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

    /*
     * 权限添加页面
     */
    public function addAuth()
    {
        //获取当前目录的所有控制器名
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

    /*
     * 获取每个控制所拥有的方法
     */
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

    //执行权限添加方法
    public function AuthStore(Request $request)
    {
        $data = $request->post();

        if (!Auth::store($data)) {
            return response()->json(['code' => 400, 'msg' => '添加失败, 请联系管理员']);
        }

        return response()->json(['code' => 200, 'msg' => '添加成功,准备跳转']);
    }


    /*
     *生成菜单页面
     */
    public function MenuCreate(Request $request)
    {

        $id = $request->input('id');

        $parentMenu = Auth::findById($id);

        $childMenu = Auth::findByType(1);

        return view('auth.MenuCreate', compact('parentMenu', 'childMenu'));

    }

}
