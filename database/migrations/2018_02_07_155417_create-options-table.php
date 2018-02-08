<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('true');
            $table->integer('question_id')->unsigned()->index();
            $table->string('photo');
            $table->string('solution');
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::create('exam_question', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->integer('exam_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::create('exam_question_user', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->integer('exam_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('numberOfPermissionToSolve')->unsigned();
            $table->integer('numberOfSolve')->unsigned();
            $table->integer('maxOfScore')->unsigned();
            $table->integer('acceptedScore')->unsigned();
            $table->boolean('solved');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::create('exam_user', function (Blueprint $table) {
            $table->integer('exam_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('kind');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('exam_id')->references('id')->on('exams');
        });

        Schema::create('bank_user', function (Blueprint $table) {
            $table->integer('bank_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('kind');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
        Schema::dropIfExists('exam_question');
        Schema::dropIfExists('exam_question_user');
        Schema::dropIfExists('exam_user');
        Schema::dropIfExists('bank_user');
    }
}
