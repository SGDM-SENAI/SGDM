<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->id();
            $table->string('nome_aluno',64);
            $table->date('data_nascimento');
            $table->string('rg_aluno',15)->unique();;
            $table->string('cpf_aluno',15)->nullable();
            $table->string('nome_pai',64)->nullable();
            $table->string('nome_mae',64);
            $table->string('email')->unique();
            $table->string('sexo',1);
            $table->string('tipo_sanguineo',12);
            $table->string('estado_civil',32);
            $table->string('manequim',12)->nullable();
            $table->string('numero_calcado',3)->nullable();
            $table->boolean('portador_pne');
            $table->string('descricao_pne',128)->nullable();
            $table->string('medicacao_controlada',160)->nullable();
            $table->string('numero_bolsa_familia',15)->nullable();
            $table->string('numero_cnis',15)->nullable();
            $table->string('renda_familiar',10);
            $table->string('obs',200)->nullable();
            $table->string('nome_social',15)->nullable();
            $table->string('turno_escolar',15)->nullable();
            

            $table->unsignedBigInteger('endereco_id');
            $table->foreign('endereco_id')->references('id')->on('endereco');
            $table->unsignedBigInteger('escola_id')->nullable();
            $table->foreign('escola_id')->references('id')->on('escola')->nullable();
            $table->unsignedBigInteger('escolaridade_id');
            $table->foreign('escolaridade_id')->references('id')->on('escolaridade');
            $table->timestamps();
       
       
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
};
