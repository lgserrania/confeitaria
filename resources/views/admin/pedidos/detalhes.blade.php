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
            <h4 class="mg-b-0">N° Pedido #{{$pedido->id}} - Total: R$ {{number_format($pedido->total, 2,",", ".")}} </h4>

            <nav class="nav d-none d-sm-flex mg-r-auto mg-l-15">
                <div class="dropdown dropdown-icon flex-fill mg-l-15">
                  <button class="btn btn-xs btn-block btn-white" data-toggle="dropdown">Mudar Status <i data-feather="chevron-down"></i></button>
                  <div class="dropdown-menu tx-13">
                    <a href="{{route('painel.pedidos.status.mudar', ['id' => $pedido->id, 'status' => 'Em Produção'])}}" class="dropdown-item details"><i data-feather="package"></i><span>Em Produção</span></a>
                    <a href="{{route('painel.pedidos.status.mudar', ['id' => $pedido->id, 'status' => 'Feito'])}}" class="dropdown-item details"><i data-feather="thumbs-up"></i><span>Feito</span></a>
                    <a href="{{route('painel.pedidos.status.mudar', ['id' => $pedido->id, 'status' => 'Entregue'])}}" class="dropdown-item details"><i data-feather="check-square"></i><span>Entregue</span></a>
                  </div>
                </div>
            </nav>

          </div><!-- filemgr-content-header -->
          <div class="filemgr-content-body">
            <div class="pd-20 pd-lg-25 pd-xl-30">

              <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Informações Gerais</label>
              <div class="row row-xs">

                <div class="col-12 col-sm-12 col-md-12 col-xl">
                  <div class="card">

                    <div class="card-body">

                      <div class="content-body">
                        <div class="container pd-x-0 tx-13">
                          <div class="media d-block d-lg-flex">
                            <div class="profile-sidebar profile-sidebar-two pd-lg-r-15">

                              <div class="row">
                                
                                <div class="col-sm-8 col-md-4 col-lg-12 mg-t-20 mg-sm-t-0">

                                  <div class="d-flex mg-b-25">
                                    <div class="profile-skillset flex-fill">
                                      <h4><a href="app-contatos.php" class="link-01">{{$pedido->nome . " " . $pedido->sobrenome}}</a></h4>
                                      {{-- <label>Cód. Cliente: #12345678</label> --}}
                                    </div>
                                  </div>

                                  <div class="d-flex mg-b-25">
                                    <button class="btn btn-xs btn-success flex-fill">{{$pedido->status}}</button>
                                  </div>

                                  <div class="mg-b-25">
                                    <h5 class="mg-b-2 tx-spacing--1">{{date("d/m/Y - H:i:s", strtotime($pedido->created_at))}}</h5>
                                    <p class="tx-color-03">Data/Hora da compra</p>
                                  </div>

                                  <div class="mg-b-25">
                                    <h5 class="mg-b-2 tx-spacing--1">@if($pedido->agendamento){{date("d/m/Y - H:i:s", strtotime($pedido->agendamento))}} @else Hoje às {{$pedido->hora}} @endif</h5>
                                    <p class="tx-color-03">Data/Hora para Entrega</p>
                                  </div>

                                </div><!-- col -->

                                
                                <div class="col-sm-6 col-md-4 col-lg-12 mg-t-40">
                                  <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Detalhes para Entrega</label>
                                  <ul class="list-unstyled profile-info-list">
                                    <li><i data-feather="map-pin"></i>{{$pedido->endereco}}</li>
                                    {{-- <li><i data-feather="map"></i>Por do Sol II, Alfenas/MG<br>CEP: 37130-000</li> --}}
                                    <li><i data-feather="smartphone"></i> <a href="#">{{$pedido->telefone}}</a></li>
                                    {{-- <li><i data-feather="phone"></i> <a href="#">+55 35 99898-9898</a></li> --}}
                                    {{-- <li><i data-feather="bookmark"></i><span class="tx-color-03">Ligar antes de entregar</span></li> --}}
                                  </ul>
                                </div><!-- col -->

                                <div class="col-sm-6 col-md-4 col-lg-12 mg-t-40">
                                  <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Informações cliente</label>
                                  <ul class="list-unstyled profile-info-list">
                                    <li><i data-feather="user"></i>{{$pedido->nome}}</li>
                                    <li><i data-feather="tag"></i>CPF: {{$pedido->cpf}}</li>
                                    <li><i data-feather="mail"></i>{{$pedido->email}}</li>
                                  </ul>
                                </div><!-- col -->
                              </div><!-- row -->

                            </div><!-- profile-sidebar -->
                            <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">

                              
                              @foreach(\App\BoloPedido::where("pedido_id",$pedido->id)->get() as $bolo)
                              <div class="card mg-b-20 mg-lg-b-25">
                                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                                  <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">Detalhes do pedido - Produto: #{{$bolo->id}}</h6>
                                  <nav class="nav nav-with-icon tx-13">
                                    {{-- <a href="#" class="nav-link">Ver Ordens de Pedido</a> --}}
                                  </nav>
                                </div><!-- card-header -->
                                <div class="card-body pd-25">
                                  <div class="media d-block d-sm-flex">
                                    <div class="media-body pd-t-25 pd-sm-t-0">
                                      <h5 class="mg-b-5">Bolo Personalizado</h5>
                                      <span class="d-block tx-13 tx-color-03">Cód. Produto: #{{$bolo->id}}</span>

                                      <ul class="steps steps-vertical mg-t-20">
                                        <li class="step-item active">
                                          <a href="#" class="step-link">
                                            <span class="step-number">1</span>
                                            <span class="step-title">Descrição</span>
                                          </a>
                                          <ul>
                                            <li><a>Categoria: {{$bolo->categoria->nome}}</a></li>
                                            {{-- <li><a>Para 20 Pessoas</a></li> --}}
                                            <li><a>Tamanho: {{$bolo->tamanho->nome}}</a></li>
                                            <li><a>Formato {{$bolo->formato->nome}}</a></li>
                                          </ul>
                                        </li>
                                        <li class="step-item active">
                                          <a href="#" class="step-link">
                                            <span class="step-number">2</span>
                                            <span class="step-title">Opções</span>
                                          </a>
                                          <ul>
											<li><a>Massa: {{$bolo->massa->nome}}</a></li>
											@foreach($bolo->recheios as $recheio)
												<li><a> - Recheio {{$recheio->recheio->nome}}</a></li>
											@endforeach
                                            <li><a>Cobertura Ganache</a></li>
                                          </ul>
                                        </li>
                                        <li class="step-item active">
                                          <a href="#" class="step-link">
                                            <span class="step-number">3</span>
                                            <span class="step-title">Decoração</span>
                                          </a>
                                          <ul>
                                            <li><a>Topo de bolo - {{$bolo->topo->nome}}</a></li>
                                          </ul>
                                        </li>
                                      </ul>
                                    </div>
                                  </div><!-- media -->
                                </div>
                              </div><!-- card -->
							  @endforeach
							  @foreach(\App\ProdutoPedido::where("pedido_id",$pedido->id)->get() as $pedido)
								<div class="card mg-b-20 mg-lg-b-25">
									<div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
									<h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">Detalhes do pedido - Produto: #{{$pedido->id}}</h6>
									</div><!-- card-header -->
									<div class="card-body pd-25">
									<div class="media d-block d-sm-flex">
										<div class="media-body pd-t-25 pd-sm-t-0">
										<h5 class="mg-b-5">{{$pedido->produto->nome}}</h5>
										<span class="d-block tx-13 tx-color-03">Cód. Produto: #{{$pedido->produto->id}}</span>

										<ul class="steps steps-vertical mg-t-20">
											<li class="step-item active">
											<a href="#" class="step-link">
												<span class="step-number">1</span>
												<span class="step-title">Descrição</span>
											</a>
											<ul>
												<li><a>Categoria: {{$pedido->produto->categoria->nome}}</a></li>
												{{-- <li><a>Total de 20 Unid.</a></li> --}}
												<li><a>Sabor: {{$pedido->produto->sabor->nome}}</a></li>
												<li><a>Tamanho: {{$pedido->produto->tamanho->nome}}</a></li>
											</ul>
											</li>
											
										</ul>
										</div>
									</div><!-- media -->
									</div>
								</div><!-- card -->
							  @endforeach
                              
                              </div><!-- media-body -->

                          </div> 
                        </div>   
                      </div> 

                    </div>              

                    <div class="card-file"><div class="card-footer"><span class="d-none d-sm-inline">Última atualização: </span>2 horas atrás</div></div>
                  </div>
                </div><!-- col -->
                
              </div><!-- row -->

            </div>
          </div><!-- filemgr-content-body -->
        </div><!-- filemgr-content -->

      </div><!-- filemgr-wrapper -->
    </div>
  </div><!-- content -->
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
    'use strict'

    $(document).ready(function(){
      if(window.matchMedia('(min-width: 1200px)').matches) {
        $('.aside').addClass('minimize');
      }
    })
  </script>

  <script>
     
      $(function(){
        'use strict'

        // Basic with search
        $('.select2').select2({
          placeholder: 'Choose one',
          searchInputPlaceholder: 'Search options'
        });

      });
    </script>

@endsection
