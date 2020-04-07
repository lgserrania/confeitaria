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
<div class="filemgr-wrapper filemgr-wrapper-two">
    <div class="filemgr-sidebar">

        <div class="filemgr-sidebar-body" style="position: initial;">
            <div class="pd-t-20 pd-b-10 pd-x-10">
                <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Meus
                    pedidos</label>
                <nav class="nav nav-sidebar tx-13">
                    <a href="#" class="nav-link active"><i data-feather="folder"></i> <span>Todos Pedidos</span></a>
                    {{-- <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Bolos</span></a>
                    <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Variados</span></a> --}}
                </nav>
            </div>

        </div><!-- filemgr-sidebar-body -->

    </div><!-- filemgr-sidebar -->

    <div class="filemgr-content">
        <div class="filemgr-content-header">
            <h4 class="mg-b-0">Controle de Pedidos</h4>
        </div><!-- filemgr-content-header -->
        <div class="filemgr-content-body">
            <div class="pd-20 pd-lg-25 pd-xl-30">
                
                <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Tabela
                    de Pedidos</label>
                <div class="row row-xs">

                    <div class="col-12 col-sm-12 col-md-12 col-xl">
                        <div class="card card-file">

                            {{-- <div class="card-body mg-b-20">
                                <div class="d-md-flex align-items-center justify-content-between">
                                    <div class="media align-sm-items-center">
                                        <div class="tx-40 tx-lg-60 lh-0 tx-orange"></div>
                                        <div class="media-body">
                                            <h6 class="tx-12 tx-lg-14 tx-semibold tx-uppercase tx-spacing-1 mg-b-5">
                                                Total Vendido <span class="tx-normal tx-color-03">(Fev)</span></h6>
                                            <div class="d-flex align-items-baseline">
                                                <h2
                                                    class="tx-20 tx-lg-28 tx-normal tx-rubik tx-spacing--2 lh-2 mg-b-0">
                                                    R$ 205,00</h2>
                                                <h6 class="tx-11 tx-lg-16 tx-normal tx-rubik tx-success mg-l-5 lh-2 mg-b-0"
                                                    data-toggle="tooltip" title="Comparação com mês anterior"><i
                                                        class="icon ion-md-arrow-up"></i> 0.2%</h6>

                                            </div>
                                        </div><!-- media-body -->
                                    </div><!-- media -->
                                </div>
                            </div> --}}

                            <div class="card-body">

                                <table id="tab-controle-pedidos" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Pedido</th>
                                            <th scope="col">Data do Pedido</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pedidos as $pedido)
                                            <tr>
                                                <th scope="row">#{{$pedido->id}}</th>
                                                <td>{{date("d/m/Y", strtotime($pedido->created_at))}}</td>
                                                <td>{{$pedido->status}}</td>
                                                <td>{{number_format($pedido->total, 2, ",", ".")}}</td>
                                                <td>
                                                    <nav class="nav d-none d-sm-flex mg-r-auto">
                                                        <div class="flex-fill"><a href="{{route('painel.pedidos.detalhe', ['id' => $pedido->id])}}"
                                                                class="btn btn-xs btn-block btn-white"><i
                                                                    data-feather="eye"></i></a></div>
                                                    </nav><!-- para pedidos ainda não visualizados -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                            <div class="card-footer mg-t-20"><span class="d-none d-sm-inline">Última atualização:
                                </span>2 horas atrás</div>
                        </div>
                    </div><!-- col -->

                </div><!-- row -->

            </div>
        </div><!-- filemgr-content-body -->
    </div><!-- filemgr-content -->
</div><!-- filemgr-wrapper -->
@endsection

@section('extras')
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