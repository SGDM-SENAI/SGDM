
// Função para deixar um item com display none
const inactivate = (element) => {
    document.getElementById(element).classList.remove("hidden-inativo");
    document.getElementById(element).classList.add("hidden-ativo");
}

// Função para remover o display none
const activate = (element) => {
    document.getElementById(element).classList.remove("hidden-ativo");
    document.getElementById(element).classList.add("hidden-inativo");
}

// Função para inverter visibilidade
const replace = (local, destiny) => {
    inactivate(local);
    activate(destiny);
}

// Função para troca de visibilidade baseado no valor do option
const replaceElementOption = (id, sender) => {
    element = document.getElementById(id);
    if (document.getElementById(sender).value == "SIM") {
        element.classList.remove("hidden-ativo");
    } else {
        element.classList.add("hidden-ativo");
    };

}

const replaceElementOptions = (ids, sender) => {
    ids.forEach(element => {
        replaceElementOption(element, sender)
    });
}

const replaceAlergia = () => {
    replace("container-data-table", "alergia-manage")
}

const replaceEscola = () => {
    replace("container-data-table-escola", "escola-manage")
}

const close = (id) => {
    inactivate(id);
}

async function viacepComplete() {
    if (document.querySelector("#input-invalid") !== 'null') {
        document.getElementById("cep").classList.remove("input-invalid");
    }

    try {
        var cep = parseInt(document.getElementById("cep").value);
        const url = `https://viacep.com.br/ws/${cep}/json/`;
        const dados = await fetch(url);
        const endereco = await dados.json();
        console.log(endereco)
        if (typeof endereco.erro == "undefined") {
            document.getElementById("localidade").value = endereco.localidade;
            document.getElementById("bairro").value = endereco.bairro;
            document.getElementById("logradouro").value = endereco.logradouro;
        }
    } catch (error) {
        document.getElementById("cep").classList.add("input-invalid");
    }
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



