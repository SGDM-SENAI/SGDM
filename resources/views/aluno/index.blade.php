@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('title', 'Lista de Alunos')

@section('content_header')
    <h1>@lang('Aluno :: lista')</h1>
@stop



@section('content')
    <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
        <div class="card-header">        
            <div class="d-flex justify-content-between w-100">
                <h3 class="card-title">
                    <span>@lang('Lista de alunos')</span>
                </h3>       
                <a href="{{ route('aluno.create') }}" class="btn-danger btn-sm">
                    <i class="fa fa-plus"></i> @lang('Adicionar')
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
                <strong>@lang('Whoops!') </strong>@lang('Houveram alguns problemas com sua entrada.') <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- /.card-header -->
        <!-- Table start -->
        
        {{-- Setup data for datatables --}}
        @php
        $heads = [
            ['label' => 'Data de nascimento', 'width' => 16],
            'Nome do aluno',
            ['label' => 'Sexo', 'width' => 14],
            'Email',
            ['label' => 'Ações', 'no-export' => true, 'width' => 10],
        ];

        $config['data'] = array();        
        foreach ($alunocases as $case) {
            array_push($config['data'], [$case->data_nascimento, $case->nome_aluno, $case->sexo,$case->email,]);
        }       
        $order = ['order' => [[1, 'asc']]];
        array_push($config, $order);
        $columns = ['columns' => [null, null, null, null, ['orderable' => false]]];
        array_push($config, $columns);
        
        //dd($config);
        @endphp

        {{-- Minimal example / fill data using the component slot --}}
        <x-adminlte-datatable id="table_aluno" :heads='$heads' head-theme="dark" striped hoverable with-buttons>
                    
            @foreach($config['data'] as $row)
                @php
                    //dd($row[0]);
                @endphp
                <tr>
                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>                      
                    @endforeach
                    <td>
                        <nobr>
                            <form action="{{ route('aluno.destroy', $row[0])}}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('aluno.edit', $row[0]) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                            
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" type="submit" title="Deletar">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>                                
                                {{-- <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalhes">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button> --}}
                            </form>
                        </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>    
    
    <!-- /.card-body -->    
    </div>

    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  

@stop