@extends('layouts.user_type.guest')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Rematriculas CCBEU</h5>
                    </div>
                    <div class="card-body">
                        <form role="form text-left" method="POST" action="/rematriculasSave"
                              onsubmit="return validateForm()">
                            @csrf
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="parent">Rematricula </label>
                                    <select class="form-control" id="parent" name="access_level">
                                        <option value="0">Para mim</option>
                                        <option value="1">Para meus filho(a)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nome Completo</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nome Completo"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Date</label>
                                    <input class="form-control" type="date" value="2018-11-23"
                                           id="example-date-input">
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control cpf-input" id="cpf"
                                               placeholder="000.000.000-00" required>
                                        <small id="cpfErrorMessage" class="text-danger" style="display: none;">CPF
                                            inválido. Use o formato 000.000.000-00.</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input class="form-control" type="text" value="" id="phone"
                                           placeholder="(00) 00000-0000" oninput="formatPhoneNumber(this)" required>
                                </div>
                                {{--Valores Para alunos que tem responsaveis                                --}}

                                <div id="childNamesContainer" style="display: none;">
                                    <div class="child-name">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="name">Nome do aluno</label>
                                                <input type="text" class="form-control child-name-input"
                                                       name="child_name[]"
                                                       placeholder="Nome do aluno">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Date</label>
                                                <input class="form-control" type="date" value="2018-11-23"
                                                       id="example-date-input">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="cpf">CPF</label>
                                                    <input type="text" class="form-control cpf-input" id="cpf"
                                                           placeholder="000.000.000-00"
                                                           required>
                                                    <small id="cpfErrorMessage" class="text-danger"
                                                           style="display: none;">CPF inválido. Use o
                                                        formato 000.000.000-00.</small>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="noCPF">
                                                <label class="form-check-label" for="noCPF">
                                                    Aluno não possui CPF
                                                </label>
                                            </div>
                                            <div class="form-group" id="phoneField"> <!-- Adicione o ID "phoneField" aqui -->
                                                <label for="phone">Telefone</label>
                                                <input class="form-control" type="text" value="" id="phone" placeholder="(00) 00000-0000"
                                                       oninput="formatPhoneNumber(this)" required>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="noCellPhone">
                                                <label class="form-check-label" for="noCellPhone">
                                                    Aluno não possui número de celular
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" id="addChildButton" class="btn btn-primary btn-sm"
                                    style="display: none;">Adicionar Filho
                            </button>

                            @if(isset($message))
                                <p class="text-success text-xs mt-2">{{ $message }}</p>
                            @endif
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark w-100 my-4 mb-2">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
