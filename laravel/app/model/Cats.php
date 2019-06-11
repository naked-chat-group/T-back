<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    //
    protected $table = 'shop_goods_cats';

    protected $guarded = [];

    public $timestamps = false;

    public function CatsCount()
    {
        return Cats::all()->count();
    }

    public function CatsAdd($post)
    {
        $post['dataFlag'] = 1;
        $post['createTime'] = date('Y-m-d H:i:s',time());
        unset($post['_token']);
        return Cats::create($post);
    }
    public function SelPage($offset,$limit)
    {
        return Cats::offset($offset)->limit($limit)->get();
    }
}
