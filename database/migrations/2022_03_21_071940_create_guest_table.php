<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest', function (Blueprint $table) {
            $table->id();
            $table->string('check_in', 12);
            $table->string('check_out', 12);
            $table->integer('room_total');
            $table->string('name', 30);
            $table->string('email', 30);
            $table->string('phone_number', 13);
            $table->string('guest_name', 30);
            $table->string('room_type', 30);
            $table->foreign('room_type')->references('type')->on('rooms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest');
    }
}
