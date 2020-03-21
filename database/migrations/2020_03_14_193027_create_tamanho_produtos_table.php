<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamanhoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamanho_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produto_id');
            $table->string("nome");
            $table->double("preco", 8, 2)->default(0.0);
            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamanho_produtos');
    }
}
