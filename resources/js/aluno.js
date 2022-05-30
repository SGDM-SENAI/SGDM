escola = null;
alergia = null;

$(document).ready(() => {

    $("#form-dados-gerais").submit((e) => {
        e.preventDefault();
        replace("form-dados-gerais", "form-dados-saude");

    })

    $("#form-dados-saude").submit((e) => {
        e.preventDefault();
        replace("form-dados-saude", "form-dados-responsaveis");
    })

    $("#form-dados-responsaveis").submit((e) => {
        e.preventDefault();
        replace("form-dados-responsaveis", "form-dados-endereco");
    })

    $("#form-dados-endereco").submit((e) => {
        e.preventDefault();
    })

    $('#alergias').DataTable({
        "bProcessing": true,
        "deferRender": true,

        "oLanguage": {

            "sProcessing": "Processando...",

            "sLengthMenu": '<button type="button" onclick="replaceAlergia()" id="button-alergia" class="btn btn-manage btn-back btn-back-alergia backgroud-empty">Voltar</button>',
            "sZeroRecords": "Nada encontrado com estes critérios",
            "sEmptyTable": "Não há dados para serem mostrados",
            "sLoadingRecords": "Carregando...",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(filtro aplicado em _MAX_ registros)",

            "sInfoPostFix": "",

            "sInfoThousands": ".",
            "sSearch": "Pesquisar: ",

            "sUrl": "",

            "oPaginate": {

                "sFirst": "Primeira",

                "sPrevious": "Anterior",
                "sNext": "Próxima",
                "sLast": "Última",

            },

        },

        "pageLength": 5
    });

    $('#escolas').DataTable({
        "bProcessing": true,
        "deferRender": true,

        "oLanguage": {

            "sProcessing": "Processando...",

            "sLengthMenu": '<button type="button" onclick="replaceEscola()" class="btn btn-manage btn-back btn-back-alergia backgroud-empty">Voltar</button>',
            "sZeroRecords": "Nada encontrado com estes critérios",
            "sEmptyTable": "Não há dados para serem mostrados",
            "sLoadingRecords": "Carregando...",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(filtro aplicado em _MAX_ registros)",

            "sInfoPostFix": "",

            "sInfoThousands": ".",
            "sSearch": "Pesquisar: ",

            "sUrl": "",

            "oPaginate": {

                "sFirst": "Primeira",

                "sPrevious": "Anterior",
                "sNext": "Próxima",
                "sLast": "Última",

            },

        },

        "pageLength": 5
    });

});