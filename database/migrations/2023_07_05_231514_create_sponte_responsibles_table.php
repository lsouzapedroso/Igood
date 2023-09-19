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
        Schema::create('sponte_responsibles', function (Blueprint $table) {
            $table->integer('responsible_id')->primary();
            $table->string('name');
            $table->string('address');
            $table->string('number');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('home_phone');
            $table->string('cell_phone');
            $table->string('email');
            $table->string('business_phone');
            $table->string('job');
            $table->text('observation')->nullable();
            $table->date('birthdate');
            $table->string('cpf');
            $table->string('rg');
            $table->string('additional_address_data')->nullable();
            $table->string('spontenet_username');
            $table->string('spontenet_password');
            $table->string('gender');
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
        Schema::dropIfExists('sponte_responsibles');
    }
};
