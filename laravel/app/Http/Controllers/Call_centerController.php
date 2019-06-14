<?php

namespace App\Http\Controllers;

use App\Models\Shop_areas;
use App\Models\Shop_comment;
use App\Models\Shop_goods;
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
    public function comment(){
        $list = Shop_comment::page();
//        print_r($list);
        return view("call_center.comment",['list'=>$list]);
    }
    //修改状态
    public function change(){
        $id = Input::get('id');
        $status = Input::get('status');
        $res = Shop_comment::up($id,$status);
        if($res){
            return "通过";
        }else{
            return "未通过";
        }
    }
}