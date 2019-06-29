<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Facades\BrandsCats;
class Brands extends Model
{
    //
    protected $table = 'shop_brands';
    protected $primaryKey = 'brandId';
    protected $guarded = [];

    public $timestamps = false;
    public function BrandsSel($brandName)
    {

        return $this->where('brandName',$brandName)->select('brandName')->get();
    }
    public function BrandsAdd($post)
    {
        $cat_Id = explode(',',$post['cat_Id']);
        $data = [
            'brandName'=>$post['brandName'],
            'brandImg'=>$post['brandImg'],
            'brandDesc'=>$post['brandDesc'],
            'createTime'=>date('Y-m-d H:i:s',time()),
            'dataFlag'=>1,
            'sortNo'=>$post['sortNo']
        ];

        DB::beginTransaction();
        try{
            $brandId = Brands::create($data)->brandId;

            $arrs =[];
            foreach ($cat_Id as $val)
            {
                $arrs[] =  [
                    'cat_Id'=>$val,
                    'brand_Id'=>$brandId
                ];
            }
            $res = BrandsCats::BrandsCatsAdd($arrs);
            DB::commit();
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['code'=>'1005','msg'=>'数据添加失败，请确认数据是否正确']);
        }
        if($res)
        {
            return response()->json(['code'=>'1001','msg'=>'添加成功']);
        }else{
            return response()->json(['code'=>'1002','msg'=>'添加失败']);
        }
    }

    public function BrandCount($brandName)
    {

        return $this->where('brandName','like',"$brandName%")->count();
    }

    //分页数据
    public function SelPage($offset,$limit,$brandName)
    {
        return $this->where('brandName','like',"$brandName%")->offset($offset)->limit($limit)->get();
    }
    //删除
    public function BrandDel($brandId)
    {
        return $this->where('brandId',$brandId)->delete();
    }
    //修改渲染页面
    public function brandIdSel($brandId)
    {
        return $this->find($brandId);
    }
    //修改
    public function BrandsUpd($post)
    {
        $cat_Id = explode(',',$post['cat_Id']);
        $data = [
            'brandName'=>$post['brandName'],
            'brandImg'=>$post['brandImg'],
            'brandDesc'=>$post['brandDesc'],
            'createTime'=>date('Y-m-d H:i:s',time()),
            'dataFlag'=>1,
            'sortNo'=>$post['sortNo']
        ];

        DB::beginTransaction();
        try{
            $this->where('brandId',$post['brandId'])->update($data);
            $arrs =[];
            BrandsCats::BrandsCatsDel($post['brandId']);
            foreach ($cat_Id as $val)
            {
                $arrs[] =  [
                    'cat_Id'=>$val,
                    'brand_Id'=>$post['brandId']
                ];
            }
            $res = BrandsCats::BrandsCatsAdd($arrs);
            DB::commit();
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['code'=>'1005','msg'=>'数据修改失败，请确认数据是否正确']);
        }
        if($res)
        {
            return response()->json(['code'=>'1001','msg'=>'添加成功']);
        }else{
            return response()->json(['code'=>'1002','msg'=>'添加失败']);
        }
    }
    public function BrandNameSel($brandName)
    {
        return $this->where('brandName','like',"$brandName%")->get();
    }
}
