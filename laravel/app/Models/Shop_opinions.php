<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_opinions extends Model
{
    protected $pk = 'id';
    public $timestamps = false;
    public static function page(){
        $list = Shop_opinions::orderBy('add_time', 'DESC')->join('shop_users','shop_opinions.user_id','=','shop_users.id')->select('shop_opinions.*','shop_users.nick')->paginate(5);
        return $list;
    }
    public static function reply($id){
        return Shop_opinions::where('id',$id)->update(['reply_status'=>1]);
    }
    public static function search($name){
        $list = Shop_opinions::orderBy('add_time', 'DESC')->join('shop_users','shop_opinions.user_id','=','shop_users.id')->select('shop_opinions.*','shop_users.nick')->where('shop_users.nick',$name)->orWhere('shop_users.nick','like','%'.$name.'%')->paginate(5);
        return $list;
    }
}