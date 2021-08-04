<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('floor');
            $table->longText('bldg');
            $table->longText('room');
            $table->longText('address');
            $table->char('section');
            $table->bigInteger('contact_number');
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
        Schema::dropIfExists('rf_warehouses');
    }
}
