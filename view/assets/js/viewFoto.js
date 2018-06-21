(function ($) {
  $.extend({
    uploadPreview : function (options) {
      // Options + Defaults
      var settings = $.extend({
        input_field: ".image-input",
        preview_box: ".image-preview",
        label_field: ".image-label",
        label_default: "Choose File",
        label_selected: "Change File",
        no_label: false
      }, options);
        /*este eh o button que exclue a img*/
          $('button#ex').click(function(){    
                 $('#image-upload').val('');

                  $('button[type="button"].excl').fadeOut();
                    //Clear background
                  $('div#image-preview').fadeOut();
                  $('.inputfile + label').css({
                      background:'url(view/assets/imagens/foto.png) no-repeat',
                      backgroundSize: '3em',
                      backgroundPosition:'50% 15%',
                  });
                  $('span.spanImg').text('carregar foto').css({
                    top:'4em'
                  });

                  $('div.butCad').css({
                    marginTop:'0'
                  });
              });

      
      // Check if FileReader is available
      if (window.File && window.FileList && window.FileReader) {
        if (typeof($(settings.input_field)) !== 'undefined' && $(settings.input_field) !== null) {

          $(settings.input_field).change(function() {
            var files = event.target.files;
            if (files.length > 0) {
              var file = files[0];
              var reader = new FileReader();

              // Load file
              reader.addEventListener("load",function(event) {
                var loadedFile = event.target;

                // Check format
                if (file.type.match('jpeg') || file.type.match('png')) {

                  // Image
              /*quando a imagem eh carregada*/
                  $(settings.preview_box).css({
                    background:"url("+loadedFile.result+") no-repeat",
                    backgroundSize: '100%',
                    backgroundPosition:'50% 15%',
                    borderRadius:'50%'
                  });
                  $('div#image-preview').fadeIn();
                  /*limpa o span*/
                  $('span.spanImg').css({
                    top:'9.5em'
                  });

                  $('div.butCad').css({
                    marginTop:'2em'
                  });
 
                  $('.inputfile + label').css({
                    background:'url(view/assets/imagens/ok.gif) no-repeat',
                    backgroundSize: '1.5em',
                    backgroundPosition:'73% 20%',
                  });
                  $('button[type="button"].excl').fadeIn().css({
                    display:'block'
                  });
                }else {
                  /*quando o arquivo nao eh compativel*/
                  $('div.err').fadeIn();
                  $('.inputfile + label').css({
                    opacity:'0'
                  });
                  /*Aqui eh o button que fecha o bloco erro*/
                  $('div.err button').click(function(){
                    $('div.err').fadeOut();
                    $('.inputfile + label').css({
                       opacity:'1'
                    });
                    $('span.spanImg').text('carregar foto');

                  });
                }
                  
              });
            
              if (settings.no_label == false) {
                // Change label
                $(settings.label_field).html(settings.label_selected);
              }

              // Read the file
              reader.readAsDataURL(file);
            } else {
              if (settings.no_label == false) {
                // Change label
                $(settings.label_field).html(settings.label_default);
                $('button[type="button"].excl').fadeOut();
              }
              //Aqui eh quando a imagem eh cancelada ou excluida
                $('div#image-preview').fadeOut();
                $('.inputfile + label').css({
                    background:'url(view/assets/imagens/foto.png) no-repeat',
                    backgroundSize: '3em',
                    backgroundPosition:'50% 15%',
                });
                $('span.spanImg').text('carregar foto').css({
                    top:'4em'
                });
                $('div.butCad').css({
                    marginTop:'0'
                  });
            }
          });
        }
      } else {
        return false;
      }
    }
  });
})(jQuery);

