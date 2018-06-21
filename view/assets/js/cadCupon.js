$(document).ready(function(){
	
	$('select').change(function() {
		var verValor = $('select').find('option:selected').val();
		if(verValor == 'dePara'){
		      $('fieldset.porcent').hide();
			$('fieldset.dePor').show();
		 }else if(verValor == 'porcentagem'){
			$('fieldset.porcent').show();
			$('fieldset.dePor').hide();
			$('input.dp').val('');
		}else{
			$('fieldset.porcent').hide();
			$('fieldset.dePor').hide();
			$('input.dp').val('');
		}
	});


	 $('#ilimit').click(function(){
            if($(this).prop("checked") == true){
               $('#qtdCupon').val('');
            }
      });

            //link voltar ao painel, para fechar opcao do dashboard
        $('a.pain').click(function(){
            var ver = $('div#paiContDas').is(':hidden');
            if(ver == "1"){
            }else{
                $('div#paiContDas').hide();
                $('div#deshP').show();  
            }
        });
    
});
