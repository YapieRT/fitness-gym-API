<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Get all Coaches
    public function showCoaches(){
        $coaches = Coach::all();
        return $coaches;
    }

    // Get all Tariffs
    public function showTariffs() {
        return DB::select('select * from season_ticket_overview');
    }

    // Get all Discounts
    public function showDiscounts() {
        return DB::select('select * from discounts');
    }
}
