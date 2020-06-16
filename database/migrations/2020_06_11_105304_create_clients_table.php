<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('photo')->nullable();
            $table->string('address_proof')->nullable();
            $table->string('other_document')->nullable();
            $table->string('other_document1')->nullable();
            $table->string('other_document2')->nullable();
            $table->string('aadhar_card',12)->nullable();
            $table->string('pan_card',10)->nullable();
            $table->string('cast_category',1)->nullable();
            $table->string('age')->nullable();
            $table->text('address')->nullable();
            $table->string('zip_code',7)->nullable();
            $table->string('email')->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('mobile1',15)->nullable();
            $table->string('bussiness')->nullable();
            $table->tinyInteger('bussiness_year')->nullable();
            $table->string('office_name')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_position')->nullable();
            $table->string('office_id_card')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('any_income_source')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number',20)->nullable();
            $table->string('ifsc_code',11)->nullable();
            $table->date('registration_date',11)->nullable();
            // $table->string('vehicle_name')->nullable();
            // $table->string('vehicle_model')->nullable();
            // $table->string('vehicle_no')->nullable();
            // $table->string('vehicle_chassis_no')->nullable();
            // $table->string('vehicle_engine_no')->nullable();
            // $table->string('finance_amount')->nullable();
            // $table->string('agreement_date')->nullable();
            $table->string('other_details')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_mobile')->nullable();
            $table->text('guarantor_address')->nullable();
            $table->string('guarantor_bussiness')->nullable();
            $table->string('guarantor_position')->nullable();
            $table->string('guarantor_income')->nullable();
            $table->text('guarantor_office_address')->nullable();
            $table->boolean('guarantor_another')->default(0);
            $table->string('guarantor_name1')->nullable();
            $table->string('guarantor_mobile1')->nullable();
            $table->text('guarantor_address1')->nullable();
            $table->string('guarantor_bussiness1')->nullable();
            $table->string('guarantor_position1')->nullable();
            $table->string('guarantor_income1')->nullable();
            $table->text('guarantor_office_address1')->nullable();
            $table->string('guarantor_signature')->nullable();
            $table->string('guarantor_signature1')->nullable();
            $table->string('signature')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            
            // $table->tinyInteger('no_of_instalments')->nullable();
            // $table->tinyInteger('instalment_due_on')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
