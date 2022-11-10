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
        '_id',
        '_season_ticket_name',
        '_sessions_left',
        '_buy_date',
        '_last_date',
        '_discount_group',
        '_fixed_coach_id'
    ];
}
