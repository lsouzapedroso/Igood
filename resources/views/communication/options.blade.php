@extends('layouts.user_type.auth')

@section('content')

    <a
        href="{{ url('phonebook-options')}}"
        type="button"
        class="btn bg-gradient-primary">Agenda

    </a>

    <a
        href="{{ url('/whatsapp-options')}}"
        type="button"
        class="btn bg-gradient-primary">Whastapp
    </a>

@endsection
