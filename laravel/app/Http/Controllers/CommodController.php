<?php

namespace App\Http\Controllers;

use App\Facades\ShopBrands;
use Illuminate\Routing\Controller as BaseController;
use App\Facades\ShopGoodsCats;
use App\Facades\ShopCatBrands;
use App\Facades\ShopGoodsAttributes;
use Illuminate\Http\Request;
use Validator;
class CommodController extends BaseController
{
//  删除
    public function del(Request $request)
    {
        $data = ShopGoodsAttributes::del($request->get('attrId'));
        if($data)
        {
            return response(['code'=>1,'message'=>'删除成功']);
        }else{
            return response(['code'=>2,'message'=>'删除失败']);
        }
    }
//    修改 是否显示
    public function upshow(Request $request)
    {
        $data = ShopGoodsAttributes::updshow($request->post());
        if($data)
        {
            return response(['code'=>1]);
        }
        return response(['code'=>2]);
    }
//    是否有效
    public function flag(Request $request)
    {
        $data = ShopGoodsAttributes::updflag($request->post());
        if($data)
        {
            return response(['code'=>1]);
        }
        return response(['code'=>2]);
    }
    public function index(Request $request)
    {
        return view('commod.commod');
    }
    public function update($id)
    {
        return view('commod.update', ['data' => ShopGoodsCats::two(0),'user'=>ShopGoodsAttributes::find($id)]);
    }
    public function inputs(Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');
        if ($key = $request->get('key')) {//搜索
            $count = ShopGoodsAttributes::where('attrName','like',"$key%")->count();
            $data = ShopGoodsAttributes::findAllById($key,($page-1)*$limit,$limit);
        } else {//分页
            $count = ShopGoodsAttributes::count();
            $data = ShopGoodsAttributes::findAll(($page-1)*$limit,$limit);

        }
        return response(['code'=>0,'msg'=>'','count'=>$count,'data'=>$data]);
    }
    public function updates(Request $request)
    {
        $data = $request->post();
        unset($data['attrId']);
        $data = ShopGoodsAttributes::find($request->post('attrId'))->update($data);
        if($data)
        {
            return response(['code'=>2]);
        }
    }
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $message = [
                'goodsCatId.required' => '请选择商品分类',
                'goodsCatPath.required' => '请选择商品分类',
                'goodsCatPath.max' => '商品分类过长',
                'attrName.required' => '请输入商品名称',
                'attrName.max' => '商品名称过长',
                'attrVal.required' => '请输入属性值',
                'isShow.required' => '请选择是否显示',
                'dataFlag.required'  => '请选择是否有效',
            ];
            $validator = Validator::make($request->post(), [
                'goodsCatId' => 'required',
                'goodsCatPath' => 'required|max:255',
                'attrName' => 'required|max:255',
                'attrVal' => 'required',
                'isShow' => 'required',
                'dataFlag' => 'required',
            ],$message);

            if ($validator->fails()) {
                return response()->json(['code'=>1,'error' => $validator->errors()->first()]);
            }
            $data = ShopGoodsAttributes::cate($request->post());
            return response()->json(['code' => 2]);
        }
        else
        {
            return view('commod.commod_add', ['data' => ShopGoodsCats::two(0)]);
        }
    }
//    二级联动
    public function two(Request $request){
        if(!empty(ShopGoodsCats::two($request->input('catId'))->toarray()))
        {
            return response(['code'=>1,'data'=>ShopGoodsCats::two($request->input('catId'))]);
        }
        else
        {
//            查询品牌
            $data = ShopCatBrands::brand($request->post('catId'));
//            查属性
            $info = ShopGoodsAttributes::Attributes($request->post('catId'));
            return response(['code'=>2,'data'=>$data,'info'=>$info]);
        }
    }
//    修改属性值
    public function updatesShu($id)
    {
        return view('commod.updateShu',['data'=>ShopGoodsAttributes::select('attrVal','attrId')->find($id)]);
    }
    public function updatesShus(Request $request)
    {
        $data = ShopGoodsAttributes::find($request->post('attrId'))->update(['attrVal'=>$request->post('attrVal')]);
        if($data)
        {
            return response(['code'=>2]);
        }
    }
}