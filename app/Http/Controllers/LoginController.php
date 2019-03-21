<?php

namespace App\Http\Controllers;

use App\Model\LoginModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * 登录视图
     */
    public function loginView()
    {
        return view('login.login');
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
            header("refresh:2;url='http://www.vm_passprot.com/login/passprot_login'");
        }
    }
}
