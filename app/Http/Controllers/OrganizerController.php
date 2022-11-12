<?php

namespace App\Http\Controllers;

use App\Models\Coach;
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

                $ticket = DB::select('select sessions_amount from season_ticket_overview where `name` = ?', [$seasonTicketName]);
                $sessionsLeft = $ticket[0]->sessions_amount;

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
            return "Couldn't add customer";
        }
    }

    // Show Customer
    public function show($id) {
        $customerSession = Organizer::find($id);
        $customerInfo = User::find($id);

        $coachInitials = null;
        if ($customerSession->fixed_coach_id) {
            $coachInfo = Coach::find($customerSession->fixed_coach_id);
            if ($coachInfo) {
                $coachInitials = $coachInfo->name . " " . $coachInfo->surname;
            }
        }

        $customer = [
            'name' => $customerInfo->name,
            'surname' => $customerInfo->surname,
            'phone_number' => $customerInfo->phone_number,
            'season_ticket_name' => $customerSession->season_ticket_name,
            'coach_initials' => $coachInitials,
        ];

        return $customer;
    }

    // Update Customer
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'season_ticket_name' => 'required',
        ]);

        if(!$validator->fails()) {
            $customer = Organizer::find($id);
            $ticket = DB::select('select sessions_amount from season_ticket_overview where `name` = ?', [$request->get('season_ticket_name')]);
            $sessionsLeft = $ticket[0]->sessions_amount;

            if ($customer != null) {
                $user = User::find($customer->id);

                $user->name = $request->get('name');
                $user->surname = $request->get('surname');
                $user->phone_number = $request->get('phone_number');
                $customer->season_ticket_name = $request->get('season_ticket_name');
                $customer->sessions_left = $sessionsLeft;
                $customer->buy_date = Carbon::now()->format('Y-m-d');
                $customer->last_date = Carbon::now()->addMonth()->format('Y-m-d');
                $customer->discount_group = $request->get('discount_group');
                $customer->fixed_coach_id = $request->get('fixed_coach_id');

                $user->save();
                $customer->save();

                return "Updated customer";
            } else {
                return 'Customer not found';                
            }
        }
        else {
            return "Couldn't update customer";
        }
    }

    // Delete Customer
    public function delete(Organizer $customer) {
        $customer->delete();
        return response()->json(null);
    }
}
