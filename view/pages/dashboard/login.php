<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Logar na SempreNegócio para poder comentar em anúncios,cadastrar novos anúncios, currículo,editar perfilde login.">
    <meta name="keywords" content="Logar na semprenegócio,login,entar na semprenegócio.">
    <link rel="icon" href="view/assets/imagens/flor.png">

    <title>Acessar conta</title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/login.css" rel="stylesheet">

    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/breackLogin.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <!-- endbuild -->

</head>

<body>

<?php

if(isset($_GET['menValid']) && !empty($_GET['menValid']) && $_GET['menValid'] == "true"){
 $titleForm = "Parabéns, sua conta foi validada com sucesso, faça login para continuar.";
}else{
 $titleForm = "Área do Cliente";
}

?>
<div class="tudo">
        <header class="barraM">
            <h1>Entra na sempre negócio</h1>
            <div id='escBar'></div>
            <div class="paiBarra">
                <!-- primeira div sera hamburguer -->
                <button type="button"></button>
                <div>
                    <nav>
                        <h3 class="sumir">links de navegação</h3>
                        <button type="button" class="fechar">Fechar</button>
                        <span></span>
                        <form action="?controller=Anuncio&action=viewAnuncioPesquisa" method="post">
                            <fieldset>
                                <label for="buscar">
                                    <input type="search" id="buscar" placeholder="Pesquisar" class="completar" name="busc" maxlength="25" required title="Digite aqui para que a pesquisa seja efetuada." >
                                </label>
                                <label for="pes">
                                    <input type="submit" id="pes" name="pes" value="pesquisar">
                                    <span></span>
                                </label>
                            </fieldset>
                        </form>
                        <ul>
                            <li>
                                <a href="?controller=CadastroCliente&action=telaCadastro" hreflang="pt-br">Cadastrar</a>
                            </li>
                            <li>
                                <a href="?controller=Home&action=viewDescontos" hreflang="pt-br">Descontos</a>
                            </li>
                            <li>
                                <a href="?controller=Home&action=duvidasFrequentes" hreflang="pt-br">Dúvidas Freguentes</a>
                            </li>
                            <li>
                                <a href="?controller=Home&action=viewDicas" hreflang="pt-br">Dicas</a>
                            </li>
                            <li>
                                <a href="?controller=Home&action=viewInvistaNegocio" hreflang="pt-br" class="cor">Anuncie Grátis</a>
                            </li>
                            <li>
                                <a href="#" hreflang="pt-br">A empresa</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--div criado para efeito de escurecer o fundo do aside -->
                <div class="fundoEscuro"></div>

                <!-- Pesquisa div este parecera so no desktop-->
                <div>
                    <form action="?controller=Anuncio&action=viewAnuncioPesquisa" method="post">
                        <fieldset>
                            <legend class="sumir">Pesquisar</legend>
                            <label for="campo-busca">
                                <input type="search" id="campo-busca" name="busc" class="completar" placeholder="Bares, lojas, beleza ..." maxlength="25" required title="Digite aqui para que a pesquisa seja efetuada." >
                            </label>
                            <label for='pesBair'>
                                <input type="search" id="pesBair" name="tCat" class="compleBairro" placeholder="Busca por bairros">
                            </label>
                            <label for="pesq">
                                <input type="submit"  id="tPesqui" name="cPesqui" value="pesquisa">
                            </label>
                        </fieldset>
                    </form>
                </div>

                <!-- Div efetuar login -->
                <div class="efetua">
                    <div></div>
                    <button type="button" class="login">Cadastre-se</button>
                    <div class="logar">
                        <button type="button">fechar</button>
                        <form>
                            <fieldset class="apagar">
                                <legend>Entrar na SempreNegócio</legend>
                                <ul>
                                    <li>
                                        <a href="<?php echo $faceAut; ?>">Entrar com facebook</a>
                                    </li>
                                </ul>
                            </fieldset>
                            <fieldset class="apagar">
                                <legend>Ou use seu E-mail</legend>

                                <p id="returnLogin" style="font-size: 14px; background-color: silver"></p>

                                <label for="tM">E-mail</label>
                                <input type="email" id="tM" class="efeitoL" name="cM" required title="Digite seu email !">

                                <label for="tSenha">Senha</label>
                                <input type="password" name="cSenha" id="tSenha" class="tSenhas efeitoL" size="10" maxlength="30" title="Digite sua senha">
                                <input type="checkbox" class="mostraSe" name="mostraS">

                                <label for="tEntrar">Entrar</label>
                                <input type="submit" id="tEntrar" class="prevenir" name="cEntrar" value="entrar">

                                <label for="tManter">Manter conectado
                                    <input type="checkbox" name="tManter" id="tManter" value="logado" checked="true">
                                    <span></span></label>

                                <button type="button" class="esqSen"> Esqueceu sua senha?</button>
                            </fieldset>

                            <fieldset class="cadastre">
                                <legend class="sumir">Cadastrar</legend>
                                <button type="button" class="apagar">Cadastre-se!</button>
                                <fieldset>
                                    <legend id="retornoCadCli">faça parte da sempre negócio, cadstre-se!</legend>
                                    <label for="cadasNo">Nome</label>
                                    <input type="text" id="tNome" class="efeitoL" name="cadasNo" required title="Primeiro nome !">

                                    <label for="cadasEm">E-mail</label>
                                    <input type="email" id="tCadastro" class="efeitoL" name="cadasEm" required title="Digite seu email !">

                                    <label for="senh">Senha</label>
                                    <input type="password" name="senh" id="tS" class="tSenhas efeitoL" minlength="6" size="10" maxlength="30" title="Digite sua senha">
                                    <input type="checkbox" class="mostraSe" name="mostraS">
                                    <p>mínimo de 6 caracteres</p>

                                    <label for="conT">Receber Dicas e Novidades</label>
                                    <input type="checkbox" name="conT" id="conT" checked="true">
                                    <span></span>

                                    <label for="cadast" class="sumir">Cadastrar</label>
                                    <input type="button" id="cadast" class="prevenir cadNewCli" name="cadast" value="Cadastrar">
                                    <p>Ao cadastrar, você estará concordando com nossa<a href="#" hreflang="pt-br">Política de Privacidade.</a></p>
                                </fieldset>
                            </fieldset>
                        </form>
                    </div>
                    <!--este bloco eh recuperar senha esquecida-->
                    <div class="recupSenha">
                        <button type="button" class="volt">Voltar</button>
                        <form>
                            <fieldset>
                                <legend>Recuperar Senha</legend>

                                <p id="retReco">Informe seu e-mail e você receberá instruções para recuperar sua senha.</p>

                                <label for="mailRecupera">E-mail</label>
                                <input type="email" id="mailRecupera" class="efeitoL" name="mailRecupera" required title="Digite seu e-mail">

                                <label for="recuperar" class="sumir">Recuperar senha</label>
                                <input type="button" id="recuperar" name="recuperar" value="Recuperar Senha">

                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- div fechando pai do login -->
                <div class="home">
                    <ul>
                        <li><a href="home">Home</a></li>
                    </ul>
                </div>
                <!--fim div que da contexto para seu filhos-->
            </div>
        </header>
      <main>
        <div class='primDiv'>
            <aside class="asidLogin">
                <h3>Impulsione seu anúncio</h3>
                <div>
                  <p>Impulsione seu anúncio, e conquiste novos clientes !</p>
                  <p>Aproveite esta oportunidade.</p>
                </div>
            </aside>
            <section class="secLogin">
                <h2>Acessar conta</h2>
                <article>
                    <h3>Ainda não possui conta?</h3>
                    <ul>
                        <li>
                            <a href="?controller=CadastroCliente&action=telaCadastro"
                               hreflang="pr-br">Faça seu cadastro! =)</a>
                        </li>
                    </ul>
                </article>
                <div>
                    <div id="retorno"></div>
                    <form>
                        <fieldset>
                            <legend><?php echo $titleForm; ?></legend>

                            <label for="tLogin">Login</label>
                            <input type="email" id="tLogin" name="cLogin" required title="Informe seu email de cadastro"
                                   class="efeitoL">

                            <label for="tSen">Senha </label>
                            <input type="password" id="tSen" name="cSen" class="tSenhas efeitoL" required title="senha">
                            <input type="checkbox" class="mostraSe" id="olho" name="most">

                            <label for="tContinuar"> Desejo continuar logado </label>
                            <input type="checkbox" checked="true" id="tMan" value="logado" name="cMan">
                            <span></span>

                            <input type="submit" id="tAcessar" class="prevenir" name="cFinaliza" value="Acessar minha conta">

                        </fieldset>

                    </form>
                </div>
                <div class="recupS">
                    <button type="button" class="volt">Voltar</button>
                    <form>
                        <fieldset>
                            <legend>Recuperar Senha</legend>

                            <p id="retRecoHome" >Informe seu e-mail e você receberá instruções para recuperar sua senha.</p>

                            <label for="mailRecupera">E-mail</label>
                            <input type="email" id="mailRecuperaHome" class="efeitoL" name="mailRecupera" required
                                   title="Digite seu e-mail">

                            <label for="recuperar" class="sumir">Recuperar senha</label>
                            <input type="button" id="recuperarHome" name="recuperar" value="Recuperar Senha">

                        </fieldset>
                    </form>
                </div>
                <div class="esq">
                    <ul>
                        <li>
                            <a href="<?php echo $faceAut; ?>" hreflang="pt-br">Logar com facebook.</a>
                        </li>
                    </ul>

                    <ul>
                        <li>
                            <button type="button">Esqueci minha senha !</button>
                        </li>
                    </ul>
                </div>

            </section>
        </div>
    </main>
