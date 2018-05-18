<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function index()
    {
        $basic_info['pannel']=['基本信息','三级模板'];
        $basic_info['title']="基本信息";
        $basic_info['description']='';



        return view('admin.index')->with('basic_info',$basic_info);
    }
}
