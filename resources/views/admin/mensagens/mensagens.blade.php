@extends('admin.template.main')

@section('styles')
<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link href="{{asset('admin/lib/quill/quill.core.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/quill/quill.snow.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.mail.css')}}">
@endsection

@section('conteudo')
<div class="content-body pd-0">
    <div class="mail-wrapper mail-wrapper-two">
        <div class="mail-sidebar">
            <div class="mail-sidebar-body">
                <div class="pd-b-10 pd-x-10 mg-t-20">
                    <nav class="nav nav-sidebar tx-13">
                        <a href="#" class="nav-link active"><i data-feather="inbox"></i> <span>Todas</span> <span
                                class="badge">20</span></a>
                        <a href="#" class="nav-link"><i data-feather="check-square"></i> <span>Lidas</span> <span
                                class="badge">18</span></a>
                        <a href="#" class="nav-link"><i data-feather="slash"></i> <span>Não Lidas</span> <span
                                class="badge">2</span></a>
                    </nav>
                </div>

                <div class="pd-10">
                    <label
                        class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Categorias</label>
                    <nav class="nav nav-sidebar tx-13">
                        <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Dúvidas</span><span
                                class="badge">10</span></a>
                        <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Parcerias</span><span
                                class="badge">5</span></a>
                        <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Reclamações</span><span
                                class="badge">0</span></a>
                        <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Outros</span><span
                                class="badge">5</span></a>
                    </nav>
                </div>

            </div><!-- mail-sidebar-body -->
        </div><!-- mail-sidebar -->

        <div class="mail-group">
            <div class="mail-group-header justify-content-between">
                <h6 class="tx-uppercase tx-semibold mg-b-0">Mensagens</h6>
            </div><!-- mail-group-header -->
            <div class="mail-group-body">

                <label class="mail-group-label">Hoje</label>
                <ul class="list-unstyled media-list mg-b-0">
                    <li class="media unread">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo">d</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Nome da pessoa</span>
                                <span class="tx-11">1:20pm</span>
                            </div>
                            <h6 class="tx-13">Assunto aqui</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Prévia da mensagem aqui tambem. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-pink">P</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Reynante Labares</span>
                                <span class="tx-11">11:40am</span>
                            </div>
                            <h6 class="tx-13">30 Seconds Survey to Your Next Job</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-800">r</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Rolando Paloso</span>
                                <span class="tx-11">10:54am</span>
                            </div>
                            <h6 class="tx-13">Watch, Listen and Play Longer</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-pink">P</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Socrates Itumay</span>
                                <span class="tx-11">09:50am</span>
                            </div>
                            <h6 class="tx-13">Pre-Order Sale: Mastering CSS</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                </ul>
                <label class="mail-group-label">08 Janeiro 2020</label>
                <ul class="list-unstyled media-list mg-b-0">
                    <li class="media">
                        <div class="avatar"><img src="../../assets/img/img8.jpg" class="rounded-circle" alt=""></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Yassi Pressman</span>
                                <span class="tx-11">8:20pm</span>
                            </div>
                            <h6 class="tx-13">Envato Contributor Payment</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis
                                natoqu</p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media unread">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-teal">i</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Isidore Dilao</span>
                                <span class="tx-11">06:42pm</span>
                            </div>
                            <h6 class="tx-13">America's Best Dance Cruise</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                </ul>
                <label class="mail-group-label">02 Janeiro 2020</label>
                <ul class="list-unstyled media-list mg-b-0">
                    <li class="media">
                        <div class="avatar"><img src="../../assets/img/img10.jpg" class="rounded-circle" alt=""></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Dexter Dela Cruz</span>
                                <span class="tx-11">4:18pm</span>
                            </div>
                            <h6 class="tx-13">A Flaming Pile of Garbage</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis
                                natoqu</p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-primary">a</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Adrian Monino</span>
                                <span class="tx-11">06:42pm</span>
                            </div>
                            <h6 class="tx-13">America's Best Dance Cruise</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                </ul>
                <label class="mail-group-label">10 Dezembro 2019</label>
                <ul class="list-unstyled media-list mg-b-0">
                    <li class="media">
                        <div class="avatar"><img src="../../assets/img/img9.jpg" class="rounded-circle" alt=""></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Annie Christensen</span>
                                <span class="tx-11">7:26pm</span>
                            </div>
                            <h6 class="tx-13">Just asking questions</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis
                                natoqu</p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-primary">a</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Adrian Monino</span>
                                <span class="tx-11">06:42pm</span>
                            </div>
                            <h6 class="tx-13">Watch, Listen and Play Longer</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media">
                        <div class="avatar"><img src="../../assets/img/img7.jpg" class="rounded-circle" alt=""></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Robert Restificar</span>
                                <span class="tx-11">12:01pm</span>
                            </div>
                            <h6 class="tx-13">Envato Contributor Payment</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis
                                natoqu</p>
                        </div><!-- media-body -->
                    </li>
                    <li class="media">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-purple">r</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">Raymart Serencio</span>
                                <span class="tx-11">10:13am</span>
                            </div>
                            <h6 class="tx-13">Sale: Javascript Beginners</h6>
                            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum
                                sociis natoque </p>
                        </div><!-- media-body -->
                    </li>
                </ul>
                <div class="pd-t-1 pd-b-5 pd-x-5">
                    <a href="#"
                        class="btn btn-xs btn-block btn-light bd-0 tx-uppercase tx-10 tx-spacing-1 tx-medium mn-ht-0">Carregar
                        mais</a>
                </div>
            </div><!-- mail-group-body -->
        </div><!-- mail-group -->

        <div class="mail-content">
            <div class="mail-content-header d-none">
                <a href="#" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i
                        data-feather="arrow-left"></i></a>
                <div class="media">
                    <div class="avatar avatar-sm"><img src="../../assets/img/img7.jpg" class="rounded-circle" alt="">
                    </div>
                    <div class="media-body mg-l-10">
                        <h6 class="mg-b-2 tx-13">Nome da pessoa</h6>
                        <span class="d-block tx-11 tx-color-03">Hoje, 11:40</span>
                    </div><!-- media-body -->
                </div><!-- media -->
                <nav class="nav nav-icon-only mg-l-auto">
                    <a href="#" data-toggle="tooltip" title="Marcar como lida" class="nav-link d-none d-sm-block"><i
                            data-feather="check-square"></i></a>
                    <a href="#" data-toggle="tooltip" title="Marcar não lida" class="nav-link d-none d-sm-block"><i
                            data-feather="slash"></i></a>
                    <a href="#" data-toggle="tooltip" title="Enviar email" class="nav-link d-none d-sm-block"><i
                            data-feather="mail"></i></a>
                    <span class="nav-divider d-none d-sm-block"></span>
                    <a href="#" data-toggle="tooltip" title="Favoritar Contato" class="nav-link d-none d-sm-block"><i
                            data-feather="star"></i></a>
                    <a href="#" data-toggle="tooltip" title="Apagar" class="nav-link d-none d-sm-block"><i
                            data-feather="trash"></i></a>
                    <a href="#" data-toggle="tooltip" title="Imprimir" class="nav-link d-none d-sm-block"><i
                            data-feather="printer"></i></a>
                </nav>
            </div><!-- mail-content-header -->
            <div class="mail-content-body d-none">
                <div class="pd-20 pd-lg-25 pd-xl-30">
                    <h5 class="mg-b-30">Assunto da Mensagem aqui</h5>

                    <h6 class="tx-semibold mg-b-0">Nome</h6>
                    <p class="tx-color-03">Nome da pessoa</p>

                    <h6 class="tx-semibold mg-b-0">Telefone</h6>
                    <p class="tx-color-03">(35) 9 9898-9898</p>


                    <h6 class="tx-semibold mg-b-0">Mensagem</h6>
                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                        enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus
                        ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer
                        tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean
                        leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in,
                        viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque
                        rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                        Nam eget dui. </p>
                    <p>
                        <span>Sincerely yours,</span><br>
                        <strong>Envato Design Team</strong>
                    </p>
                </div>
            </div><!-- mail-content-body -->
        </div><!-- mail-content -->
    </div><!-- mail-wrapper -->
</div>
@endsection

@section('scripts')
<script src="{{asset('admin/quill/quill.min.js')}}"></script>
<script src="{{asset('admin/js/dashforge.mail.js')}}"></script>
<!-- append theme customizer -->
<script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('admin/js/dashforge.settings.js')}}"></script>
<script>
    'use strict'

    $(document).ready(function(){
      if(window.matchMedia('(min-width: 1200px)').matches) {
        $('.aside').addClass('minimize');
      }
    })
</script>
@endsection