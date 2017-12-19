$(document).ready(function(){

    // $("[data-table]").each(function(){
    //   var $allId = $(this).find("[data-id]");
    //   $allId.click(function() {
    //     var id = ($(this).data('id'));
    //     window.location.href = "formularios/"+id+"/";
    //   })
    // });

    $("[data-table]").each(function(){
      var $allMes = $(this).find("[data-mes]");
      $allMes.click(function() {
        var mes = ($(this).data('mes'));
        window.location.href = "reembolso/"+mes+"/";
      })
    });

    //Pega todos os data-table que possuem o data-num
    $("[data-table]").each(function(){
      var $allNum = $(this).find("[data-num]");

      //Pega o evento de clique na tabela e direciona para a página de detalhe do
      //Funcionário selecionado
      $allNum.click(function() {
        var id = ($(this).data('num'));
        var nome = ($(this).data('funcionario'));
        window.location.href = "reembolso/"+id+"/"+nome+"/";
      })
    });

    $("[data-table]").each(function(){
      var $allIdFunc = $(this).find("[data-func]");


      $allIdFunc.click(function() {
        var id = ($(this).data('func'));
        var nome = ($(this).data('nome'));
        window.location.href = "funcionarios/"+id+"/"+nome+"/";
      })
    });

    // Pega o valor do mes na tabela e redireciona para a função que vai tratar essa cituação
    $("[data-table]").each(function(){
      var $allMes = $(this).find("[data-mes-relatorio]");
      $allMes.click(function() {
        var mes = ($(this).data('mes-relatorio'));
        window.location.href = "relatorio/"+mes+"/";
      })
    });

    $("[data-table]").each(function(){
      var $allNum = $(this).find("[data-num-relatorio]");

      //Pega o evento de clique na tabela e direciona para a página de detalhe do
      //Funcionário selecionado
      $allNum.click(function() {
        var id = ($(this).data('num-relatorio'));
        var nome = ($(this).data('funcionario-relatorio'));
        window.location.href = "relatorio/"+id+"/"+nome+"/";
      })
    });

    $("[data-table]").each(function(){
      var $allNum = $(this).find("[data-month-relatorio]");

      //Pega o evento de clique na tabela e direciona para a página de detalhe do
      //Funcionário selecionado
      $allNum.click(function() {
        var mes = ($(this).data('month-relatorio'));
        var id = ($(this).data('func-relatorio'));
        window.location.href = "detalherelatorio/"+id+"/"+mes+"/";
      })
    });

    // Dropdown para mostrar o user e logout
    $(".fa-user").click(function() {
      $('.menu-login').toggleClass('ativar');
    });

    // Aplicando mascaras
    jQuery(function($){
      $("#cpf").mask("999.999.999-99");
      $("#data").mask("99/99/9999");
    });

    // jQuery UI Datepicker
    $( function() {
      $( "#datepicker" ).datepicker({
          dateFormat: 'dd/mm/yy',
          dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
          dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
          dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
          monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
          monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
          nextText: 'Próximo',
          prevText: 'Anterior'
        });
      $("#datepicker").mask("99/99/9999");
    } );

    // Mostrar o modal-excluir
    $("[data-target]").each(function(){
      var $excluir = $(this).find("[data-click]");
      var $type = $(this).find("[data-type]");


      $excluir.click(function() {
        var id = ($(this).data('click'));
        var type = ($(this).data('type'));

        // console.log(type);

        $('.modal-excluir').addClass('ativar animated bounceInUp');
        $('.modal-excluir').removeClass('bounceOutDown');
        $('#confirmar-excluir').data("id" ,id);
        $('#confirmar-excluir').data("type" ,type);
      })
    });

    $('#confirmar-excluir').click(function() {

        var id = ($(this).data('id'));
        var type = ($(this).data('type'));

      console.log("Id = "+id);
      console.log("Tipo = "+type);

      if (type == 'form') {
        window.location.href = "formularios/excluir/"+id+"/";
      } else if (type == 'relatorio') {
        window.location.href = "relatorios/excluir/"+id+"/";        
      } else if(type == 'func'){
        console.log(id);
        window.location.href = "funcionarios/excluir/" + id ;       
      } else if( type == 'financeiro') {
        window.location.href = "financeiro/excluir/" + id;       
      }
    });

    $("#cancelar-excluir").click(function() {
      $('.modal-excluir').addClass('bounceOutDown');

    });

    // $('#relatorio-excluir').click(function() {
    //
    //     var id = ($(this).data('id'));
    //
    //   console.log("Id = "+id);
    //
    //   window.location.href = "relatorios/excluir/"+id+"/";
    // });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })

});
