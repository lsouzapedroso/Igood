<?php

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;

class CommunicationController extends Controller
{
    public function index()
    {
        return view('communication.options');
    }

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
        // Lógica para atualizar os dados de um estudante no banco de dados
    }

    public function destroy($id)
    {
        // Lógica para excluir um estudante do banco de dados
    }
}
