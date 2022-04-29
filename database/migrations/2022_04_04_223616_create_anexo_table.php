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
        Schema::create('anexo', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento',15);
            $table->string('arquivo',45);
            $table->timestamps();
            

        });
        Schema::table('anexo', function (Blueprint $table) {
            $table->unsignedBigInteger('aluno_id')->nullable();
            $table->foreign('aluno_id')->references('id')->on('aluno');
            $table->unsignedBigInteger('meta_periodo_letivo_id')->nullable();
            $table->foreign('meta_periodo_letivo_id')->references('periodo_letivo_id')->on('meta');
            $table->unsignedBigInteger('meta_diretoria_id')->nullable();
            $table->foreign('meta_diretoria_id')->references('diretoria_id')->on('meta');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexo');
    }
};
