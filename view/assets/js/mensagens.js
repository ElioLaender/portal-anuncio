$(document).ready(function() {
   $('body').on('click', '.fec', function(){
   		$('#retorno').hide();
       $('div.fundoEscuro').hide();

    });

   $('#tFinaliza').click(function(){
   	   $('#retorno').fadeIn();
       $('div.fundoEscuro').show();
   });
   $('#tAcessar').click(function(){
   	   $('div#retorno').show();
       $('div.fundoEscuro').show();

   });
    $('#tReceber').click(function(){
   	   $('#retorno').fadeIn();
   });

   //recuperar senha da pg cadastre
    $('body').on('click', '.butR', function(){
      $('div.recSenh').fadeIn();
      $('div.fundoEscuro').show();
      $('#retorno').hide();
    });
    
     $('div.recSenh,div.recupS').find('button:eq(0)').click(function(){
       $(this).closest('div').hide();
       $('div.fundoEscuro').hide();
     });

      $('div.fundoEscuro').click(function(){
        $('div.recSenh,div.recupS').hide();
        $('div#retorno').hide();
      });

   //recuperar senha da pg login
      $('div.esq').find('button').click(function(){
        $('div.recupS').fadeIn();
        $('div.fundoEscuro').show();
      });
});
