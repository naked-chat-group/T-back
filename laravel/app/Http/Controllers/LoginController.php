<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin;
use App\Models\Password;

class LoginController extends BaseController
{
    //登录
    public function index()
    {
        return view('login.login');
    }
    public function verityToken(Request $request){
        $token = $request->input('token');
        include ("./php/CaptchaClient.php");
        $appId = "8ad5be8319737e8a0119770f7b5ff7e4";
        $appSecret = "bca973c4ec26bffcceff3205c778122d";
        $client = new \CaptchaClient($appId,$appSecret);
        $client->setTimeOut(300);      //设置超时时间，默认2
        $response = $client->verifyToken($token);
        //echo $response->serverStatus;
        //确保验证状态是SERVER_SUCCESS，SDK中有容错机制，在网络出现异常的情况会返回通过
        if($response->result){
            return response()->json(['code' => 0]);
        }
        else{
            /**token验证失败**/
            return response()->json(['code' => 3]);
        }
    }
    public function login(Request $request){
        $name = $request->input('name');
        $pwd = md5($request->input('pwd'));
        $arr1 = Admin::where('admin_name',$name)->first();
        if (empty($arr1)){
            return 1;
        }
        $arr2 = Password::where('uid',$arr1['id'])->where('password',$pwd)->first();
        if (empty($arr2)){
            return 2;
        }
        $expire = $arr2['create_at']+30*24*60*60;
        if (time()>$expire) {
            $request->session()->put('uid',$arr1['id']);
            return 4;
        }
        $uid = $request->session()->get('uid');
        Admin::where('id',$uid)->update(['last_time'=>date('Y-m-d H:i:s',time())]);
        return 5;
    }
    //修改密码
    public function update(){
        return view('login.update');
    }
    public function changepwd(Request $request){
        $pwd = $request->input('pwd');
        $uid = $request->session()->get('uid');
        $arr = Password::where('uid',$uid)->orderBy('status','desc')->first()->toArray();
        $status = $arr['status'];
        if($status == 0){
            $ypwd = $arr['password'];
            if ($ypwd != $pwd){
                Password::insert([
                    'uid'=>$uid,
                    'password' => md5($pwd),
                    'create_at' => time(),
                    'status' => 1
                ]);
                return 2;
            }
            else{
                return 1;
            }
        }
        if ($status == 1){
            $arr1 = Password::where('uid',$uid)->get();
            $data1 = [];
            foreach ($arr1 as $k => $v){
                $data1[] = $v['password'];
            }
            if (!in_array($pwd,$data1)){
                Password::insert([
                    'uid'=>$uid,
                    'password'=>md5($pwd),
                    'create_at' => time(),
                    'status' => 2
                ]);
                return 2;
            }
            else{
                return 3;
            }
        }
        if ($status == 2){
            $arr2 = Password::where('uid',$uid)->get();
            $data2 = [];
            foreach ($arr2 as $k => $v){
                $data2[] = $v['password'];
            }
            if (!in_array($pwd,$data2)){
                Password::insert([
                    'uid'=>$uid,
                    'password'=>md5($pwd),
                    'create_at' => time(),
                    'status' => 3
                ]);
                return 2;
            }
            else{
                return 4;
            }
        }
        if ($status == 3){
            $arr3 = Password::where('uid',$uid)->where('status','3')->delete();
        }
    }
}