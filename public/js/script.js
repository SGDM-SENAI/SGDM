
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

const replaceElementOptionsEscolaridade = (ids, sender, novalue) => {

    if (document.getElementById(sender).value != novalue) {
        ids.forEach(element => {
            activate(element);
        });
    } else {
        ids.forEach(element => {
            inactivate(element);
        });
    }
}

const selectEscola = (id, name) => {

    if (aluno.escola_id == null) {
        aluno.escola_id = id;
        createItemList('container-select-escola', `escola-${id}`, name, `javascript:dropEscola(\'${id}\')`)
        replace('message-null', 'container-select-escola');
        inactivate('container-replace-escola');
        replace('container-data-table-escola', 'escola-manage');
    }

}

const dropEscola = (id) => {
    aluno.escola_id = null;
    deleteElement(`escola-${id}`);
    activate('container-replace-escola');
}

const selectAlergia = (id, name) => {
    if (alergias.includes(id) == false) {
        alergias.push(id);
        createItemList('container-select-alergia', `alergia-${id}`, name, `javascript:dropAlergia(\'${id}\')`)
        if (alergias.length == 1) {
            replace("message-null-alergia", "container-select-alergia");
        }
        replace('container-data-table', 'alergia-manage');
    }
}

const dropAlergia = (id) => {
    index = alergias.indexOf(id);
    alergias.splice(index, 1);
    deleteElement(`alergia-${id}`);
}

const createItemList = (rawContainer, id, rawText, stmtDelete) => {

    var container = document.getElementById(rawContainer);

    element = document.createElement('div');
    element.setAttribute('class', 'item-selected');
    element.setAttribute('id', id);

    contentText = document.createElement('span');
    text = document.createTextNode(rawText);
    contentText.appendChild(text);

    link = document.createElement('a');
    link.setAttribute('href', stmtDelete)

    back = document.createElement('img');
    back.setAttribute('src', '../img/close-black.png');
    back.setAttribute('style', 'width:15px');
    back.setAttribute('alt', 'Fechar');
    link.appendChild(back);

    element.appendChild(contentText);
    element.appendChild(link);
    container.appendChild(element);

}

const deleteElement = (id) => {
    document.getElementById(id).remove()
}

const createItemDataTable = (rawContainer, content) => {

    var container = document.getElementById(rawContainer);

    content.forEach(column => {

        item = document.createElement('td');
        text = document.createTextNode(column);
        item.appendChild(text);
        container.appendChild(item);

    });


}

const replaceAlergia = () => {
    replace("container-data-table", "alergia-manage");
    inactivate('option-add-widjet-alergia');
    
}

const replaceEscola = () => {
    replace("container-data-table-escola", "escola-manage")
    inactivate('option-add-widjet-escola');
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
        if (typeof endereco.erro == "undefined") {
            document.getElementById("bairro").value = endereco.bairro;
            document.getElementById("logradouro").value = endereco.logradouro;
        }

    } catch (error) {
        alert(1);
        console.log(error);
        document.getElementById("cep").classList.add("input-invalid");
    }
}







