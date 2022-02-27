<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_certifications', function (Blueprint $table) {
            $table->id();
            $table->string('cert_name')->nullable();
            $table->string('cert_no')->nullable();
            $table->date('cert_issue')->nullable();
            $table->date('cert_expiry')->nullable();
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
        Schema::dropIfExists('staff_certifications');
    }
}
