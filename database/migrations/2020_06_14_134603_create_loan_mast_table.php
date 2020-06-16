<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanMastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('finance_amount',8,2)->nullable();
            $table->tinyInteger('no_of_instalment')->nullable();
            $table->string('interest')->nullable();
            $table->smallInteger('vehicle_type')->default('1');
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
        Schema::dropIfExists('loan_mast');
    }
}
