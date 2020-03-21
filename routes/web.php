<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rotas do painel
Route::get("/painel", "PainelController@index")->name("painel.index");

//Vendas
Route::get("/painel/vendas/dados", "VendasController@dados")->name("painel.vendas.dados");

//Pedidos
Route::get("/painel/pedidos/controle", "PedidosController@controle")->name("painel.pedidos.controle");
Route::get("/painel/pedidos/calendario", "PedidosController@calendario")->name("painel.pedidos.calendario");

//Produtos
Route::get("/painel/produtos/bolos", "ProdutosController@bolos")->name("painel.produtos.bolos");
Route::get("/painel/produtos/variados", "ProdutosController@variados")->name("painel.produtos.variados");

//Utilitários
Route::get("/painel/utilitarios/calculadora", "UtilitariosController@calculadora")->name("painel.utilitarios.calculadora");
Route::get("/painel/utilitarios/mensagens", "UtilitariosController@mensagens")->name("painel.utilitarios.mensagens");
Route::get("/painel/utilitarios/mensagens/{categoria}", "UtilitariosController@mensagens_categoria")->name("painel.utilitarios.mensagens.categoria");
Route::get("/painel/utilitarios/mensagens/lida/{id}", "UtilitariosController@mensagem_lida");
//Clientes
Route::get("/painel/clientes/contatos", "ClientesController@contatos")->name("painel.clientes.contatos");
Route::post("/painel/clientes/salvar", "ClientesController@salvar")->name("painel.clientes.salvar");
Route::get("/painel/clientes/deletar/{id}", "ClientesController@deletar")->name("painel.clientes.deletar");
Route::post("/painel/clientes/atualizar/{id}", "ClientesController@atualizar")->name("painel.clientes.atualizar");