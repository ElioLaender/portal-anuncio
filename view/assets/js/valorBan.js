$(document).ready(function(){
	$('select.semB').change(function() {
		var verValor = $('select.semB').find('option:selected').val();

		if(verValor == 0){
			$('div.seg').find('div:eq(0)').show();
			$('div.seg').find('div:eq(0)').siblings('div').hide();
		}else if(verValor == 1){
			$('div.seg').find('div:eq(1)').show();
			$('div.seg').find('div:eq(1)').siblings('div').hide();
		}else{
			$('div.seg').find('div:eq(2)').show();
			$('div.seg').find('div:eq(2)').siblings('div').hide();
		}
	});

	$('select.comB').change(function() {
		var verValo = $('select.comB').find('option:selected').val();
		
		if(verValo == 0){
			$('div.ter').find('div:eq(0)').show();
			$('div.ter').find('div:eq(0)').siblings('div').hide();
		}else if(verValo == 1){
			$('div.ter').find('div:eq(1)').show();
			$('div.ter').find('div:eq(1)').siblings('div').hide();
		}else{
			$('div.ter').find('div:eq(2)').show();
			$('div.ter').find('div:eq(2)').siblings('div').hide();
		}
	});

	//script que faz aparecer texto dd dos icones 
	$('div.espec').find('dt').click(function(){

		var verDD = $(this).next().is(':hidden');

		if(verDD == 1){
			$(this).next().fadeIn().siblings('dd').hide();
		}else{
			$(this).next().hide();
		}
	});

	//parte meu carrinho trocar de plano
	$('.butAlt').click(function(){
		$(this).next().show();
		$('div.escuro').fadeIn();
	});

	$('.can').click(function(){
		$('.alterado').hide();
		$('div.escuro').fadeOut();
	});
	
	$('div.escuro').click(function(){
		$('.alterado').hide();
		$('div.escuro').fadeOut();
	});
});