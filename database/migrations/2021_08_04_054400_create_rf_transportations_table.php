<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_transportations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('vehicle_id')
                    ->nullable()
                    ->constrained('rf_vehicles')
                    ->onDelete('cascade');
            $table->char('plate_number')->unique();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('rf_transportations');
    }
}
