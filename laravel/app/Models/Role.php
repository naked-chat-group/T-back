<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Facade\RoleMenu;
use App\Facade\RoleAuth;
use Illuminate\Support\Facades\DB;
use yii\db\Exception;

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
        DB::beginTransaction();
        try {
            $role = $this->create(['name' => $post['name']]);
            if (isset($post['menu'])) {
                if (!RoleMenu::store($role->id, $post['menu'])) {
                    throw new \Exception('菜单添加错误');
                }
            }
            if (isset($post['auth'])) {
               if (!RoleAuth::store($role->id, $post['auth'])) {
                   throw new \Exception('权限添加错误');
               }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
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

        DB::beginTransaction();
        try {
            $this->where('id', $post['id'])->update(['name' => $post['name']]);
            RoleMenu::delByRid($post['id']);
            RoleAuth::delByRid($post['id']);
            if (isset($post['menu'])) {
                if (!RoleMenu::store($post['id'], $post['menu'])) {
                    throw new \Exception('菜单修改错误');
                }
            }
            if (isset($post['auth'])) {
                if (!RoleAuth::store($post['id'], $post['auth'])) {
                    throw new \Exception('权限修改错误');
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
