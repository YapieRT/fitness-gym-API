<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Register New User
    public function register(Request $request){
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

    // Authorization User
    public function login(Request $request){
        if(Auth::attempt([
            'phone_number'=>$request->input('phone_number'),
            'password'=>$request->input('password'),
        ])){
            return true;
        }
        return false;
    }

    // Logout User
    public function logout(){
        Auth::logout();
    }

    // Show User Info
    public function userInfo($id){
        $info = DB::table('gym_clients_session_tickets')->where('id', $id)->first();
        $user = User::where('id', $id)->first();
        $coach = Coach::where('id', $info->fixed_coach_id)->first();
        $data = [
            'name'=> $user->name,
            'surname'=> $user->surname,
            'phone_number'=> $user->phone_number,
            'ticket'=>$info->season_ticket_name,
            'coach'=>"$coach->name $coach->surname",
            'last_date'=>$info->last_date,
            'sessions_left'=>$info->sessions_left];
        return $data;
    }
}
