@extends('layouts.user_type.axuth')
@section('content')
    <div class="card-body px-10 pt-0 pb-2">

        <form role="form" method="POST" action="/update-message/{{$Message->id}}" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <input type="hidden" name="id" value="{{ $Message->id }}">
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{$Message->name}}" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="datetimepicker">Selecione a data e hora:</label>
                <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input"
                           data-target="#datetimepicker" name="day_time" placeholder="Data e hora" value="{{$Message->day_time}}" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="message" value="{{$Message->message}}" style="height: 300px;"placeholder="Mensagem">
            </div>

            <div class="form-group">
                <input type="checkbox" id="show_media_checkbox" name="show_media_checkbox"  onchange="toggleMediaField()">
                <label for="show_media_checkbox">Mostrar campo de mídia</label>
            </div>

            <div id="media_field" style="display: none;">
                <div class="form-group">
                    <label for="media_input">Envio de Mídia:</label>
                    <input type="file" class="form-control" name="media_input" id="media_input" value="{{$Message->media}}" >
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn bg-gradient-info">Salvar</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementsByName('name')[0].value;
            var dataHora = document.getElementsByName('data_hora')[0].value;
            var mensagem = document.getElementsByName('mensagem')[0].value;

            if (name.trim() === '' || dataHora.trim() === '' || mensagem.trim() === '') {
                alert('Preencha todos os campos obrigatórios antes de enviar o formulário.');
                return false;
            }

            return true;
        }
    </script>
@endsection
