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
        Schema::create('diretoria', function (Blueprint $table) {
            $table->id();
            $table->string('nome_diretoria', 60);
            $table->string('nome_resp', 60);
            $table->timestamps();
           
        });

        Schema::table('diretoria', function (Blueprint $table) {
            
            $table->unsignedBigInteger('diretor_id');
            $table->foreign('diretor_id')->references('id')->on('diretor');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diretoria');
    }
};
