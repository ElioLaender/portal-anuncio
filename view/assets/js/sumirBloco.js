$(document).ready(function(){

		$('div#deshP').find('a').click(function(){
		   $('div#paiContDas').show();
		   $('.butFechD').show();
		});
			
		$('body').on('click', 'a.col', function(){
		    $('div#paiContDas').show();
		    $('.butFechD').show();
		});

		$('div#deshP').find('a:nth-of-type(1)').click(function(){
			$('div#paiContDas').css({
				height:'auto'
			});
		});
		//button  para fechar opcao do dashboard
		$('.butFechD').click(function(){
			var ver = $('div#paiContDas').is(':hidden');
			if(ver == "1"){
			}else{
			   	$('div#paiContDas').hide();
				$('div#deshP').show();	
			}
		});	
	
		//Este eh quando clicar da home para o painel de controle abrir painel de editar
		 var verA = $('#inner').find('#alteraCadas').length;
		 	if(verA == 1){
	     		$('#paiContDas').show().css({
					height:'auto'
	     		});
	     		$('.butFechD').show();
	     	}
	      	// este eh quando estou no completo anuncioId
		  var verAnuAtv = $('#inner').find('#anunAt').length; 
	      if(verAnuAtv == 1){
	     		$('#paiContDas').show().css({
				   height:'auto'
	     		});
	     		$('.butFechD').show();
	     	}
});
