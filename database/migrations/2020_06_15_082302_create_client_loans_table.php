<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('financer_name')->nullable();
            $table->string('hirer_name')->nullable();
            $table->unsignedInteger('client_id')->nullable();
            $table->string('make')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('vehicle_chassis_no')->nullable();
            $table->string('vehicle_engine_no')->nullable();
            $table->unsignedInteger('loan_mast_id')->nullable();
            $table->decimal('finance_amount',8,2)->nullable();
            // $table->string('no_of_instalment')->nullable();
            $table->date('loan_created_at')->nullable();
            $table->date('agreement_date')->nullable();
            // $table->date('instalment_date')->nullable();
            $table->tinyInteger('loan_interest')->nullable();
            $table->decimal('interest_amount')->nullable();
            $table->decimal('total_amount')->nullable();
            $table->boolean('status')->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('client_loans');
    }
}
