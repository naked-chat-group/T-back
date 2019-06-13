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
            $path = asset('storage/'.$path);
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
}