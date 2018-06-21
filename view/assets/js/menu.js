

	/*funcao para form crescer*/
		var cresc = function(){
			$('	header.topo form').addClass('crescer');
			$(this).focusout(function(){
				$('	header.topo form').removeClass('crescer');
			});
		}
		$('header.topo form input[type="search"]').bind('focusin',cresc);

/*----parte menu, onde revela bloco recuperar senha----*/
var recuperaSenha = function(){
	/*Este fa aparecer o bloco de recuperar senha junto ao fundo negro*/
	$('aside div.recupSenha, aside div.fundoEscuro,p.paragrafoJs').fadeIn();

	var verificaRecup = $('aside div.recupSenha').is(':visible');
	if(verificaRecup == "1"){
		/*Este some com o input de pesquisa quando clicado no button "esqueceu sua ..."*/
	$('div.controlaFloat form').addClass('escondeB');
	/*Inseri um elemento apos o div dentro de header*/
	}else{
		$('aside div.recupSenha, aside div.fundoEscuro,p.paragrafoJs').hide();
	   }
}
$('aside div:first-of-type button.butEsq, aside div.fundoEscuro').click(recuperaSenha);

/*funcao criada para quando clicar no fundo escuro fazer o inverso dos codigos acima*/
var SomeFundoEscuro = function(){
		$('aside div.recupSenha, aside div.fundoEscuro,p.paragrafoJs').hide();

		$('div.controlaFloat form').removeClass('escondeB');
}
$('aside div.fundoEscuro').click(SomeFundoEscuro);
