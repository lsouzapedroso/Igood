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
        Schema::create('class_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('class_id');
            $table->date('schedule_date');
            $table->string('lesson');
            $table->string('phase');
            $table->string('professor');
            $table->string('situation');
            $table->timestamps();

            $table->foreign('class_id')->references('class_id')->on('sponte_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_schedule');
    }
};
