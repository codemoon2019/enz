<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientOtherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_other_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('become_our_client_inquiry_id');
            $table->string('elementary_school')->nullable();
            $table->string('elementary_from')->nullable();
            $table->string('elementary_to')->nullable();
            $table->string('high_school_school')->nullable();
            $table->string('high_school_from')->nullable();
            $table->string('high_school_to')->nullable();
            $table->string('tertiary_school')->nullable();
            $table->string('tertiary_from')->nullable();
            $table->string('tertiary_to')->nullable();
            $table->string('interview')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('employment_status_name')->nullable();
            $table->string('employment_status_from')->nullable();
            $table->string('employment_status_to')->nullable();
            $table->string('english_test_result')->nullable();
            $table->string('score')->nullable();
            $table->string('avail')->nullable();
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
        Schema::dropIfExists('client_other_details');
    }
}
