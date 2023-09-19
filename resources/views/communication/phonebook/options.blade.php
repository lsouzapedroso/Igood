@extends('layouts.user_type.auth')
@section('content')
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            @foreach($phones as $phoneData)
                <form role="form" method="POST" action="{{ route('update-student', ['id' => $phoneData['student_id']]) }}">
                    @csrf
                    <table class="table align-items-center mb-0">
                        <thead>
                        <!-- Cabeçalho da tabela -->
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">
                                <input type="hidden" name="student_id" value="{{ $phoneData['student_id'] }}">
                                <p class="text-xs font-weight-bold mb-0" id="student_id">{{ $phoneData['student_id'] }}</p>
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="name" value="{{ $phoneData['name'] }}">
                                <p class="text-xs font-weight-bold mb-0" id="name">{{ $phoneData['name'] }}</p>
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" name="home_phone" id="home_phone" value="{{ $phoneData['home_phone'] }}">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" name="cell_phone" id="cell_phone" value="{{ $phoneData['cell_phone'] }}">
                            </td>
                            <td class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Salvar</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            @endforeach
        </div>
    </div>
@endsection
