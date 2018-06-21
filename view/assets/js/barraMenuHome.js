$(document).ready(function(){
  $(window).scroll(function () {
        var verElemento = $('button#hamburguer').is(':hidden');
        if(verElemento == 1){

             prim = $(window).scrollTop();
            if (prim >= 650) {
                $('.barraM').css({
                    height:'7em',
                    background:'#3498db'
                });

                 $('div.pesBarraM').css({
                    opacity:'1',
                    zIndex:'6'
                });
                 $('div.efetua').css({
                    top:'3em'
                 });
                 $('button.login').css({
                    fontSize:'1.3em'
                 });

                 //crescer foto
                  $('#fotoHome').css({
                    top:'2.8em'
                  });
                 $('#figuHome').find('img').css({
                    width:'3.5em',
                    height:'3.5em'
                 });

            } else {
                 $('.barraM').css({
                    height:'4em',
                    background:'rgba(41, 128, 185,.3)'
                 });

                $('div.pesBarraM').css({
                    opacity:'0',
                    zIndex:'-1'
                });
                 $('div.efetua').css({
                    top:'1.5em',
                    fontSize:'1em'
                });
                $('button.login').css({
                    fontSize:'1em'
                 });

                //diminuir foto
                  $('#fotoHome').css({
                    top:'1em'
                  });
                 $('#figuHome').find('img').css({
                    width:'2.5em',
                    height:'2.5em'
                 });
            }
        }
    });
});
$(window).resize(function(){
    var larguraElemento = $('div.tudo').width();
    
            if( larguraElemento >= 900){
                $('.barraM').css({
                    height:'4em',
                    background:'rgba(41, 128, 185,.3)'
                 });
                $('div.efetua').css({
                    top:'1.5em',
                    fontSize:'1em'
                });
                $('div.pesBarraM').css({
                    opacity:'0',
                    zIndex:'-1'
                });
                $('button.login').css({
                    fontSize:'1em'
                 });
                  //diminuir foto
                  $('#fotoHome').css({
                    top:'1em'
                  });
                 $('#figuHome').find('img').css({
                    width:'2.5em',
                    height:'2.5em'
                 });
            }else{
                $('.barraM').css({
                    height:'4em',
                    background:'#3498db'
                });
                $('div.efetua').css({
                    top:'0',
                    fontSize:'1em'
                });
                $('div.pesBarraM').css({
                    opacity:'0',
                    zIndex:'-1'
                });
                 $('button.login').css({
                    fontSize:'1em'
                 });
            }
});