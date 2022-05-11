@extends('adminlte::page')


@section('title', 'Cadastro de Aluno')


@section('content')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
<!-- form start -->
<form action="#" id="form-1">
    @csrf
    <div class="card card-admin card-outline direct-chat direct-chat-primary shadow-none">
        <div class="card-header backgroud-primary">
            <div class="d-flex justify-content-between w-100">
                <h3 class="card-title">
                    <span>@lang('Formulário de cadastro do aluno')</span>
                </h3>
                <a href="{{ route('aluno.index') }}" class="btn-danger btn-sm">
                    <i class="fa fa-arrow-left"></i> @lang('Sair')
                </a>
            </div>
        </div>
        <!-- <div class="row">
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
        @endif -->
        <!-- /.card-header -->

        <!-- Dados gerais -->
        <div class="card-body">

            <div class="card-column col-7">

                <div class="form-group col-11">
                    <x-adminlte-input name="nome_aluno" label="*Nome do aluno:" placeholder="Informe o nome do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="nome_social_aluno" label="Nome social do aluno:" placeholder="Informe o nome social do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="rg" label="*RG:" placeholder="Informe o rg do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="cpf" label="Cpf:" placeholder="Informe o cpf do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="email" label="*Email:" placeholder="Informe o email do aluno ou responsável" enable-feedback />
                </div>


            </div>

            <div class="column col-5">

                <div class="form-group container-textarea">

                    <textarea class="description" name="descricao" id="description-aluno" placeholder="Observação"></textarea>

                </div>


                <div class="form-group col-12">
                    <x-adminlte-select name="estado_civil" label="*Estado civil:" placeholder="Informe a estado civil do aluno.">
                        <x-adminlte-options :options="['SOLTEIRO' => 'SOLTEIRO', 'CASADO' =>'CASADO', 'VIÚVO' => 'VIÚVO', 'DIVÓRCIADO' => 'DIVÓRCIADO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select name="estado_civil" label="*Sexo:" placeholder="Informe sexo do aluno.">
                        <x-adminlte-options :options="['M' => 'MASCULINO', 'F' =>'FEMININO', 'N' => 'PREFIRO NÃO DIZER']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>
                <div class="form-group col-12 container-date">
                    <label for="data_nascimento">@lang('*Data de nascimento:')</label>
                    <input type="date" name="data_nascimento" id="data_nascimento">

                </div>

            </div>

        </div>
    </div>
    <div class="container-options">

        <div class="container-button-admin">
            <button type="button" disabled class="btn btn-back backgroud-empty">@lang('< Voltar')</button>
        </div>
        <!-- <div class="container-etapa">
            <span>Etapa <div id="num-etapa">1</div>/5</span>
        </div> -->
        <div class="figure-etapa">
            <div id="circle-1" class="figure-circle circle-ativo"></div>
            <div id="circle-2" class="figure-circle circle-inativo"></div>
            <div id="circle-3" class="figure-circle circle-inativo"></div>
            <div id="circle-4" class="figure-circle circle-inativo"></div>
            <div id="circle-5" class="figure-circle circle-inativo"></div>
        </div>
        <div class="container-button-admin">
            <button type="submit" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
            <button type="submit" class=" btn hidden-ativo  backgroud-primary">@lang('Finalizar cadastro')</button>
        </div>

    </div>
</form>

<form class="hidden-ativo" action="#" id="form-2">
    @csrf
    <div class=" card card-admin card-outline direct-chat direct-chat-primary shadow-none">
        <!-- Dados gerais -->
        <div class="card-header backgroud-primary">
            <div class="d-flex justify-content-between w-100">
                <h3 class="card-title">
                    <span>@lang('Formulário de cadastro do aluno')</span>
                </h3>
                <a href="{{ route('aluno.index') }}" class="btn-danger btn-sm">
                    <i class="fa fa-arrow-left"></i> @lang('Sair')
                </a>
            </div>
        </div>
        <!-- Dados responsaveis -->
        <div class="card-body">

            <div class="card-column col-7">

                <div class="form-group col-11">
                    <x-adminlte-input name="nome_pai" label="Nome do pai aluno:" placeholder="Informe o nome do pai do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="nome_mae" label="*Nome da mãe do aluno:" placeholder="Informe o nome da mãe do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="renda_familiar" label="*Renda familiar:" placeholder="Informe a renda familiar do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="numero_cnis" label="*Número do cnis:" placeholder="Informe o número do cnis." enable-feedback />
                </div>




            </div>

            <div class="column col-5">

                <div class="form-group col-12">
                    <x-adminlte-select name="bolsa_familia" label="*Bolsa família:">
                        <x-adminlte-options :options="['POSSUI' => 'ALUNO POSSUI BOLSA FAMÍLIA', 'NÃO POSSUI' =>'ALUNO NÃO POSSUI BOLSA FAMÍLIA']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>
                <div class="form-group col-12" id="numero_bolsa_familia">
                    <x-adminlte-input type="number" name="numero_bolsa_familia" label="Número do bolsa família:" placeholder="Informe o número do bolsa família." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="telefone" label="*Telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="telefone2" label="Outro telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." enable-feedback />
                </div>

            </div>

        </div>
    </div>
    <div class="container-options">

        <div class="container-button-admin">
            <button type="button" onclick="replace('form-2','form-1')" class="btn btn-back backgroud-empty">@lang('< Voltar')</button>
        </div>
        <!-- <div class="container-etapa">
            <span>Etapa <div id="num-etapa">1</div>/5</span>
        </div> -->
        <div class="figure-etapa">
            <div id="circle-1" class="figure-circle circle-inativo"></div>
            <div id="circle-2" class="figure-circle circle-ativo"></div>
            <div id="circle-3" class="figure-circle circle-inativo"></div>
            <div id="circle-4" class="figure-circle circle-inativo"></div>
            <div id="circle-5" class="figure-circle circle-inativo"></div>
        </div>
        <div class="container-button-admin">
            <button type="submit" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
            <button type="submit" class=" btn hidden-ativo  backgroud-primary">@lang('Finalizar cadastro')</button>
        </div>

    </div>
