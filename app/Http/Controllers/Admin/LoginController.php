<?php
//后台登录
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    //登录显示
    public function index() {
        return view('admin.login.login');
    }

    //登录 别名 admin.login 根据别名生成url route(admin.login);
    public function login(Request $request) {
        //表单验证
        $res = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        dump($res);

    }
}
