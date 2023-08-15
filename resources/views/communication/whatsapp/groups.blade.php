@extends('layouts.user_type.auth')

@section('content')
    <a
        href="{{ url('new-message')}}"
        type="button"
        class="btn bg-gradient-primary">Nova Mensagem
    </a>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <form role="form" method="POST" action="{{ route('save-message') }}" onsubmit="return validateForm()">
                @csrf
                <table class="table align-items-center mb-0">
                    <tbody>
                    @foreach($Messages as $Message)
                        <tr>
                            <input type="hidden" name="id" value="{{ $Message->id }}">
                            <td class="text-center">
                                    {{ $Message->name ?? 'Nome não disponível' }}
                            </td>
                            <td class="text-center">
                                {{ $Message->day_time ?? 'Nome não disponível' }}
                            </td>
                            <td class="text-center">
                                @if ($Message->send)
                                    Enviada
                                @else
                                    Não enviada
                                @endif
                            </td>
                            <td class="text-center">
                            <a class="btn bg-gradient-primary"
                               type="button"
                               href="{{ route('edit-message',['id' => $Message->id])}}"> Editar Mensagem
                               <i class="fas fa-pencil-alt"></i>
                            </a>
                            </td>
                            <td class="text-center">
                                <a class="btn bg-gradient-primary"
                                   type="button"
                                   href="{{ route('edit-groups-message',['id' => $Message->id])}}"> Editar Grupos
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn bg-gradient-primary"
                                   type="button"
                                   href="{{ url('destroy-message',['id' => $Message->id])}}"> Excluir
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>



@endsection
