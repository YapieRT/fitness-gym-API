<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'userTel'=>'required|regex:/(?=.*+[0-9]{3}\s?[0-9]{2}\s?[0-9]{3}\s?[0-9]{4,5}$)/',
            'userPass'=>'required|min:6',
        ]);

        /*
        if(Auth::attempt([
            'phone'=>$request->email,
            'password'=>$request->password,
        ])){
            session()->flash('success', 'Користувча авторизовано');
            return redirect()->home();
        }

        return redirect()->back()->with('error', 'Неправильно введена номер телефону та/або пароль');
        */
        $tel = $request->userTel;
        $pass = $request->userPass;
        $check = $request->role;
        return view('test', compact('tel', 'pass', 'check'));
    }
}
