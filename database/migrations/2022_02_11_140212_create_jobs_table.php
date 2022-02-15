<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('site_id');
            $table->unsignedInteger('company_id');
            $table->string('job_title');
            $table->longText('job_description');
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->time('break_time_start')->nullable();
            $table->time('break_time_end')->nullable();
            $table->date('job_start_date')->nullable();
            $table->date('job_end_date')->nullable();
            $table->json('working_days')->nullable();

            $table->string('job_type')->nullable();
            $table->string('experience')->nullable();
            $table->integer('salary')->nullable();
            $table->string('gender')->nullable();
            $table->string('position')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('jobs');
    }
}
