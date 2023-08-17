// scripts.js

// Esta função será chamada quando o DOM estiver completamente carregado
console.log("Antes de inicializar o datetimepicker");

$(document).ready(function () {
    // Seletor do campo de input com o id 'datetimepicker'
    var dateTimePickerField = $('#datetimepicker');

    // Inicializa o plugin Tempus Dominus no campo de input
    dateTimePickerField.datetimepicker({
        locale: 'pt-br',
        format: 'DD-MM-YYYY HH:mm',
        useCurrent: false, // Evita que o valor atual seja preenchido automaticamente
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
