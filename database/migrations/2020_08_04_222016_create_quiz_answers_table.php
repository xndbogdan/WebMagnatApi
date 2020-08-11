<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('quiz_option_id');
            $table->foreign('quiz_option_id')->references('id')->on('quiz_options');
            $table->foreignId('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->text('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_answers');
    }
}
