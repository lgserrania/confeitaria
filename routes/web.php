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
Route::get("/painel/produtos/variados", "ProdutosController@index")->name("painel.produtos.variados");

//Bolos
Route::get("/painel/produtos/bolos", "BolosController@index")->name("painel.produtos.bolos");
Route::post("/painel/produtos/bolos/categoria/salvar", "BolosController@salvar_categoria")->name("painel.bolos.categoria.salvar");
Route::post("/painel/produtos/bolos/tamanho/salvar", "BolosController@salvar_tamanho")->name("painel.bolos.tamanho.salvar");
Route::post("/painel/produtos/bolos/formato/salvar", "BolosController@salvar_formato")->name("painel.bolos.formato.salvar");
Route::post("/painel/produtos/bolos/massa/salvar", "BolosController@salvar_massa")->name("painel.bolos.massa.salvar");
Route::post("/painel/produtos/bolos/recheio/salvar", "BolosController@salvar_recheio")->name("painel.bolos.recheio.salvar");
Route::post("/painel/produtos/bolos/cobertura/salvar", "BolosController@salvar_cobertura")->name("painel.bolos.cobertura.salvar");
Route::post("/painel/produtos/bolos/topo/salvar", "BolosController@salvar_topo")->name("painel.bolos.topo.salvar");

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
