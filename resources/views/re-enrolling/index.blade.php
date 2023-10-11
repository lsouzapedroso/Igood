@extends('layouts.user_type.auth')
@section('content')

    <form action="{{ route('re-enrolling.index') }}" method="GET">
        <label for="estagio">Pesquisar por Estágio:</label>
        <input type="text" name="estagio" id="estagio" value="{{ request('estagio') }}">
        <button type="submit">Pesquisar</button>
    </form>

    <div class="card card-frame">
        <div class="card-body">
            <div class="row">

                <table class="table align-items-center mb-0">
                    <thead>
                    <div class="d-flex px-2 py-1">
                        <tr>
                            <th>Nome do Aluno</th>
                            <th>Estágio</th>
                            <th>Status</th>
                        </tr>
                    </div>
                    </thead>
                    <tbody>
                    @forelse ($resultados as $resultado)
                        <tr onclick="window.location='{{ route('re-enrolling.show', ['contrato' => $resultado['nome_aluno']]) }}';" style="cursor:pointer;">
                            <td>{{ $resultado['nome_aluno'] }}</td>
                            <td>{{ $resultado['estagio'] }}</td>
                            <td>{{ $resultado['status'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nenhum contrato encontrado.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
