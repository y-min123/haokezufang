<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  String $param 中间件传参，在绑定中间件地方：值
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dump($param);
//        echo '这个是一个检查用户登录的中间件';

        //检查用户是否登录
        if(!auth()->check()) {
            return  redirect(route('admin.login'))->withErrors(['errors'=>'请重新登录']);
        }

        return $next($request);
    }
}
