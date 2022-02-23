<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserConfidentialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_confidential_details', function (Blueprint $table) {
            $table->id();
            $table->string('sia_number');
            $table->string('sia_role');
            $table->string('licence_sector');
            $table->timestamp('expiry_date');
            $table->integer('pay_rate');
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
        Schema::dropIfExists('user_confidential_details');
    }
}
