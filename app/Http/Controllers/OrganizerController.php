<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizerController extends Controller
{
    // Show All Customers
    public function index() {
        $customers = DB::table('gym_clients_session_tickets')->get();
        return $customers;
    }
}
