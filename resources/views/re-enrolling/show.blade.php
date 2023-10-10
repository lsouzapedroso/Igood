@extends('layouts.user_type.auth')
@section('content')
    <div class="dropdown">
        <button id="statusDropdown" class="btn bg-gradient-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $data['status'] }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
            @foreach($statuses as $status)
                <li><a class="dropdown-item" href="#" onclick="updateStatus('{{ $status->status }}')">{{ $status->status }}</a></li>
            @endforeach
        </ul>
    </div>

    <form id="updateStatusForm" action="{{ route('re-enrolling.updateStatus', ['student' => $data['student']['name']]) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Adicione campos ocultos para enviar o status -->
        <input type="hidden" name="status" id="selectedStatus" value="{{ $data['status'] }}">
        <button type="submit" class="btn btn-primary mt-3">Atualizar Status</button>
    </form>
    <div class="card card-frame">
        <div class="card-body">
            <div class="row">

                <div class="col-md-4">
                    <h4>Aluno</h4>
                    <p>Nome do Aluno: {{ $data['student']['name'] }}</p>
                    <p>Celular: {{ $data['student']['cell_phone'] }}</p>
                    <p>Telefone: {{ $data['student']['home_phone'] }}</p>
                </div>

                <div class="col-md-6">
                    @if (!empty($data['responsables']))
                        <h4>Responsáveis</h4>
                        <div class="responsables-list d-flex">
                            @foreach ($data['responsables'] as $responsible)
                                <div class="responsable-item">
                                    <p>Nome: {{ $responsible['name'] }}</p>
                                    <p>Celular: {{ $responsible['cell_phone'] }}</p>
                                    <p>Telefone: {{ $responsible['home_phone'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Não há responsáveis cadastrados para este aluno.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
