<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('row_3');
            $table->foreignId('transportation_id')
                    ->nullable()
                    ->constrained('rf_transportations')
                    ->onDelete('cascade');
            $table->foreignId('employee_id')
                    ->nullable()
                    ->constrained('rf_employees')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('tr_drivers');
    }
}
