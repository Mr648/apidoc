<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apis', function (Blueprint $table) {
            $table->id();

            $table->string('route')->nullable();
            $table->string('name')->nullable();
            $table->string('scope')->nullable();
            $table->text('description')->nullable();

            $table->enum('type', [
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'ANY',
                'DELETE',
            ])->default('GET');

            $table->enum('body', [
                'no-body',
                'application/json',
                'application/xml',
                'form-url-encoded',
                'multipart-form',
            ])->nullable();

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
        Schema::dropIfExists('apis');
    }
}
