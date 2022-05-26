@extends('adminlte::page')

@section('title', 'Cadastro de Aluno')


@section('content')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="{{ url(mix('css/style.css')) }}">
@stop
<!-- form start -->

<!-- Cada formulario possui o seu card, e sua visualização é trocada por uma função javascript -->

<!-- form-dados-gerais  -->

<form action="#" class="hidden-inativo" id="form-dados-gerais">

    <!-- Os formulários não possuem method, pois são tratados via ajax -->

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
                    <x-adminlte-input type="email" name="email" label="*Email:" placeholder="Informe o email do aluno ou responsável" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-select name="escolaridade" label="*Escolaridade:">
                        <x-adminlte-options :options="['NAO ESTUDA' => 'NÃO ESTUDA', 'FUNDAMENTAL' =>'FUNDAMENTAL', 'ENSINO MEDIO' => 'ENSINO MÉDIO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>
                <div class="form-group col-11">
                    <x-adminlte-select name="serie" label="Série:">
                        <x-adminlte-options :options="['1 ANO FUNDAMENTAL' => '1 ANO FUNDAMENTAL', '2 ANO FUNDAMENTAL' =>'2 ANO FUNDAMENTAL', '3 ANO FUNDAMENTAL' => '3 ANO FUNDAMENTAL', '4 ANO FUNDAMENTAL' =>'4 ANO FUNDAMENTAL', '5 ANO FUNDAMENTAL' =>'5 ANO FUNDAMENTAL', '6 ANO FUNDAMENTAL' =>'6 ANO FUNDAMENTAL', '7 ANO FUNDAMENTAL' =>'7 ANO FUNDAMENTAL', '8 ANO FUNDAMENTAL' =>'8 ANO FUNDAMENTAL', '9 ANO FUNDAMENTAL' =>'9 ANO FUNDAMENTAL', '1 ANO ENSINO MEDIO' =>'1 ANO ENSINO MÉDIO', '2 ANO ENSINO MEDIO' =>'2 ANO ENSINO MÉDIO', '3 ANO MEDIO' =>'3 ANO ENSINO MÉDIO', '4 ANO ENSINO MÉDIO' =>'4 ANO ENSINO MÉDIO',]" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
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

                <div class="form-group col-12">
                    <label for="escola">Escola:</label>
                    <a href="javascript:activate('container-escola')">
                        <div class="form-control">Informe a escola do aluno</div>
                    </a>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select name="turno_escolar" label="Turno escolar:">
                        <x-adminlte-options :options="['MATUTINO' => 'MATUTINO', 'VESPERTINO' =>'VESPERTINO', 'NOTURNO' => 'NOTURNO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
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
            <div class="figure-circle circle-ativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
        </div>
        <div class="container-button-admin">
            <button type="submit" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
        </div>

    </div>
</form>

<!-- /form-dados-gerais  -->


<!--  form-dados-saude -->

<form class="hidden-ativo" action="#" id="form-dados-saude">
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

                <!-- Elemento aparece após a opção sim ser selecionada -->
                <div class="form-group col-12 hidden-ativo" id="hidden-description-pne">
                    <textarea class="description" name="descricao_pne" id="descricao_pne" placeholder="Quais necessidades?"></textarea>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select onchange="replaceElementOption('container-nome-medicacao','medicacao_controlada')" name="medicacao_controlada" id="medicacao_controlada" label="*O aluno toma alguma medicação controlada?">
                        <x-adminlte-options :options="['SIM' => 'SIM', 'NÃO' =>'NÃO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <!-- Elemento aparece após a opção sim ser selecionada -->
                <div class="form-group col-12 hidden-ativo" id="container-nome-medicacao">
                    <textarea class="description" name="nome_medicacao" id="nome_medicacao" placeholder="Qual medicação?"></textarea>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select onchange="replaceElementOptions(['container-alergia','button-alergia'],'alergia')" name="alergia" id="alergia" label="*O aluno possui alguma alergia?">
                        <x-adminlte-options :options="['SIM' => 'SIM', 'NÃO' =>'NÃO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                    <button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary hidden-ativo">@lang('Gerenciar alergias')</button>
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
            <button type="button" onclick="replace('form-dados-saude','form-dados-gerais')" class="btn btn-back backgroud-empty">@lang('< Voltar')</button>
        </div>

        <div class="figure-etapa">
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-ativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
        </div>

        <div class="container-button-admin">
            <button type="submit" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
        </div>

    </div>
</form>

<!-- /form-dados-saude  -->

<!--  form-dados-responsaveis -->

