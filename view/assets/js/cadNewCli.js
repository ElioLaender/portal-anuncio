/**
 * Created by laender on 10/02/16.
 */
    //referente ao cadastro de cliente na página principal
$(function(){
    //Função que ao clicar no botão, irá fazer.
    $(".cadNewCli").click(function(){
        var controller = "CadastroCliente";
        var action = "insertCadastro";
        var email = $("#tCadastro").val();
        var senha = $("#tS").val();
        var nome = $("#tNome").val();

	if(!emailValidate(email) || senha == "" || nome == ""){
		$( "#retornoCadCli" ).html("* Erro: Favor verificar se nome, email e senha foram preenchidos corretamente.");	
		return false;
	}

        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {
                controller: controller,
                action: action,
                email: email,
                senha: senha,
                nome: nome
            },
            function (result) {
                //Depois que foi completado o cadastro e tem a mensagem de retorno, esconde a div carregando_form que tem a barra de carregamento.
                complete:$("#carregando_form").hide("slow");
                //Aqui coloca o valor que retono na função get_retorno dentro da div retorno, e mostra a div com efeito em slow.
                // $("#retorno").show("slow").text(result);
                $( "#retornoCadCli" ).html(result);
                // $("#retorno").delay(4000).hide("slow");
            });
    });
});
