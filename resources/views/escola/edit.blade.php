@extends('adminlte::page')

@section('title', 'Cadastro de Escola')

@section('content_header')
    <h1>@lang('Escola :: cadastro')</h1>
@stop

@section('content')
<div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
    <div class="card-header">        
        <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">
                <span>@lang('Formulário de atualização de Escola')</span>
            </h3>       
            <a href="{{ route('escola.index') }}" class="btn-danger btn-sm">
                <i class="fa fa-arrow-left"></i> @lang('Voltar')
            </a>
        </div>        
    </div>
    <div class="row"><p></p></div>
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
    <!-- form start -->
    <form action="{{ route('escola.update', $escolacase->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <x-adminlte-input name="nome_escola" value="{{$escolacase->nome_escola}}" label="Nome da escola" placeholder="Informe o nome da escola a ser atualizada." fgroup-class="col-md" required="required" enable-feedback/>          
            </div>
            <div class="form-group">     
            @php
                //dd($Escolacase->localidade);
            @endphp              
            <x-adminlte-select name="rede" label="Rede de ensino" placeholder="Informe a rede de ensino da escola.">
                <option @if ($escolacase->rede == "MUNICIPAL")
                        {{"selected='selected'"}} 
                @endif value="MUNICIPAL">MUNICIPAL</option>
                <option @if ($escolacase->rede == "ESTADUAL")
                    {{"selected='selected'"}} 
                @endif value="ESTADUAL">ESTADUAL</option>
                <option @if ($escolacase->rede == "FEDERAL")
                    {{"selected='selected'"}} 
                @endif value="FEDERAL">FEDERAL</option>
                <option @if ($escolacase->rede == "PRIVADA")
                    {{"selected='selected'"}} 
                @endif value="PRIVADA">PRIVADA</option>
                
            </x-adminlte-select>    
            </div>                
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">@lang('Atualizar')</button>
        </div>
        
    </form>
  </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop