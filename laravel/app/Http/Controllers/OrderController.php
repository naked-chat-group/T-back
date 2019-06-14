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
    /**
     * 订单列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $count = Order::Sel();

        return view('order.order',['count'=>$count]);
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
           return view('order._order_page',['code'=>'1001','html'=>$html]);

        }else{
            return view('order._order_page',['code'=>'1002']);
        }
    }

    /**
     * 订单修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update()
    {
        return view('order.order_update');
    }
    public function list()
    {

        return view('order.order_list');
    }
}