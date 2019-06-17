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
    /**
     * 分类页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $count = Cats::CatsCount();

        return view('class.class',['count'=>$count]);
    }

    /**
     * 分类分页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page(Request $request)
    {
        if($request->ajax()){
//            $page = $request->get('page',1);
//            $limit = $request->get('limit',10);
            $html = Cats::SelPage();
            $count = Cats::CatsCount();
            return response()->json(['code'=>0,'msg'=>'','count'=>$count,'data'=>$html]);
        }else{
            $count = Cats::CatsCount();
            return response()->json(['code'=>0,'msg'=>'请求格式有误','count'=>$count,'data'=>'']);
        }
    }

    /**
     * 分类添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        $parentId = $request->get('parentId',0);
//        print_r($parentId);die;
        return view('class.class_add',['parentId'=>$parentId]);
    }

    /**
     * 分类添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CatsAdd(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post = $request->post();
            $res = Cats::CatsAdd($post);
            if($res)
            {
                return view('class.class_success',['url'=>'ClassManagementAdd','data'=>'添加成功']);
            }else {
                return view('class.class_success', ['url'=>'ClassManagementAdd','data' => '添加失败']);
            }
        }else{
            return view('class.class_success', ['url'=>'ClassManagementAdd','data' => '请求错误']);
        }
    }

    /**
     * 分类删除
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function CatsDel(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post = $request->post();
            $arr = Cats::DelSel($post['catId'])->toarray();
            if($arr)
            {
               return response()->json(['code'=>'1004','msg'=>'请先删除子级分类！']);
            }else{
                $res = Cats::Del($post['catId']);
                if($res)
                {
                    return  response()->json(['code'=>'1001','msg'=>'删除成功']);
                }else{
                    return  response()->json(['code'=>'1002','msg'=>'删除失败']);
                }
            }

        }else{
            return  response()->json(['code'=>'1003','msg'=>'请求错误']);
        }
    }

    /**
     * 分类修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CatsUpd(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post = $request->post();
            $res = Cats::Upd($post);
            if($res)
            {
                return view('class.class_success',['url'=>'ClassManagement','data'=>'修改成功']);
            }else{
                return view('class.class_success', ['url'=>'ClassManagement','data' => '修改失败']);
            }
        }else{
            $get = $request->get('catId');

            $html = Cats::Sel($get);
            return view('class.class_upd',['html'=>$html]);
        }

    }

    /**
     * 分类状态修改
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function CatstypeUpd(Request $request)
    {
        if($request->isMethod('post'))
        {
            $post = request()->post();
            unset($post['_token']);
            if($post['switch_isShow'] == 0)
            {
                $post['switch_isShow'] =1;
            }else{
                $post['switch_isShow'] =0;
            }
            $res = cats::isTypeUpd($post);
           if($res)
           {
                return response()->json(['code'=>'1001','msg'=>'修改成功']);
           }else{
               return response()->json(['code'=>'1002','msg'=>'修改失败']);
           }
        }else{
            return response()->json(['code'=>'1003','msg'=>'请求错误']);
        }
    }
}