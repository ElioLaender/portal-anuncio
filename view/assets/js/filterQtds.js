/**
 * Created by laender on 16/02/16.
 */

//Responsável por imprimir a quantidade de anuncios que possuem tal facilidade habilitada

function contFilter(){


    //referente a contagem dos bairros
    if(dadosSearch['fStatus'] == ""){

        var arrayBairros = returnJason("?controller=Anuncio&action=qtdAnunFaci&search="+dadosSearch['pesquisa']);

       // alert("if");

        //console.log("ssdsdsd?controller=Anuncio&action=qtdAnunFaci&search="+dadosSearch['pesquisa']);



        //contagem das formaas de pagamento
        var arrayFormPg = returnJason("?controller=Anuncio&action=qtdAnunformPag&search="+dadosSearch['pesquisa']);

        //exibe quantidade de anuncio vinculada a cada plano de saude
        var arrayPlan = returnJason("?controller=Anuncio&action=qtdAnunPlan&search="+dadosSearch['pesquisa']);

    } else {


       // alert("else");

//fpag -- fac -- plan


        var arrayBairros = returnJason("?controller=Anuncio&action=qtdAnunFaci&search="+dadosSearch['pesquisa']+"&tef="+dadosSearch['tef']+"&fpag="+dadosSearch['fpag']+"&faci="+dadosSearch['faci']+"&plan="+dadosSearch['plan']);

        //contagem das formaas de pagamento
        var arrayFormPg = returnJason("?controller=Anuncio&action=qtdAnunformPag&search="+dadosSearch['pesquisa']+"&tef="+dadosSearch['tef']+"&fpag="+dadosSearch['fpag']+"&faci="+dadosSearch['faci']+"&plan="+dadosSearch['plan']);
        //console.log("?controller=Anuncio&action=qtdAnunformPag&search="+dadosSearch['pesquisa']+"&tef="+dadosSearch['tef']+"&fpag="+dadosSearch['fpag']+"&faci="+dadosSearch['faci']+"&plan="+dadosSearch['plan']);
        //exibe quantidade de anuncio vinculada a cada plano de saude
        var arrayPlan = returnJason("?controller=Anuncio&action=qtdAnunPlan&search="+dadosSearch['pesquisa']+"&tef="+dadosSearch['tef']+"&fpag="+dadosSearch['fpag']+"&faci="+dadosSearch['faci']+"&plan="+dadosSearch['plan']);
    }

   // console.log("kkkkkkkkkkk?controller=Anuncio&action=qtdAnunFaci&search="+dadosSearch['pesquisa']+"&tef="+dadosSearch['tef']);

    //alert("foi?"+dadosSearch['tef']);

    $('.estaci').html(" (" +arrayBairros['facilidades_estacionamento']+") ");
    $('.seg').html(" (" +arrayBairros['facilidades_seguranca']+") ");
    $('.acess').html(" (" +arrayBairros['facilidades_acessibilidade']+") ");
    $('.ar').html(" (" +arrayBairros['facilidades_ar_condicionado']+") ");
    $('.wifii').html(" (" +arrayBairros['facilidades_wifii']+") ");
    $('.reser').html(" (" +arrayBairros['facilidades_reservar']+") ");
    $('.ani').html(" (" +arrayBairros['facilidades_permite_animais']+") ");
    $('.desc').html(" (" +arrayBairros['facilidades_cupons_desconto']+") ");
    $('.cri').html(" (" +arrayBairros['facilidades_criancas']+") ");
    $('.deli').html(" (" +arrayBairros['facilidades_delivery']+") ");




    $('.bole').html(" ("+arrayFormPg["forma_pag_boleto"]+") ");
    $('.cre').html(" ("+arrayFormPg["forma_pag_credito"]+") ");
    $('.deb').html(" ("+arrayFormPg["forma_pag_debito"]+") ");
    $('.ali').html(" ("+arrayFormPg["forma_pag_vale_alimentacao"]+") ");
    $('.che').html(" ("+arrayFormPg["forma_pag_cheque"]+") ");
    $('.din').html(" ("+arrayFormPg["forma_pag_dinheiro"]+") ");
    $('.out').html(" ("+arrayFormPg["forma_pag_outros_formPag"]+") ");


    $('.uni').html(" ("+arrayPlan["plano_saude_unimed"]+") ");
    $('.pront').html(" ("+arrayPlan["plano_saude_prontomed"]+") ");
    $('.sauVi').html(" ("+arrayPlan["plano_saude_saudevida"]+") ");
    $('.prom').html(" ("+arrayPlan["plano_saude_promed"]+") ");
    $('.outr').html(" ("+arrayPlan["plano_saude_outros"]+") ");

}

/*

 Se p.class estiver vazio, oculta o imput setando uma classe o input para isso anteriormente.

 */





$(function (){

    if($('.estaci').html() == " (0) "){
        $('.estaci').parent().addClass('well');
    }

    if($('.seg').html() == " (0) "){
        $('.seg').parent().addClass('well');
    }

    if($('.acess').html() == " (0) "){
        $('.acess').parent().addClass('well');
    }

    if($('.ar').html() == " (0) "){
        $('.ar').parent().addClass('well');
    }

    if($('.wifii').html() == " (0) "){
        $('.wifii').parent().addClass('well');
    }

    if($('.reser').html() == " (0) "){
        $('.reser').parent().addClass('well');
    }

    if($('.ani').html() == " (0) "){
        $('.ani').parent().addClass('well');
    }

    if($('.desc').html() == " (0) "){
        $('.desc').parent().addClass('well');
    }

    if($('.cri').html() == " (0) "){
        $('.cri').parent().addClass('well');
    }

    if($('.deli').html() == " (0) "){
        $('.deli').parent().addClass('well');
    }

    if($('.bole').html() == " (0) "){
        $('.bole').parent().addClass('well');
    }

    if($('.cre').html() == " (0) "){
        $('.cre').parent().addClass('well');
    }

    if($('.deb').html() == " (0) "){
        $('.deb').parent().addClass('well');
    }

    if($('.ali').html() == " (0) "){
        $('.ali').parent().addClass('well');
    }

    if($('.che').html() == " (0) "){
        $('.che').parent().addClass('well');
    }

    if($('.din').html() == " (0) "){
        $('.din').parent().addClass('well');
    }

    if($('.out').html() == " (0) "){
        $('.out').parent().addClass('well');
    }

    if($('.uni').html() == " (0) "){
        $('.uni').parent().addClass('well');
    }

    if($('.pront').html() == " (0) "){
        $('.pront').parent().addClass('well');
    }

    if($('.sauVi').html() == " (0) "){
        $('.sauVi').parent().addClass('well');
    }

    if($('.prom').html() == " (0) "){
        $('.prom').parent().addClass('well');
    }

    if($('.outr').html() == " (0) "){
        $('.outr').parent().addClass('well');
    }

});
/*
    //retorna pesquisa do usuário tratada. (falta tratar contra SqlInjection)
    function searchString(stringSearch){

        $(function(){
            $.post("index.php", {
                    controller: "Anuncio",
                    action: "tratarPesquisa",
                    search: stringSearch
                },
                function (result) {
                  return result;
                });
        });

}
*/


