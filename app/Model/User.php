<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//继承可以使用auth登录的模型类
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    //设置添加的字段
    //不允许进行批量赋值的字段
    protected $guarded = [];
}
