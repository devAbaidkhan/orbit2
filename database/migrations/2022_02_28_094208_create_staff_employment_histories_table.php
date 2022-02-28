<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_employment_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('emp_title')->nullable();
            $table->string('emp_com_name')->nullable();
            $table->string('emp_reason')->nullable();
            $table->string('emp_postal')->nullable();
            $table->string('emp_comp_address')->nullable();
            $table->string('emp_contact_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('emp_join')->nullable();
            $table->date('emp_ending')->nullable();
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
        Schema::dropIfExists('staff_employment_histories');
    }
}
