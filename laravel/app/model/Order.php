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
        return $this->count();
    }
    /**
     * 获取分页数据
     */
    public function SelPage($offset,$limit)
    {
        return $this->offset($offset)->limit($limit)->get();
    }
    //详情
    public function OrderSel($orderNo)
    {
        return $this->where('orderNo',$orderNo)->first();
    }
    //
    public function OrdergoodSel()
    {

    }
}
