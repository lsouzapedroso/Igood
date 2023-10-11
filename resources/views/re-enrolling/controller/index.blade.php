@extends('layouts.user_type.auth')
@section('content')

    <a
        href="{{ url('/status')}}"
        type="button"
        class="btn bg-gradient-primary">Status Tag
    </a>

    <a
        href="{{ url('/verificar-alunos')}}"
        type="button"
        class="btn bg-gradient-primary">Verificar rematriculas
    </a>

@endsection
