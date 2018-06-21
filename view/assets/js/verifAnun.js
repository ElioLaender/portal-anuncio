$(document).ready(function(){
 		
	  $('body').on('click', 'button#butAtivar', function(){
	  		  	
	  	var verSpanAtv = $('span.spanAtiv').text();
	  	var spanAtv = parseInt(verSpanAtv);

		var totalAtiv = spanAtv + 1;
		$('#anunAtivos').find('span').text(totalAtiv);	
	  	
	  	var verSpanDes = $('span.spanDes').text();
	  	var subDes = verSpanDes - 1;
		$('#anunInativos').find('span').text(subDes);

 	});

	$('body').on('click', 'button#butInativ', function(){
		// para os inativos
	  	var verSpanDes = $('span.spanDes').text();
	  	var spanDes = parseInt(verSpanDes);
	  	
	 	var totalDes = spanDes + 1;
		$('#anunInativos').find('span').text(totalDes);

	  	var verSpanAtv = $('span.spanAtiv').text();
	  	var subAtv = verSpanAtv - 1;
		$('#anunAtivos').find('span').text(subAtv);
	  });


	$('body').on('click', 'button#excAtiv', function(){
	  	var verSpanAtv = $('span.spanAtiv').text();
	  	var spanAtv = parseInt(verSpanAtv);

	  	var total = spanAtv - 1;

		$('#anunAtivos').find('span').text(total);

	 });
    
     $('body').on('click', 'button#excInat', function(){
	  	var verSpanDes = $('span.spanDes').text();
	  	var spanDes = parseInt(verSpanDes);

	  	var total = spanDes - 1;

		$('#anunInativos').find('span').text(total);
	 });
});

