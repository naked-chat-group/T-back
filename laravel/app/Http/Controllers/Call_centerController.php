<?php

namespace App\Http\Controllers;

use App\Models\Shop_areas;
use App\Models\Shop_comment;
use App\Models\Shop_goods;
use App\Models\Shop_opinions;
use App\Models\Shop_reply;
use App\Models\Shop_users;
use App\Models\Shop_warehouse;
use function Composer\Autoload\includeFile;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class Call_centerController extends BaseController
{
    //评论
    public function comment(){
        $list = Shop_comment::page();
        return view("call_center.comment",['list'=>$list]);
    }
    //评论审核
    public function change(){
        $id = Input::get('id');
        $status = Input::get('status');
        $res = Shop_comment::up($id,$status);
        if($res){
            return "成功";
        }else{
            return "失败";
        }
    }
    //评论回复
    public function reply(){
        session_start();
        $id = Input::get('id');
        $status = Input::get('reply_status');
        $comment = Input::get('comment');
        $arr['content'] = $comment;
        $arr['p_id'] = $id;
        $arr['admin_id'] = $_SESSION['id'];
        $arr['type'] = 1;
        $arr['add_time'] = time();
        $res = Shop_comment::reply($id);
        $res = Shop_reply::insert($arr);
        if($res){
            return "回复成功";
        }else{
            return "回复失败";
        }
    }
    //评论搜索
    public function search(){
        $name = input::get('name');
        $list = Shop_comment::search($name);
        $page = isset($page)?$page:1;
        $list = $list->appends(array('name'=>$name,'page'=>$page));
        return view('call_center.comment',['list'=>$list]);
    }
    //意见
    public function opinion(){
        $list = Shop_opinions::page();
        return view("call_center.opinion",['list'=>$list]);
    }
    public function opinion_reply(){
        session_start();
        $id = Input::get('id');
        $status = Input::get('reply_status');
        $comment = Input::get('comment');
        $arr['content'] = $comment;
        $arr['p_id'] = $id;
        $arr['admin_id'] = $_SESSION['id'];
        $arr['type'] = 2;
        $arr['add_time'] = time();
        $res = Shop_opinions::reply($id);
        $res = Shop_reply::insert($arr);
        if($res){
            return "回复成功";
        }else{
            return "回复失败";
        }
    }
    public function opinion_search(){
        $name = input::get('name');
        $list = Shop_opinions::search($name);
        $page = isset($page)?$page:1;
        $list = $list->appends(array('name'=>$name,'page'=>$page));
        return view('call_center.opinion',['list'=>$list]);
    }
}