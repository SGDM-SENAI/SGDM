@extends('adminlte::page')


@section('title', 'Cadastro de professor')


@section('content')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
<!-- form start -->

<!-- Cada formulario possui o seu card, e sua visualização é trocada por uma função javascript -->

<!-- form-dados-gerais  -->

<form action="#" id="form-dados-gerais">

    <!-- Os formulários não possuem method, pois são tratados via ajax -->

    @csrf
    <div class="card card-admin card-outline direct-chat direct-chat-primary shadow-none">
        <div class="card-header backgroud-primary">
            <div class="d-flex justify-content-between w-100">
                <h3 class="card-title">
                    <span>@lang('Formulário de cadastro do professor')</span>
                </h3>
                <a href="{{ route('professor.index') }}" class="btn-danger btn-sm">
                    <i class="fa fa-arrow-left"></i> @lang('Sair')
                </a>
            </div>
        </div>
        <div class="row">
            <p></p>
        </div>
        @if (session('success'))
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Feito!" dismissable>
            {{ session('success') }}
        </x-adminlte-alert>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>@lang('Whoops!') </strong>@lang('Houve alguns problemas com sua entrada.') <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div>
        @endif
        <!-- /.card-header -->


        <div class="card-body">

            <div class="card-column col-7">

                <div class="form-group col-11">
                    <x-adminlte-input name="Nome professor" label="Nome da professor:" placeholder="Informe o nome da professor a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="Tipo professor" label="Tipo da professor:" placeholder="Informe o tipo da professor a ser cadastrado." enable-feedback />
                </div>
            </div>

        </div>
    </div>
    <div class="container-options">
        <div class="container-button-admin">
            <button type="submit" class=" btn backgroud-primary">@lang('Finalizar')</button>
        </div>
    </div>
</form>

<!-- /form-dados-endereco  -->

<!-- /.card-body -->

<!-- <script src="http://localhost:8000/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script>
    function replaceElementOption(id, sender) {
        element = document.getElementById(id);
        if (document.getElementById(sender).value == "SIM") {
            element.classList.remove("hidden-ativo");
        } else {
            element.classList.add("hidden-ativo");
        };

    }

    // Função para deixar um item com display none
    const inactivate = (element) => {
        element.classList.remove("hidden-inativo");
        element.classList.add("hidden-ativo");
    }

    // Função para remover o display none
    const activate = (element) => {
        element.classList.remove("hidden-ativo");
        element.classList.add("hidden-inativo");
    }

    // Função para inverter visibilidade
    const replace = (local, destiny) => {
        inactivate(document.getElementById(local));
        activate(document.getElementById(destiny));
    }

    async function viacepComplete() {
        if(document.querySelector("#input-invalid") !== 'null'){
            document.getElementById("cep").classList.remove("input-invalid");
        }
        
        try {
            var cep = parseInt(document.getElementById("cep").value);
            const url = `https://viacep.com.br/ws/${cep}/json/`;
            const dados = await fetch(url);
            const endereco = await dados.json();
            console.log(endereco)
            if(typeof endereco.erro == "undefined"){
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
            replace("form-dados-gerais", "form-dados-responsaveis");

        })

        $("#form-dados-responsaveis").submit((e) => {
            e.preventDefault();
            replace("form-dados-responsaveis", "form-dados-especificacoes");
        })

        $("#form-dados-especificacoes").submit((e) => {
            e.preventDefault();
            replace("form-dados-especificacoes", "form-dados-endereco");
        })


    })
</script> -->

<style>
    .card-admin {
        margin-top: 2vh;
        background-color: rgb(255, 255, 255);
        box-shadow: 1px 1px 6px rgb(182, 182, 182) !important;
        border-radius: 3px;
    }

    .backgroud-primary {
        background-color: rgb(8, 103, 57);
        color: rgb(255, 255, 255);
    }

    .backgroud-empty {
        background-color: transparent;
        border: rgb(0, 0, 0) 1px solid;
    }

    .card-body {
        padding: 0 1vw !important;
        display: flex;
        margin-top: 2vh;
    }


    .column {
        margin-bottom: 4vh;
    }

    .container-textarea {
        height: 38.5%;
        width: 100%;

    }

    .description {
        width: 99%;
        height: 95%;
        border-radius: 0.25rem;
        padding: 1vw;
        margin-top: 2vh;
    }

    .container-date {
        margin-top: 3vh;
        display: flex;
        flex-direction: column;
    }

    .container-options,
    .container-etapa,
    .container-etapa span,
    .figure-etapa {
        display: flex;
    }

    .container-options {
        justify-content: space-between;
        width: 100%;
    }

    

    .container-etapa {
        align-items: center;
        text-align: center;
    }

    .btn-back:hover {
        background-color: rgb(255, 0, 0);
        color: rgb(255, 255, 255);
    }

    .hidden-ativo {
        display: none;
    }

    #num-etapa {
        margin-left: 0.2vw;
    }

    .figure-circle {
        width: 20px;
        height: 20px;
        border: rgb(0, 0, 0) solid 2px;
        border-radius: 10px;
        margin-right: 1vw;

    }

    .circle-ativo {
        background-color: rgb(8, 103, 57);
    }

    .input-invalid{
        border-color: red;
        color: red;
    }
</style>

@stop