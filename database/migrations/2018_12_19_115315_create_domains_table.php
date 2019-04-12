<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    use MigrationAdditionalFunctionsTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->unique();
            $table->string('machine_name')->unique()->charset('utf8');
            $table->string('domain');

            $table->timestamps();
        });

        Schema::create('domainables', function (Blueprint $table) {
            $this->foreignConstraint($table, 'domain_id', 'domains');
            $table->morphs('domainable');

            $table->primary(['domain_id', 'domainable_id', 'domainable_type'], 'domainable_morph');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
        Schema::dropIfExists('domainables');
    }
}
