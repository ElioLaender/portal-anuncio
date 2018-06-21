<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Guia eletrônico e busca por descontos. Logo sua empresa poderá ser encontrada por clientes, continue com a compra para garantir sua presença online.">
    <meta name="keywords" content="assinar anúncio,cadastrar na semprenegócio,anúnciar empresa,aparecer online, minha empresa na internet,garantir presença online.">
    <link rel="icon" href="view/assets/imagens/flor.png">
    <title>carrinho semprenegócio Identificação</title>
    <!-- Custom divfacil -->
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/cadastreCar.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackCadasCar.css" rel="stylesheet">
    <!-- endbuild -->

	
</head>

<body>
<?php 

	if(isset($_POST['plano']) && isset($_POST['pacote'])){
		$plano = $_POST['plano'];
		$pacote = $_POST['pacote'];
	} else {
	        $plano = $_GET['plano'];
		$pacote = $_GET['pacote'];
	}

	$back = "carrinho-parte-um/".$pacote."/".$plano;

?>
    <div class="tudo">
            <header>
            <h1 class="sumir">Escolha seu pacote e garanta sua presença online</h1>
            <ul>
                <li> <a href="<?php echo $back; ?>">Voltar</a> </li>
            </ul>
            <figure> <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio"> </figure>
            <p>Garantindo sua presença online.</p>
            <div>
                <ul>
                    <li>
                        <p>Carrinho</p>
                    </li>
                    <li>
                        <p>Identificação</p>
                    </li>
                    <li>
                        <p>Criar Anúncio</p>
                    </li>
                    <li>
                        <p>Pagamento</p>
                    </li>
                    <li>
                        <p>Confirmação</p>
                    </li>
                </ul>
            </div> 
        </header>
        <div class='fundoEscuro'></div>
        <main>
            <div class='car'>
                <div>
                    <section>
                        <h2>Identificação</h2>
                        <form>
                            <fieldset>
                                <legend>Já sou cliente</legend>
                                <p id="returnLogin"></p> <label for="tM" id="ema">E-mail</label> 
                                <input type="email" id="tM" name="email" required title="Digite seu email !"> 
                                <label for="tSenha" id="senh">Senha</label> <input type="password" name="senha" id="tSenha" class="tSenhas" size="10" maxlength="30" title="Digite sua senha"> 
                                <input type="checkbox" id='priCheck' class="mostraSe" name="mostraS">
                                <input type="hidden" value="<?php echo $pacote; ?>" id="lPac" name="pacote"> 
                                <input type="hidden" value="<?php echo $plano; ?>" id="lPla" name="plano"> 
                                <input type="hidden" value="on" name="logCart"> 
                                <input type="submit"  id="tLogin" class="prevenir" name="cEntrar" value="entrar"> 
				<p id="lRetorno"></p>
                                <button type="button" class="esqSen"> Esqueceu sua senha?</button> 
                        </fieldset>
                        </form>
                         <ul class="faceB">
                                <li>
                                    <a href="<?php echo $faceAut; ?>">Entrar com facebook</a>
                                </li>
                            </ul>
                        <!--este bloco eh recuperar senha esquecida-->
                        <div class="recupSenha"> <button type="button" class="volt">Voltar</button>
                            <form>
                                <fieldset>
                                    <legend class="leg">Recuperar Senha</legend>
                                    <p id="retReco">Informe seu e-mail e você receberá instruções para recuperar sua senha.</p><label for="mailRecupera">E-mail</label> <input type="email" id="mailRecupera" class="efeitoL" name="mailRecupera" required title="Digite seu e-mail"><input type="submit" id="recuperar" class='prevenir' name="recuperar" value="Recuperar Senha"> </fieldset>
                            </form>
                        </div>
                    </section>
                </div>
                <div class="cad">
                    <section>
                        <h2>Apareça na internet, cadastre-se.</h2>
                        <form>
                            <fieldset>
                                <legend>Cadastre</legend> <label for="tNome" id="nameCad">Nome</label> 
                                <input type="text" id="tNome" name="nome" value="" required title="Digite seu nome"> 
                                <label for="tCadastro" id='emaCad'> E-mail </label>
                                <input type="email" id="tCadastro" name="email" value="" required title="Digite seu email"> 
                                <label for="tSen" id='senCad'>Senha</label>
                                <input type="password" id="tSen" name="senha" class="tSenhas" required title="senha" minlength="6" maxlength="30"> 
                                <input type="checkbox" class="mostraSe" id="olho" name="most">
				<input type="hidden" value="<?php echo $pacote; ?>" id="pac" name="pacote"> 
				<input type="hidden" value="<?php echo $plano; ?>" id="pla" name="plano"> 
                                <input type="hidden" value="on" name="logCart">
                                <p class="minimo">minímo de 6 caracteres</p> 
                                <input type="submit" id="tFinaliza" class="prevenir" name="cFinaliza" value="criar conta">
                                <p>Ao cadastrar, você estará concordando com nossa<a href="#" hreflang="pt-br">Política de Privacidade.</a></p> <label for="tCon">Receber Dicas e Novidades <input type="checkbox" name="cCon" id="tCon" checked="true"> </label> <p id="retorno"></p></fieldset>
			
                        </form>
                    </section>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="view/assets/js/car02.min.js"></script>
