<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('exam_question', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->integer('exam_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::create('exam_question_user', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->integer('exam_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('numberOfPermissionToSolve')->unsigned();
            $table->integer('numberOfSolve')->unsigned();
            $table->integer('maxOfScore')->unsigned();
            $table->integer('acceptedScore')->unsigned();
            $table->boolean('solved')->unsigned();
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
        Schema::dropIfExists('exams');
    }
}
