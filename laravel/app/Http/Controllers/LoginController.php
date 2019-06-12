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

        }
        else{
            /**token验证失败**/
            return 3;
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
            return 4;
        }
        $request->session()->put('uid',$arr1['id']);
        $uid = $request->session()->get('uid');
        Admin::where('id',$uid)->update(['last_time'=>date('Y-m-d H:i:s',time())]);
        return 5;
    }
    //修改密码
    public function update(){
        return view('login.update');
    }
}