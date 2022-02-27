<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_education', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('institutionName')->nullable();
            $table->string('degreeObtained')->nullable();
            $table->string('speciality')->nullable();
            $table->string('institutionCountry')->nullable();
            $table->string('institutionCity')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
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
        Schema::dropIfExists('staff_education');
    }
}
