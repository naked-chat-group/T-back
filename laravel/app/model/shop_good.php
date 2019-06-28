<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class shop_good extends Model
{
    protected $table = 'shop_good';
    protected $primaryKey = 'goodsId';
    public $timestamps = false;
    protected $fillable = ['goodsSn','productNo','goodsName','goodsDesc','goodsImg','marketPrice','shopPrice','goodsStock','isSale','isBes','goodsCatId','brandId','isSpec'];
    //    分页
    public function findAll($offset,$limit)
    {
        return $this->offset($offset)->limit($limit)->select('goodsId','goodsSn','productNo','goodsName','isSpec')->get();
    }
//   搜索
    public function findAllById($key,$offset,$limit)
    {
        return $this->where('goodsName','like',"$key%")->offset($offset)->limit($limit)->select('goodsId','goodsSn','productNo','goodsName','isSpec')->get();
    }
    public function del($id)
    {
        return $this->find($id)->delete();
    }
    public function two(Request $request){
        if(!empty(ShopGoodsCats::two($request->input('catId'))->toarray()))
        {
            return response(['code'=>1,'data'=>ShopGoodsCats::two($request->input('catId'))]);
        }
        else
        {
//            查询品牌
            $data = ShopCatBrands::brand($request->get('catId'));
//            查属性
            $info = ShopGoodsAttributes::Attributes($request->get('catId'));
            return response(['code'=>2,'data'=>$data,'info'=>$info]);
        }
    }
    public function index()
    {
        return $this->select('goodsName','goodsCatId')->get();
    }
    public function updflag($data)
    {
        if($data['flag'] == 0)
        {
            return $this->where('goodsId',$data['attrId'])->update(['isSpec'=>1]);
        }
        else
        {
            return $this->where('goodsId',$data['attrId'])->update(['isSpec'=>0]);
        }
    }
}
