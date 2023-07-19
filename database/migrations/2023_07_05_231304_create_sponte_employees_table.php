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
        Schema::create('sponte_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name');
            $table->integer('marital_status_id');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->Integer('user_id');
            $table->integer('function_id');
            $table->string('gender');
            $table->date('birthdate');
            $table->string('cpf');
            $table->string('rg');
            $table->string('address');
            $table->string('additional_address_data');
            $table->string('zip_code');
            $table->string('home_phone');
            $table->string('cell_phone');
            $table->string('salary');
            $table->text('observation')->nullable();
            $table->boolean('teacher');
            $table->boolean('active');
            $table->string('class_hour_value');
            $table->string('external_class_hour_value');
            $table->string('inss');
            $table->integer('payment_type');
            $table->string('email');
            $table->string('agency');
            $table->string('account');
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
        Schema::dropIfExists('sponte_employees');
    }
};
