$(document).ready(function(){


	/*este fecha a function logo acima*/
/*---- Efeito nos inputs com label ----*/
  $('form fieldset.paiInput input.efeitoL').prev().addClass('efeitoLabel');
  
  $('form fieldset input.efeitoL').on("keyup change", function(){
		  if($(this).val()==''){
			$(this).prev().removeClass('efeitoLabel');

		  } else{
			$(this).prev().addClass('efeitoLabel');
		  }   

	});
});