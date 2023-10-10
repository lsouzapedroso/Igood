<?php

namespace App\Http\Controllers\ReEnrolling;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Wppconnect\CreateSessionController;
use App\Models\ClassMember;
use App\Models\ContratoSponte;
use App\Models\ReEnrolling;
use App\Models\ReEnrollingStatus;
use App\Models\ResponsibleStudents;
use App\Models\SponteClasses;
use App\Models\SponteResponsibles;
use App\Models\SponteStudent;
use Illuminate\Http\Request;

class ReEnrollingController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;

        $nomesAlunos = ContratoSponte::distinct()->pluck('Aluno');

        $resultados = [];

        foreach ($nomesAlunos as $nomeAluno) {
            // Pesquisar o contrato correspondente
            $contrato = ContratoSponte::where('Aluno', $nomeAluno)->first();

            // Verificar se o contrato foi encontrado
            if ($contrato) {
                // Pesquisar o SponteStudent correspondente
                $sponteStudent = SponteStudent::where('name', $nomeAluno)->first();

                // Verificar se o SponteStudent foi encontrado
                if ($sponteStudent) {
                    // Pesquisar o status correspondente em ReEnrolling
                    $status = ReEnrolling::where('sponte_student_id', $sponteStudent->student_id)
                        ->leftJoin('re_enrolling_status', 're_enrolling.status_id', '=', 're_enrolling_status.id')
                        ->pluck('re_enrolling_status.status')
                        ->first();

                    // Armazenar os resultados
                    $resultados[] = [
                        'nome_aluno' => $nomeAluno,
                        'estagio' => $contrato->Estagio,
                        'status' => $status,
                    ];
                } else {
                    // Se não encontrar o SponteStudent, adicionar um valor padrão ou null para o status
                    $resultados[] = [
                        'nome_aluno' => $nomeAluno,
                        'estagio' => $contrato->Estagio,
                        'status' => null,
                    ];
                }
            }
        }



        return view('re-enrolling.index', compact('accessLevel', 'resultados'));
    }

    public function show($student)
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;

        $studentInfo = SponteStudent::where('name', $student)->first();

        if ($studentInfo) {
            $responsables = ResponsibleStudents::where('student_id', $studentInfo->student_id)->get();
            $atualClasse = ClassMember::where('student_id', $studentInfo->student_id)->get();

            $status = ReEnrolling::where('sponte_student_id', $studentInfo->student_id)
                ->leftJoin('re_enrolling_status', 're_enrolling.status_id', '=', 're_enrolling_status.id')
                ->pluck('re_enrolling_status.status')
                ->first();



//            $status = SponteClasses::where('sponte_student_id', $studentInfo->student_id)
//                ->leftJoin('re_enrolling_status', 're_enrolling.status_id', '=', 're_enrolling_status.id')
//                ->pluck('re_enrolling_status.status')
//                ->first();

            $data['student'] = $studentInfo->toArray();
            $data['status'] = $status;
            $data['responsables'] = [];

            foreach ($responsables as $responsibleStudent) {
                $responsibleDetails = SponteResponsibles::find($responsibleStudent->responsible_id);
                if ($responsibleDetails) {
                    $data['responsables'][] = $responsibleDetails->toArray();
                }
            }
        } else {
            abort(404);
        }

        $statuses = ReEnrollingStatus::all();

        return view('re-enrolling.show', compact('accessLevel', 'data', 'statuses'));


    }


    public function dashboard(){

        $user = auth()->user();
        $accessLevel = $user->access_level;

        return view('re-enrolling.dashboard', compact('accessLevel'));

    }

    public function controlIndex(){
        $user = auth()->user();
        $accessLevel = $user->access_level;

        return view('re-enrolling.controller.index', compact('accessLevel'));
    }

    public function updateStatus(Request $request, $student)
    {

        $request->validate([
            'status' => 'required|exists:re_enrolling_status,status',
        ]);

        // Encontrar o ID do status com base no nome do status fornecido
        $statusId = ReEnrollingStatus::where('status', $request->input('status'))->value('id');



        // Encontrar o registro do aluno com base no nome do aluno
        $studentRecord = ReEnrolling::whereHas('sponteStudent', function ($query) use ($student) {
            $query->where('name', $student);
        })->first();


        // Atualizar o status do aluno no banco de dados
        if ($studentRecord) {
            $studentRecord->update(['status_id' => $statusId]);

            return redirect()->route('re-enrolling.show', ['contrato' => $student])->with('success', 'Status atualizado com sucesso.');
        }

        return redirect()->back()->with('error', 'Aluno não encontrado.');
    }


}
