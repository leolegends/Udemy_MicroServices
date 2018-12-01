<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('logradouro');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep');
            $table->string('cidade');
            $table->string('latitude');
            $table->string('longitude');  
            $table->timestamps();

            $table->foreign('cliente_id')->on('clientes')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
