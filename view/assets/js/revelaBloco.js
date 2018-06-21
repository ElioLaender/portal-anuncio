var apar = function(){
 	
       $('div.divDel').find('fieldset:first-of-type').fadeIn();

        if($('fieldset:first-of-type:hidden')){
        	$('div.fundoEsc').fadeIn();
        }else{
        	$('div.fundoEsc').fadeOut();
        }
	}
	$('.aparecer').click(apar);

	var fechar = function(){
	    $(this).closest('fieldset').hide();
	     $('div.fundoEsc').hide();
	}

	$('fieldset input.can').click(fechar);

	var revel = function(){
		//aqui eh quando a senha esta incorrta o buttom deletar nao funciona
 	  var verRetorno = $('div#retornoSenha').find('p').length; 
      	  var verInput = $('#userPass').val();
	  var faceLog = $('#faceLog').val();
      if( verRetorno == 0 && verInput != '' || faceLog == '1'){
      		$('div.divDel').find('fieldset:first-of-type').hide();
      		$('div.divDel').find('fieldset:last-of-type').fadeIn();
     	}else{
		$('#delet').css({
      			opacity:'0'
      		});
  			$(this).before('<p class="naoConfer">Sua senha não confere, favor tentar novamente para prosseguir !</p>');
     	}
	}
	$('fieldset #delet').click(revel);


	// faz o mesmo que o script acima
	var rev = function(){ 
      var verInpu = $('#userPass').val();
      if(verInpu != ''){
			$('#delet').css({
      			opacity:'1'
      		});
      		$('.naoConfer').hide();
      	  }
      }


	$('#userPass').focusout(rev);


	/*pagina enviar mensagem*/
	var revela = function(){
		var verInp = $('input').val();
		alert(verInp.length);
	}

$('#enviar').click(revela);



