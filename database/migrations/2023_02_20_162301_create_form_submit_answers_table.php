<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_submit_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_submit_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');
            $table->timestamps();

            $table->foreign('form_submit_id')
                ->references('id')->on('form_submit')->onDelete('cascade');

            $table->foreign('question_id')
                ->references('id')->on('questions')->onDelete('cascade');


            $table->foreign('answer_id')
                ->references('id')->on('answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_submit_answers');
    }
};
