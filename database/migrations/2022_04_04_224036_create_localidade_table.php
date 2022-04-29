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
        Schema::create('localidade', function (Blueprint $table) {
            $table->id();
            $table->string('nome',45);
            $table->string('numero_endereco',45)->nullable();
            $table->string('ponto_referencia',45)->nullable();
            $table->string('complemento',200)->nullable();
            $table->string('contato',25);
            $table->timestamps();
        });
        Schema::table('localidade', function (Blueprint $table) {

            $table->unsignedBigInteger('viacep_id')->nullable();
            $table->foreign('viacep_id')->references('id')->on('viacep');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidade');
    }
};
