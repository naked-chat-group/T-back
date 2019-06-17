<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Facades\Order;
use App\Facades\OrderGoods;

class OrderController extends BaseController
{
    /**
     * 订单列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('order.order');
    }

    /**
     * 订单分页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page(Request $request)
    {
        if($request->ajax()){
            $page = $request->get('page',1);
            $limit = $request->get('limit',10);
            $html = Order::SelPage(($page-1)*$limit,$limit);
            $count = Order::Sel();
            return response()->json(['code'=>0,'msg'=>'','count'=>$count,'data'=>$html]);

        }else{
            $count = Order::CatsCount();
            return response()->json(['code'=>0,'msg'=>'请求格式有误','count'=>$count,'data'=>'']);
        }
    }

    /**
     * 订单修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request)
    {
        $orderNo = $request->get('orderNo');
        $orderId = $request->get('orderId');
        $order = Order::OrderSel($orderNo);

        $ordergood = OrderGoods::ordergoodSel($orderId);


        return view('order.order_update',['order'=>$order,'ordergood'=>$ordergood]);
    }
    public function list()
    {
        return view('order.order_list');
    }
    public function desc(Request $request)
    {
        $orderNo = $request->get('orderNo');
        $order = Order::OrderSel($orderNo);

        return view('order.order_desc',['order'=>$order]);
    }

}