<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    protected $table = 'shop_role_menu';

    protected $guarded = [];

    public $timestamps = false;


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
}
