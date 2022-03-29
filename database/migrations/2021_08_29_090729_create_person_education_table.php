<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_education', function (Blueprint $table) {
            $table->bigIncrements('edu_id');
            $table->string('degree_name')->nullable();
            $table->string('Institution')->nullable();
            $table->string('Degree')->nullable();
            $table->string('Major')->nullable();
            $table->date('Graduation_year')->nullable();
            $table->string('still_study')->nullable();
            $table->unsignedBigInteger('person_id');
           $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
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
        Schema::dropIfExists('person_education');
    }
}
