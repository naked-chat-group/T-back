<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Facades\Cats;
use App\Facades\Brands;
use App\Facades\BrandsCats;
class BrandController extends BaseController
{

    public function add()
    {
        $cats = Cats::addSel()->toarray();

        return view('brand.brand_add',['cats'=>$cats]);
    }
    public function lists()
    {


        return view('brand.brand_list');
    }
    public function Upload(Request $request)
    {
        if($request->isMethod('post'))
        {
            $path = $request->file('file')->store('public');
            //截取/后面的字符串
            $path= substr(strrchr($path, "/"), 1);
            $path = '/storage/'.$path;
            return response()->json(['code'=>'1000','msg'=>'','path'=>$path]);
        }
    }
    public function adds(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post = $request->post();
            $brandName = Brands::BrandsSel($post['brandName'])->toarray();
            if(!$brandName)
            {
                return  Brands::BrandsAdd($post);
            }else{
                return response()->json(['code'=>'1004','msg'=>'该品牌已存在']);
            }
        }else{
            return response()->json(['code'=>'1003','msg'=>'请求失败']);
        }
    }
    public function BrandsPage(Request $request)
    {
        if($request->ajax()){
            $page = $request->get('page',1);
            $limit = $request->get('limit',10);
            $where = $request->get('brandName',"");

            $count = Brands::BrandCount($where);
           
            $html = Brands::SelPage(($page-1)*$limit,$limit,$where);

            return response()->json(['code'=>0,'msg'=>'','count'=>$count,'data'=>$html]);
        }else{
            $count = Brands::BrandCount($where ="");
            return response()->json(['code'=>0,'msg'=>'请求格式有误','count'=>$count,'data'=>'']);
        }
    }
    public function Del(Request $request)
    {
        $post = $request->post();
        $res = Brands::BrandDel($post['brandId']);
        if($res)
        {
            return  response()->json(['code'=>'1001','msg'=>'删除成功']);
        }else{
            return  response()->json(['code'=>'1002','msg'=>'删除失败']);
        }

    }
    //修改渲染页面
    public function BrandsUpd(Request $request)
    {
        $brandId = $request->get('brandId');
        $brandCats = BrandsCats::brandCatsSel($brandId);
        $html = Brands::brandIdSel($brandId);
        $cats = Cats::addSel()->toarray();
        return view('brand.brand_upd',['html'=>$html,'cats'=>$cats,'brandCats'=>$brandCats]);
    }
    public function BrandsUpds(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post = $request->post();
            return Brands::BrandsUpd($post);
        }else{
            return response()->json(['code'=>'1003','msg'=>'请求失败']);
        }

    }
    //条件查询
    public function Sel(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post = $request->post();
            return Brands::BrandSel($post['brandName']);
        }else{
            return response()->json(['code'=>'1003','msg'=>'请求失败']);
        }

    }
}