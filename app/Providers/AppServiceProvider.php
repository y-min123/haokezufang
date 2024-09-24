<?php

namespace App\Providers;
//引入对应的命名空间
use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //自定义验证规则
        //参数1 规则名
        Validator::extend('phoneNumber', function ($attribute, $value, $parameters, $validator) {
            $reg1 = '^1[3-9]\d{9}$]';
            $reg2 = '^\+86-1[3-9]\d{9}$';
            return preg_match($reg1, $value) | preg_match($reg2, $value);
        });
    }
}
