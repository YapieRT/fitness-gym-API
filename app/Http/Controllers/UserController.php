<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'surname'=>'required',
            'phone_number'=>'required|unique:users',
            'password'=>'required',
        ]);

        if(!$validator->fails()) {
            $user = User::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'phone_number' => $request->input('phone_number'),
                'password' => bcrypt($request->input('password'))
            ]);
            Auth::login($user);
            return true;
        }
        else {
            return false;
        }
    }

    function login(Request $request){
        if(Auth::attempt([
            'phone_number'=>$request->input('phone_number'),
            'password'=>$request->input('password'),
        ])){
            return true;
        }
        return false;
    }

    function logout(){
        Auth::logout();
    }
}
