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
        Schema::create('values_courses', function (Blueprint $table) {
            $table->id();
            $table->string('level'); //colocar id do curso em referencia ao curso
            $table->float('valor_proximo_ano_com_aumento');
            $table->float('curso_cheque_anual');
            $table->float('curso_anual_cartao');
            $table->float('curso_anual_escola');
            $table->float('material_anual_sem_desconto');
            $table->float('material_com_desconto');
            $table->float('taxa_de_matricula');
            $table->float('grow_global');
            $table->year('year'); // Year column to specify the year for each set of values
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
        Schema::dropIfExists('values_courses');
    }
};
