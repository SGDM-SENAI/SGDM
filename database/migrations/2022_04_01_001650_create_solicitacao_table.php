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
        Schema::create('solicitacao', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_solicitacao',64);
            
            $table->string('descricao',256)->nullable();
            $table->string('status',20);
            $table->timestamps();
        });

        Schema::table('solicitacao', function (Blueprint $table) {

            $table->unsignedBigInteger('id_usuario_remetente');
            $table->unsignedBigInteger('id_usuario_destinatario');
            $table->foreign('id_usuario_remetente')->references('id')->on('usuario');
            $table->foreign('id_usuario_destinatario')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitacao');
    }
};
