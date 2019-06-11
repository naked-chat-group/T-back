<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_areas extends Model
{
    protected $pk = 'id';
    public static function area(){
        $data = Shop_areas::where("p_id",0)->select('id','area_name','p_id')->get()->toArray();
        return $data;
    }
    public static function city($provid){
        $id = Shop_areas::where('area_name',$provid)->select('id')->get()->toArray();
        $data = Shop_areas::where('p_id',$id[0]['id'])->select('area_name')->get()->toArray();
        return $data;
    }

}
