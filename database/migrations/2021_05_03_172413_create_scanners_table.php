<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scanners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id');
            $table->foreignId('visitor_id');
            $table->string('permission_rapid', 191);
            $table->string('body_temperature');
            $table->boolean('face_mask');
            $table->boolean('washing_hands');
            $table->dateTime('building_in', $precision = 0);
            $table->dateTime('room_in', $precision = 0);
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
        Schema::dropIfExists('scanners');
    }
}
