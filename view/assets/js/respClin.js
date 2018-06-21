$(window).load(function() {
  $('.butResClil').click(function(){
  	$(this).closest('article').next().fadeIn();
  });
  // deletar mensagem
  $('.butDel').click(function(){
  	$(this).closest('article').next().next().fadeIn();
  	$(this).closest('article').next().hide();

  });
  // button cancel
   $('.cancel').click(function(){
  	$(this).closest('.confirma').fadeOut();
  });
});