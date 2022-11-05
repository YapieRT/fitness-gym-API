<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone_number'=>'required|unique:users',
            'password'=>'required|confirmed',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'phone_number'=>$request->phone_number,
            'password'=>bcrypt($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function loginForm(){
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'userTel'=>'required',
            'userPass'=>'required|min:6',
        ]);
        if(Auth::attempt([
            'phone_number'=>$request->userTel,
            'password'=>$request->userPass,
        ])){
            return redirect()->home();
        }
        return redirect()->back()->with('error', 'Неправильно введена номер телефону та/або пароль');
    }
}
