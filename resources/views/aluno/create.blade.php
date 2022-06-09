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

<form class="hidden-inativo" id="form-dados-gerais">

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

        <div class="card-body">

            <div class="card-column col-7">

                <div class="form-group col-11">
                    <x-adminlte-input id="nome_aluno" maxlength="64" name="nome_aluno" label="*Nome do aluno:" placeholder="Informe o nome do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input id="nome_social_aluno" maxlength="15" name="nome_social_aluno" label="Nome social do aluno:" placeholder="Informe o nome social do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input name="rg" id="rg" maxlength="15" label="*RG:" placeholder="Informe o rg do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" id="cpf" name="cpf" maxlength="15" label="Cpf:" placeholder="Informe o cpf do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input id="email" type="email" maxlength="128" name="email" label="*Email:" placeholder="Informe o email do aluno ou responsável" enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-select onchange="replaceElementOptionsEscolaridade(['container_serie','container_turno_escolar','container_escola'],'escolaridade','NAO ESTUDA')" name="escolaridade" id="escolaridade" label="*Escolaridade:">
                        <x-adminlte-options :options="['NAO ESTUDA' => 'NÃO ESTUDA', 'FUNDAMENTAL' =>'FUNDAMENTAL', 'ENSINO MEDIO' => 'ENSINO MÉDIO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>
                <div id="container_serie" class="form-group col-11 hidden-ativo">
                    <x-adminlte-select name="serie" id="serie" label="Série:">
                        <x-adminlte-options :options="['1' => '1 ANO FUNDAMENTAL', '2' =>'2 ANO FUNDAMENTAL', '3' => '3 ANO FUNDAMENTAL', '4' =>'4 ANO FUNDAMENTAL', '5' =>'5 ANO FUNDAMENTAL', '6' =>'6 ANO FUNDAMENTAL', '7' =>'7 ANO FUNDAMENTAL', '8' =>'8 ANO FUNDAMENTAL', '9' =>'9 ANO FUNDAMENTAL', '10' =>'1 ANO ENSINO MÉDIO', '11' =>'2 ANO ENSINO MÉDIO', '12' =>'3 ANO ENSINO MÉDIO','13' =>'4 ANO ENSINO MÉDIO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>



            </div>

            <div class="column col-5">

                <div class="form-group container-textarea">

                    <textarea class="description" name="descricao" id="description-aluno" placeholder="Observação"></textarea>

                </div>


                <div class="form-group col-12">
                    <x-adminlte-select id="estado_civil" name="estado_civil" label="*Estado civil:" placeholder="Informe a estado civil do aluno.">
                        <x-adminlte-options :options="['SOLTEIRO' => 'SOLTEIRO', 'CASADO' =>'CASADO', 'VIÚVO' => 'VIÚVO', 'DIVÓRCIADO' => 'DIVÓRCIADO']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select id="sexo" name="sexo" label="*Sexo:" placeholder="Informe sexo do aluno.">
                        <x-adminlte-options :options="['M' => 'MASCULINO', 'F' =>'FEMININO', 'N' => 'PREFIRO NÃO DIZER']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>
                <div class="form-group col-12 container-date">
                    <label for="data_nascimento">@lang('*Data de nascimento:')</label>
                    <input type="date" name="data_nascimento" id="data_nascimento">

                </div>

                <div id="container_escola" class="form-group col-12 hidden-ativo">
                    <label for="escola">Escola:</label>
                    <a id="escola" href="javascript:activate('container-escola')">
                        <div class="form-control">Informe a escola do aluno</div>
                    </a>
                </div>

                <div id="container_turno_escolar" class="hidden-ativo form-group col-12">
                    <x-adminlte-select id="turno_escolar" name="turno_escolar" label="Turno escolar:">
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

<form class="hidden-ativo" id="form-dados-saude">
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
                    <x-adminlte-select id="tipo_sanguineo" name="tipo_sanguineo" label="*Qual o tipo sanguineo do aluno?">
                        <x-adminlte-options :options="['O+' => 'O+', 'O' =>'O-', 'A+' =>'A+', 'A' =>'A-', 'B+' =>'B+', 'B' =>'B-', 'AB' =>'AB']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-select id="manequim" name="manequim" label="Qual é o manequim do aluno?">
                        <x-adminlte-options :options="['P' => 'P', 'M' =>'M', 'G' =>'G', 'GG' =>'GG']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>

                <div class="form-group col-12">
                    <x-adminlte-input type="number" name="numero_calcado" id="numero_calcado" label="Número do calçado do aluno:" placeholder="Informe o número do calçado do aluno." enable-feedback />
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

