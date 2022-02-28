<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffPersonalReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_personal_references', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ref_name');
            $table->string('ref_num');
            $table->string('ref_email');
            $table->string('ref_rel');
            $table->string('ref_occup');
            $table->string('ref_long');
            $table->string('ref_postal');
            $table->string('ref_address');
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
        Schema::dropIfExists('staff_personal_references');
    }
}
