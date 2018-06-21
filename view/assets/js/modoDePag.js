$(window).load(function() {
	/*Modo de pagamento*/
	$('.mod').find('input:checked').show();
	$('.mod').find('input:checked').next().show();

	      // redes sociais
	      var verRedes = $('.faceb').attr('href');
	      if(verRedes == ''){
	      		$('.faceb').hide();
	      }
	       // redes twitter
	      var vertwitter = $('.twit').attr('href');
	      if(vertwitter == ''){
	          $('.twit').hide();	
	      }
	       // redes lonkedin
	      var verlik = $('.lik').attr('href');
	      if(verlik == ''){
	          $('.lik').hide();	
	      }
	      	// redes lattes
	      var verlatt = $('.latt').attr('href');
	      if(verlatt == ''){
	          $('.latt').hide();	
	      }	

		//planos saude 
	    var verA = $('a:visible', $('#verRed')).length;
	  
	     	if(verA == 0){
	     		$('#verRed').hide();
	     	}else{
	     		$('#verRed').show();
	     	}

	      // badeiras aceitas
  			var verInput02 = $(':visible', $('#bandeira')).length;

	     	if(verInput02 == 1){
	     		$('#bandeira').hide();
	     	}else{
	
	     		$('#bandeira').show();
	     	}
	      //facilidades oferecidas
	     var verInput01 = $(':visible', $('#facOfe')).length;

	     	if(verInput01 == 1){
	     		$('#facOfe').hide();
	     	}else{
	     		$('#facOfe').show();
	     	}
	   //planos saude 
	    var verInput03 = $(':visible', $('#planoSa')).length;

	     	if(verInput03 == 1){
	     		$('#planoSa').hide();
	     	}else{
	     		$('#planoSa').show();
	     	}
   		//Youtube some se nao haver video no mesmo
	     $('#videoYou:empty').closest('div.youTube').hide();

	     
	     // horarios
	     var verSeg = $('span.seg').text();
	     	if(verSeg ==' às '){
	     		$('span.seg').closest('dd').hide();
	     	}
	     		
	     	var verSab = $('span.sab').text();
	     	if(verSab ==' às '){
	     		$('span.sab').closest('dd').hide();
	     	}

	     	var verDom = $('span.dom').text();
	     	if(verDom ==' às '){
	     		$('span.dom').closest('dd').hide();
	     	}

	     //site do anunciante
	    var  verSite = $('a.site').text();
	    if(verSite == '0'){
	    	$('a.site').closest('dl').hide();
	    }
});		
	

