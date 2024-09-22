<?php
//后台路由

//路由分组
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function (){
    //登录显示， name 是给路由起别名
    Route::get('login','LoginController@index')->name('admin.login');
    //登录处理
    Route::post('login','LoginController@login')->name('admin.login');

    Route::group(['middleware'=>['check.admin']],function (){
        //后台首页展示
        Route::get('index','IndexController@index')->name('admin.index');
        //欢迎页面 绑定路由中间件
        //Route::get('welcome','IndexController@welcome')->name('admin.welcome')->middleware('check.admin');
        Route::get('welcome','IndexController@welcome')->name('admin.welcome');

        //退出登录
        Route::get('logout','IndexController@logout')->name('admin.logout');

        //用户列表-----------
        //用户列表
        Route::get('user/index','UserController@index')->name('admin.user.user');

        //添加用户展示
        Route::get('user/add','UserController@create')->name('admin.user.create');
        //存储用户
        Route::post('user/add','UserController@store')->name('admin.user.store');
    });

});
