<?php

namespace App\Http\Controllers;

use App\Models\Shop_areas;
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
class WarehouseController extends BaseController
{
    //仓库列表
    public function index()
    {
        $list = Shop_warehouse::orderBy('add_time', 'DESC')->paginate(5);
        return view('warehouse.warehouse',['data'=>$list]);
    }
    //展示添加
    public function add(){
        $data = Shop_areas::area();
        return view('warehouse.warehouse_add',['area'=>$data]);
    }
    //联动城市
    public function city(){
        $provid = Input::get('provid');
        $data = Shop_areas::city($provid);
        return $data;
    }
    //添加数据
    public function insert(Request $request){
        $data = Input::get();
        $data['serve_area'] = implode('、',$data['serve_area']);
        $rules = [
            'name' => 'required|max:20|regex:/\p{Han}/u',
            'number' => 'required|max:20',
            'provid' => 'required',
            'serve_area' => 'required',
            'city' => 'required',
            'principal' => 'required|max:10|regex:/\p{Han}/u'

        ];
        $message = [
            'name.required' => '仓库名称不能为空',
            'name.max' => '仓库名称过长',
            'name.regex' => '仓库名称必须是汉字',
            'number.required' => '仓库编号不能为空',
            'number.max' => '仓库编号过长',
            'provid.required' => '省份不能为空',
            'city.required' => '城市不能为空',
            'serve_area.required' => '服务地区不能为空',
            'principal.required' => '负责人姓名不能为空',
            'principal.max' => '姓名称过长',
            'principal.regex' => '负责人姓名必须是汉字',
        ];

        $validate=Validator::make($data,$rules,$message);

        if(!$validate->passes()){
           $errors = $validate->messages()->all();
           $error = implode('/n',$errors);
           $this->alert($error,"WarehouseManagementAdd");
        }
        $data['add_time'] = date('Y-m-d H:i:s',time());
        $res = Shop_warehouse::insert($data);
        if($res){
            echo "<script>window.location.href='WarehouseManagementAdd';alert('添加成功')</script>";
        }else{
            echo "<script>window.location.href='WarehouseManagementAdd';alert('添加失败')</script>";
        }
    }
    //修改状态
    public function change(){
        $id = Input::get('id');
        $status = Input::get('status');

        $res = Shop_warehouse::up($id,$status);
        if($res){
            return "开启";
        }else{
            return "关闭";
        }
    }
    //删除数据
    public function del(){
        $id = Input::get('id');
        $res = Shop_warehouse::where('id',$id)->delete();
        if($res){
            return "删除成功";
        }else{
            return "删除失败";
        }
    }
    //进入修改
    public function up(){
        $id = Input::get('id');
        $data = Shop_warehouse::where('id',$id)->get()->toArray();
        $data[0]['serve_area'] = explode('、',$data[0]['serve_area']);
        $area = Shop_areas::area();
        $city = Shop_areas::city($data[0]['provid']);
        return view('warehouse.warehouse_up',['data'=>$data,'provid'=>$area,'city'=>$city]);
    }
    //修改数据
    public function update(){
        $id = Input::get('id');
        $data = Input::get();
        $data['serve_area'] = implode('、',$data['serve_area']);
        unset($data['id']);
        $rules = [
            'name' => 'required|max:20|regex:/\p{Han}/u',
            'number' => 'required|max:20',
            'provid' => 'required',
            'serve_area' => 'required',
            'city' => 'required',
            'principal' => 'required|max:10|regex:/\p{Han}/u'

        ];
        $message = [
            'name.required' => '仓库名称不能为空',
            'name.max' => '仓库名称过长',
            'name.regex' => '仓库名称必须是汉字',
            'number.required' => '仓库编号不能为空',
            'number.max' => '仓库编号过长',
            'provid.required' => '省份不能为空',
            'city.required' => '城市不能为空',
            'serve_area.required' => '服务地区不能为空',
            'principal.required' => '负责人姓名不能为空',
            'principal.max' => '姓名称过长',
            'principal.regex' => '负责人姓名必须是汉字',
        ];

        $validate=Validator::make($data,$rules,$message);

        if(!$validate->passes()){
            $errors = $validate->messages()->all();
            $error = implode('/n',$errors);
            $this->alert($error,"WarehouseManagementAdd");
        }
        $res = Shop_warehouse::where('id',$id)->update($data);
        if($res){
            echo "<script>window.location.href='WarehouseManagement';alert('修改成功')</script>";
        }else{
            echo "<script>window.location.href='WarehouseManagement';alert('无修改操作')</script>";
        }
    }
    //搜索仓库
    public function search(){
        $name = input::get('name');
        $list = Shop_warehouse::where('name',$name)->orWhere('name','like','%'.$name.'%')->paginate(5);
        $page = isset($page)?$page:1;
        $list = $list->appends(array('name'=>$name,'page'=>$page));
        return view('warehouse.warehouse',['data'=>$list]);
    }
    //alert
    function alert($tip = "", $url = "") {
        $js = "<script>";
        $js .= "alert('" . $tip . "');";
        $js .= "window.location.href='" . $url . "';";
        $js .= "</script>";
        echo $js;
    }

}