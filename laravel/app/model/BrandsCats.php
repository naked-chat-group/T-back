<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BrandsCats extends Model
{
    //
    protected $table = 'shop_cat_brands';
    protected $primaryKey = '';
    protected $guarded = [];
    public $timestamps = false;
    public function BrandsCatsAdd($arrs)
    {
        return $this->insert($arrs);
    }


}
