$(document).ready(function(){
     
      $('#diasUm').closest('label').click(function(){
            if($(this).find('#diasUm').prop("checked") == true){
		
               $('fieldset#semana').find('select').attr("disabled", false);
            }else{
               $('fieldset#semana').find('select').attr("disabled", true);
            }
      });

      /*aqui eh checkbox quando marcado aparece horarios*/
      $('#diasDois').closest('label').click(function(){
            if($(this).find('#diasDois').prop("checked") == true){
               $('fieldset#sabado').fadeIn();
               $('fieldset#sabado').find('select').attr("disabled", false);
            } else {
               $('fieldset#sabado').hide();
               $('fieldset#sabado').find('select').attr("disabled", true);
            }
     });
        

     /*aqui eh checkbox quendo marcado aparece horarios*/
     $('#diasTres').closest('label').click(function(){
            if($(this).find('#diasTres').prop("checked") == true){
               $('fieldset#domingo').fadeIn();
               $('fieldset#domingo').find('select').attr("disabled", false);
            } else {
               $('fieldset#domingo').hide();
               $('fieldset#domingo').find('select').attr("disabled", true);
            }
    });

       
        if($('#diasDois').prop("checked") == true){
              $('fieldset#sabado').css({
                  display:'block'
              });
        }

        if($('#diasTres').prop("checked") == true){
               $('fieldset#domingo').css({
                  display:'block'
               });
            }

            $(window).scroll(function (e){
	     
	       if($('#diasUm').prop("checked") == true){
	
               $('fieldset#semana').find('select').attr("disabled", false);

               }
              if($('#diasDois').prop("checked") == true){
                $('fieldset#sabado').find('select').attr("disabled", false);
              }
               if($('#diasTres').prop("checked") == true){
                $('fieldset#domingo').find('select').attr("disabled", false);
              }
            });
      
});