</div>
<!--Fim da div tudo -->
</body>

<script src="view/assets/js/jquery-1.11.3.min.js"></script>

<!--Efeito label deve ser chamado nessa ordem para não dar pau@!-->
<!-- build:js js/index.min.js -->
<script  src="view/assets/js/efeitoLabel.js"></script>
<script src="view/assets/js/barraMenu.js"></script>
<script  src="view/assets/js/gif.js"></script>
<script src="view/assets/js/revelaSenha.js"></script>
<script  src="view/assets/js/mensagens.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script  src="view/assets/js/cadNewCli.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<!-- endbuild -->

<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>

<script>
    //Envio assíncrono do formulário de login.
    $(function(){
        //Função que ao clicar no botão, irá fazer.
        $("#tAcessar").click(function(){

            var controller = "Dashboard";

            var action = "login";

            var email = $("#tLogin").val();

            var senha = $("#tSen").val();

            if($("#tMan").is(":checked")){

                var manterConectado = $("#tMan").val();

            } else {

                var manterConectado = "";

            }

		if(!emailValidate(email) || senha == ""){

			 $( "#retorno" ).html("<p>* Erro: Email ou senha invalidos, tente novamente.</p>");
			 return false;

		}





            //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
            $.post("index.php", {


                    controller: controller,
                    action: action,
                    email: email,
                    senha: senha,
                    manterConectado: manterConectado
                },



                function (result) {

                    //Caso verdadeiro redireciona para o painel de controle.
                    if(result == "UserOK") {
                        window.location.href = '/painel-de-controle/';

                    } else{
                        $( "#retorno" ).html(result);
                    }

                });


        });


    });








</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5769b330417689124ee171c0/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</html>

