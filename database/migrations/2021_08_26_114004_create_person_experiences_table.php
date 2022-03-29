<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Job_title');
            $table->string('job_Specialize');
            $table->string('company_name');
            $table->date('Start_date');
            $table->date('end_date')->nullable();
            $table->string('still_work')->nullable();
          
            $table->text('Responsibilities');
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
        Schema::dropIfExists('person_experiences');
    }
}
