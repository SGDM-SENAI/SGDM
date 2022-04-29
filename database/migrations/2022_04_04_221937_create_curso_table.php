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
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->string('nome_curso', 45);
            $table->string('objetivo', 200);
            $table->string('ementa', 100);
            $table->string('info_curso', 100);
            $table->string('cont_program', 45);
            $table->string('metodologia', 150);
            $table->string('recursos', 100);
            $table->string('met_avaliacao', 45);// metodo de avaliacao
            $table->string('referencia', 100);
            $table->timestamps();          
        
        });

        Schema::table('curso', function (Blueprint $table) {
            
            $table->unsignedBigInteger('coordenacao_id');
            $table->foreign('coordenacao_id')->references('id')->on('coordenacao');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso');
    }
};
