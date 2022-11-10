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
            $table->integer('id');
            $table->string('season_ticket_name');
            $table->string('sessions_left');
            $table->timestamp('buy_date')->default((new DateTime)->format('Y-m-d'));
            $table->timestamp('last_date')->default((new DateTime)->format('Y-m-d'));
            $table->string('discount_group');
            $table->integer('fixed_coach_id');
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
