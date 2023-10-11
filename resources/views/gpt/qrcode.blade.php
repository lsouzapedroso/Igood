@extends('layouts.user_type.auth')

@section('content')
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <tbody>
            <tr>
                <td class="text-center">
                    <img src="data:image/png;base64,{{ base64_encode($imageData) }}" alt="Imagem PNG">
                </td>
            </tr>
            </tbody>
        </table>
            <a
                href="{{ url('gpt-service')}}"
                type="button"
                class="btn bg-gradient-primary">Novo Qrcode
            </a>
        <a
            href="{{ url('gpt-check')}}"
            type="button"
            class="btn bg-gradient-primary">Ok
        </a>
    </div>
@endsection
