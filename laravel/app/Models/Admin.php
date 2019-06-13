<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Password;

class Admin extends Model
{
    protected $table = 'shop_admin';

    protected $guarded = [];

    public $timestamps = false;

    //查找所有管理员的信息
    public function findAll($offset, $limit)
    {
        $admin = $this->with('roles')->offset($offset)->limit($limit)->get()->toArray();
        return $admin;
    }

    //关联角色表
    public function roles()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }

    //获取管理员的总数
    public function getCount()
    {
        return $this->count();
    }

    //添加数据
    public function store($validated)
    {
        $password = [];
        $validated['create_time'] = date('Y-m-d H:i:s');
        $password['password'] = md5($validated['password']);
        $password['create_at'] = time();
        $password['status'] = 0;
        unset($validated['password']);
        unset($validated['confirmPassword']);
        DB::beginTransaction();
        try {
            $admin = $this->create($validated);
            $password['uid'] = $admin->id;
            Password::create($password);
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    //根据用户id查找管理员信息
    public function findById($id)
    {
        dd($this->where('id', $id)->first());
    }
}