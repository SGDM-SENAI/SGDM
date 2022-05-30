escola = null;
alergia = null;

aluno = {
    'nome_aluno' : null,
    'data_nascimento' : null,
    'rg_aluno' : null,
    'cpf_aluno' : null,
    'nome_pai' : null,
    'nome_mae' : null,
    'email' : null,
    'sexo' : null,
    'tipo_sanguineo' : null,
    'estado_civil' : null,
    'manequim' : null,
    'numero_calcado' : null,
    'portador_pne' : null,
    'descricao_pne' : null,
    'medicacao_controlada' : null,
    'numero_bolsa_familia' : null,
    'numero_cnis' : null,
    'renda_familiar' : null,
    'obs' : null,
    'nome_social' : null,
    'turno_escolar' : null,
    'endereço_id' : null,
    'escola_id' : null,
    'escolaridade_id' : null
}

escola = {
    'nome_escola' : null,
    'rede' : null
}

escolaridade = {
    'nome_escolaridade' : null,
    'serie_escolar' : null 
}

alergia_aluno = {
    'alergia_id' : null,
    'aluno_id' : null
}

alergia = {
    'tipo_alergia' : null,
    'nome_alergia' : null
}

telefone = {
    'numero' : null 
}

endereco = {
    'cep' : null,
    'logradouro' : null,
    'bairro' : null,
    'numero_casa' : null,
    'complemtento' : null,
}

anexo = {
    'tipo_documento' : null,
    'arquivo' : null
}

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