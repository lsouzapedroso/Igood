@extends('layouts.user_type.auth')
@section('content')
    <div class="card-body px-10 pt-0 pb-2">

        <form role="form" method="POST" action="/message-save" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="datetimepicker">Selecione a data e hora:</label>
                <div class="input-group date " id="datetimepicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input"
                           data-target="#datetimepicker" name="day_time" placeholder="Data e hora"/>
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div ng-app="textAngularTest" ng-controller="wysiwygeditor" class="container app">
            <div text-angular="text-angular" name="message" ng-model="htmlcontent" ta-disabled='disabled'style="height: 300px;"placeholder="Mensagem"></div>
                <div class="d-none" ta-bind="text" ng-model="htmlcontent" ta-readonly='disabled'></div>
            </div>

            <div class="form-group">
                <input type="checkbox" id="show_media_checkbox" name="show_media_checkbox"  onchange="toggleMediaField()">
                <label for="show_media_checkbox">Mostrar campo de mídia</label>
            </div>

            <div id="media_field" style="display: none;">
                <div class="form-group">
                    <label for="media_input">Envio de Mídia:</label>
                    <input type="file" class="form-control" name="media_input" id="media_input">
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn bg-gradient-info">Salvar</button>
            </div>
        </form>
    </div>
@endsection

</script>
    <!-- Angular JS -->
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
    <!-- Angular Sanitize JS -->
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
    <!-- Text Angular JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.1.2/textAngular.min.js'></script>
    <script>
        angular.module("textAngularTest", ['textAngular']);
        function wysiwygeditor($scope) {
            $scope.orightml = '';
            $scope.htmlcontent = $scope.orightml;
            $scope.disabled = false;
        };
    </script>
