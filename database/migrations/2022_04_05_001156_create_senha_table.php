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
        Schema::create('senha', function (Blueprint $table) {
            $table->id();
            $table->string('numero_senha',25);
            $table->string('autentaticacao',50);
            $table->date('validade');
            $table->string('situacao',50);
            $table->timestamps();
        });


        Schema::table('senha', function (Blueprint $table) {
        
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')->references('id')->on('turma');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senha');
    }
};
