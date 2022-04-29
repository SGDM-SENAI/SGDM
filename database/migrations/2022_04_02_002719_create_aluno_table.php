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
            $table->string('nome_aluno',45);
            $table->date('data_nascimento');
            $table->string('rg_aluno',15)->unique();;
            $table->string('cpf_aluno',15)->nullable();
            $table->string('nome_pai',45)->nullable();
            $table->string('nome_mae',45);
            $table->string('email')->unique();
            $table->string('sexo',1);
            $table->string('tipo_sanguinio',12);
            $table->string('estado_civil',12);
            $table->string('manequim',12)->nullable();
            $table->string('numero_calcado',12)->nullable();
            $table->string('portador_pne',3);
            $table->string('qual_pne',100)->nullable();
            $table->string('medicacao_controlada',3);
            $table->string('qual_medicacao',45)->nullable();
            $table->string('possui_bolsa_familia',3);
            $table->string('numero_bolsa_familia',15)->nullable();
            $table->string('numero_cnis',15)->nullable();
            $table->string('renda_familiar',15);
            $table->string('obs',200)->nullable();
            $table->string('nome_social',15)->nullable();
            $table->string('turno_escolar',15)->nullable();
            $table->string('numero_residencia',10);
            $table->string('complemento',200)->nullable();
            

            $table->unsignedBigInteger('viacep_id');
            $table->foreign('viacep_id')->references('id')->on('viacep');
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
