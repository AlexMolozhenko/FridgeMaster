<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index();
            $table->integer('location_id')->unsigned()->index();
            $table->integer('blocks');
            $table->integer('days');
            $table->string('dateTimeFrom');
            $table->string('dateTimeBy');
            $table->string('temperature');
            $table->decimal('storageCost');
            $table->integer('accessСode');
            $table->timestamps();

                $table->foreign('client_id')->references('id')->on('clients');
                $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
