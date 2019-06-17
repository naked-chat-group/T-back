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
    public function brandCatsSel($brandId)
    {
        $data =  $this->where('brand_Id',$brandId)->select('cat_Id')->get()->toarray();
        $cat_Id = [];
        foreach ($data as $val)
        {
            $cat_Id[] = $val['cat_Id'];
        }
        return $cat_Id;
    }
    public function BrandsCatsDel($brand_Id)
    {
        return $this->where('brand_Id',$brand_Id)->delete();
    }


}
