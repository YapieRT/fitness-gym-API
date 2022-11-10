<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrganizerController extends Controller
{
    // Show All Customers
    public function index() {
        return Organizer::all();
        // $customers = DB::table('gym_clients_session_tickets')->get();
        // return $customers;
    }

    // Add New Customer
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'season_ticket_name' => 'required',
        ]);

        if(!$validator->fails()) {

            $customerId = DB::select('select id from users where `phone_number` = ?', [$request->input('phone_number')]);
            $customerId = $customerId[0]->id;

            if (!Organizer::where('id', $customerId)->exists()) {
                $seasonTicketName = $request->input('season_ticket_name');
                $sessionsLeft = 8; // DB::select('select sessions_amount from season_ticket_overview where `name` = ?', [$seasonTicketName]);
                $buyDate = Carbon::now()->format('Y-m-d');
                $lastDate = Carbon::now()->addMonth()->format('Y-m-d');
                $discountGroup = $request->input('discount_group');
                $fixedCoachId = $request->input('fixed_coach_id');
    
                return Organizer::create([
                    'id' => $customerId,
                    'season_ticket_name' => $seasonTicketName,
                    'sessions_left' => $sessionsLeft,
                    'buy_date' => $buyDate,
                    'last_date' => $lastDate,
                    'discount_group' => $discountGroup,
                    'fixed_coach_id' => $fixedCoachId
                ]);
            } else {
                return 'Customer already exists';                
            }
        }
        else {
            return "Couldn't add Customer";
        }
    }

    // Show Customer
    public function show($id) {
        $customerSession = Organizer::find($id);
        $customerInfo = User::find($id);

        $customer = [
            'name' => $customerInfo->name,
            'surname' => $customerInfo->surname,
            'phone_number' => $customerInfo->phone_number,
            'season_ticket_name' => $customerSession->season_ticket_name,
        ];

        return $customer;
    }
}
