<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSubCoursesTable
 */
class CreateSubCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->nullable();
            $table->string('title')->unique();
            $table->text('description');
            $table->string('slug')->unique();
            $table->timestamps();
            
            // $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_courses');
    }
}
