<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersNullableFeilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('office_number')->nullable()->change();
        $table->string('address')->nullable()->change();
        $table->string('country')->nullable()->change();
        $table->string('city')->nullable()->change();
        $table->integer('postal_code')->nullable()->change();
        $table->integer('registration_no')->nullable();
        $table->integer('vat_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
