<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Facades\ShopGoodsCats;
use App\Facades\ShopGoodsAttributes;
use App\Facades\ShopWarehouses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
class ShopController extends BaseController
{

    public function index()
    {
        return view('shop.shop');
    }

    public function add()
    {
        return view('shop.shop_add',['data' => ShopGoodsCats::two(0),'datas'=>ShopWarehouses::index()]);
    }
    public function upload(Request $request)
    {

//        $path = Storage::putFile('photos', new File('\stroage\upload'));
        $file = $request->file('file');
        if($file->isValid())
        {
//            扩展名称
            $pathname = $file->getClientOriginalExtension();
//            本地绝对路径
            $path = $file->getRealPath();
//            定义文件名称
            $filename = date('Y-m-d-h-i-s').'.'.$pathname;
//            存储文件。disk里面的public。总的来说，就是调用disk模块里的upload配置
            $paths = Storage::disk('upload')->put($filename, file_get_contents($path));
            if($paths)
            {
                return response(['code'=>0,'msg'=>'','data'=>'','src'=>'/uploads/'.date('Ymd').'/'.$filename]);
            }
            else
            {
                return 1;
            }
        }
    }
    public  function value(Request $request)
    {
        if((int)$request->post('val'))
        {
        $info = ShopGoodsAttributes::value($request->post('val'))->toarray();
            if(strpos($info['attrVal'],','))
            {
                $info = explode(',',$info['attrVal']);
            }
            return response(['data'=>$info]);
        }
        else
        {
            return response(['data'=>1]);
        }

    }
    public function values(Request $request)
    {
        dd($request->post());
    }
}