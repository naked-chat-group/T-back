<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='shop_order';
    public $timestamps = false;
    /**
     * 获取总页数
     */
    public function Sel()
    {
        return Order::all()->count();
    }

    /**
     * 获取分页数据
     */
    public function SelPage($offset,$limit)
    {
        return Order::offset($offset)->limit($limit)->get();
    }
}
