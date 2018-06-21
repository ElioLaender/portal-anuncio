
$('form').submit(function(){


	var title = $('#tituCupon').val();
	var descricao = $('#desCupon').val();
	var qtdCupon = $('#qtdCupon').val();
	var qtdIlimit = $('#ilimit').val();     
	var dtIni = $('#inicio').val();
	var dtTer = $('#termino').val(); 
	var tipoDesc = $('#tDes').val(); 
	var percent = $('#percent').val(); 
	var valDe = $('#valde').val(); 
	var valPara = $('#para').val();
	


	 $('#tit').html("");
	 $('#descr').html("");
	 $('#qtCup').html("");
	 $('#dIni').html("");
	 $('#dTer').html("");
	 $('#percente').html("");
	 $('#vDe').html("");
	 $('#vPara').html("");

	if( title == "" ){

	   $('#tit').html("O titulo deve ser preenchido");
	   $('#tituCupon').focus();
	   return false;

	}

	if( descricao == "" ){

	   $('#descr').html("A descrição deve ser preenchido");
	   $('#desCupon').focus();
	   return false;

	} else if(descricao.length > 300){
	
	    $('#descr').html("A descrição não deve conter mais que 300 caracteres");
	    $('#desCupon').focus();
	    return false;
	}

	
	if( qtdCupon == "" ){

	   if($('#ilimit').is(":checked")){
		// Se tiver vazio, porém o ilimitado estiver marcado, está ok. 
	    } else {

		   $('#qtCup').html("A descrição deve ser preenchida");
		   $('#qtdCupon').focus();
		   return false;

	    }

	}

	if(dtIni == "" || dtIni.length < 10){

		 $('#dIni').html("A data inicial deve ser preenchida totalmente");
	   	 $('#termino').focus();
		 return false;
	}

	

	if(dtTer == "" || dtTer.length < 10){

		 $('#dTer').html("A data final deve ser preenchida totalmente");
	   	 $('#inicio').focus();
		 return false;
	}

	
	if(dtIni >= dtTer){

		 $('#dTer').html("Data final não pode ser menor ou igual a data inicial.");
		 $('#termino').focus();
		return false;
	} 

	if(tipoDesc == "porcentagem"){

		if(percent == ""){

			 $('#percente').html("Favor informar a porcentagem.");
			 $('#percent').focus();
			 return false;

		}

	} else if(tipoDesc == "dePara"){

		/*
		if(valDe == "" || valDe.length < 6){

			$('#vDe').html("Favor preencher o valor no formato Ex:150,00");
			$('#valde').focus();
			 return false;

		}

		if(valPara == "" || valPara.length < 6){

			$('#vPara').html("Favor preencher o valor");
			$('#para').focus();
			 return false;

		}
		*/

		if(valPara > valDe){

			$('#vPara').html("O novo valor não pode ser maior que o anterior");
			$('#para').focus();
			 return false;

		}
	} else{
		//gratuito.
	}

	  

	

});
