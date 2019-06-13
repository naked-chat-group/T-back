<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    //
    protected $table = 'shop_goods_cats';
    protected $primaryKey = 'catId';
    protected $guarded = [];

    public $timestamps = false;

    /**
     * [分类总条数]
     * @return int
     */
    public function CatsCount()
    {
        return Cats::all()->count();
    }
    /**
     * 添加分类
     * @param $post
     * @return mixed
     */
    public function CatsAdd($post)
    {
        $post['dataFlag'] = 1;
        $post['createTime'] = date('Y-m-d H:i:s',time());
        unset($post['_token']);
        return Cats::create($post);
    }

    /**
     * 分类分页
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function SelPage()
    {
        return Cats::get();
    }
    public function DelSel($catId)
    {
        return Cats::where('parentId',$catId)->select('catId')->get();
    }
    /**
     * 分类删除
     * @param $catId
     * @return mixed
     */
    public function Del($catId)
    {
        return Cats::where('catId',$catId)->delete();
    }

    /**
     * 查询修改
     * @param $catId
     * @return mixed
     */
    public function Sel($catId)
    {
        return Cats::where('catId',$catId)->find($catId);
    }
    public function Upd($post)
    {
        $catId = $post['catId'];

        $post['createTime'] = date('Y-m-d H:i:s',time());
        unset($post['_token']);
        unset($post['catId']);
        return Cats::where('catId',$catId)->update($post);
    }
    public function isTypeUpd($post)
    {
        $key = $post['switch_key'];
        return Cats::where('catId',$post['switch_id'])->update(["$key"=>$post['switch_isShow']]);
    }
    public function addSel()
    {
        return Cats::where('parentId',0)->select('catId','catName')->get();
    }
}
