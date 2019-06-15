<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Facade\Menu;
use App\Facade\Auth;
use App\Facade\Role;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function index()
    {
        return view('role.role', compact('count'));
    }

    public function RoleData(Request $request)
    {
        if ($request->ajax()) {
            $size = $request->input('limit', 10);
//        dd($size);
            $page = $request->input('page', 1);
            $admin = Role::findAll(($page - 1) * $size, $size);
            $count = Role::getCount();
            return response()->json(['code' => 0, 'msg' => '', 'count' => $count, 'data' => $admin]);
//            return view('admin._data', compact('admin'));
        }
    }

    public function RoleCreate()
    {
        $menu = Menu::getMenu();
        $menu = $this->getTree($menu);
        $auth = Auth::getAuth();

        return view('role.role_add', compact('menu', 'auth'));
    }

    protected function getTree($data, $pid = 0)
    {
        $list = [];
        foreach ($data as $val) {
            if ($val['pid'] == $pid) {
                $val['children'] = $this->getTree($data, $val['id']);
                $list[] = $val;
            }
        }
        return $list;
    }

    public function RoleStore(Request $request)
    {
        if (!Role::store($request->post())) {
            return response()->json(['code' => 400, 'msg' => '添加失败, 请联系管理员']);
        }

        return response()->json(['code' => 200, 'msg' => '添加成功,准备跳转']);
    }

    public function RoleEdit(Request $request)
    {
        $id = $request->input('id');
        $role = Role::findById($id);
        if ($role) {
            $rights = explode('|', $role->rights);

            $menus = unserialize($role->menus);
            $newMenus = [];
            if (is_array($menus)) {
                foreach($menus as $key => $val) {
                    $newMenus[] = $key;
                    if ($val) {
                        $newMenus = array_merge($newMenus, $val);
                    }
                }
            }

            $menu = Menu::getMenu();
            $menu = $this->getTree($menu);
            $auth = Auth::getAuth();

            return view('role.role_edit', compact('menu', 'auth', 'rights', 'newMenus', 'role'));
        }
    }

    public function RoleUpd(Request $request)
    {
        if (!Role::upd($request->post())) {
            return response()->json(['code' => 400, 'msg' => '修改失败, 请联系管理员']);
        }

        return response()->json(['code' => 200, 'msg' => '修改成功,准备跳转']);
    }
}
