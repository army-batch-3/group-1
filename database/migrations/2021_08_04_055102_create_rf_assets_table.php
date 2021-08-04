<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->integer('number_of_stocks');
            $table->string('type');
            $table->foreignId('supplier_id')
                    ->nullable()
                    ->constrained('rf_suppliers')
                    ->onDelete('cascade');
            $table->foreignId('warehouse_id')
                    ->nullable()
                    ->constrained('rf_warehouses')
                    ->onDelete('cascade');
            $table->integer('price');
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
        Schema::dropIfExists('rf_assets');
    }
}
