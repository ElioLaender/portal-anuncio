/**
 * Created by laender on 22/01/16.
 */
//Busca no banco de dados as categorias e realiza os mesmos para realizar o autocomplete.
$(function() {

    var cliente = [];

    var value = returnJason("?controller=Dashboard&action=returnForAutocom");

    // Armazena na array capturando somente o nome do cliente
    $(value).each(function(key, value) {
        cliente.push(value.sub_categoria_descricao);
    });


    $(".completar").autocomplete({
        source:  cliente.slice(100),
        minLength: 3
    });



    var bairro = [];

    var retorno = returnJason("?controller=Anuncio&action=solicBairros");

    // Armazena na array capturando somente o nome do cliente
    $(retorno).each(function(key, retorno) {
        bairro.push(retorno.bairros_nome);
    });


    $(".compleBairro").autocomplete({
        source:  bairro,
        //minLength: 3
    });

});



