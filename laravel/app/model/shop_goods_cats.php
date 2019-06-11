<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class shop_goods_cats extends Model
{
    protected $table = 'shop_goods_cats';
    protected $primaryKey = 'catId';
    public $timestamps = false;
    public function two($catId)
    {
        return  $this->where('parentId',$catId)->select('catId','parentId','catName')->get();
    }
}
