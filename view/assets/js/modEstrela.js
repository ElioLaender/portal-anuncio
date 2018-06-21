$(window).load(function() {
	$('span#estrelas').map(function(){
		var ver = $(this).text();

		switch (ver){
			case "0":
			$(this).css({
				background:'url(view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
			});
			break
			case "1":
			$(this).css({
				background:'url(view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 20%'
			});
			break
			case "2":
			$(this).css({
				background:'url(view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 40%'
			});
			break
			case "3":
			$(this).css({
				background:'url(view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 60%'
			});
			break
			case "4":
			$(this).css({
				background:'url(view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 80%'
			});
			break
			case "5":
			$(this).css({
				background:'url(view/assets/imagens/stars@2x.png) no-repeat',
    			backgroundSize:'5.5em',
    			backgroundPosition:'0 100%'
    			
			});
			break
		}
	}).get().join(', ');
});
