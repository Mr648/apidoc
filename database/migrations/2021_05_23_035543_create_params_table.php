<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('params', function (Blueprint $table) {
            $table->id();
            $table->foreignId('api_id')->nullable()->constrained('apis')->nullOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('params')->nullOnDelete();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('rules')->nullable();
            $table->string('example')->nullable();
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
        Schema::dropIfExists('params');
    }
}
