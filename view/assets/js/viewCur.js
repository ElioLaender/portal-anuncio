$(document).ready(function(){
	 // badeiras aceitas
  		var verFace = $('.face').find('em').text();
	     	if(verFace == ''){
	     		$('.face').hide();
	     	}else{
	     		$('.face').show();
	     	}

	     var verLat = $('.lattes').find('em').text();
	     	if(verLat == ''){
	     		$('.lattes').hide();
	     	}else{
	     		$('.lattes').show();
	     	}

	     var verLink = $('.linke').find('em').text();
	     	if(verLink == ''){
	     		$('.linke').hide();
	     	}else{
	     		$('.linke').show();
	     	}

	     var verFix = $('.fixo').find('em').text();
	     	if(verFix == ''){
	     		$('.fixo').hide();
	     	}else{
	     		$('.fixo').show();
	     	}

	     var verHab = $('.hab').find('em').text();
	     	if(verHab == ''){
	     		$('.hab').hide();
	     	}else{
	     		$('.hab').show();
	     	}

   		var verAtiv = $('.ativ').find('em').text();
	     	if(verAtiv == ''){
	     		$('.ativ').hide();
	     	}else{
	     		$('.ativ').show();
	     	}
		
		var verObs = $('.obs').find('em').text();
	     	if(verObs == ''){
	     		$('.obs').hide();
	     	}else{
	     		$('.obs').show();
	     	}

	    var verA = $('dd:visible', $('dl.paiObs')).length;
			if(verA == 0){
	     		$('dl.paiObs').hide();
	     	}else{
	     		$('dl.paiObs').show();
	     	}
	     	
});