<form class="hidden-ativo" id="form-dados-responsaveis">
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
                    <x-adminlte-input id="nome_pai" name="nome_pai" label="Nome do pai aluno:" placeholder="Informe o nome do pai do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input id="nome_mae" name="nome_mae" label="*Nome da mãe do aluno:" placeholder="Informe o nome da mãe do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="renda_familiar" id="renda_familiar" label="*Renda familiar:" placeholder="Informe a renda familiar do aluno a ser cadastrado." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="numero_cnis" id="numero_cnis" label="*Número do cnis:" placeholder="Informe o número do cnis." enable-feedback />
                </div>




            </div>

            <div class="column col-5">

                <div class="form-group col-12">
                    <x-adminlte-select name="bolsa_familia" label="*Bolsa família:">
                        <x-adminlte-options :options="['POSSUI' => 'ALUNO POSSUI BOLSA FAMÍLIA', 'NÃO POSSUI' =>'ALUNO NÃO POSSUI BOLSA FAMÍLIA']" disabled="0" empty-option="Selecione uma opção..." />
                    </x-adminlte-select>
                </div>
                <div class="form-group col-12">
                    <x-adminlte-input type="number" name="numero_bolsa_familia" id="numero_bolsa_familia" label="Número do bolsa família:" placeholder="Informe o número do bolsa família." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="telefone" id="telefone" label="*Telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." enable-feedback />
                </div>
                <div class="form-group col-11">
                    <x-adminlte-input type="number" name="telefone_extra" id="telefone_extra" label="Outro telefone para contato:" placeholder="Informe o telefone do responsável ou do aluno." enable-feedback />
                </div>

            </div>

        </div>
    </div>
    <div class="container-options">

        <div class="container-button-admin">

            <button type="button" onclick="replace('form-dados-responsaveis','form-dados-saude')" class="btn btn-back backgroud-empty">
                @lang('< Voltar') </button>

        </div>

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

<form class="hidden-ativo" id="form-dados-endereco">

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
                    <x-adminlte-input id="bairro" name="bairro" label="*Bairro:" placeholder="Informe o bairro onde o aluno reside." enable-feedback />
                </div>
                <div class="form-group col-12">
                    <x-adminlte-input id="logradouro" name="logradouro" label="*Logradouro:" placeholder="Informe o logradouro onde o aluno reside." enable-feedback />
                </div>

                <div class="form-group col-12">
                    <x-adminlte-input id="numero_casa" name="numero_casa" label="*Numero da casa:" placeholder="informe o numero da casa onde o aluno reside." type="number" enable-feedback />
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
            <button type="submit" class="btn  backgroud-primary">@lang('Finalizar cadastro >')</button>
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
                    <th style="width : 150px; ">Nome da alergia</th>
                    <th style="width : 150px; ">Tipo de alergia</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($alergiaCases as $alergia)
                <tr>
                    <td>{{$alergia["nome_alergia"]}}</td>
                    <td>{{$alergia["tipo_alergia"]}}</td>
                    <td><button type="button" id="button-escola" onclick="selectAlergia(<?php echo $alergia['id'] . ',' . '\'' . $alergia['nome_alergia'] . '\'' ?>)" class="btn btn-manage backgroud-primary">@lang('Selecionar')</button></td>

                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <div id="alergia-manage" class="hidden-inativo">
        <div class="container-manage">
            <div class="column">
                <span id="message-null-alergia">Nenhuma alergia selecionada até o momento</span>
            </div>
            <div class="column">
                <button type="button" id="button-alergia" onclick="replace('alergia-manage','container-data-table')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button>
            </div>

        </div>
        <div id="container-select-alergia"></div>
    </div>
</section>

<section id="container-escola" class="widget hidden-ativo">
    <div class="header">
        <div>
            <h1>Escolas</h1>
        </div>

        <div class="container-options-widjet" ">
            <div>
            <a id="option-add-widjet-escola" class="hidden-ativo" href="javascript:replace('container-data-table-escola','form-escola'),inactivate('option-add-widjet-escola')">
            Adicionar escola
            </a>
        </div>
        <a href="javascript:close('container-escola')">
            <img src="{{ url('img/close.png') }}" alt="Sair">
        </a>
    </div>
    </div>

    <div id="escola-manage" class="hidden-inativo">
        <div class="container-manage">
            <div class="column">

                <div id="escola-select" class="row">
                    <span id="message-null">Nenhum item selecionado até o momento</span>
                    <input type="hidden" id="input-escola" name="escola">
                </div>

            </div>
            <div id="container-replace-escola" class="column">
                <button type="button" id="button-escola" onclick="replace('escola-manage','container-data-table-escola'),activate('option-add-widjet-escola')" class="btn btn-manage backgroud-primary">@lang('Adicionar')</button>
            </div>
        </div>
        <div id="container-select-escola"></div>
    </div>

    <div id="container-data-table-escola" class="container-data-table-widget hidden-ativo">
        <table id="escolas" class="datatable table table-striped">
            <thead>
                <tr>
                    <th style="width : 200px; ">Nome da escola</th>
                    <th>Rede</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="tbody-escola">
                @foreach($escolaCases as $escola)
                <tr>
                    <td>{{$escola["nome_escola"]}}</td>
                    <td>{{$escola["rede"]}}</td>
                    <td><button type="button" id="button-escola" onclick="selectEscola(<?php echo $escola['id'] . ',' . '\'' . $escola['nome_escola'] . '\'' ?>),inactivate('option-add-widjet-escola')" class="btn btn-manage backgroud-primary">@lang('Selecionar')</button></td>

                </tr>
                @endforeach

            </tbody>

        </table>
    </div>

    <form id="form-escola" class="hidden-ativo">

        <div class="container-inputs-widget card-column col-12">

            <div class="form-group col-12">
                <x-adminlte-input type="text" name="nome_escola" id="nome_escola" label="Nome da escola:" placeholder="Informe o nome da escola." enable-feedback />
            </div>

            <div class="form-group col-12">
                <x-adminlte-select name="rede_escola" id="rede_escola" label="Rede de ensino" placeholder="Informe a rede de ensino da escola.">
                    <x-adminlte-options :options="['MUNICIPAL' => 'MUNICIPAL', 'ESTADUAL' =>'ESTADUAL', 'FEDERAL' => 'FEDERAL', 'PRIVADA' => 'PRIVADA']" disabled="0" empty-option="Selecione uma opção..." />
                </x-adminlte-select>
            </div>
        </div>

        <div class="container-options container-options-widget-form">

            <div class="container-button-admin">
                <button type="button" onclick="replace('form-escola','container-data-table-escola'),activate('option-add-widjet-escola')" class="btn btn-back backgroud-empty">@lang('< Voltar')</button>
            </div>

            <div class="container-button-admin container-button-admin-form-widget-submit">
                <button type="submit" class="btn backgroud-primary btn-submit-widget">@lang('Cadastrar')</button>
            </div>

        </div>

    </form>
