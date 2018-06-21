$(document).ready(function() {
   $('body').on('click', '.abrir', function(){
			$(this).closest('article').find('div.escu').show();
			$(this).next().show();
		    $(this).hide();
    });

	$('body').on('click', '.fechar', function(){
		$('.abrir').show();
		$(this).closest('div.paiM').fadeOut();	
		$(this).closest('article').find('div.escu').hide();	
	});


	//banner um do anuncioId anuncioID
	$('a.saiba').click(function(){
		$('div.cupon').show();
		$('div.fund01').fadeIn();
	});

	$('button.feche').click(function(){
		$(this).closest('div').hide();
		$('div.fund01').hide();
	});

	$('div.fund01').click(function(){
		$(this).hide();
		$('div.cupon').hide();
		$('div.cresc').hide();

	});

	// segundo banner
	$('a.ajude').click(function(){
		$('div.cresc').show();
		$('div.fund01').fadeIn();
	});
});