</form>
<form class="hidden-ativo" action="#" id="form-3">
    @csrf
    <div class="card card-admin card-outline direct-chat direct-chat-primary shadow-none">
    <div class="card-header backgroud-primary">
            <div class="d-flex justify-content-between w-100">
                <h3 class="card-title">
                    <span>@lang('Formulário de cadastro do aluno')</span>
                </h3>
                <a href="{{ route('aluno.index') }}" class="btn-danger btn-sm">
                    <i class="fa fa-arrow-left"></i> @lang('Sair')
                </a>
            </div>
        </div>
        <div class="card-body">

            <div class="card-column col-12">

                <div class="form-group col-12">
                    <x-adminlte-select onchange="replaceElementOption('hidden-description-pne','pne')" id="pne" name="pne" label="*O aluno possuí alguma necessidade especial?">
                        <x-adminlte-options :options="['SIM' => 'SIM', 'NÃO' =>'NÃO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12 hidden-ativo" id="hidden-description-pne">
                    <textarea class="description" name="descricao_pne" id="descricao_pne" placeholder="Quais necessidades?"></textarea>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select onchange="replaceElementOption('container-nome-medicacao','medicacao_controlada')" name="medicacao_controlada" id="medicacao_controlada" label="*O aluno toma alguma medicação controlada?">
                        <x-adminlte-options :options="['SIM' => 'SIM', 'NÃO' =>'NÃO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12 hidden-ativo" id="container-nome-medicacao">
                    <textarea class="description" name="nome_medicacao" id="nome_medicacao" placeholder="Qual medicação?"></textarea>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select name="tipo_sanguineo" label="*Qual o tipo sanguineo do aluno?">
                        <x-adminlte-options :options="['O+' => 'O+', 'O' =>'O-', 'A+' =>'A+', 'A' =>'A-', 'B+' =>'B+', 'B' =>'B-', 'AB' =>'AB']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select name="manequim" label="Qual é o manequim do aluno?">
                        <x-adminlte-options :options="['P' => 'P', 'M' =>'M', 'G' =>'G', 'GG' =>'GG']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12" id="numero_calcado">
                    <x-adminlte-input type="number" name="numero_calcado" label="Número do calçado do aluno:" placeholder="Informe o número do calçado do aluno." enable-feedback />
                </div>

            </div>

        </div>
    </div>
    <div class="container-options">

        <div class="container-button-admin">
            <button type="button" class="btn btn-back backgroud-empty">@lang('< Voltar')</button>
        </div>
        <!-- <div class="container-etapa">
            <span>Etapa <div id="num-etapa">1</div>/5</span>
        </div> -->
        <div class="figure-etapa">
            <div id="circle-1" class="figure-circle circle-inativo"></div>
            <div id="circle-2" class="figure-circle circle-inativo"></div>
            <div id="circle-3" class="figure-circle circle-ativo"></div>
            <div id="circle-4" class="figure-circle circle-inativo"></div>
            <div id="circle-5" class="figure-circle circle-inativo"></div>
        </div>
        <div class="container-button-admin">
            <button type="submit" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
            <button type="submit" class=" btn hidden-ativo  backgroud-primary">@lang('Finalizar cadastro')</button>
        </div>

    </div>
</form>
<!-- /.card-body -->

<script src="http://localhost:8000/vendor/jquery/jquery.min.js"></script>
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

    const inactivate = (element)=>{
        element.classList.remove("hidden-inativo");
        element.classList.add("hidden-ativo");
    }

    const activate = (element)=>{
        element.classList.remove("hidden-ativo");
        element.classList.add("hidden-inativo");
    }

    const replace = (local,destiny)=>{
        inactivate(document.getElementById(local));
        activate(document.getElementById(destiny));
    }

    $(document).ready(() => {

        $("#form-1").submit((e) => {
            e.preventDefault();
            replace("form-1","form-2")

        })


    })
</script>

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
</style>

@stop