<?php

namespace App\Http\Controllers;

use App\Facades\ShopGood;
use App\Facades\ShopGoodsSpeces;
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
    public function inputs(Request $request)
    {
        $names = $request->post();
        $data = [
            'goodsSn'=> $request->post('goodsSn'),
            'productNo'=> $request->post('productNo'),
            'goodsName'=> $request->post('goodsName'),
            'goodsDesc'=> $request->post('goodsDesc'),
            'goodsImg'=> $request->post('goodsImg'),
            'shopPrice'=> $request->post('shopPrice'),
            'goodsStock'=> $request->post('goodsStock'),
            'isSale'=> $request->post('isSale'),
            'isBes'=> $request->post('isBes'),
            'goodsCatId'=> $request->post('goodsCatId'),
            'brandId'=> $request->post('brandId'),
            'isSpec'=> $request->post('sku'),
            'cangku'=> $request->post('cangku')
        ];
        if($request->post('sku'))
        {
            $data['marketPrice'] = $request->post('marketPrice_min')."-".$request->post('marketPrice_max');
        }
        else
            {
                $data['marketPrice'] = $request->post('marketPrice');
            }

        $data = ShopGood::create($data);
//        添加sku
        $a = count($request->post('spacess'));
        $b = count($request->post('spac'));
        $c = $b/$a;
        for ($i=0;$i<$a;$i++)
        {
            $info = [
                'goodsId'=>$data->goodsId,
                'goodsName'=>$request->post('spacess')[$i],
                'marketPrice'=>$request->post('spaces')[$i],
                'marketPrice'=>$request->post('spaces')[$i],
                'specPrice'=>$request->post('space')[$i],
                'specStock'=>$request->post('specStock')[$i],

            ];
            $info['warnStockval'] = '';
            $info['warnStock'] = '';
            for ($j = 0; $j< $c;$j++)
            {
                $info['warnStockval'] .= $names['warnStockval'][$j].',';
                $info['warnStock'] .= $names['spac'][$j].',';
                unset($names['warnStockval'][$j]);
                unset($names['spac'][$j]);
            }
            $names['warnStockval'] = array_values($names['warnStockval']);
            $names['spac'] = array_values($names['spac']);
            $price = ShopGoodsSpeces::create($info);
            if($price)
            {
                return response(['code'=>1,'mess'=>'添加成功']);
            }
            else
            {
                return response(['code'=>2,'mess'=>'添加失败']);
            }
        }
    }
    public function updates(Request $request)
    {
        dd($request->post());
        $data = [
            'goodsSn'=> $request->post('goodsSn'),
            'productNo'=> $request->post('productNo'),
            'goodsName'=> $request->post('goodsName'),
            'goodsDesc'=> $request->post('goodsDesc'),
            'goodsImg'=> $request->post('goodsImg'),
            'marketPrice'=> $request->post('marketPrice'),
            'shopPrice'=> $request->post('shopPrice'),
            'goodsStock'=> $request->post('goodsStock'),
            'isSale'=> $request->post('isSale'),
            'isBes'=> $request->post('isBes'),
            'goodsCatId'=> $request->post('goodsCatId'),
            'brandId'=> $request->post('brandId'),
            'isSpec'=> $request->post('sku'),
            'cangku'=> $request->post('cangku')
        ];
        $data = ShopGood::find($request->post('goodsId'))->update($data);
        if($data)
        {
            return response(['code'=>'1','mess'=>'修改成功']);
        }
        else{
            return response(['code'=>'2','mess'=>'修改失败']);
        }
    }
    public function view(Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');
        if ($key = $request->get('key')) {//搜索
            $count = ShopGood::where('attrName','like',"$key%")->count();
            $data = ShopGood::findAllById($key,($page-1)*$limit,$limit);
        } else {//分页
            $count = ShopGood::count();
            $data = ShopGood::findAll(($page-1)*$limit,$limit);

        }
        return response(['code'=>0,'msg'=>'','count'=>$count,'data'=>$data]);
    }

    //  删除
    public function del(Request $request)
    {
        $data = ShopGood::del($request->get('goodsId'));
        if($data)
        {
            return response(['code'=>1,'message'=>'删除成功']);
        }else{
            return response(['code'=>2,'message'=>'删除失败']);
        }
    }
    public function update($id)
    {
        return view('shop.update', ['user'=>ShopGood::find($id),'data' => ShopGoodsCats::two(0),'datas'=>ShopWarehouses::index()]);
    }
}