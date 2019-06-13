<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Facade\Admin;
use App\Facade\Role;
use App\Http\Requests\StoreAdmin;


/*
 * 管理员控制
 */
class AdminController extends BaseController
{

    /*
     * 管理员列表
     */
    public function index(Request $request)
    {
        return view('admin.admin', compact('count'));
    }

    //获取数据
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $size = $request->input('limit', 10);
//        dd($size);
            $page = $request->input('page', 1);
            $admin = Admin::findAll(($page - 1) * $size, $size);
            $count = Admin::getCount();
            return response()->json(['code' => 0, 'msg' => '', 'count' => $count, 'data' => $admin]);
//            return view('admin._data', compact('admin'));
        }
    }

    //添加管理员
    public function addAdmin()
    {
        $roles = Role::getRoles();
        return view('admin.admin_add', compact('roles'));
    }

    //执行添加
    public function AdminStore(StoreAdmin $request)
    {
//        dd($request);
        $validated = $request->validated();

        if (!Admin::store($validated)) {
            return response()->json(['code' => 400, 'msg' => '添加失败, 请联系管理员']);
        }

        return response()->json(['code' => 200, 'msg' => '添加成功,准备跳转']);
    }

    //修改页面
    public function AdminEdit(Request $request)
    {
        $id = $request->get('id');
        $admin_info = Admin::findById($id);
        $roles = Role::getRoles();
        if ($admin_info) {
            return view('admin.admin_edit', compact('admin_info', 'roles'));
        }
    }

    /*
     * 管理员信息修改
     */
    public function AdminUpd(Request $request)
    {
        if (Admin::updateAdmin($request->post())) {
            return response()->json(['code' => 200, 'msg' => '修改成功,准备跳转']);
        }
        return response()->json(['code' => 400, 'msg' => '修改失败, 请联系管理员']);
    }
}