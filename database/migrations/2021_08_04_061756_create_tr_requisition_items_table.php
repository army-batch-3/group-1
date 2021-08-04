<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_requisition_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisition_id')
                    ->nullable()
                    ->constrained('tr_requisition_requests')
                    ->onDelete('cascade');
            $table->foreignId('asset_id')
                    ->nullable()
                    ->constrained('rf_assets')
                    ->onDelete('cascade');
            $table->bigInteger('quantity');
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
        Schema::dropIfExists('tr_requisition_items');
    }
}
