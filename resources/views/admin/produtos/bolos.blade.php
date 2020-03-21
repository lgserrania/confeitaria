@extends('admin.template.main')

@section('styles')
<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.filemgr.css')}}">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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


                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Selecione/Adicione os ingredientes que irão aparecer como opção para seus clientes</label>
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
                        <option label="Choose one"></option>
                        <option value="Firefox">Aniversário</option>
                        <option value="Chrome" selected>Casamento</option>
                        <option value="Safari">Evento</option>
                        <option value="Opera">Empresarial</option>
                        <option value="Internet Explorer" selected>Outros</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
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
                        <option label="Choose one"></option>
                        <option value="PP" selected>PP</option>
                        <option value="Firefox" selected>P</option>
                        <option value="Chrome" selected>M</option>
                        <option value="Safari">G</option>
                        <option value="Opera">GG</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
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
                        <option label="Choose one"></option>
                        <option value="Firefox">Quadrado</option>
                        <option value="Chrome" selected>Redondo</option>
                        <option value="Safari">Triangular</option>
                        <option value="Opera">Irregular (Descrição)</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
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
                        <option label="Choose one"></option>
                        <option value="Firefox">Chocolate</option>
                        <option value="Chrome" selected>Baunilia</option>
                        <option value="Safari">Morango</option>
                        <option value="Opera">Cenoura</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
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
                        <option label="Choose one"></option>
                        <option value="Firefox">Brigadeiro</option>
                        <option value="Chrome" selected>Ninho</option>
                        <option value="Safari">Abacaxi</option>
                        <option value="Opera">Doce de Leite</option>
                        <option value="Internet Explorer" selected>Prestigio</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
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
                        <option label="Choose one"></option>
                        <option value="Firefox">Ganache</option>
                        <option value="Chrome" selected>Ninho</option>
                        <option value="Safari">Chocolate Quente</option>
                        <option value="Opera">Glacê</option>
                        <option value="Internet Explorer" selected>Butter Cream</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
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
                        <option label="Choose one"></option>
                        <option value="Firefox">Mickey</option>
                        <option value="Chrome" selected>Frozen</option>
                        <option value="Safari">Barcelona</option>
                        <option value="Opera">Faustão</option>
                        <option value="Internet Explorer" selected>Papel de Arroz</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tags -->






                                <div class="card-footer mg-t-20"><span class="d-none d-sm-inline">Última modificação: </span>2 horas atrás</div>
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



<div class="modal fade effect-scale" id="modalInsertTags" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar novo Ingrediente</h5>

                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Categoria</a></h6>
                    <select class="custom-select">
              <option selected>Escolha uma opção</option>
              <option value="1">Aniversário</option>
              <option value="2">Casamento</option>
              <option value="3">Evento Empresarial</option>
              <option value="4">Outros</option>
            </select>
                </div>

                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Nome do Ingrediente</a></h6>
                    <input type="text" class="form-control" placeholder="Insira o ingrediente aqui">
                </div>

                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Valor do Ingrediente</a></h6>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Insira o o preço aqui">
                    </div>
                </div>
                <style>
                    .salvar {
                        display: flex;
                        align-items: center;
                        justify-content: flex-end;
                        padding: 1rem;
                    }
                </style>
                <div class="salvar">
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>

                <hr>
                <!-- Linha de divisão -->
                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Ingredientes Existentes</a></h6>

                    <ul class="list-group">
                        <li class="list-group-item">PP</li>
                        <li class="list-group-item">P</li>
                        <li class="list-group-item">M</li>
                        <li class="list-group-item">G</li>
                        <li class="list-group-item">GG</li>
                    </ul>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
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