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
        Schema::create('form_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assign_id');
            $table->string('primary_need')->nullable();
            $table->date('first_engage')->nullable();
            $table->string('housing')->nullable();
            $table->string('family_situation')->nullable();
            $table->string('emp_edu')->nullable();
            $table->string('barr_con')->nullable();
            $table->string('res_ref')->nullable();
            $table->date('supp_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->foreign('assign_id')
                ->references('id')->on('chw_assigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_tasks');
    }
};
