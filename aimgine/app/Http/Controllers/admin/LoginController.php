<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()&&Auth::user()->isAdmin === 1){
          return view('admin.index');
        }else{
          return view('admin.login');
        }
    }

    public function doLogin(Request $request){
        $remember = false;
        if($request['remember']){
            $remember = true;
        }

        $this->validate($request, [
            'username' => 'bail|required|min:4|max:30|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'bail|required|min:4|max:30|regex:/^[a-zA-Z0-9!\)]+$/',
        ]);

        if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')], $remember)) {
            return redirect()->intended('admin/index');
        } else {
            return back()->withErrors(['Check again your username and password']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('admin');
    }
}
