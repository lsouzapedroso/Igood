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
        Schema::create('class_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('contract_id');
            $table->integer('contract_interactive_id');
            $table->string('modality');
            $table->integer('class_id');
            $table->integer('phase_id');
            $table->integer('current_phase');
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
        Schema::dropIfExists('class_registrations');
    }
};
