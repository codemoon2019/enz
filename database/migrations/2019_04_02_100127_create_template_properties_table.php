<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('content_id');
            $table->string('image_area')->nullable();
            $table->enum('image_align', ['center', 'left', 'right', 'fluid-100', 'container-100'])->nullable();
            $table->timestamps();
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_properties');
    }
}
