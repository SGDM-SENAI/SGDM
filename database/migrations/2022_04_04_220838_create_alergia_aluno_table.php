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
        Schema::create('alergia_aluno', function (Blueprint $table) {
            
            $table->timestamps();
        });
        Schema::table('alergia_aluno', function (Blueprint $table) {
            
            $table->unsignedBigInteger('alergia_id');
            $table->foreign('alergia_id')->references('id')->on('alergia');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('aluno');
            $table->primary(['alergia_id', 'aluno_id']);
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alergia_aluno');
    }
};
