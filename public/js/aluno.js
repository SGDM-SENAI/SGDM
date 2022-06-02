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
    'complemetento' : null,
}

anexo = {
    'tipo_documento' : null,
    'arquivo' : null
}

$(document).ready(() => {

    $("#form-dados-gerais").submit((e) => {
        e.preventDefault();
        aluno.nome_aluno = $("#nome_aluno").val();
        aluno.data_nascimento = $("#data_nascimento").val();
        aluno.rg_aluno = $("#rg").val();
        aluno.cpf_aluno = $("#cpf").val();
        aluno.email = $("#email").val();
        aluno.sexo = $("#sexo").val();
        aluno.estado_civil = $("#estado_civil").val();
        aluno.obs = $("#description-aluno").val();
        aluno.nome_social = $("#nome_social_aluno").val();
        aluno.turno_escolar = $("#turno_escolar").val();
        escolaridade.nome_escolaridade = $("#escolaridade").val();
        escolaridade.serie_escolar = $("#serie").val();
        replace("form-dados-gerais", "form-dados-saude");

    })

    $("#form-dados-saude").submit((e) => {
        e.preventDefault();
        aluno.portador_pne = $("#pne").val();
        aluno.descricao_pne = $("#descricao_pne").val();
        aluno.medicacao_controlada = $("#nome_medicacao").val();
        aluno.tipo_sanguineo = $("#tipo_sanguineo").val();
        aluno.manequim = $("#manequim").val();
        aluno.numero_calcado = $("#numero_calcado").val();
        replace("form-dados-saude", "form-dados-responsaveis");
    })

    $("#form-dados-responsaveis").submit((e) => {
        e.preventDefault();
        aluno.nome_pai = $("#nome_pai").val();
        aluno.nome_mae = $("#nome_mae").val();
        aluno.renda_familiar = $("#renda_familiar").val();
        aluno.numero_cnis = $("#numero_cnis").val();
        aluno.numero_bolsa_familia = $("#numero_bolsa_familia").val();
        replace("form-dados-responsaveis", "form-dados-endereco");
    })

    $("#form-dados-endereco").submit((e) => {
        endereco.cep = $("#cep").val();
        endereco.bairro = $("#bairro").val();
        endereco.logradouro = $("#logradouro").val();
        endereco.numero_casa = $("#numero_casa").val();
        endereco.complemetento = $("#complemetento").val();
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