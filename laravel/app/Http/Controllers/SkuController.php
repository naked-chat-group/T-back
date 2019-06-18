<?php

namespace App\Http\Controllers;

use App\Facades\ShopBrands;
use App\Facades\ShopGood;
use Illuminate\Routing\Controller as BaseController;
use App\Facades\ShopGoodsCats;
use App\Facades\ShopCatBrands;
use App\Facades\ShopGoodsAttributes;
use Illuminate\Http\Request;
use Validator;
class SkuController extends BaseController
{
    public function index()
    {
        $data = ShopGood::index();
        return  view('sku.index',['data'=>$data]);
    }
    public function type(Request $request)
    {
        $data = ShopGoodsAttributes::where('goodsCatId',$request->post('id'))->select('attrName','attrVal')->get();
        foreach ($data as $k => $v)
        {
            $data[$k]['attrVal'] = explode(',',trim($v['attrVal'],','));
        }
        return response(['data'=>$data]);
    }
}