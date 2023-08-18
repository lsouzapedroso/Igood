@extends('layouts.user_type.auth')
@section('content')
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <form role="form" method="POST" action="{{ route('save-message') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <input type="hidden" name="new_message_id" value="{{ $MessageId }}">
                <table class="table align-items-center mb-5">
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td class="col-md-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="selected_groups[]"
                                           value="{{ $group->id }}">
                                </div>
                            </td>
                            <td class="col-md-11">
                                {{ $group->classe->name ?? 'Nome não disponível' }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center mt-4">
                    <button type="submit" class="btn bg-gradient-info">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var checkboxes = document.getElementsByName('selected_groups[]');
            var isChecked = false;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                alert('Selecione pelo menos um grupo antes de enviar.');
                return false;
            }

            return true;
        }
    </script>
@endsection
