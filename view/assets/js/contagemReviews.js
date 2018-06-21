$(window).load(function() {
 
 //este aqui e para mensagens, se nao haver retona zero mensagens
	     var verMensagens = $('.paiMensangem:visible', $('.inner')).length;
	    	if(verMensagens >= 1){	
	       }else{
	     	 $('.tituMens').after("<p class='zero'>Seu anúncio naõ tem nenhuma mensangem no momento!</p>");
	           $('.tituMens').css({
	         		background:'transparent'
	           });
	        }

     	    $('span#men').text('(' + verMensagens + ')');

	     	//este aqui eh avaliacoes
     		 var verAvaliacao = $('.paiBlocoAva:visible', $('.inner')).length;
     		    if(verAvaliacao >= 1){
     	 			
     		     }else{
     		     	$('.pAval').before("<p class='zeroAval'>Seu anúncio não tem nenhuma avaliação no momento!</p>");
     				$('.pAval').css({
     					top:'7em'
     				});
     			 }

     	    $('span#ava').text('(' + verAvaliacao + ')');

              // fazer exclusao de mensagem
              $('button.delet').click(function(){
                 $(this).closest('div.paiMensangem').remove();
              
               var verMensa = $('.paiMensangem:visible', $('.inner')).length;
                if(verMensa >= 1){   
                }else{
                     $('.tituMens').after("<p class='zero'>Seu anúncio naõ tem nenhuma mensangem no momento!</p>");
                     $('.tituMens').css({
                         background:'transparent'
                });
             }

            });   
});
 