<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]> <script src = "js/html5shiv.js"> </ script> <script src="js/css3-mediaqueries.js"></script><[endif]-->
<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<!-- script src="view/assets/js/jquery.validate.js"></script -->

<!--fim div tudo-->
<script>
    $("#baiDinamic").html(geraSelectBairro());
    $(function() { //Função que ao clicar no botão, irá fazer. $("#tFinaliza").click(function(){ var controller = "CadastroCliente"; var action = "insertCadastro"; var nome = $("#tNome").val(); var email = $("#tCadastro").val(); var senha = $("#tSen").val(); //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php $.post("index.php", { controller: controller, action: action, nome: nome, email: email, senha: senha }, function (result) { //Depois que foi completado o cadastro e tem a mensagem de retorno, esconde a div carregando_form que tem a barra de carregamento. complete:$("#carregando_form").hide("slow"); //Aqui coloca o valor que retono na função get_retorno dentro da div retorno, e mostra a div com efeito em slow. // $("#retorno").show("slow").text(result); $( "#retorno" ).html(result); // $("#retorno").delay(4000).hide("slow"); }); }); });
</script>
<script>

    $("#baiDinamic").html(geraSelectBairro());

    $(function(){
        //Função que ao clicar no botão, irá fazer.
        $("#tFinaliza").click(function(){
            var controller = "CadastroCliente";
            var action = "insertCliCart";
            var nome = $("#tNome").val();
            var email = $("#tCadastro").val();
            var senha = $("#tSen").val();
	    var pacote = $("#pac").val();
	    var plano = $("#pla").val();

	    if(!emailValidate(email)){
		$("#emaCad").html("Email inválido");
		return false;
	    } else {
		$("#emaCad").html("Email válido");
		
	    }

	    if(nome == ""){
		$("#nameCad").html("O nome deve ser preenchido");
		return false;
	    }

	     if(senha == ""){
		$("#senCad").html("A senha deve ser preenchida");
		return false;
	    }

            //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
            $.post("index.php", {
                    controller: controller,
                    action: action,
                    nome: nome,
                    email: email,
                    senha: senha,
		    pacote: pacote,
		    plano: plano
                },

                function (result) {

		 if(result == "ok"){
					
			location.href = "/carrinho-parte-tres/"+pacote+"/"+plano;  

		} else {

			$("#retorno").html(result);
		}
                 
                });
        });
    });



  $(function(){
        //Função que ao clicar no botão, irá fazer.
        $("#tLogin").click(function(){
            var controller = "Dashboard";
            var action = "login";
            var email = $("#tM").val();
            var senha = $("#tSenha").val();
	    var pacote = $("#lPac").val();
	    var plano = $("#lPla").val();

	    if(!emailValidate(email)){
		$("#ema").html("Email inválido");
		return false;	
	    } else {
		$("#ema").html("Email válido");
		
	     }

	    if(senha == ""){

		$("#senh").html("Informe sua senha");
		return false;

	    }

            //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
            $.post("index.php", {
                    controller: controller,
                    action: action,
                    email: email,
                    senha: senha,
		    pacote:pacote, 
		    plano: plano,
		    logCart: "on"
		  
                },

                function (result) {

		

		 if(result == "UserOK"){
					
			location.href = "/carrinho-parte-tres/"+pacote+"/"+plano;

		} else {

			$("#lRetorno").html(result);
		}
                 
                });
        });
    });
</script>



</html>
