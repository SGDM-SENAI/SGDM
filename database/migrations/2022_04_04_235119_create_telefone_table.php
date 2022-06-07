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
        Schema::create('telefone', function (Blueprint $table) {
            $table->id();
            $table->string('numero',20);
            $table->timestamps();
        });
        Schema::table('telefone', function (Blueprint $table) {
            
            $table->unsignedBigInteger('aluno_id')->nullable();
            $table->foreign('aluno_id')->references('id')->on('aluno');
            $table->unsignedBigInteger('coordenador_id')->nullable();
            $table->foreign('coordenador_id')->references('id')->on('coordenador');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->foreign('professor_id')->references('id')->on('professor');
            $table->unsignedBigInteger('diretor_id')->nullable();
            $table->foreign('diretor_id')->references('id')->on('diretor');
            $table->unsignedBigInteger('localidade_id')->nullable();
            $table->foreign('localidade_id')->references('id')->on('localidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefone');
    }
};
