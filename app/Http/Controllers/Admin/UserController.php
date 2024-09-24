<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;

use Illuminate\Http\Request;


class UserController extends BaseController
{
    public function index() {
        //分页
        $data = User::paginate($this->pageSize);
        //compact 函数将数据赋值给页面
        return view('admin.user.user',compact('data'));
    }

    //添加用户展示
    public function create() {
        return view('admin.user.create');
    }

    //添加用户存储
    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required|unique:users,username',
//            'password' => 'required|confrim:password',
            'phone' => 'required|phone',
        ]);
    }
}







