<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstalmentMastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalment_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('instalment_id',6);
            $table->unsignedInteger('loan_mast_id');
            $table->decimal('premium',8,2);
            $table->tinyInteger('instalment_day')->nullable();
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
        Schema::dropIfExists('instalment_mast');
    }
}
