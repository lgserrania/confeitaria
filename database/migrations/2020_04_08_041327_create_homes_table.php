<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string("produto_pronta_entrega_descricao");
            $table->string("produto_pronta_entrega_preco");
            $table->integer("produto_pronta_entrega_visivel")->default(1);
            $table->unsignedBigInteger("produto_pronta_entrega");
            $table->string("produto_pronta_entrega_imagem")->nullable();

            $table->integer("produto_novo_visivel")->default(1);
            $table->unsignedBigInteger("produto_novo");
            $table->string("produto_novo_imagem")->nullable();

            $table->timestamps();
            $table->foreign('produto_pronta_entrega')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('produto_novo')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
}
