$(document).ready(function(){
  $('#cep').mask('99999-999');
  $('#tel-fixo, .tel-fixo').mask('(99) 99999-9999');
  $('#tel-cel, .tel-cel').mask('(99) 99999-9999');
  $('.date').mask('99/99/9999');
  
	/*function click para aparecer e sumir texto de dica*/
	$('form fieldset div.dica').find('p').hide();

	$('form fieldset div.dica').click(function(){
		$(this).find('p').toggle();
	});

});
/*este fecha o principal*/

 
   