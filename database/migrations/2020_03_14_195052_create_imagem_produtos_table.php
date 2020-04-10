<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("produto_id");
            $table->string("caminho");
            
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            
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
        Schema::dropIfExists('imagem_produtos');
    }
}
