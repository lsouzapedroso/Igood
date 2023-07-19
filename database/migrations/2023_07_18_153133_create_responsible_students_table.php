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
        Schema::create('responsible_students', function (Blueprint $table) {
            $table->id();
            $table->integer('responsible_id');
            $table->string('name');
            $table->integer('student_id')->constrained('students');
            $table->timestamps();

            $table->foreign('responsible_id')->references('responsible_id')->on('sponte_responsibles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsible_students');
    }
};
