<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
class shop_cat_brands extends Model
{
    protected $table = 'shop_cat_brands';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function one()
    {
        return $this->hasOne('App\model\shop_brands','brandId','brand_Id');
    }
    public function brand($catId)
    {
        return $this->where('cat_Id',$catId)->with(['one'=>function($query){
            $query->select('brandId','brandName');
        }])->get();

    }
}
