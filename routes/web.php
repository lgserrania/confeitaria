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
//Rotas do site
Route::group(['middleware' => ['carrinho']], function(){
    Route::get("/", "SiteController@index")->name("inicio");
    Route::get("/sobre", "SiteController@sobre")->name("sobre");
    Route::get("/produtos", "SiteController@produtos")->name("produtos");
    Route::get("/produtos/{slug}", "SiteController@produtos_categoria")->name("produtos.categoria");
    Route::get("/contato", "SiteController@contato")->name("contato");
    Route::get("/galeria", "SiteController@galeria")->name("galeria");
    Route::post("/carrinho/adicionar/produto", "CarrinhoController@adicionarProduto")->name("carrinho.adicionar.produto");
    Route::post("/carrinho/adicionar/bolo", "CarrinhoController@adicionarBolo")->name("carrinho.adicionar.bolo");
    Route::get("/carrinho/checkout", "CarrinhoController@checkout")->name("carrinho.checkout");
    Route::post("/carrinho/finalizar", "CarrinhoController@finalizar")->name("carrinho.finalizar");
    Route::get("/carrinho/confirmacao", "CarrinhoController@confirmacao")->name("carrinho.confirmacao");
    Route::get("/teste", "CarrinhoController@teste")->name("carrinho.adicionar.teste");
    
});

//Rotas do pagseguro
Route::get("/pagseguro/redirect", "PagseguroController@redirect")->name("pagseguro.redirect");
Route::get("/pagseguro/notification", "PagseguroController@notification")->name("pagseguro.notification");

//Rotas do painel
Route::get("/painel/login", "PainelController@login")->name("painel.login");
Route::post("/painel/logar", "PainelController@logar")->name("painel.logar");

