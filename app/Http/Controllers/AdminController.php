<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin(){
      /*  dd(bcrypt("admin123"));*/
     /*   if(auth()->check()){
            return  redirect()->to('home');
        }*/
        return view('admins.login');
    }

    public function postloginAdmin(Request $request){
     /* dd($request->all());*/
     /* dd(bcrypt('admin123'));*/
       /* $remember =$request->has('remember_me')?true:false;


     /*   $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $remember =$request->has('remember_me')?true:false;
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password],$remember)) {
            return redirect()->to('home');
        } else {
            return redirect()->back()->with(['message'=>'Email or Password is not correct']);
        }*/
        if(auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password

        ])){
            return redirect()->to('home');
        }
        else{
            return view('admins.login')->with('fail', 'Đăng nhập không thành công, sai Email hoặc Mật Khẩu.');
        }
    }
    public function logoutAdmin(Request $request){
        /*  dd(bcrypt("admin123"));*/
        /*   if(auth()->check()){
               return  redirect()->to('home');
           }*/
        Auth::logout();
     $request->session()->flush();
        return redirect()->to('/');
    }
}
