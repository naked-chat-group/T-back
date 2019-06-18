<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class shop_goods_specs extends Model
{
    protected $table = 'shop_goods_specs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['goodsId','goodsName','marketPrice','specPrice','specImg','specStock','warnStock','warnStockval'];
}
