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
        Schema::create('turma', function (Blueprint $table) {
            $table->id();       
            $table->string('nome',45);
            $table->dateTime('data_inicio');
            $table->dateTime('data_final');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->smallInteger('faixa_etaria_inicio');
            $table->smallInteger('faixa_etaria_final');
            $table->integer('quantidade_alunos');
            $table->string('situacao',45);       
            $table->timestamps();
        });
        Schema::table('turma', function (Blueprint $table) {
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('local');
            $table->unsignedBigInteger('localidade_id');
            $table->foreign('localidade_id')->references('id')->on('localidade');
            $table->unsignedBigInteger('professor_id');
            $table->foreign('professor_id')->references('id')->on('professor');
            $table->unsignedBigInteger('modulo_id');
            $table->foreign('modulo_id')->references('id')->on('modulo');
            $table->unsignedBigInteger('periodo_letivo_id');
            $table->foreign('periodo_letivo_id')->references('id')->on('periodo_letivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma');
    }
};
