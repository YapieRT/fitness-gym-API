<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'gym_clients_session_tickets';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'season_ticket_name',
        'sessions_left',
        'buy_date',
        'last_date',
        'discount_group',
        'fixed_coach_id'
    ];
}
