<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop_warehouse extends Model
{
    protected $pk = 'id';
    public $timestamps = false;
    public static function up($id,$status){
        return Shop_warehouse::where('id',$id)->update(['status'=>$status]);
    }
}