<form class="hidden-ativo" action="#" id="form-dados-responsaveis">
    @csrf
    <div class=" card card-admin card-outline direct-chat direct-chat-primary shadow-none">

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

            <button type="button" onclick="replace('form-dados-responsaveis','form-dados-saude')" class="btn btn-back backgroud-empty">
                @lang('< Voltar') </button>

        </div>


        <!-- <div class="container-etapa">
            <span>Etapa <div id="num-etapa">1</div>/5</span>
        </div> -->
        <div class="figure-etapa">
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-ativo"></div>
            <div class="figure-circle circle-inativo"></div>
        </div>
        <div class="container-button-admin">
            <button type="submit" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
        </div>

    </div>
</form>

<!--  /form-dados-responsaveis -->

<!-- form-dados-endereco  -->

<form action="#" class="hidden-ativo" id="form-dados-endereco">

    <!-- Os formulários não possuem method, pois são tratados via ajax -->

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

        <!-- /.card-header -->


        <div class="card-body">

            <div class="card-column col-12">

                <div class="form-group col-12">
                    <x-adminlte-input onchange="viacepComplete()" type="number" name="cep" id="cep" label="*Cep:" placeholder="Ex: 42800256" enable-feedback />
                </div>

                <div class="form-group col-12">
                    <x-adminlte-input id="localidade" name="localidade" label="*Localidade:" placeholder="Informe a localidade onde o aluno reside." enable-feedback />
                </div>
                <div class="form-group col-12">
                    <x-adminlte-input id="bairro" name="bairro" label="*Bairro:" placeholder="Informe o bairro onde o aluno reside." enable-feedback />
                </div>
                <div class="form-group col-12">
                    <x-adminlte-input id="logradouro" name="logradouro" label="*Logradouro:" placeholder="Informe o logradouro onde o aluno reside." enable-feedback />
                </div>

                <div class="form-group col-12">
                    <x-adminlte-input id="numero_casa" name="numero_casa" label="*Numero da casa:" placeholder="informe o numero da casa onde o aluno reside." enable-feedback />
                </div>

                <div class="form-group col-12">
                    <x-adminlte-input id="complemento" name="complemento" label="Complemento:" placeholder="Digite um complemento." enable-feedback />
                </div>


            </div>

        </div>
    </div>
    <div class="container-options">

        <div class="container-button-admin">
            <button type="button" onclick="replace('form-dados-endereco','form-dados-responsaveis')" class="btn btn-back backgroud-empty">@lang('< Voltar')</button>
        </div>
        <div class="figure-etapa">
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-inativo"></div>
            <div class="figure-circle circle-ativo"></div>
        </div>
        <div class="container-button-admin">
            <button type="submit" class="btn  backgroud-primary">@lang('Próxima etapa >')</button>
        </div>

    </div>
</form>

<!-- /form-dados-endereco  -->


<section id="container-alergia" class="widget hidden-ativo">
    <div class="header">
        <div>
            <h1>Alergias</h1>
        </div>
        <div>
            <a href="javascript:close('container-alergia')">
                <img src="{{ url('img/close.png') }}" alt="Sair">
            </a>
        </div>
    </div>
    <div id="container-data-table" class="container-data-table-widget hidden-ativo">
        <table id="alergias" class="datatable table table-striped">
            <thead>
                <tr>
                    <th style="width : 200px; ">Nome da alergia</th>
                    <th>Tipo de alergia</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-alergia" onclick="replaceElementOption('container-alergia','alergia')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>


            </tbody>

        </table>
    </div>
    <div id="alergia-manage" class="hidden-inativo">
        <div class="container-manage">
            <div class="column">
                <span>Nenhuma alergia selecionada até o momento</span>
            </div>
            <div class="column">
                <button type="button" id="button-alergia" onclick="replace('alergia-manage','container-data-table')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button>
            </div>
        </div>
    </div>
</section>

<section id="container-escola" class="widget hidden-ativo">
    <div class="header">
        <div>
            <h1>escolas</h1>
        </div>
        <div>
            <a href="javascript:close('container-escola')">
                <img src="{{ url('img/close.png') }}" alt="Sair">
            </a>
        </div>
    </div>
    <div id="container-data-table-escola" class="container-data-table-widget hidden-ativo">
        <table id="escolas" class="datatable table table-striped">
            <thead>
                <tr>
                    <th style="width : 200px; ">Nome da escola</th>
                    <th>Tipo de escola</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>

                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td><button type="button" id="button-escola" onclick="replaceElementOption('container-escola','escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button></td>

                </tr>


            </tbody>

        </table>
    </div>
    <div id="escola-manage" class="hidden-inativo">
        <div class="container-manage">
            <div class="column">
                <span>Nenhuma escola selecionada até o momento</span>
            </div>
            <div class="column">
                <button type="button" id="button-escola" onclick="replace('escola-manage','container-data-table-escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button>
            </div>
        </div>
    </div>
</section>



<!-- /.card-body -->

@section('js')

<script src="{{ url(mix('js/script.js')) }}"></script>
<script src="http://localhost:8000/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>


@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">

@endsection

@stop