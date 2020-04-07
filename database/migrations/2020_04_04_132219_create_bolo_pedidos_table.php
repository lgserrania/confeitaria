<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoloPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolo_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('formato_id');
            $table->unsignedBigInteger('tamanho_id');
            $table->unsignedBigInteger('massa_id');
            $table->unsignedBigInteger('cobertura_id');
            $table->unsignedBigInteger('topo_id');
            $table->text('mensagem')->default("");
            $table->double('total', 15, 8)->default(0.0);
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('formato_id')->references('id')->on('formatos')->onDelete('cascade');
            $table->foreign('massa_id')->references('id')->on('massas')->onDelete('cascade');
            $table->foreign('tamanho_id')->references('id')->on('tamanhos')->onDelete('cascade');
            $table->foreign('cobertura_id')->references('id')->on('coberturas')->onDelete('cascade');
            $table->foreign('topo_id')->references('id')->on('topos')->onDelete('cascade');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
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
        Schema::dropIfExists('bolo_pedidos');
    }
}
