@extends('adminlte::page')


@section('title', 'Cadastro de Aluno')


@section('content')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
<!-- form start -->
<form action="{{ route('aluno.store') }}" method="POST">
    @csrf
    <div class="card card-admin card-outline direct-chat direct-chat-primary shadow-none">
        <div class="card-header backgroud-primary">
            <div class="d-flex justify-content-between w-100">
                <h3 class="card-title">
                    <span>@lang('Formulário de cadastro do aluno')</span>
                </h3>
                <!--<a href="{{ route('aluno.index') }}" class="btn-danger btn-sm">
                <i class="fa fa-arrow-left"></i> @lang('Voltar')
            </a>-->
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
                    <x-adminlte-input name="nome_aluno" label="Nome do aluno:" placeholder="Informe o nome do aluno a ser cadastrado." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="nome_social_aluno" label="Nome social do aluno:" placeholder="Informe o nome social do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="rg" label="RG:" placeholder="Informe o rg do aluno a ser cadastrado." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="cpf" label="Cpf:" placeholder="Informe o cpf do aluno a ser cadastrado." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="email" label="Email:" placeholder="Informe o email do aluno ou responsável" required="required" enable-feedback />
                </div>


            </div>

            <div class="column col-5">

                <div class="form-group container-textarea">

                    <textarea class="description" name="descricao" id="description-aluno" placeholder="Observação"></textarea>

                </div>


                <div class="form-group col-12">
                    <x-adminlte-select name="estado_civil" label="Estado civil:" placeholder="Informe a estado civil do aluno.">
                        <x-adminlte-options :options="['SOLTEIRO' => 'SOLTEIRO', 'CASADO' =>'CASADO', 'VIÚVO' => 'VIÚVO', 'DIVÓRCIADO' => 'DIVÓRCIADO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select name="estado_civil" label="Sexo:" placeholder="Informe sexo do aluno.">
                        <x-adminlte-options :options="['M' => 'MASCULINO', 'F' =>'FEMININO', 'N' => 'PREFIRO NÃO DIZER']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>
                <div class="form-group col-12 container-date">
                    <label for="data_nascimento">Data de nascimento:</label>
                    <input type="date" name="data_nascimento" id="data_nascimento">
                    
                </div>

            </div>

        </div>
        <!-- /.card-body -->

    </div>
    <div class="container-button-admin">
        <button type="submit" class="btn backgroud-primary">@lang('Adicionar')</button>
    </div>
</form>

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

    .card-body {
        padding: 0 1vw !important;
        display: flex;
    }

    #description-aluno {
        border-radius: 0.25rem;
        padding: 1vw;
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
    }

    .container-date{
        margin-top: 3vh;
        display: flex;
        flex-direction: column;
    }
</style>

@stop


@section('js')

@stop