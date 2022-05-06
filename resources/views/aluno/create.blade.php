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
                <a href="{{ route('aluno.index') }}" class="btn-danger btn-sm">
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

        <!-- Dados gerais -->
        <div class="card-body hidden-ativo" id="form-1">

            <div class="card-column col-7">

                <div class="form-group col-11">
                    <x-adminlte-input name="nome_aluno" label="*Nome do aluno:" placeholder="Informe o nome do aluno a ser cadastrado." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="nome_social_aluno" label="Nome social do aluno:" placeholder="Informe o nome social do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="rg" label="*RG:" placeholder="Informe o rg do aluno a ser cadastrado." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="cpf" label="Cpf:" placeholder="Informe o cpf do aluno a ser cadastrado."  enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="email" label="*Email:" placeholder="Informe o email do aluno ou responsável" required="required" enable-feedback />
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
        <!-- Dados gerais -->

        <!-- Dados responsaveis -->
        <div class=" card-body" id="form-2">

            <div class="card-column col-7">

                <div class="form-group col-11">
                    <x-adminlte-input name="nome_pai" label="Nome do pai aluno:" placeholder="Informe o nome do pai do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="nome_mae" label="*Nome da mãe do aluno:" placeholder="Informe o nome da mãe do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="renda_familiar" label="*Renda familiar:" placeholder="Informe a renda familiar do aluno a ser cadastrado." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="numero_cnis" label="*Número do cnis:" placeholder="Informe o número do cnis." required="required" enable-feedback />
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
                    <x-adminlte-input type="number" name="telefone" label="*Telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="telefone2" label="Outro telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." required="required" enable-feedback />
                </div>

        

            </div>

        </div>

        <div class=" card-body" id="form-3">

            <div class="card-column col-7">

                <div class="form-group col-11">
                    <x-adminlte-input name="nome_pai" label="Nome do pai aluno:" placeholder="Informe o nome do pai do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="nome_mae" label="*Nome da mãe do aluno:" placeholder="Informe o nome da mãe do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="renda_familiar" label="*Renda familiar:" placeholder="Informe a renda familiar do aluno a ser cadastrado." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="numero_cnis" label="*Número do cnis:" placeholder="Informe o número do cnis." required="required" enable-feedback />
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
                    <x-adminlte-input type="number" name="telefone" label="*Telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." required="required" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="telefone2" label="Outro telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." required="required" enable-feedback />
                </div>

        

            </div>

        </div>
        <!-- /.card-body -->

    </div>
    <div class="container-options">

        <div class="container-button-admin">
            <button type="button" class="btn btn-back backgroud-empty">@lang('< Voltar')</button>
        </div>
        <!-- <div class="container-etapa">
            <span>Etapa <div id="num-etapa">1</div>/5</span>
        </div> -->
        <div class="figure-etapa">
            <div class="figure-circle circle-ativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
        </div>
        <div class="container-button-admin">
            <button type="button" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
            <button type="submit" class=" btn hidden-ativo  backgroud-primary">@lang('Finalizar cadastro')</button>
        </div>

    </div>
</form>

<script>
    
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

    .figure-circle{
    width: 20px;
    height: 20px;
    border: rgb(0, 0, 0) solid 2px;
    border-radius: 10px;
    margin-right: 1vw;

}

.circle-ativo{
    background-color: rgb(8, 103, 57);
}

.figure-etapa{
}
</style>

@stop


@section('js')

@stop