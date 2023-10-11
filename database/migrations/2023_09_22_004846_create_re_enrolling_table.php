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
        Schema::create('re_enrolling', function (Blueprint $table) {
            $table->id();
            $table->integer('sponte_student_id')->constrained('sponte_students');
            $table->unsignedBigInteger('front_student_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamps();

            $table->foreign('sponte_student_id')->references('student_id')->on('sponte_students');
            $table->foreign('front_student_id')->references('id')->on('front_students')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('re_enrolling_status')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('re_enrolling');
    }
};
