<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_fleets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')
                    ->nullable()
                    ->constrained('tr_drivers')
                    ->onDelete('cascade');
            $table->string('type_of_request');
            $table->bigInteger('request_id');
            $table->string('status');
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
        Schema::dropIfExists('tr_fleets');
    }
}
