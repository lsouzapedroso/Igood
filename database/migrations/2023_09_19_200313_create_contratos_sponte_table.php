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
        Schema::create('contratos_sponte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ContratoID');
            $table->unsignedBigInteger('ContratoAulaLivreID')->default(0);
            $table->string('Tipo');
            $table->dateTime('DataContrato');
            $table->boolean('RenovacaoPlus')->default(0);
            $table->string('Aluno');
            $table->unsignedBigInteger('NumeroMatricula');
            $table->string('Atendente');
            $table->string('Contratante');
            $table->dateTime('DataInicio');
            $table->dateTime('DataTermino');
            $table->string('NumeroContrato');
            $table->string('Situacao');
            $table->string('Curso');
            $table->string('Estagio');
            $table->string('Turma');
            $table->string('TurmasAulaLivre')->nullable();
            $table->string('Horario');
            $table->dateTime('InicioAtividades');
            $table->string('Convenio');
            $table->string('Modalidade');
            $table->string('Franquia');
            $table->integer('DiasTrancados')->default(0);
            $table->string('SituacaoTurma');
            $table->string('Campanha')->nullable();
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
        Schema::dropIfExists('contratos_sponte');
    }
};
