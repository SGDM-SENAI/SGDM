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
        Schema::create('turma_dia_da_semana', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('turma_dia_da_semana', function (Blueprint $table) {
            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('dia_da_semana_id');
            $table->primary(['turma_id','dia_da_semana_id']);

            $table->foreign('turma_id')->references('id')->on('turma');
            $table->foreign('dia_da_semana_id')->references('id')->on('dia_da_semana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_dia_da_semana');
    }
};
