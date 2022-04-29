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
        Schema::create('modulo', function (Blueprint $table) {
            $table->id();
            $table->string('nome_modulo', 45);
            $table->string('situ_modulo', 1);
            $table->string('conteudo', 100);
            $table->timestamps();
        });
        Schema::table('modulo', function (Blueprint $table) {
           
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('curso');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulo');
    }
};
