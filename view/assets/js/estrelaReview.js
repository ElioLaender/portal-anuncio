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
			case "0":
			$(this).css({
				background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
			});
			break
			case "1":
			$(this).css({
				background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 20%'
			});
			break
			case "2":
			$(this).css({
				background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 40%'
			});
			break
			case "3":
			$(this).css({
				background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 60%'
			});
			break
			case "4":
			$(this).css({
				background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 80%'
			});
			break
			case "5":
			$(this).css({
				background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 100%'
    			
			});
			break
		}
	}).get().join(', ');
});
