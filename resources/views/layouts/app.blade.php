 <!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

    <html lang="pt-BR">

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @if (\Request::is('groups-message'))
        @endif


        @if (env('IS_DEMO'))
            <x-demo-metas></x-demo-metas>
        @endif

        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png"
              href="https://play-lh.googleusercontent.com/nzy1nniRsoljcD5v4dsSVFQCcrGSrYDIu8yfKOC7CxaLNyVs3xk3a-HHWX4t0LiuS1KD">
        <title>
            Front Guide CCBEU
        </title>
        <!-- Font Aweomse 4 CSS -->
        <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css'>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet"/>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet"/>
        <!--   Core JS Files   -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Inclua o CSS do plugin Tempus Dominus -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
              integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
              crossorigin="anonymous"/>
        <!-- Rich Text Editor CSS -->
        <link rel="stylesheet" href="css/rich-text-editor.css">

    </head>

    <body
        class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
    @auth
        @yield('auth')
    @endauth
    @guest
        @yield('guest')
    @endguest

    @if(session()->has('success'))
        <div x-data="{ show: true}"
             x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
            <p class="m-0">{{ session('success')}}</p>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-zMP7rVo3TZD+6t9qABJ6/AU6PuglVmeQCGxqBXc4NYMSXYuacSNn3zZkQDgIpnZ" crossorigin="anonymous"></script>

    <script>
        console.log("Antes de inicializar o datetimepicker");

        $(document).ready(function () {
            // Seletor do campo de input com o id 'datetimepicker'
            var dateTimePickerField = $('#datetimepicker');

            // Inicializa o plugin Tempus Dominus no campo de input
            dateTimePickerField.datetimepicker({
                locale: 'pt-br',
                format: 'YYYY-MM-DD HH:mm',
                useCurrent: false,
                icons: {
                    time: 'fa fa-clock',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-calendar-check-o',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                }
            });

            // Exemplo de manipulação do DOM
            // Quando o campo de input com id 'meuInput' for alterado, imprime o valor no console
            $('#meuInput').on('change', function () {
                var valorInput = $(this).val();
                console.log('Valor do input: ' + valorInput);
            });

        });
    </script>

{{--VERIFICARRRRRRRR--}}
{{--    <script src="../assets/js/core/popper.min.js"></script>--}}
{{--    <script src="../assets/js/core/bootstrap.min.js"></script>--}}
{{--    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>--}}
{{--    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>--}}
{{--    <script src="../assets/js/plugins/fullcalendar.min.js"></script>--}}
{{--    <script src="../assets/js/plugins/chartjs.min.js"></script>--}}

    @stack('dashboard')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script>
        function toggleMediaField() {
            var checkbox = document.getElementById("show_media_checkbox");
            var mediaField = document.getElementById("media_field");

            mediaField.style.display = checkbox.checked ? "block" : "none";
        }
    </script>

    @if (\Request::is('groups-message'))
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
    @endif
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>

    <script>
        $(document).ready(function () {
            $('#parent').change(function () {
                if ($(this).val() === 'Para mim') {
                    $('#childNamesField').show();
                } else {
                    $('#childNamesField').hide();
                }
            });
        });
    </script>
    <script>
        function formatPhoneNumber(input) {
            // Remove todos os caracteres não numéricos
            var phoneNumber = input.value.replace(/\D/g, '');

            // Formata o número de telefone com parênteses e espaços
            if (phoneNumber.length >= 10) {
                phoneNumber = '(' + phoneNumber.substr(0, 2) + ') ' + phoneNumber.substr(2, 5) + '-' + phoneNumber.substr(7, 4);
            } else if (phoneNumber.length >= 6) {
                phoneNumber = '(' + phoneNumber.substr(0, 2) + ') ' + phoneNumber.substr(2, 4) + '-' + phoneNumber.substr(6, 4);
            } else if (phoneNumber.length >= 2) {
                phoneNumber = '(' + phoneNumber.substr(0, 2) + ') ' + phoneNumber.substr(2);
            } else if (phoneNumber.length === 0) {
                phoneNumber = ''; // Define como uma string vazia se estiver vazio
            }

            // Define o valor formatado no campo de entrada
            input.value = phoneNumber;
        }

        function handleBackspace(event) {
            if (event.key === 'Backspace') {
                var phoneInput = document.getElementById('phone');
                var cursorPosition = phoneInput.selectionStart;
                var phoneNumber = phoneInput.value;

                // Remove os parênteses e o traço se o cursor estiver posicionado neles
                if (phoneNumber.charAt(cursorPosition - 1) === '-' || phoneNumber.charAt(cursorPosition - 1) === ')' || phoneNumber.charAt(cursorPosition - 1) === '(') {
                    phoneInput.value = phoneNumber.slice(0, cursorPosition - 1) + phoneNumber.slice(cursorPosition);
                    cursorPosition--;
                    phoneInput.selectionStart = cursorPosition;
                    phoneInput.selectionEnd = cursorPosition;
                    formatPhoneNumber(phoneInput);
                }
            }
        }
    </script>

    <script>
        document.getElementById('parent').addEventListener('change', function () {
            var childNamesContainer = document.getElementById('childNamesContainer');
            var addChildButton = document.getElementById('addChildButton');


            if (this.value === '1') {
                childNamesContainer.style.display = 'block';
                addChildButton.style.display = 'block';
            } else {
                childNamesContainer.style.display = 'none';
                addChildButton.style.display = 'none';
            }
        });

        document.getElementById('addChildButton').addEventListener('click', function () {
            var childNamesContainer = document.getElementById('childNamesContainer');
            var newChild = document.querySelector('.child-name').cloneNode(true);

            // Limpa o valor do campo clonado
            newChild.querySelector('.child-name-input').value = '';

            childNamesContainer.appendChild(newChild);

            // Adicione um ouvinte de evento para o novo campo de "Nome Completo"
            var newChildInput = newChild.querySelector('.child-name-input');
            newChildInput.addEventListener('input', handleChildNameInputChange);
        });

        // Função para lidar com a entrada no campo "Nome Completo"
        function handleChildNameInputChange() {
            // Verifica se o campo está vazio
            if (this.value.trim() === '') {
                // Remove o campo vazio
                var childNamesContainer = document.getElementById('childNamesContainer');
                var childNameInput = this.closest('.child-name');
                childNamesContainer.removeChild(childNameInput);
            }
        }
    </script>

    <script>
        // Obtém o campo de entrada de CPF
        var cpfInput = document.querySelector('.cpf-input');

        // Adiciona um ouvinte de evento para formatar o CPF enquanto o usuário digita
        cpfInput.addEventListener('input', function () {
            // Remove qualquer caractere que não seja número
            var cleanedValue = this.value.replace(/\D/g, '');

            // Verifica se o valor está vazio
            if (cleanedValue === '') {
                this.value = '';
                return;
            }

            // Formata o CPF
            var formattedValue = cleanedValue.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');

            // Define o valor formatado no campo de entrada
            this.value = formattedValue;
        });
    </script>
    <script>
        function validateForm() {
            var nameField = document.getElementById('name');
            var cpfField = document.getElementById('cpf');
            var cpfErrorMessage = document.getElementById('cpfErrorMessage');

            // Verifique se o campo Nome Completo está preenchido
            if (nameField.value.trim() === '') {
                alert('Por favor, preencha o campo Nome Completo.');
                nameField.focus();
                return false;
            }

            // Verifique se o CPF está no formato correto
            var cpfPattern = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;
            if (!cpfPattern.test(cpfField.value)) {
                cpfErrorMessage.style.display = 'block';
                cpfField.focus();
                return false;
            }

            return true;
        }
    </script>

    <script>
        $(document).ready(function () {
            $('.dropdown-item').on('click', function (e) {
                e.preventDefault();

                // Atualizar o texto do botão dropdown com o novo status
                $('#statusDropdown').text($(this).text());
            });
        });
    </script>
    <script>
        function updateStatus(status) {
            // Atualiza o valor do campo oculto com o status selecionado
            document.getElementById('selectedStatus').value = status;
            // Submete automaticamente o formulário quando um status é selecionado no dropdown
            //document.getElementById('updateStatusForm').submit();
        }
    </script>


    </body>
    </html>

