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
        Schema::create('local', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',55);
            $table->timestamps();
        });
        Schema::table('local', function (Blueprint $table) {
        
            $table->unsignedBigInteger('localidade_id')->nullable();
            $table->foreign('localidade_id')->references('id')->on('localidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local');
    }
};
