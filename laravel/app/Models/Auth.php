<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'shop_right';

    protected $guarded = [];

    public $timestamps = false;

    public function findAll($offset, $limit)
    {
        return $this->offset($offset)->limit($limit)->select('id', 'name', 'right', 'types')->get()->toArray();
    }

    public function getCount()
    {
        return $this->count();
    }

}
