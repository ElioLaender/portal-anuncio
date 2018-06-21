$(document).ready(function(){
    $('#tod').closest('label').click(function(){

        if($(this).find('#tod').prop("checked") == true){
			$('fieldset.paga').find('input[type="checkbox"]').prop("checked", true);
               
        } else {
			 $('fieldset.paga').find('input[type="checkbox"]').prop("checked", false);
        }
    });

        $('#todos').closest('label').click(function(){
        
        if($(this).find('#todos').prop("checked") == true){
    		$('fieldset.band').find('input[type="checkbox"]').prop("checked", true);
        } else {
    		$(this).find('#todos').prop("checked", true);
    		$('fieldset.band').find('input[type="checkbox"]').prop("checked", false);
        }
    });

    /*Criar buntton*/
    $('fieldset.revelar').find('button').click(function(){
        if($('fieldset.redes').is(':hidden')){
             $('fieldset.redes').fadeIn();
        }else{
             $('fieldset.redes').hide();
        }
    });
   
    // button aparecer dicas de categoria
    $('#dicaUm').click(function(){
        $(this).hide();
        $('fieldset.categoria').find('p:eq(1),p:eq(0)').show();
        $('.dicaQua').show();
    });

     $('.fec').click(function(){
        $('fieldset.categoria').find('p:eq(1),p:eq(0)').hide();
        $('#dicaUm').show();
        $('.dicaQua').hide();
    });

    //button dica breve desc
    // button aparecer dicas de categoria
    $('#dicaDois').click(function(){
        $(this).hide();
        $('fieldset.categoria').find('p.dicaBrev').show();
        $('.dicaAtiv').show();
    });
     $('.fec').click(function(){
        $('fieldset.categoria').find('p.dicaBrev').hide();
        $('#dicaDois').show();
        $('.dicaAtiv').hide();
    });


     //button do cep
     $('#buttonBus').click(function(){
        if( $('.buscaCep').is(':hidden')){
            $('.buscaCep').fadeIn(); 
            $('.fundoAzul').fadeIn(); 
        }else{
            $('.buscaCep').fadeOut();
        }
     });

    // button abre iframe
    $('#fechaFram').click(function(){
        $('.buscaCep').hide();
        $('.fundoAzul').hide();
    });
     $('.fundoAzul').click(function(){
        $('.buscaCep').hide();
        $(this).hide();

     });

            //link voltar ao painel, para fechar opcao do dashboard
        $('a.pain').click(function(){
            var ver = $('div#paiContDas').is(':hidden');
            if(ver == "1"){
            }else{
                $('div#paiContDas').hide();
                $('div#deshP').show();  
            }
        });
    
});

