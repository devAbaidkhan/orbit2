<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPassportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_passport_details', function (Blueprint $table) {
            $table->id();
            $table->string('passport_no');
            $table->string('issued_country');
            $table->timestamp('issue_date')->nullable()->default(null);
            $table->timestamp('expiry_date')->nullable()->default(null);
            $table->string('visa_need');
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
        Schema::dropIfExists('user_passport_details');
    }
}