Route::group(['middleware' => ['admin']], function(){
    Route::get("/painel", "PainelController@index")->name("painel.index");
    Route::get("/painel/logout", "PainelController@logout")->name("painel.logout");
    //Vendas
    Route::get("/painel/vendas/dados", "VendasController@dados")->name("painel.vendas.dados");

    //Pedidos
    Route::get("/painel/pedidos/controle", "PedidosController@controle")->name("painel.pedidos.controle");
    Route::get("/painel/pedidos/detalhe/{id}", "PedidosController@detalhe")->name("painel.pedidos.detalhe");
    Route::get("/painel/pedidos/calendario", "PedidosController@calendario")->name("painel.pedidos.calendario");
    Route::get("/painel/pedidos/status/{id}/{status}", "PedidosController@mudar_status")->name("painel.pedidos.status.mudar");

    //Produtos
    Route::get("/painel/produtos/variados", "ProdutosController@index")->name("painel.produtos.variados");
    Route::get("/painel/produtos/variados/editar/{id}", "ProdutosController@editar_produto")->name("painel.produtos.variados.editar");
    Route::post("/painel/produtos/variados/atualizar/{id}", "ProdutosController@atualizar_produto")->name("painel.produtos.variados.atualizar");
    Route::post("/painel/produtos/variados/salvar", "ProdutosController@salvar_produto")->name("painel.produtos.salvar");
    Route::get("/painel/produtos/variados/excluir/{id}", "ProdutosController@excluir_produto")->name("painel.produtos.variados.excluir");
    Route::post("/painel/produtos/variados/categoria/salvar", "ProdutosController@salvar_categoria")->name("painel.produtos.categoria.salvar");
    Route::post("/painel/produtos/variados/tamanho/salvar", "ProdutosController@salvar_tamanho")->name("painel.produtos.tamanho.salvar");
    Route::post("/painel/produtos/variados/tamanho/editar/{id}", "ProdutosController@editar_tamanho")->name("painel.produtos.tamanho.editar");
    Route::get("/painel/produtos/variados/tamanho/excluir/{id}", "ProdutosController@excluir_tamanho")->name("painel.produtos.tamanho.excluir");
    Route::post("/painel/produtos/variados/sabor/salvar", "ProdutosController@salvar_sabor")->name("painel.produtos.sabor.salvar");
    Route::post("/painel/produtos/variados/sabor/editar/{id}", "ProdutosController@editar_sabor")->name("painel.produtos.sabor.editar");
    Route::get("/painel/produtos/variados/sabor/excluir/{id}", "ProdutosController@excluir_sabor")->name("painel.produtos.sabor.excluir");
    Route::post("/painel/produtos/variados/imagem/salvar", "ProdutosController@salvar_imagem")->name("painel.produtos.imagem.salvar");
    Route::get("/painel/produtos/variados/imagem/excluir/{id}", "ProdutosController@excluir_imagem")->name("painel.produtos.imagem.excluir");

    //Bolos
    Route::get("/painel/produtos/bolos", "BolosController@index")->name("painel.produtos.bolos");
    Route::post("/painel/produtos/bolos/categoria/salvar", "BolosController@salvar_categoria")->name("painel.bolos.categoria.salvar");
    Route::post("/painel/produtos/bolos/categoria/atualizar/{id}", "BolosController@atualizar_categoria")->name("painel.bolos.categoria.atualizar");
    Route::get("/painel/produtos/bolos/categoria/excluir/{id}", "BolosController@excluir_categoria")->name("painel.bolos.categoria.excluir");
    Route::post("/painel/produtos/bolos/tamanho/salvar", "BolosController@salvar_tamanho")->name("painel.bolos.tamanho.salvar");
    Route::post("/painel/produtos/bolos/tamanho/atualizar/{id}", "BolosController@atualizar_tamanho")->name("painel.bolos.tamanho.atualizar");
    Route::get("/painel/produtos/bolos/tamanho/excluir/{id}", "BolosController@excluir_tamanho")->name("painel.bolos.tamanho.excluir");
    Route::post("/painel/produtos/bolos/formato/salvar", "BolosController@salvar_formato")->name("painel.bolos.formato.salvar");
    Route::post("/painel/produtos/bolos/formato/atualizar/{id}", "BolosController@atualizar_formato")->name("painel.bolos.formato.atualizar");
    Route::get("/painel/produtos/bolos/formato/excluir/{id}", "BolosController@excluir_formato")->name("painel.bolos.formato.excluir");
    Route::post("/painel/produtos/bolos/massa/salvar", "BolosController@salvar_massa")->name("painel.bolos.massa.salvar");
    Route::post("/painel/produtos/bolos/massa/atualizar/{id}", "BolosController@atualizar_massa")->name("painel.bolos.massa.atualizar");
    Route::get("/painel/produtos/bolos/massa/excluir/{id}", "BolosController@excluir_massa")->name("painel.bolos.massa.excluir");
    Route::post("/painel/produtos/bolos/recheio/salvar", "BolosController@salvar_recheio")->name("painel.bolos.recheio.salvar");
    Route::post("/painel/produtos/bolos/recheio/atualizar/{id}", "BolosController@atualizar_recheio")->name("painel.bolos.recheio.atualizar");
    Route::get("/painel/produtos/bolos/recheio/excluir/{id}", "BolosController@excluir_recheio")->name("painel.bolos.recheio.excluir");
    Route::post("/painel/produtos/bolos/cobertura/salvar", "BolosController@salvar_cobertura")->name("painel.bolos.cobertura.salvar");
    Route::post("/painel/produtos/bolos/cobertura/atualizar/{id}", "BolosController@atualizar_cobertura")->name("painel.bolos.cobertura.atualizar");
    Route::get("/painel/produtos/bolos/cobertura/excluir/{id}", "BolosController@excluir_cobertura")->name("painel.bolos.cobertura.excluir");
    Route::post("/painel/produtos/bolos/topo/salvar", "BolosController@salvar_topo")->name("painel.bolos.topo.salvar");
    Route::post("/painel/produtos/bolos/topo/atualizar/{id}", "BolosController@atualizar_topo")->name("painel.bolos.topo.atualizar");
    Route::get("/painel/produtos/bolos/topo/excluir/{id}", "BolosController@excluir_topo")->name("painel.bolos.topo.excluir");
    
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

    //Page manager
    Route::get("/painel/page/manager", "PageController@index")->name("painel.page.manager");
    Route::get("/painel/page/manager/sobre", "PageController@sobre")->name("painel.page.manager.sobre");
    Route::post("/painel/page/manager/sobre/salvar", "PageController@salvar_sobre")->name("painel.page.manager.sobre.salvar");
    Route::get("/painel/page/manager/destaques", "PageController@destaques")->name("painel.page.manager.destaques");
    Route::post("/painel/page/manager/destaques/salvar", "PageController@novo_destaque")->name("painel.page.manager.destaques.novo");
    Route::post("/painel/page/manager/destaques/atualizar/{id}", "PageController@atualiza_destaque")->name("painel.page.manager.destaques.atualizar");
    Route::get("/painel/page/manager/destaques/deletar/{id}", "PageController@excluir_destaque")->name("painel.page.manager.destaques.deletar");
    Route::post("/painel/page/manager/categorias/imagem/adicionar/{id}", "PageController@adiciona_imagem_categoria")->name("painel.page.manager.categoria.imagem.adicionar");
    Route::get("/painel/page/manager/categorias/destaque/{id}", "PageController@categoria_destaque")->name("painel.page.manager.categoria.destaque");
    Route::get("/painel/page/manager/galeria", "PageController@galeria")->name("painel.page.manager.galeria");
    Route::post("/painel/page/manager/galeria/adicionar", "PageController@adicionar_foto")->name("painel.page.manager.galeria.adicionar");
    Route::get("/painel/page/manager/galeria/excluir/{id}", "PageController@excluir_foto")->name("painel.page.manager.galeria.excluir");
    Route::get("/painel/page/manager/contato", "PageController@contato")->name("painel.page.manager.contato");
    Route::post("/painel/page/manager/contato/salvar", "PageController@salvar_contato")->name("painel.page.manager.contato.salvar");


});
Route::get("/api/pedidos", "ApiController@pedidos")->name("api.pedidos");


