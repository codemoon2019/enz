<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLocationsTable
 */
class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->enum('color', ['green', 'orange', 'red', 'yellow'])->default('green');
            $table->integer('order')->default(0);
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('heading')->nullable();
            $table->string('pitch')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
