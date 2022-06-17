<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoationsBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned()->index();
            $table->integer('booking_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('booking_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loations_bookings');
    }
}
