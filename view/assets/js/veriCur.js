$(document).ready(function(){
	$('#inserCur').click(function(){
		var ver = $('ul.menuCur').is(':hidden');
		if(ver == 1){
		    $('ul.menuCur').fadeIn();
		    $('.pgInit').hide();	 
		}else{
		    $('ul.menuCur').hide();
		    $('.pgInit').fadeIn();	 
		}

	});
});
