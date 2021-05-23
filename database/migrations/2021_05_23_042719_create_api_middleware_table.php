<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiMiddlewareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_middleware', function (Blueprint $table) {
            $table->id();
            $table->foreignId('api_id')->nullable()->constrained('apis')->nullOnDelete();
            $table->foreignId('middleware_id')->nullable()->constrained('middlewares')->nullOnDelete();
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
        Schema::dropIfExists('api_middleware');
    }
}
