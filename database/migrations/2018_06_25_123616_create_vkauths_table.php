<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVkauthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vkauths', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('access_token');
            $table->integer('expires_in');
            $table->integer('user_id');
            $table->string('email');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vkauths');
    }
}
