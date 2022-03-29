<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('place_Of_b')->nullable();
            $table->BigInteger('national_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('military_service')->nullable();
            $table->string('Current_address')->nullable();
            $table->string('fixed_phone')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('img')->nullable();
            $table->json('lang')->nullable();
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
        Schema::dropIfExists('excels');
    }
}
