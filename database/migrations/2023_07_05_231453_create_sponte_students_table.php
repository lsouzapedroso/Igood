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
        Schema::create('sponte_students', function (Blueprint $table) {
            $table->integer('student_id')->primary();
            $table->string('name');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('cpf');
            $table->string('rg');
            $table->string('address');
            $table->string('number');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('home_phone');
            $table->string('cell_phone');
            $table->string('job');
            $table->string('photo');
            $table->string('email');
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
        Schema::dropIfExists('sponte_students');
    }
};
