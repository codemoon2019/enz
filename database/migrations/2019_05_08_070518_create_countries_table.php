<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCountriesTable
 */
class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->enum('color', ['teal', 'red', 'orange'])->default('teal');
            $table->string('capital')->nullable();
            $table->string('founded')->nullable();
            $table->string('area')->nullable();
            $table->string('population')->nullable();
            $table->string('capital_file')->nullable();
            $table->string('founded_file')->nullable();
            $table->string('area_file')->nullable();
            $table->string('population_file')->nullable();
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
        Schema::dropIfExists('countries');
    }
}
