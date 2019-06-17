<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
use App\Facade\RoleAuth;
use App\Facade\RoleMenu;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $response = $next($request);

//        $user = Session::get('user');

        $newMenu = Redis::get('adminMenu1');
        $newAuth = Redis::get('adminAuth1');
        if (!$newMenu || !$newAuth) {
            $auth = RoleAuth::getAuth(1);
            $newAuth = [];
            foreach ($auth as $val) {
                $newAuth = array_merge($newAuth, explode(',', $val['auth']['right']));
            }
            unset($auth);
            $menu = RoleMenu::getMenu(1);
            $newMenu = [];
            foreach ($menu as $val) {
                $val['menu']['name'] = substr($val['menu']['right']['name'], stripos($val['menu']['right']['name'], ']')+1);
                $val['menu']['right'] = $val['menu']['right']['right'];
                $newMenu = array_merge($newMenu, [$val['menu']]);
//            dd($newMenu);
            }
            unset($menu);
            $newMenu = $this->getTree($newMenu);

            $newMenu = serialize($newMenu);
            $newAuth = serialize($newAuth);
            Redis::set('adminAuth1', $newAuth);
            Redis::set('adminMenu1', $newMenu);
        }
        $route = $request->route()->getName();
        if (!in_array($route, unserialize($newAuth))) {
            dd('没有权限');
        }
        return $response;
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
}