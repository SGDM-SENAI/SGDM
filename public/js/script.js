
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


const replaceElementEscola = () => {
    activate('container-escola');
}

const selectEscola = (id,name) => {
    escola = id;
    document.getElementById("escola-selected-name").innerHTML = name;
    replace('message-null',"escola-selected");
    inactivate('container-replace-escola');
    replace('container-data-table-escola','escola-manage'); 
}

const dropEscola = () => {
    escola = null;
    replace("escola-selected",'message-null');
    activate('container-replace-escola');
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







