<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcmTokensTable extends Migration
{
    public function up()
    {
        Schema::create('fcm_tokens', function (Blueprint $table) {
            $table->id();
            // Use this line instead if your users table uses UUIDs as primary keys
            // $table->uuid('user_id')->index();

            $table->unsignedBigInteger('user_id')->index();
            // Use this line instead if your users table uses UUIDs as primary keys
            // $table->uuid('user_id')->index();

            $table->string('token')->unique();
            $table->string('platform')->nullable(); // ios / android / web
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fcm_tokens');
    }
}
