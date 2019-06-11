<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Facades\Order;

class OrderController extends BaseController
{

    public function index()
    {
        $count = Order::Sel();

        return view('order.order',['count'=>$count]);
    }
    public function page(Request $request)
    {
        if($request->ajax()){
            $page = $request->get('page',1);
            $limit = $request->get('limit',10);
            $html = Order::SelPage(($page-1)*$limit,$limit);
//            dd($html);
           return view('order._oreder_page',['html'=>$html]);

        }else{
            return json(['code'=>'1002','msg'=>'请求错误']);
        }
    }
    public function update()
    {
        return view('order.order_update');
    }
    public function list()
    {

        return view('order.order_list');
    }
}