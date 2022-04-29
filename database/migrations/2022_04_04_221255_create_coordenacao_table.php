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
        Schema::create('coordenacao', function (Blueprint $table) {
            $table->id();
            $table->string('nome_coord', 60);
            $table->timestamps();

            
        });

        Schema::table('coordenacao', function (Blueprint $table) {

            $table->unsignedBigInteger('coordenador_id');
            $table->foreign('coordenador_id')->references('id')->on('coordenador');
            $table->unsignedBigInteger('diretoria_id');
            $table->foreign('diretoria_id')->references('id')->on('diretoria');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordenacao');
    }
};
