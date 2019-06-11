<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'shop_admin_role';

    //获取所有的角色
    public function getRoles()
    {
        return $this->all();
    }
}
