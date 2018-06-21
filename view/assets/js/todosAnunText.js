$(document).ready(function(){
		

	$('button#ab').click(function(){
		$('form.for').fadeIn();
		$('div.fundoEscuro').fadeIn();
	});

	$('button.fec').click(function(){
		$('form.for').hide();
		$('div.fundoEscuro').hide();
	});

	$('div.fundoEscuro').click(function(){
		$('form.for').hide();
	});


	$('button.Abaner').click(function(){
		$('div.paiBan').show();
		$('div.fun').fadeIn().css({
			background:'rgba(0,0,0,.7)'
		});
	});

	$('div.fun').click(function(){
		$('div.paiBan').hide();
		$('div.fun').fadeOut();
	});

	$('div.paiBan').find('button').click(function(){
		$('div.paiBan').hide();
		$('div.fun').fadeOut();
	});
});