@extends('admin.template.main')

@section('styles')
<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.filemgr.css')}}">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    .salvar {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding: 1rem;
    }
</style>
@endsection

@section('conteudo')
<div class="content-body pd-0">
    <div class="filemgr-wrapper filemgr-wrapper-two">

        <div class="filemgr-content" style="left:0">
            <div class="filemgr-content-header">
                <h4 class="mg-b-0">Adicionar ingredientes</h4>

                <nav class="nav d-none d-sm-flex mg-r-auto mg-l-15">
                    <div class="flex-fill mg-l-10">
                        <button class="btn btn-xs btn-block btn-primary">Salvar</button>
                    </div>
                </nav>

            </div>
            <!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">


                    <label
                        class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Selecione/Adicione
                        os ingredientes que irão aparecer como opção para seus clientes</label>
                    <div class="row row-xs">

                        <div class="col-6 col-sm-4 col-md-3 col-xl">
                            <div class="card card-file">


                                <!-- start tags  -->
                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Categorias</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                                            @foreach(App\Categoria::all() as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#modalInsereCategoria" type="button" id="button-addon2">Adicionar Categoria</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->

                                <!-- start tags  -->
                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Tamanhos</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                                            @foreach(App\Tamanho::all() as $tamanho)
                                                <option value="{{$tamanho->id}}">{{$tamanho->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#modalInsereTamanho" type="button" id="button-addon2">Adicionar Tamanho</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->

                                <!-- start tags  -->
                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Formatos</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                                            @foreach(App\Formato::all() as $formato)
                                                <option value="{{$formato->id}}">{{$formato->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#modalInsereFormato" type="button" id="button-addon2">Adicionar Formato</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->

                                <!-- start tags  -->
                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Tipos de Massa</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                                            @foreach(App\Massa::all() as $massa)
                                                <option value="{{$massa->id}}">{{$massa->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#modalInsereMassa" type="button" id="button-addon2">Adicionar Massa</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->

                                <!-- start tags  -->
                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Tipos de Recheio</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                                            @foreach(App\Recheio::all() as $recheio)
                                                <option value="{{$recheio->id}}">{{$recheio->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#modalInsereRecheio" type="button" id="button-addon2">Adicionar Recheio</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->

                                <!-- start tags  -->
                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Coberturas</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                                            @foreach(App\Cobertura::all() as $cobertura)
                                                <option value="{{$cobertura->id}}">{{$cobertura->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#modalInsereCobertura" type="button" id="button-addon2">Adicionar Cobertura</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->

                                <!-- start tags  -->
                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Alguns topos de Bolo</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                                            @foreach(App\Topo::all() as $topo)
                                                <option value="{{$topo->id}}">{{$topo->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#modalInsereTopo" type="button" id="button-addon2">Adicionar Topo</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->
                            </div>
                        </div>
                        <!-- col -->

                    </div>
                    <!-- row -->


                </div>
            </div>
            <!-- filemgr-content-body -->
        </div>
        <!-- filemgr-content -->

    </div>
    <!-- filemgr-wrapper -->
</div>
</div>
<!-- content -->
<div class="modal fade effect-scale" id="modalInsereCategoria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body pd-20 pd-sm-30">
                <form action="{{route('painel.bolos.categoria.salvar')}}" method="POST">
                    @csrf
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Nova Categoria</h5>
                    <div class="card-body">
                        <h6><a class="link-02 mg-b-10">Nome da Categoria</a></h6>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: Casamento">
                    </div>
                    <div class="salvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade effect-scale" id="modalInsereTamanho" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body pd-20 pd-sm-30">
                <form action="{{route('painel.bolos.tamanho.salvar')}}" method="POST">
                    @csrf
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Novo Tamanho</h5>
                    <div class="card-body">
                        <h6><a class="link-02 mg-b-10">Identificador do Tamanho</a></h6>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: PP">
                        <br>
                        <h6><a class="link-02 mg-b-10">Preço</a></h6>
                        <input type="text" class="form-control" name="preco" placeholder="Ex: 30.00">
                    </div>
                    <div class="salvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade effect-scale" id="modalInsereFormato" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body pd-20 pd-sm-30">
                <form action="{{route('painel.bolos.formato.salvar')}}" method="POST">
                    @csrf
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Novo Formato</h5>
                    <div class="card-body">
                        <h6><a class="link-02 mg-b-10">Identificador do Formato</a></h6>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: PP">
                        <br>
                        <h6><a class="link-02 mg-b-10">Preço</a></h6>
                        <input type="text" class="form-control" name="preco" placeholder="Ex: 30.00">
                    </div>
                    <div class="salvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade effect-scale" id="modalInsereMassa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body pd-20 pd-sm-30">
                <form action="{{route('painel.bolos.massa.salvar')}}" method="POST">
                    @csrf
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Nova Massa</h5>
                    <div class="card-body">
                        <h6><a class="link-02 mg-b-10">Identificador do Massa</a></h6>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: Bolacha Maizena">
                        <br>
                        <h6><a class="link-02 mg-b-10">Preço</a></h6>
                        <input type="text" class="form-control" name="preco" placeholder="Ex: 30.00">
                    </div>
                    <div class="salvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade effect-scale" id="modalInsereRecheio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body pd-20 pd-sm-30">
                <form action="{{route('painel.bolos.recheio.salvar')}}" method="POST">
                    @csrf
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Novo Recheio</h5>
                    <div class="card-body">
                        <h6><a class="link-02 mg-b-10">Identificador do Recheio</a></h6>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: Chocolate">
                        <br>
                        <h6><a class="link-02 mg-b-10">Preço</a></h6>
                        <input type="text" class="form-control" name="preco" placeholder="Ex: 30.00">
                    </div>
                    <div class="salvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade effect-scale" id="modalInsereCobertura" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body pd-20 pd-sm-30">
                <form action="{{route('painel.bolos.cobertura.salvar')}}" method="POST">
                    @csrf
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Nova Cobertura</h5>
                    <div class="card-body">
                        <h6><a class="link-02 mg-b-10">Identificador da Cobertura</a></h6>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: Chocolate">
                        <br>
                        <h6><a class="link-02 mg-b-10">Preço</a></h6>
                        <input type="text" class="form-control" name="preco" placeholder="Ex: 30.00">
                    </div>
                    <div class="salvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade effect-scale" id="modalInsereTopo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body pd-20 pd-sm-30">
                <form action="{{route('painel.bolos.topo.salvar')}}" method="POST">
                    @csrf
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Novo Topo</h5>
                    <div class="card-body">
                        <h6><a class="link-02 mg-b-10">Identificador do Topo</a></h6>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: Mickey">
                        <br>
                        <h6><a class="link-02 mg-b-10">Preço</a></h6>
                        <input type="text" class="form-control" name="preco" placeholder="Ex: 30.00">
                    </div>
                    <div class="salvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<!-- modal -->
@endsection

@section('scripts')

<script src="{{asset('admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/dashforge.filemgr.js')}}"></script>

<!-- append theme customizer -->
<script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('admin/js/dashforge.settings.js')}}"></script>
<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>

<script>
    $(function(){
      'use strict'

      $('#tab-controle-pedidos').DataTable({
        language: {
          searchPlaceholder: 'Pesquisar...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>

  <script>
    'use strict'

    $(document).ready(function(){
      if(window.matchMedia('(min-width: 1200px)').matches) {
        $('.aside').addClass('minimize');
      }
    })
  </script>
@endsection