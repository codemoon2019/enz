<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMigrationVisasTable
 */
class CreateMigrationVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migration_visas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('slug')->unique();
            $table->string('profession')->nullable();
            $table->string('email_address');
            $table->string('mobile_number')->nullable();
            $table->string('location')->nullable();
            $table->text('inquiry');
            $table->string('consultation')->nullable();
            $table->string('country')->nullable();
            $table->string('resume')->nullable();
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
        Schema::dropIfExists('migration_visas');
    }
}
