<?php

namespace App\Http\Controllers;

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
}
