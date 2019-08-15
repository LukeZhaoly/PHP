<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //登录界面
    public function showLoginForm(){
        return view("admin.auth.login");
    }

    //登录校验
    public  function login(Request $request){
        //前端数据
        $data=$request->only('name','password');
        //校验
        $this->validate($request,[
           'name'=>'required|string',
           'password'=>'required|string'
        ]);
        $isExit=Auth::guard()->attempt($data);
        if ($isExit){
            return redirect("/admin/post/");
        }
    }

    //退出
    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect("/login");
    }
}
