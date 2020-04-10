<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nome");
            $table->string("empresa")->nullable();
            $table->string("whatsapp");
            $table->string("telefone")->nullable();
            $table->string("email");
            $table->string("estado")->nullable();
            $table->string("cidade")->nullable();
            $table->string("rua")->nullable();
            $table->string("numero")->nullable();
            $table->text("notas")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("linkedin")->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
