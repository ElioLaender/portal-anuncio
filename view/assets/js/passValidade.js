

$('form').submit(function(){
					
	var pass1 = $('#senh').val();
	var pass2 = $('#novaSenh').val();
	var faceLog = $('#faceLog').val();

	

	if(faceLog == '1'){
		return true;
	} else {

			if(pass1 != '' || pass2 != ''){
		if(pass1 == ''){
			$('#newSe1').html("* O Campo senha está vazio");
			$('#newSe1').focus();
			return false;
		}
		if (pass2 == ''){
			$('#newSe2').html("* O Campo de confirmação de senha está vazio");
			$('#newSe2').focus();
			return false;
		}
		if(pass1 != pass2){
			$('#newSe2').html("* Confirmação está diferente");
			$('#newSe1').html("* O Campo senha está direfente da validação");
			$('#newSe1').focus();
			return false;
		}

	}

	}



});
