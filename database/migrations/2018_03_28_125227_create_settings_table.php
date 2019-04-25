<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    use MigrationAdditionalFunctionsTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('group', ['site', 'social', 'contact', 'information']);

            $table->string('label');
            $table->string('machine_name');
            $table->text('value');

            $table->enum('type', ['text', 'file'])->default('text');
            $table->enum('input_type', ['text', 'file', 'textarea', 'email'])->default('text');

            $table->string('collection_name')->nullable()->comment('for media library');
            $table->string('rules')->comment('for laravel validation')->nullable();
            $table->{$this->jsonable()}('mime_type')->nullable()->comment('for upload validation');
            $table->timestamps();

//            $table->unique(['label', 'machine_name', 'value']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
