<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrRequisitionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_requisition_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requestor_id')
                    ->nullable()
                    ->constrained('rf_employees')
                    ->onDelete('cascade');
            $table->foreignId('approver_id')
                    ->nullable()
                    ->constrained('rf_employees')
                    ->onDelete('cascade');
            $table->string('status');
            $table->date('date_approved')->nullable();
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
        Schema::dropIfExists('tr_requisition_requests');
    }
}
