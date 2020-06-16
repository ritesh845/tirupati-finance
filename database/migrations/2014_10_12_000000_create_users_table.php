<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile',15)->unique();
            // $table->string('mobile1',15)->nullable();
            // $table->string('email1')->nullable();
            $table->string('password');
            $table->string('gst_no')->nullable();
            // $table->string('aadhar_card',12)->nullable();
            // $table->string('pan_card',10)->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->dateTime('mobile_verified_at')->nullable();
            $table->tinyInteger('otp')->nullable();
            $table->string('status',1);
            // $table->string('photo')->nullable();
            // $table->tinyInteger('nationality')->nullable();
            // $table->string('address_proof')->nullable();
            // $table->string('residental_status',1)->nullable();
            //Home Owner H , Renting R, Living with Parents P, Other 0 
            // //User active or not
            // $table->date('registration_date')->default(date('Y-m-d'));
            // $table->decimal('monthly_income',8,2)->nullable();
            // $table->string('bussiness_name');
            // $table->tinyInteger('year_of_bussiness');
            // $table->boolean('office_status')->default(0);
            // $table->string('office_name')->nullable();
            // $table->string('office_postition')->nullable();
            // $table->string('office_id_card')->nullable();
            // $table->string('office_address')->nullable();
            // $table->string('bank_name')->nullable();
            // $table->string('bank_branch')->nullable();
            // $table->string('account_name')->nullable();
            // $table->string('account_number',20)->nullable();
            // $table->string('ifsc_code',11)->nullable();



            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
