<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_comment extends Model
{
    protected $pk = 'id';
    public $timestamps = false;
    public static function page(){
        $list = Shop_comment::orderBy('add_time', 'DESC')->join('shop_users','shop_comments.user_id','=','shop_users.id')->join('shop_goods','shop_comments.goods_id','=','shop_goods.goodsId')->select('shop_comments.*','shop_users.nick','shop_goods.goodsName')->paginate(5);
        return $list;
    }
    public static function up($id,$status){
        return Shop_comment::where('id',$id)->update(['status'=>$status]);
    }
    public static function reply($id){
        return Shop_comment::where('id',$id)->update(['reply_status'=>1]);
    }
    public static function search($name){
        $list = Shop_comment::orderBy('add_time', 'DESC')->join('shop_users','shop_comments.user_id','=','shop_users.id')->join('shop_goods','shop_comments.goods_id','=','shop_goods.goodsId')->select('shop_comments.*','shop_users.nick','shop_goods.goodsName')->where('shop_goods.goodsName',$name)->orWhere('shop_goods.goodsName','like','%'.$name.'%')->paginate(5);
        return $list;
    }
}