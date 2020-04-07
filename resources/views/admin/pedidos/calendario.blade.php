@extends('admin.template.main')

@section('styles')
<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.filemgr.css')}}">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- Calendario -->
<link href="{{asset('admin/lib/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.calendar.css')}}">

@endsection

@section('body-tag')
    class="app-filemgr"
@endsection

@section('conteudo')
<div class="content-body pd-0" style="height:100vh">
    <div id="calendar" class="calendar-content-body"></div>
</div>
</div><!-- content -->

<div class="modal calendar-modal-create fade effect-scale" id="modalCreateEvent" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-20 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-20 mg-sm-b-30">Create New Event</h5>

                <form id="formCalendar" method="post"
                    action="http://themepixels.me/dashforge/template/classic-plus/app-calendar.html">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Add title">
                    </div><!-- form-group -->
                    <div class="form-group d-flex align-items-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input"
                                checked>
                            <label class="custom-control-label" for="customRadio1">Event</label>
                        </div>
                        <div class="custom-control custom-radio mg-l-20">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"
                                checked>
                            <label class="custom-control-label" for="customRadio2">Reminder</label>
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group mg-t-30">
                        <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Start Date</label>
                        <div class="row row-xs">
                            <div class="col-7">
                                <input id="eventStartDate" type="text" value="" class="form-control"
                                    placeholder="Select date">
                            </div><!-- col-7 -->
                            <div class="col-5">
                                <select class="custom-select">
                                    <option selected>Select Time</option>
                                </select>
                            </div><!-- col-5 -->
                        </div><!-- row -->
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">End Date</label>
                        <div class="row row-xs">
                            <div class="col-7">
                                <input id="eventEndDate" type="text" value="" class="form-control"
                                    placeholder="Select date">
                            </div><!-- col-7 -->
                            <div class="col-5">
                                <select class="custom-select">
                                    <option selected>Select Time</option>
                                </select>
                            </div><!-- col-5 -->
                        </div><!-- row -->
                    </div><!-- form-group -->
                    <div class="form-group">
                        <textarea class="form-control" rows="2"
                            placeholder="Write some description (optional)"></textarea>
                    </div><!-- form-group -->
                </form>
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mg-r-5">Add Event</button>
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Discard</a>
            </div><!-- modal-footer -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<div class="modal calendar-modal-event fade effect-scale" id="modalCalendarEvent" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="event-title"></h6>
                <nav class="nav nav-modal-event">
                    <a href="#" class="nav-link" data-dismiss="modal"><i data-feather="x"></i></a>
                </nav>
            </div><!-- modal-header -->
            <div class="modal-body">
                <div class="row row-sm">
                    <div class="col-sm-6">
                        <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Criação do Pedido</label>
                        <p class="event-start-date"></p>
                    </div>
                    <div class="col-sm-6">
                        <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Entrega</label>
                        <p class="event-end-date"></p>
                    </div><!-- col-6 -->
                </div><!-- row -->

                <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Descrição</label>
                <p class="event-desc tx-gray-900 mg-b-40"></p>

                <a href="#" class="btn btn-secondary pd-x-20" data-dismiss="modal">Fechar</a>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection

@section('scripts')


<!-- append theme customizer -->
<script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('admin/js/dashforge.settings.js')}}"></script>
<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin/lib/moment/min/moment.min.js')}}"></script>
<script src="{{asset('admin/lib/fullcalendar/fullcalendar.min.js')}}"></script>
{{-- <script src="{{asset('admin/js/calendar-events.js')}}"></script> --}}
<script>

    var curYear = moment().format('YYYY');
    var curMonth = moment().format('MM');
    var pedidos;
    pedidos = $.ajax({
        type: 'GET',       
        url: "/api/pedidos",
        dataType: 'json',
        context: document.body,
        global: false,
        async:false,
        success: function(data) {
            return data;
        }
    }).responseJSON;
    
    var pedidosBolos = {
        id: 1,
        backgroundColor: 'rgba(1,104,250, .15)',
        borderColor: '#0168fa',
        events: []
    };
    //alert(pedidos.bolos);
    pedidos.forEach(function(pedido){
        var agendamento = null;
        if(pedido.agendamento){
            agendamento = pedido.agendamento;
        }else{
            agendamento = "{!! date("Y-m-d") . "T" !!}";
            agendamento = agendamento + pedido.hora;
        }
        pedidosBolos.events.push({
            id: pedido.id,
            start: pedido.created_at,
            end: agendamento,
            title: pedido.nome + " " + pedido.sobrenome,
            description: "Clique <b><a href='/painel/pedidos/detalhe/" + pedido.id + "'> aqui </a></b> para visualizar os detalhes do pedido"
        });
    });
{{-- 
    pedidos.bolos.forEach(function(bolo){
        //alert(bolo.id);
        if()
        pedidosBolos.events.push({
            id: bolo.id,
            start: bolo.created_at,
            end: bolo.created_at,
            title: "Bolo " + bolo.categoria.nome,
            description: bolo.mensagem
        });
    }); --}}

</script>
<script src="{{asset('admin/js/dashforge.calendar.js')}}"></script>

<script>
    $(function(){
      'use strict'

      $('#calendarSidebarShow').on('click', function(e){
        e.preventDefault()
        $('body').toggleClass('calendar-sidebar-show');

        $(this).addClass('d-none');
        $('#mainMenuOpen').removeClass('d-none');
      })

      $(document).on('click touchstart', function(e){
        e.stopPropagation();

        // closing of sidebar menu when clicking outside of it
        if(!$(e.target).closest('.burger-menu').length) {
          var sb = $(e.target).closest('.calendar-sidebar').length;
          if(!sb) {
            $('body').removeClass('calendar-sidebar-show');

            $('#mainMenuOpen').addClass('d-none');
            $('#calendarSidebarShow').removeClass('d-none');
          }
        }
      });

    })
  </script>
@endsection