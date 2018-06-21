$(window).load(function() {

	$('input:radio').click(function(){
		var ver = $(this).val();
		switch (ver){
			case "1":
				$(this).next().css({
					backgroundPosition: '50% 100%'
				});

				$(this).closest('label').prevAll('label').find('span').css({
					backgroundPosition: '50% 100%'
				});
				
				$(this).closest('label').nextAll('label').find('span').css({
					backgroundPosition: '50% 0%'
				});
			break
			case "2":
				$(this).next().css({
					backgroundPosition: '50% 100%'
				});

				$(this).closest('label').prevAll('label').find('span').css({
					backgroundPosition: '50% 100%'
				});
				
				$(this).closest('label').nextAll('label').find('span').css({
					backgroundPosition: '50% 0%'
				});
			break
			case "3":
		   		$(this).next().css({
					backgroundPosition: '50% 100%'
				});

				$(this).closest('label').prevAll('label').find('span').css({
					backgroundPosition: '50% 100%'
				});
				
				$(this).closest('label').nextAll('label').find('span').css({
					backgroundPosition: '50% 0%'
				});
	
			break
			case "4":
				$(this).next().css({
					backgroundPosition: '50% 100%'
				});

				$(this).closest('label').prevAll('label').find('span').css({
					backgroundPosition: '50% 100%'
				});
				
				$(this).closest('label').nextAll('label').find('span').css({
					backgroundPosition: '50% 0%'
				});
	
			break
			case "5":
				$(this).next().css({
					backgroundPosition: '50% 100%'
				});

				$(this).closest('label').prevAll('label').find('span').css({
					backgroundPosition: '50% 100%'
				});
				
				$(this).closest('label').nextAll('label').find('span').css({
					backgroundPosition: '50% 0%'
				});

			break
		}
	});

	$('p.estrelas').map(function(){
		var verP = $(this).text();
		// alert(verP);
		switch (verP){
			case "Média de avaliações 0":
			$(this).css({
				background:'url(/view/assets/imagens/stars@0.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'50% 85%'
			});
			break
			case "Média de avaliações 1":
			$(this).css({
				background:'url(/view/assets/imagens/stars@1.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'50% 85%'
			});
			break
			case "Média de avaliações 2":
			$(this).css({
				background:'url(/view/assets/imagens/stars@2.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'50% 85%'
			});
			break
			case "Média de avaliações 3":
			$(this).css({
				background:'url(/view/assets/imagens/stars@3.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'50% 85%'
			});
			break
			case "Média de avaliações 4":
			$(this).css({
				background:'url(/view/assets/imagens/stars@4.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'50% 85%'
			});
			break
			case "Média de avaliações 5":
			$(this).css({
				background:'url(/view/assets/imagens/stars@5.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'50% 85%'
    			
			});
			break
		}
	}).get().join(', ');
});
