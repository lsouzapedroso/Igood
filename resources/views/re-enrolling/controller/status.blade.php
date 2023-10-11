@extends('layouts.user_type.auth')
@section('content')

    <a
        href="{{ url('/new-status')}}"
        type="button"
        class="btn bg-gradient-primary">Nova Tag
    </a>

    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="MuiTableHead-root jss547">
                    <tr class="text-center">
                        <th class="text-xs font-weight-bold mb-0" scope="col">Tag</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        @foreach( $statuses as $status)
                            @csrf
                            {{--            <form role="form" method="POST" action="{{ route('save-message') }}" onsubmit="return validateForm()">--}}
                            <input type="hidden" name="id" value="{{ $status->status }}">
                            <td class="text-xs font-weight-bold mb-0"
                                scope="col">{{ $status->status ?? 'Nome não disponível' }}
                                {{--            </form>--}}
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection
