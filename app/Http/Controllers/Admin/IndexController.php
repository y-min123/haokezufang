<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //后台首页展示
    public function index() {
        return view('admin.index.index');
    }

    //欢迎页面
    public function welcome() {
        return view('admin.index.welcome');
    }

    //退出登录
    public function logout() {
        //退出登录，就是清空 session
        auth()->logout();
        //跳转到登录页面
        return redirect(route('admin.login'))->with('success','请重新登陆');
    }
}
