<?php
namespace App\Http\Middleware;

use Closure;
use Route;

class CheckPermission{
    public function handle($request, Closure $next, $m)
    {

        $routeName = Route::currentRouteName();
       //dd($routeName."=>".$m);

        $permission = '';
        switch ($routeName){
            case "admin.{$m}.index":
            case "admin.{$m}.ajax":
            case "admin.{$m}.ajaxIndex": $permission = "{$m}.list";     break;
            case "admin.{$m}.create":
            case "admin.{$m}.store":     $permission = "{$m}.add";      break;
            case "admin.{$m}.edit":
            //case "admin.{$m}.show":
            case "admin.{$m}.update":    $permission = "{$m}.edit";     break;
            case "admin.{$m}.destroy":   $permission = "{$m}.delete";   break;
            default : break;
        }
       //dd($permission);
        if (!$permission){
            abort(500,'系统没有权限，请修改权限验证中间件\\App\\Http\\Middleware\\CheckPermission！');
        }
        if (!$request->user('admin')->can($permission)){
            abort(500,'您没有权限进行此次操作！');
        }
       // dd($next($request));
        return $next($request);
    }
}