<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('email');
            $table->integer('fixed_phone');
            $table->string('mobile')->unique();
            // $table->integer('fax_phone');
            // $table->string('location');
            // $table->string('company_specialist');
            // $table->string('commercial_record')->nullable();
            // $table->string('industria_record')->nullable();
            // $table->string('website')->nullable();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cci_id');
            $table->foreign('cci_id')->references('city_id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('act_id');
            $table->foreign('act_id')->references('activity_id')->on('company_activities')->onDelete('cascade');
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
        Schema::dropIfExists('companies');
    }
}
