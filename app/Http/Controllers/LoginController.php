<?php

namespace App\Http\Controllers;

use App\Model\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    public $redis_h_u_key = 'h:user_token_u:';
    /**
     * 登录视图
     */
    public function loginView()
    {
        $data=[
          'url'=>$_GET['url']
        ];
        return view('login.login',$data);
    }

    /**
     * 注册视图
     */
    public function registerView()
    {
        return view('register.register');
    }

    /**
     * 处理注册数据
     */
    public function disposeRegister()
    {
        if(empty($_POST['u_email'])){
            die('邮箱不能为空');
        }
        $userInfo=LoginModel::where(['name'=>$_POST['nick_name']])->first();
        if(!empty($userInfo)){
           exit('昵称已存在');
        }
        $data=[
            'name'=>$_POST['nick_name'],
            'pwd'=>$_POST['u_pass'],
            'age'=>$_POST['age'],
            'email'=>$_POST['u_email'],
            'reg_time'=>time()
        ];
        $uid = LoginModel::insertGetId($data);
        if($uid){
            echo '注册成功！跳转中。。。。。。';
            header("refresh:2;url='http://passprot.tactshan.com/login/passprot_login'");
        }
    }

    /**
     *处理登录数据
     */
    public function disposeLogin()
    {
        $url = $_POST['request_url'];
        $email = $_POST['u_email'];
        $pwd = $_POST['u_pass'];
        $where=[
            'email'=>$email,
            'pwd'=>$pwd
        ];
        $data=LoginModel::where($where)->first();
        if(empty($data)){
            echo '账号或密码错误';
            header("refresh:2;url='http://passprot.tactshan.com/login/passprot_login'");exit;
        }
        //登陆成功验证用户信息
        $uid = $data->uid;
        $str = time().$uid.mt_rand(1111,9999);
        $token=substr(md5($str),10,20);

        //保存到redis中
        $key = $this->redis_h_u_key.$uid;
        $res = Redis::hSet($key,'token',$token);
        setcookie('uid',$uid,time()+86400,'/','tactshan.com',false,true);
        setcookie('token',$token,time()+86400,'/','tactshan.com',false,true);
        if($res){
            Redis::expire($key,3600*24*7);
            echo '登录成功！';
            header("refresh:2;url='$url'");exit;
        }
    }
}
