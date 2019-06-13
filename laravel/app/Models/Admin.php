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
        return $this->where('id', $id)->first();
    }

    //修改管理员信息
    public function updateAdmin($data)
    {
        $id = $data['id'];
        unset($data['id']);
        if (isset($data['password'])) {
            $password = $data['password'];
            unset($data['password']);
            unset($data['confirmPassword']);
            //判断密码是否为前三次

            DB::beginTransaction();
            try {
                $this->where('id', $id)->update($data);
                Password::where('uid', $id)->increment('status');
                Password::where([['uid', $id], ['status', 3]])->delete();
                Password::create(['uid' => $id, 'password' => md5($password), 'create_at' => time(), 'status' => 0]);
                DB::commit();
                return true;
            } catch(\Exception $e) {
                DB::rollBack();
                return false;
            }
        }
        return $this->where('id', $id)->update($data);
    }
}