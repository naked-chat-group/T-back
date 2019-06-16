<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    protected $table = 'shop_role_menu';

    protected $guarded = [];

    public $timestamps = false;

    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'mid');
    }

    public function store($rid, $data)
    {
        $newData = [];

        foreach($data as $val) {
            $newData[] = ['rid' => $rid, 'mid' => $val];
        }

        return $this->insert($newData);
    }

    public function findByRid($id)
    {
        return $this->where('rid', $id)->select('mid')->get()->toArray();
    }

    public function delByRid($id)
    {
        return $this->where('rid',$id)->delete();
    }

    public function getMenu($rid)
    {
        return $this->with('menu.right')->where('rid', $rid)->get()->toArray();
    }
}
