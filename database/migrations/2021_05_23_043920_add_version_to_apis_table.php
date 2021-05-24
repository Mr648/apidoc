<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVersionToApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apis', function (Blueprint $table) {
            $table->string('version')
                ->after('name')
                ->nullable()
                ->default('v1.0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apis', function (Blueprint $table) {
            $table->dropColumn('version');
        });
    }
}
