<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Get all Coaches
    public function showCoaches()
    {
        $coaches = Coach::all();
        return $coaches;
    }

    // Get all Tariffs
    public function showTariffs()
    {
        $descriptions = DB::table('season_tickets_descriptions')->get();
        $tickets = DB::table('season_ticket_overview')->get();

        $all = [];
        foreach ($tickets as $ticket) {
            $temp = [
                'name' => $ticket->name,
                'sessions_amount' => $ticket->sessions_amount,
                'price' => $ticket->price,
            ];

            foreach ($descriptions as $description) {
                if ($ticket->name == $description->ticket_name) {
                    array_push($temp, [
                        "description" => $description->season_tickets_description,
                        "available" => $description->available
                    ]);
                }
            }
            array_push($all, $temp);
        }

        return $all;
    }

    // Get all Discounts
    public function showDiscounts()
    {
        return DB::table('discounts')->get();
    }

    // Make season ticket order
    public function ticketOrder()
    {
        $data = [
            'tariffs' => DB::table('season_ticket_overview')->get(),
            'discounts' => DB::table('discounts')->get(),
            'coaches' => Coach::all(),
        ];
        return $data;
    }

}
