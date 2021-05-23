<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('api_id')->nullable()->constrained('apis')->nullOnDelete();

            $table->enum('code', [
                Response::HTTP_OK,
                Response::HTTP_CREATED,
                Response::HTTP_NO_CONTENT,
                Response::HTTP_ACCEPTED,
                Response::HTTP_BAD_REQUEST,
                Response::HTTP_NOT_FOUND,
                Response::HTTP_FORBIDDEN,
                Response::HTTP_UNAUTHORIZED,
                Response::HTTP_GATEWAY_TIMEOUT,
                Response::HTTP_REQUEST_TIMEOUT,
                Response::HTTP_SEE_OTHER,
                Response::HTTP_SERVICE_UNAVAILABLE,
                Response::HTTP_INTERNAL_SERVER_ERROR
            ])->nullable();

            $table->enum('type', [
                'json',
                'html',
                'text',
                'image',
                'file',
                'view',
            ])->default('json');

            $table->mediumText('sample')->nullable();

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
        Schema::dropIfExists('responses');
    }
}
