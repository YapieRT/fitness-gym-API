<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showCoaches(){
        $coaches = Coach::all();
        return $coaches;
    }
}
