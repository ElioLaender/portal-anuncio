/**
 * Created by laender on 09/02/16.
 */

$("#recuperar").click(function(){

   recoverPass();


});


//solicita processo de recuperação de senha.
function recoverPass(){

        var controller = "CadastroCliente";
        var action = "asksNewPass";
        var email = $("#mailRecupera").val();

	if(!emailValidate(email)){
	
		$( "#retReco" ).html("* Email inválido");
		return false;

	}

        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {

                controller: controller,
                action: action,
                email: email
            },

            function (result) {
                $( "#retReco" ).html(result);
            });
}



////////////////////////


$("#recuperarHome").click(function(){

   recoverPassUm();


});


//solicita processo de recuperação de senha.
function recoverPassUm(){

        var controller = "CadastroCliente";
        var action = "asksNewPass";
        var email = $("#mailRecuperaHome").val();

		if(!emailValidate(email)){
	
		$( "#retRecoHome" ).html("* Email inválido");
		return false;

	}
        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {

                controller: controller,
                action: action,
                email: email
            },

            function (result) {
                $( "#retRecoHome" ).html(result);
            });
}
