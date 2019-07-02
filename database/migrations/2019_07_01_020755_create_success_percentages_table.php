<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSuccessPercentagesTable
 */
class CreateSuccessPercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_percentages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->decimal('percentage', 10, 2)->nullable();
            $table->integer('order');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('success_percentages');
    }
}