</section>



<!-- /.card-body -->

@section('js')


<script src="{{ url(mix('js/aluno.js')) }}"></script>
<script src="{{ url(mix('js/script.js')) }}"></script>
<script src="http://localhost:8000/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>
    $(document).ready(() => {
        $("#form-escola").submit((e) => {
            e.preventDefault();

            escola = {
                'nome_escola': $("#nome_escola").val(),
                'rede': $("#rede_escola").val(),
            }

            $.ajax({

                url: "{{ route('escola.storeJsonData') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    escola

                },
                type: "POST",
                dataType: 'json'

            }).done((results_escola) => {
                console.log(results_escola);

                if (results_escola["success"] == 1) {
                    createItemDataTableEscola([results_escola['data']["nome_escola"],results_escola['data']["rede"]],results_escola['data']["id"],results_escola['data']["nome_escola"])
                    replace('form-escola', 'container-data-table-escola'), activate('option-add-widjet-escola')
                }
            })
        })
    })

    const submitForm = () => {

        $.ajax({

            url: "{{ route('endereco.storeJsonData') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                endereco,

            },
            type: "POST",
            dataType: 'json'

        }).done((results_endereco) => {
            console.log(results_endereco);

            if (results_endereco["success"] == 1) {

                aluno.endereco_id = results_endereco['id'];

                $.ajax({

                    url: "{{ route('aluno.store') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        aluno,

                    },
                    type: "POST",
                    dataType: 'json'

                }).done((results_aluno) => {
                    console.log(results_aluno);

                    if (results_aluno["success"] == 1) {

                        telefone.aluno_id = results_aluno['id'];
                        telefone_extra.aluno_id = results_aluno['id'];


                        $.ajax({

                            url: "{{ route('telefone.storeJsonData') }}",
                            data: {
                                '_token': '{{ csrf_token() }}',
                                telefone,
                                telefone_extra

                            },
                            type: "POST",
                            dataType: 'json'

                        }).done((results_telefone) => {
                            console.log(results_telefone);

                            if (results_telefone["success"] == 1) {

                                $.ajax({

                                    url: "{{ route('alergia_aluno.store') }}",
                                    data: {

                                        '_token': '{{ csrf_token() }}',
                                        alergias,
                                        'aluno_id': results_aluno['id']

                                    },
                                    type: "POST",
                                    dataType: 'json'

                                }).done((results_alergia) => {
                                    console.log(results_alergia);

                                    if (results_alergia["success"] == 1) {

                                    }
                                })

                            }
                        })
                    }
                })
            }
        })
    }

    const createItemDataTableEscola = (content,id,name) => {

        createItemDataTable('tbody-escola', content);

        var container = document.getElementById('tbody-escola');

        column = document.createElement('td');
        element = document.createElement('button');
        element.setAttribute('type', 'button');
        element.setAttribute('id', 'button-escola');
        element.setAttribute('onclick', `selectEscola(${id},'${name}'),inactivate('option-add-widjet-escola')`);
        element.setAttribute('class', 'btn btn-manage backgroud-primary');
        text = document.createTextNode('Selecionar');
        element.appendChild(text);

        column.appendChild(element);
        container.appendChild(column);

        // <
        // td > < button type = "button"
        // id = "button-escola"
        // onclick = "selectEscola(<?php echo $escola['id'] . ',' . '\'' . $escola['nome_escola'] . '\'' ?>),inactivate('option-add-widjet-escola')"
        // class = "btn btn-manage backgroud-primary" > @lang('Selecionar') < /button></td >


    }
</script>

@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">

@endsection

@stop