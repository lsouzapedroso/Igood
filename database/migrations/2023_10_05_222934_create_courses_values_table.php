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
        Schema::create('courses_values', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->float('cheque_anual');
            $table->float('credit_card');
            $table->float('anual_escola');
            $table->float('material_sem_desconto');
            $table->float('material_com_desconto');
            $table->float('registration_tax');
            $table->float('grow_global');
            $table->year('year');
            $table->boolean('active');
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
        Schema::dropIfExists('courses_values');
    }
};
