	$(document).ready(function(){
		var verPlano = $('p.pls').text();
		if(verPlano == 'Plano Premium Plus / Mensal'){
			$('img.imagem').attr({
				src:"view/assets/imagens/responsiv@0x.png"
			});  
		}else if(verPlano == 'Plano Premium / Mensal'){
			$('img.imagem').attr({
				src:"view/assets/imagens/responsiv@1x.png"
			});  
		}else if(verPlano == 'Plano Básico / Anual'){
			$('img.imagem').attr({
				src:"view/assets/imagens/responsiv@2x.png"
		   });
		}else if(verPlano == 'Plano Grátis / Grátis'){
			$('img.imagem').attr({
				src:"view/assets/imagens/responsiv@3x.png"
		   });
		} 
	});
	