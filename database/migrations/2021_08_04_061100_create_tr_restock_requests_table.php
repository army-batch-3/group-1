<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrRestockRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_restock_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')
                    ->nullable()
                    ->constrained('rf_suppliers')
                    ->onDelete('cascade');
            $table->foreignId('warehouse_id')
                    ->nullable()
                    ->constrained('rf_warehouses')
                    ->onDelete('cascade');
            $table->foreignId('transportation_id')
                    ->nullable()
                    ->constrained('rf_transportations')
                    ->onDelete('cascade');
            $table->foreignId('requestor_id')
                    ->nullable()
                    ->constrained('rf_employees')
                    ->onDelete('cascade');
            $table->foreignId('approver_id')
                    ->nullable()
                    ->constrained('rf_employees')
                    ->onDelete('cascade');
            $table->string('status');
            $table->date('date_approved');
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
        Schema::dropIfExists('tr_restock_requests');
    }
}
