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
            <div class="form-group">
                <x-adminlte-input name="nome_aluno" label="Nome do aluno:" placeholder="Informe o nome do aluno a ser cadastrado." required="required" enable-feedback />
            </div>
            <div class="form-group">
                <x-adminlte-input name="rg" label="RG:" placeholder="Informe o rg do aluno a ser cadastrado." required="required" enable-feedback />
            </div>
            <div class="form-group">
                <x-adminlte-select name="rede" label="Rede de ensino" placeholder="Informe a rede de ensino da aluno.">
                    <x-adminlte-options :options="['MUNICIPAL' => 'MUNICIPAL', 'ESTADUAL' =>'ESTADUAL', 'FEDERAL' => 'FEDERAL', 'PRIVADA' => 'PRIVADA']" disabled="0" empty-option="Selecione uma opção..." />
                </x-adminlte-select>
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
        overflow: hidden;
    }

    .backgroud-primary {
        background-color: rgb(8, 103, 57);
        color: rgb(255, 255, 255);
    }

    .card-body{
        padding: 0 1vw !important;
    }
</style>

@stop


@section('js')

@stop