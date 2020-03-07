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

@section('body-tag')
    class="app-filemgr"
@endsection

@section('conteudo')
<div class="content-body pd-0">
    <div class="filemgr-wrapper filemgr-wrapper-two">

        <div class="filemgr-content" style="left: 0 !important;">
            <div class="filemgr-content-header">
                <h4 class="mg-b-0">Calculadora de Custos</h4>

            </div><!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">

                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Insira
                        os dados e calcule</label>
                    <div class="row row-xs">

                        <div class="col-12 col-sm-12 col-md-12 col-xl">
                            <div class="card card-file">

                                <div class="card-body mg-b-20">
                                    <div class="d-md-flex align-items-center justify-content-between">
                                        <div class="media align-sm-items-center">
                                            <div class="tx-40 tx-lg-60 lh-0 tx-orange"></div>
                                            <div class="media-body">
                                                <h6 class="tx-12 tx-lg-14 tx-semibold tx-uppercase tx-spacing-1 mg-b-5">
                                                    Valor de Venda da Receita</h6>
                                                <div class="d-flex align-items-baseline mg-t-10">
                                                    <input type="text" class="form-control" value="R$ 16,00"
                                                        placeholder="Ex: R$ 16,00">
                                                </div>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media align-sm-items-center">
                                            <div class="tx-40 tx-lg-60 lh-0 tx-orange"></div>
                                            <div class="media-body">
                                                <h6 class="tx-12 tx-lg-14 tx-semibold tx-uppercase tx-spacing-1 mg-b-5">
                                                    Custo Total Unitário</h6>
                                                <div class="d-flex align-items-baseline">
                                                    <h2
                                                        class="tx-20 tx-lg-28 tx-normal tx-rubik tx-spacing--2 lh-2 mg-b-0">
                                                        R$ 4,10</h2>
                                                    <h6 class="tx-11 tx-lg-16 tx-normal tx-rubik tx-success mg-l-5 lh-2 mg-b-0"
                                                        data-toggle="tooltip"
                                                        title="% Lucro em relação ao Valor de Venda da Receita"><i
                                                            class="icon ion-md-arrow-up"></i> 60%</h6>
                                                </div>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="d-flex flex-column flex-sm-row mg-t-20 mg-md-t-0">
                                            <button class="btn btn-sm btn-white btn-uppercase pd-x-15"><i
                                                    data-feather="download" class="mg-r-5"></i> Exportar Custo</button>
                                            <button class="btn btn-sm btn-primary btn-uppercase pd-x-15 mg-l-10"> Como
                                                Funciona</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <table id="tab-controle-pedidos" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ingrediente</th>
                                                <th scope="col">Preço Prod.</th>
                                                <th scope="col">Quant. Total</th>
                                                <th scope="col">Quant. Usada</th>
                                                <th scope="col">Custo</th>
                                                <th scope="col">Uso %</th>
                                                <th scope="col">Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Leite</th>
                                                <td>R$ 3,00</td>
                                                <td>1000</td>
                                                <td>200</td>
                                                <td>R$ 0,60</td>
                                                <td>20%</td>
                                                <td>
                                                    <nav class="nav d-none d-sm-flex mg-r-auto">
                                                        <div class="flex-fill"><a href="prod-pedidos-detalhes.php"
                                                                class="btn btn-xs btn-block btn-danger"><i
                                                                    data-feather="trash"></i></a></div>
                                                    </nav><!-- para pedidos ainda não visualizados -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Farinha</th>
                                                <td>R$ 5,00</td>
                                                <td>1000</td>
                                                <td>500</td>
                                                <td>R$ 2,50</td>
                                                <td>50%</td>
                                                <td>
                                                    <nav class="nav d-none d-sm-flex mg-r-auto">
                                                        <div class="flex-fill"><a href="prod-pedidos-detalhes.php"
                                                                class="btn btn-xs btn-block btn-danger"><i
                                                                    data-feather="trash"></i></a></div>
                                                    </nav><!-- para pedidos ainda não visualizados -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ovo</th>
                                                <td>R$ 10,00</td>
                                                <td>30</td>
                                                <td>3</td>
                                                <td>R$ 1,00</td>
                                                <td>10%</td>
                                                <td>
                                                    <nav class="nav d-none d-sm-flex mg-r-auto">
                                                        <div class="flex-fill"><a href="prod-pedidos-detalhes.php"
                                                                class="btn btn-xs btn-block btn-danger"><i
                                                                    data-feather="trash"></i></a></div>
                                                    </nav><!-- para pedidos ainda não visualizados -->
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>

                                <div class="card-body">
                                    <h6><a class="link-02 mg-b-10">Insira os ingredientes</a></h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Ingrediente 1</span>
                                        </div>
                                        <input type="text" aria-label="Produto" class="form-control"
                                            placeholder="Ingrediente">
                                        <input type="text" aria-label="Preço" class="form-control"
                                            placeholder="Preço Produto">
                                        <input type="text" aria-label="Quantidade Total" class="form-control"
                                            placeholder="Quantidade da Embalagem">
                                        <input type="text" aria-label="Quantidade Usada" class="form-control"
                                            placeholder="Quantidade Usada">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button"
                                                id="button-addon2">Adicionar</button>
                                        </div>
                                    </div>
                                </div>



                                <div class="card-footer mg-t-20"></div>
                            </div>
                        </div><!-- col -->

                    </div><!-- row -->

                </div>
            </div><!-- filemgr-content-body -->
        </div><!-- filemgr-content -->

    </div><!-- filemgr-wrapper -->
</div>
</div><!-- content -->

<div class="modal fade effect-scale" id="modalViewDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Detalhes</h5>

                <div class="row mg-b-10">
                    <div class="col-4">Nome do Arquivo:</div>
                    <div class="col-8">Medical Certificate.pdf</div>
                </div><!-- row -->
                <div class="row mg-b-10">
                    <div class="col-4">Tipo do Arquivo:</div>
                    <div class="col-8">PDF File</div>
                </div><!-- row -->
                <div class="row mg-b-10">
                    <div class="col-4">Peso do Arquivo:</div>
                    <div class="col-8">10.45 KB</div>
                </div><!-- row -->
                <div class="row mg-b-10">
                    <div class="col-4">Upload:</div>
                    <div class="col-7">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Escolha o Arquivo</label>
                    </div>
                </div><!-- row -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
            </div><!-- modal-footer -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


<div class="modal fade effect-scale" id="modalInsertTags" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Tags</h5>

                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Nova Tag</a></h6>
                    <input type="text" class="form-control" placeholder="Insira a Tag aqui">
                </div>
                <hr> <!-- Linha de divisão -->
                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Tags Existentes</a></h6>

                    <ul class="list-group">
                        <li class="list-group-item">Chrome</li>
                        <li class="list-group-item">Safari</li>
                        <li class="list-group-item">Internet Explorer</li>
                        <li class="list-group-item">Firefox</li>
                        <li class="list-group-item">Opera</li>
                        <li class="list-group-item">Chrome</li>
                        <li class="list-group-item">Safari</li>
                        <li class="list-group-item">Internet Explorer</li>
                        <li class="list-group-item">Firefox</li>
                        <li class="list-group-item">Opera</li>
                    </ul>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
            </div><!-- modal-footer -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
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
          lengthMenu: '_MENU_ itens/pagina',
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