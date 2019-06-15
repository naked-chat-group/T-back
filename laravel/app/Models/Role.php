<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'shop_admin_role';

    public $timestamps = false;

    protected $guarded = [];

    //获取所有的角色
    public function getRoles()
    {
        return $this->all();
    }

    //查找角色
    public function findAll($offset, $limit)
    {
        $role = $this->offset($offset)->limit($limit)->get()->toArray();
        return $role;
    }

    //获取角色的总数
    public function getCount()
    {
        return $this->count();
    }

    public function store($post)
    {
        $data = [];
        $menu = $post['menu'];
        $data['name']  = $post['name'];
        $auth = $post['auth'];
        if ($menu) {
            $data['menus'] = serialize($menu);
        }
        if ($auth) {
            $data['rights'] = implode('|', $auth);
        }

        return $this->create($data);
    }

    public function findById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function delById($id)
    {
        return $this->where('id', $id)->delete();
    }


    public function upd($post)
    {
        $data = [];
        $data['rights'] = '';
        $data['menus'] = '';
        if (isset($post['menu'])) {
            $menu = $post['menu'];
            if ($menu) {
                $data['menus'] = serialize($menu);
            }
        }
        $data['name']  = $post['name'];
        if (isset($post['auth'])) {
            $auth = $post['auth'];
            if ($auth) {
                $data['rights'] = implode('|', $auth);
            }
        }
        return $this->where('id', $post['id'])->update($data);
    }
}
