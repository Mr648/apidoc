<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('api_id')
                ->nullable()
                ->constrained('apis')
                ->nullOnDelete();

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->boolean('required')->default(false);

            $table->enum('type', [
                'integer',
                'float',
                'multi-value',
                'string',
                'urlencoded',
                'b64-url-safe-encoded',
            ])->nullable();

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
        Schema::dropIfExists('queries');
    }
}
