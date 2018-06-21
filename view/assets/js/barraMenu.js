$(document).ready(function(){
	//hamburguer
	$('div.paiBarra').find('button:eq(0)').click(function(){
		$(this).next().addClass('leftZero');
		$('div.fundoEscuro').fadeIn();

		// div que esconde barra
		$('header').find('div:eq(0)').fadeIn(130);
	});

	$('.fechar').click(function(){
		$(this).closest('div').removeClass('leftZero');
		$('div.fundoEscuro').hide();
		$('header').find('div:eq(0)').fadeOut(30);
	});
	$('.fundoEscuro').click(function(){
		$(this).closest('.paiBarra').find('div:eq(0)').removeClass('leftZero');
		$('header').find('div:eq(0)').fadeOut(30);

		$(this).hide().css({
			background:'rgba(52, 152, 219,.3)'
		   });
		$('div.logar').removeClass('aparecer');
		$('#blocoFot').hide();
        $('.efetua').find('div:eq(0)').fadeOut(100);

		if($('div.recupSenha:visible')){
			$('div.recupSenha').hide();
			$('div.logar').removeClass('aparecer').show();
		}
		
	 });

	//esta parte faco aparecer efetuar login
	$('button.login').click(function(){
		$(this).next().addClass('aparecer');
		$('div.fundoEscuro').show().css({
			background:'rgba(52, 152, 219,.3)'
		});
        $('.efetua').find('div:eq(0)').fadeIn(500);

	});

	//button fechar parte de logar
	$('div.logar').find('button:eq(0)').click(function(){
		$(this).closest('.logar').removeClass('aparecer');
		$('div.fundoEscuro').hide();
        $('.efetua').find('div:eq(0)').fadeOut(100);
	});

	//foto do login
	$('div.fotoBar').find('img').click(function(){
		var verFot = $('#blocoFot').is(':hidden');

			if(verFot == "1"){
		   		$('#blocoFot').fadeIn();
				$('div.fundoEscuro').show();
			}else{
			   	$('#blocoFot').hide();
				$('div.fundoEscuro').hide();
				
			}
		var larguraBody = $('body').width();

			if(larguraBody >= 1100){
				$('div.fundoEscuro').css({
					background:'transparent'
				});
			}else{
				$('div.fundoEscuro').css({
					background:'rgba(52, 152, 219,.3)'
				});
				
			}
	});
	
	//esqueceu sua senha
	$('.esqSen').click(function(){
		$('.logar').hide();
		$('div.recupSenha').show();
	});

	$('.volt').click(function(){
		$('div.recupSenha').hide();
		$('div.logar').show();
	});

});
