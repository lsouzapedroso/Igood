<?php

namespace App\Http\Controllers\Communication\phonebook;

use App\Http\Controllers\Controller;
use App\Models\ResponsibleStudents;
use App\Models\SponteResponsibles;
use App\Models\SponteStudent;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;
        // Obter todos os estudantes, responsáveis e relação entre eles
        $studentsData = SponteStudent::all();
        $responsibles = SponteResponsibles::all();
        $studentsWithResponsiblesData = ResponsibleStudents::all();

        // Criar uma coleção para armazenar os telefones dos estudantes e seus responsáveis
        $phones = collect();

        foreach ($studentsData as $student) {
            // Adicionar os telefones do estudante à coleção
            $phones->push([
                'student_id' => $student->student_id,
                'name' => $student->name,
                'home_phone' => $student->home_phone,
                'cell_phone' => $student->cell_phone,

//                'responsible_name' => null,
//                'responsible_home_phone' => null,
//                'responsible_cell_phone' => null,
            ]);

//            // Verificar se o estudante possui responsável
//            $studentResponsibles = $studentsWithResponsiblesData->where('student_id', $student->student_id);
//            foreach ($studentResponsibles as $studentResponsible) {
//                // Encontrar os dados do responsável na coleção de responsáveis
//                $responsible = $responsibles->where('responsible_id', $studentResponsible->responsible_id)->first();
//                if ($responsible) {
//                    // Adicionar os telefones do responsável à coleção
//                    $phones->push([
//                        'name' => null,
//                        'home_phone' => null,
//                        'cell_phone' => null,
//                        'responsible_name' => $responsible->name,
//                        'responsible_home_phone' => $responsible->home_phone,
//                        'responsible_cell_phone' => $responsible->cell_phone,
//                    ]);
//                }
//            }

        }
        return view('communication.phonebook.options', compact('accessLevel'))->with('phones', $phones);

    }

//        if(auth()->user()->admin){
//            $phones = User::where('user_id', '=', (auth()->user()->id))->get();
//        }else{
//        }
    public function show($id)
    {
        // Lógica para exibir um estudante específico com base no ID
    }

    public function create()
    {
        // Lógica para exibir o formulário de criação de estudante
    }

    public function store(Request $request)
    {
        // Lógica para salvar um novo estudante no banco de dados
    }

    public function edit($id)
    {
        // Lógica para exibir o formulário de edição de estudante
    }

    public function update(Request $request, $id)
    {
        dd($request->name);
//        SponteStudent::where('student_id', $id)->update([
//            'name' => $request->name,
//            'beginDateTime' => $request->beginDateTime,
//            'endDateTime' => $request->endDateTime,
//            'description' => $request->description,
//            'points_realization' => $request->points_realization,
//        ]);
    }

    public function destroy($id)
    {
        // Lógica para excluir um estudante do banco de dados
    }
}
