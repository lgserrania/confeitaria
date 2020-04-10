$(function(){

  'use strict'

  $('[data-toggle="tooltip"]').tooltip();

  // set active contact from list to show in desktop view by default
  if(window.matchMedia('(min-width: 992px)').matches) {
    $('.contact-list .media:first-of-type').addClass('active');
  }


  const contactSidebar = new PerfectScrollbar('.contact-sidebar-body', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.contact-content-body', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.contact-content-sidebar', {
    suppressScrollX: true
  });

  $('.contact-navleft .nav-link').on('shown.bs.tab', function(e) {
    contactSidebar.update()
  })

  // UI INTERACTION
  $('.contact-list .media').on('click', function(e) {
    e.preventDefault();

    $('.contact-list .media').removeClass('active');
    $(this).addClass('active');
    $('#contact-body').removeClass('d-none');
    var cName = $(this).find('h6').text();
    $('#contactName').text(cName);

    var cAvatar = $(this).find('.avatar').clone();

    cAvatar.removeClass (function (index, className) {
      return (className.match (/(^|\s)avatar-\S+/g) || []).join(' ');
    });
    cAvatar.addClass('avatar-xl');

    $('#contactAvatar .avatar').replaceWith(cAvatar);

    var elements = $(this).children("input");
    var qtd = elements.length

    $('#nome').html(elements[0].value);
    $('#empresa').html(elements[1].value);
    $('#email').html(elements[2].value);
    $('#whatsapp').html(elements[3].value);
    $('#telefone').html(elements[4].value);
    $('#endereco').html(elements[5].value + ", " + elements[6].value + " - " + elements[7].value + " - " + elements[8].value);
    $('#id').html(elements[9].value);
    $('#notas').html(elements[13].value);
    $('#deletar').attr("href", "/painel/clientes/deletar/" + elements[9].value);

    $('#edtNome').val(elements[0].value);
    $('#edtEmpresa').val(elements[1].value);
    $('#edtEmail').val(elements[2].value);
    $('#edtWhatsapp').val(elements[3].value);
    $('#edtTelefone').val(elements[4].value);
    $('#edtRua').val(elements[5].value);
    $('#edtNumero').val(elements[6].value);
    $('#edtCidade').val(elements[7].value);
    $('#edtEstado').val(elements[8].value);
    $('#edtFacebook').val(elements[10].value);
    $('#edtInstagram').val(elements[11].value);
    $('#edtLinkedin').val(elements[12].value);
    $('#edtNotas').val(elements[13].value);
    $('#formEdita').attr("action", "/painel/clientes/atualizar/" + elements[9].value);
    // showing contact information when clicking one of the list
    // for mobile interaction only
    if(window.matchMedia('(max-width: 991px)').matches) {
      $('body').addClass('contact-content-show');
      $('body').removeClass('contact-content-visible');

      $('#mainMenuOpen').addClass('d-none');
      $('#contactContentHide').removeClass('d-none');
    }
  })


  // going back to contact list
  // for mobile interaction only
  $('#contactContentHide').on('click touch', function(e){
    e.preventDefault();

    $('body').removeClass('contact-content-show contact-options-show');
    $('body').addClass('contact-content-visible');

    $('#mainMenuOpen').removeClass('d-none');
    $(this).addClass('d-none');
  });

  $('#contactOptions').on('click', function(e){
    e.preventDefault();
    $('body').toggleClass('contact-options-show');
  })

  $(window).resize(function(){
    $('body').removeClass('contact-options-show');
  })

})
