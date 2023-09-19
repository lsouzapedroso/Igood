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
        Schema::create('class_situations', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('situation_id');
            $table->string('description');
            $table->timestamps();
            $table->foreign('student_id')->references('student_id')->on('sponte_students')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_situations');
    }
};
