<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaborProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sabor_produtos', function (Blueprint $table) {
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
        Schema::dropIfExists('sabor_produtos');
    }
}
