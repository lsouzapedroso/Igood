<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ContratoSponte;
use App\Models\ReEnrolling;
use App\Models\ReEnrollingStatus;
use App\Models\SponteStudent;

class StudentsController extends Controller
{
    public function index(){

        $user = auth()->user();
        $accessLevel = $user->access_level;
        return view('students.index', compact('accessLevel'));
    }

    public function verifiedContract(){
        {
            $user = auth()->user();
            $accessLevel = $user->access_level;

            $contratos = ContratoSponte::all();
            $status = ReEnrollingStatus::where('status', 'Não iniciado')->first();

            foreach ($contratos as $contrato) {
                $aluno = SponteStudent::where('name', $contrato->Aluno)->first();

                if ($aluno) {

                        // Cria ou atualiza um registro em ReEnrolling
                        ReEnrolling::updateOrCreate(
                            [
                                'sponte_student_id' => $aluno->student_id,
                            ],
                            ['status_id' => $status->id]
                        );
                } else {
                    // O aluno não foi encontrado
                }
            }
            return view('re-enrolling.controller.index', compact('accessLevel'));
        }
    }

}
