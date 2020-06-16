<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstalmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('loan_id')->nullable();
            $table->unsignedInteger('instalment_mast_id')->nullable();

            $table->string('instalment_id',6)->nullable();

            $table->unsignedInteger('loan_mast_id')->nullable();
            $table->dateTime('instalment_date')->nullable();
            $table->decimal('amount',8,2)->nullable();
            $table->decimal('amount_due',8,2)->nullable()->nullable();
            $table->tinyInteger('late_days')->default(0);
            $table->boolean('pay')->default(0);
            $table->boolean('status')->default('1');
            $table->text('remark')->nullable();
            $table->softDeletes();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instalments');
    }
}
