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
        Schema::create('sponte_classes', function (Blueprint $table) {
            $table->string('class_id')->primary();
            $table->string('name');
            $table->unsignedBigInteger('professor_id');
            $table->string('professor_name');
            $table->integer('capacity');
            $table->string('semester');
            $table->string('time');
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
    Schema::dropIfExists('sponte_classes');
    }
};
