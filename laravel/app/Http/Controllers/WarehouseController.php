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

class WarehouseController extends BaseController
{

    public function index()
    {
        return view('warehouse.warehouse');
    }
    public function add(){
        $data = Shop_areas::area();
        return view('warehouse.warehouse_add',['area'=>$data]);
    }
    public function city(){
        $provid = Input::get('provid');
        $data = Shop_areas::city($provid);
        return $data;
    }
    public function insert(){
        $data = Input::get();
        $arr['name'] = $data['name'];
        $arr['number'] = $data['number'];
        $arr['status'] = $data['status'];
        $arr['serve_area'] = $data['serve_area'];
        $arr['principal'] = $data['principal'];
        $arr['location'] = $data['provid'].'、'.$data['city'];
        $arr['add_time'] = date('Y-m-d H:i:s',time());
        $res = Shop_warehouse::insert($arr);
        if($res){
            echo "<script>window.location.href='WarehouseManagementAdd'</script>";
        }
    }

//    public function a(){
//
//        $provid = "北京市";
//        $data = Shop_areas::city($provid);
//         print_r($data);
//    }
}