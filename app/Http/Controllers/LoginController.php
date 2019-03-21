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
}
