<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAuth extends Model
{
    protected $table = 'shop_role_right';

    protected $guarded = [];

    public $timestamps = false;


    public function store($rid, $data)
    {
        $newData = [];

        foreach($data as $val) {
            $newData[] = ['rid' => $rid, 'aid' => $val];
        }

        return $this->insert($newData);
    }

    public function findByRid($id)
    {
        return $this->where('rid', $id)->select('aid')->get()->toArray();
    }

    public function delByRid($id)
    {
        return $this->where('rid',$id)->delete();
    }
}
