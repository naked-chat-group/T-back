<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='shop_order';
    public $timestamps = false;
    public function Sel()
    {
        return Order::all();
    }
}
