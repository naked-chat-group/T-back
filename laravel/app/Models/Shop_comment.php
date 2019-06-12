<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_comment extends Model
{
    protected $pk = 'id';
    public static function page(){
        $list = Shop_comment::join('shop_users','shop_users.id','=','shop_users.id')->join('shop_goods','shop_goods.goodsId','=','shop_users.id')->select('shop_comments.*','shop_users.nick','shop_goods.goodsName')->paginate(5);
        return $list;
    }
    public static function up($id,$status){
        return Shop_comment::where('id',$id)->update(['status'=>$status]);
    }
}