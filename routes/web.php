<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

//登录视图
$router->get('login/passprot_login','LoginController@loginView');
//注册视图
$router->get('register/passprot_register','LoginController@registerView');

//注册数据提交
$router->post('/register/reg_data','LoginController@disposeRegister');


