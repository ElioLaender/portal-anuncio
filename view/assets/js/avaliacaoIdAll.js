$(window).load(function(){
	// este eh quando estou no completo anuncioId
	  var verAnuAtv = $('.inner').find('.paiBlocoAva').length; 
      if(verAnuAtv == 0){
     		$('p.pAval').append('<p class="zeroAvali">Seja o primeiro avaliar este anúncio!</p>');
     	}
 });