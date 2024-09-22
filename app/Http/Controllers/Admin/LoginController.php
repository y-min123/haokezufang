<?php
//后台登录
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LoginController extends Controller {
//    public function __construct() {
//        //$this->middleware(['check.admin:login']);//参数login
//        $this->middleware(['check.admin']);
//    }

    //登录显示
    public function index() {
        //判断用户是否登录过
        if (auth()->check()) {
            //跳转到后台
            return  redirect(route('admin.index'));
        }
        return view('admin.login.login');
    }

    //登录 别名 admin.login 根据别名生成url route(admin.login);
    public function login(Request $request) {
        //表单验证
        $post = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        //登录
        $result = auth()->attempt($post);
        //判断是否登录成功
        if ($result) {
            //auth()->user() 返回当前登录用户模型对象，存储在session中
            //laravel 默认session是存储在文件中,优化到redis memcached
            $model = auth()->user();
            //调转到后台页面
            return redirect(route('admin.index'));
        }
        //withErrors 把信息写入到验证错误提示中  特殊的session 在laravel 中称为闪存
        //闪存：从设置好之后，只能在第一个HTTP请求中获取到数据，以后就没有了
        return redirect(route('admin.login'))->withErrors(['error'=>'登录失败']);
    }
}






