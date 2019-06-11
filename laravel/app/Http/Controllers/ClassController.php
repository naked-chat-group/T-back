<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Facades\Cats;

class ClassController extends BaseController
{

    public function index()
    {
        $count = Cats::CatsCount();

        return view('class.class',['count'=>$count]);
    }
    public function page(Request $request)
    {
        if($request->ajax()){
            $page = $request->get('page',1);
            $limit = $request->get('limit',10);

            $html = Cats::SelPage(($page-1)*$limit,$limit);
//            dd($html);
            return view('class._class_page',['html'=>$html]);
        }else{

        }
    }
    public function add()
    {
        $parentId = 0;
        return view('class.class_add',['parentId'=>$parentId]);
    }
    //分类添加
    public function CatsAdd(Request $request)
    {
        if($request->post())
        {
            $post = $request->post();
            $res = Cats::CatsAdd($post);
            if($res)
            {
                return view('class.class_success',['data'=>'添加成功']);
            }else {
                return view('class.class_success', ['data' => '添加失败']);
            }
        }else{
            return view('class.class_success', ['data' => '请求错误']);
        }
    }
}