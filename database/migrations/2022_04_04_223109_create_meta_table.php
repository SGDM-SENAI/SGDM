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
        Schema::create('meta', function (Blueprint $table) {
           
            $table->timestamps();
        });
        Schema::table('meta', function (Blueprint $table) {
       
            $table->unsignedBigInteger('periodo_letivo_id');
            $table->foreign('periodo_letivo_id')->references('id')->on('periodo_letivo');
            $table->unsignedBigInteger('diretoria_id');
            $table->foreign('diretoria_id')->references('id')->on('diretoria');
            $table->primary(['periodo_letivo_id', 'diretoria_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta');
    }
};
