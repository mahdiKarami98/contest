<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('exam_user', function (Blueprint $table) {
            $table->integer('exam_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('kind');
            $table->timestamps();
        });

        Schema::create('bank_user', function (Blueprint $table) {
            $table->integer('bank_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('kind');
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
        Schema::dropIfExists('users');
    }
}
