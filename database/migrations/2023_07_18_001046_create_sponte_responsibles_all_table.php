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
        Schema::create('sponte_responsibles_all', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('responsible_id');
            $table->string('cell_phone');
            $table->string('email');
            $table->date('birthdate');
            $table->string('spontenet_username');
            $table->string('spontenet_password');
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
        Schema::dropIfExists('sponte_responsibles_all');
    }
};
