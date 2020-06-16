<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('client_id');
            $table->tinyInteger('loan_type')->nullable();
            $table->boolean('parent_loan')->default(0);
            $table->boolean('social_fund')->default(0);
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number',20)->nullable();
            $table->string('ifsc_code',11)->nullable();
            $table->decimal('amount',8,2)->nullable();
            $table->text('loan_purpose')->nullable();
            $table->date('loan_date')->nullable();
            $table->string('bank_statement')->nullable();
            $table->string('pay_slip')->nullable();
            $table->string('status',1)->nullable();
            $table->string('often_paid',1)->nullable();
            // Monthly M, Fortnightly F, Weekly W, Other O
            $table->string('payment_mode',1)->nullable();
            // Cash 1, Cheque 2, Direct To royal Bank 3, Direct to other bank 4
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
