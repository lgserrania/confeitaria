<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nome");
            $table->string("sobrenome");
            $table->string("endereco");
            $table->date("nascimento");
            $table->string("cpf");
            $table->string("cidade");
            $table->string("telefone");
            $table->string("codigo");
            $table->string("status")->default("Aguardando produção");
            $table->string("link");
            $table->dateTime('agendamento')->nullable();
            $table->string("hora")->nullable();
            $table->double('total', 15, 8)->default(123.4567);;
            $table->string("email")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
