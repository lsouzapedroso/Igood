<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoSponte extends Model
{
    use HasFactory;

    protected $table = 'contratos_sponte';

    protected $fillable = [
        'ContratoID',
        'ContratoAulaLivreID',
        'Tipo',
        'DataContrato',
        'RenovacaoPlus',
        'Aluno',
        'NumeroMatricula',
        'Atendente',
        'Contratante',
        'DataInicio',
        'DataTermino',
        'NumeroContrato',
        'Situacao',
        'Curso',
        'Estagio',
        'Turma',
        'TurmasAulaLivre',
        'Horario',
        'InicioAtividades',
        'Convenio',
        'Modalidade',
        'Franquia',
        'DiasTrancados',
        'SituacaoTurma',
        'Campanha',
    ];
}
