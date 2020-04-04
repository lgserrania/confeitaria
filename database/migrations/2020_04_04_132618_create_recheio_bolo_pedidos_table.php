<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecheioBoloPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recheio_bolo_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recheio_id');
            $table->unsignedBigInteger('bolo_id');
            $table->foreign('recheio_id')->references('id')->on('recheios')->onDelete('cascade');
            $table->foreign('bolo_id')->references('id')->on('bolo_pedidos')->onDelete('cascade');
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
        Schema::dropIfExists('recheio_bolo_pedidos');
    }
}
