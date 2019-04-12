<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    use MigrationAdditionalFunctionsTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('machine_name')->unique();
            $table->integer('depth');
            $table->string('status');
            $table->string('template');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('menu_nodes', function (Blueprint $table) {
            $table->increments('id');

            $this->foreignConstraint($table, 'menu_id', 'menus');
            $this->foreignConstraint($table, 'parent_id', 'menu_nodes', 'set null')->nullable();

            $table->unsignedBigInteger('menuable_id')->nullable();
            $table->string('menuable_type')->nullable();

            $table->{$this->jsonable()}('name');
            $table->enum('a_target',
                array_keys(config('core.menu.a_target.attributes')))->default(config('core.menu.a_target.default'));
            $table->string('slug')->unique();
//            $table->string('type')->nullable();
            $table->text('url')->nullable();
            $table->integer('order')->default(0);
//            $table->text('options');
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
        Schema::dropIfExists('menu_nodes');
        Schema::dropIfExists('menus');
    }
}
