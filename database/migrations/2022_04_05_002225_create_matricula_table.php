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
        Schema::create('matricula', function (Blueprint $table) {
           $table->string('situacao',45);
           $table->string('autenticacao',45);
           $table->timestamps();
        });

        Schema::table('matricula', function (Blueprint $table) {

            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('senha_id');
            $table->primary(['turma_id','aluno_id']);

            $table->foreign('turma_id')->references('id')->on('turma');
            $table->foreign('aluno_id')->references('id')->on('aluno');
            $table->foreign('senha_id')->references('id')->on('senha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula');
    }
};
