<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('machine_name');
            $table->string('collection_name')->default('banner')->comment('use for media library uploading');
            $table->string('title')->unique();
            $table->string('template')->default('banner');
            $table->string('slug')->unique();
            $table->boolean('navigation_button')->default(true)->comment('side buttons');
            $table->text('description')->nullable();
            $table->enum('status', ['enable', 'disable'])->default('disable');
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
        Schema::dropIfExists('slides');
    }
}
