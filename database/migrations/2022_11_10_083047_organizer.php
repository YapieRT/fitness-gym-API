<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Organizer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_clients_session_tickets', function (Blueprint $table) {
            $table->integer('_id');
            $table->string('_season_ticket_name');
            $table->string('_sessions_left');
            $table->timestamp('_buy_date')->default((new DateTime)->format('Y-m-d'));
            $table->timestamp('_last_date')->default((new DateTime)->format('Y-m-d'));
            $table->string('_discount_group');
            $table->integer('_fixed_coach_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_clients_session_tickets');
    }
}
