$(document).ready(function() {
    $('.esqSen').click(function(){
   	   $('.fundoEscuro').fadeIn();
   	   $('div.recupSenha').show();
   });

    $('.volt').click(function(){
    	$('.fundoEscuro').fadeOut();
    	$('div.recupSenha').hide();
    });
    
    $('.fundoEscuro').click(function(){
    	$('div.recupSenha').fadeOut();
    	$(this).hide();
    });

});
