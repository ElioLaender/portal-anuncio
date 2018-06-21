<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Cadastre-se na SempreNegócio e anuncie sua empresa no melhor guia eletrônico de pesquisas por empresas e lugares. Você pode também cadastrar seu currículo aqui, novidade que trazemos para melhorar sua empregabilidade.">
    <meta name="keywords" content="cadastrar email, cadastrar anúncio, cadastrar currículo, anúncios, aparecer na internet, minha empresa online, cadastrar na semprenegócio, semprenegocio.com.br, semprenegocio.com">
    <link rel="icon" href="view/assets/imagens/flor.png">
    
    <title>Sempre Negócio - cadastre</title>
    <!-- Custom divfacil -->
     <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/CadastroCli_Pg02.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/banners.css" rel="stylesheet">
    <link href="view/assets/estilo/breackCli.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    
 </head>
<body>
<div class="tudo">
    <header class="barraM">
        <h1>Cadastre</h1>
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
                                <input type="search" id="buscar" class="completar" placeholder="Pesquisar" name="busc" maxlength="25" required title="Digite aqui para que a pesquisa seja efetuada." >
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
                            <input type="search" id="campo-busca" name="busc" class="completar" placeholder="Bares, lojas, beleza ..." maxlength="70" required title="Digite aqui para que a pesquisa seja efetuada." >
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
            <?php
            #verifica se está logado, caso positivo exibe código da foto com as opções, caso negativo opções de login.
            if(isset($arrayUser) && !empty($arrayUser)){

                echo  "<div class='fotoBar' id='paiFoto'>
                        <figure>
                            <img src='".$arrayUser[0]['cli_foto']."' alt='imagem circular representando o proprietário da conta.'>
                        </figure>
                        <div id='blocoFot'>
                            <ul>
                               <li>
                                     <a href='painel-de-controle'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='/completar-perfil/alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='?controller=Dashboard&action=sair&dirControl=?controller=CadastroCliente&dirAction=action=telaCadastro'>Sair</a>
                                </li>

                            </ul>
                        </div>
                    </div>";

            } else if(isset($arrayFace)){

                echo  "<div class='fotoBar' id='paiFoto'>
                        <figure id='figuHome'>
                            <img src='https://graph.facebook.com/".$arrayFace['id']."/picture' alt='imagem circular representando o proprietário da conta.'>
                        </figure>
                        <div id='blocoFot'>
                            <ul>
                               <li>
                                    <a href='painel-de-controle'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sairFace'>Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>";
            } else {

                     echo "<!-- Div efetuar login -->
                    <div class='efetua'>
                        <div></div>
                        <button type='button' class='login'>Efetuar Login</button>
                        <div class='logar'>
                            <button type='button'>fechar</button>
                            <form>
                                <fieldset>
                                    <legend>Entrar na SempreNegócio</legend>
                                    <ul>
                                        <li>
                                            <a href='".$faceAut."'>Entrar com facebook</a>
                                        </li>
                                    </ul>
                                </fieldset>
                                <fieldset>
                                    <legend>Ou use seu E-mail</legend>


                                    <label for='tM'>E-mail</label>
                                    <input type='email' id='tM' class='efeitoL' name='cM' required title='Digite seu email !'>

                                    <label for='tSenha'>Senha</label>
                                    <input type='password' name='cSenha' id='tSenha' class='tSenhas efeitoL' size='10' maxlength='30' title='Digite sua senha'>
                                    <input type='checkbox' class='mostraSe' name='mostraS'>

                                     <input type='hidden' id='dirLogin' value=''>

                                    <p id='returnLogin'></p>
                                    <input type='submit' id='tEntrar' class='prevenir' name='cEntrar' value='Entrar'>

                                    <label for='tManter'>Manter conectado
                                        <input type='checkbox' name='tManter' id='tManter' value='logado' checked='true'>
                                        <span></span></label>

                                    <button type='button' class='esqSen'> Esqueceu sua senha?</button>
                                    <ul>
                                        <li>
                                            <a href='?controller=CadastroCliente&action=telaCadastro'>Cadastre-se !</a>
                                        </li>
                                    </ul>
                                </fieldset>
                            </form>
                        </div>
                        <!--este bloco eh recuperar senha esquecida-->
                        <div class='recupSenha'>
                            <button type='button' class='volt'>Voltar</button>
                            <form>
                                <fieldset>
                                    <legend>Recuperar Senha</legend>

                                    <p id='retReco'>Informe seu e-mail e você receberá instruções para recuperar sua senha.</p>

                                    <label for='mailRecupera'>E-mail</label>
                                    <input type='email' id='mailRecupera' class='efeitoL' name='mailRecupera' required title='Digite seu e-mail'>

                                    <label for='recuperar' class='sumir'>Recuperar senha</label>
                                    <input type='submit' id='recuperar' class='prevenir' name='recuperar' value='Recuperar Senha'>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- div fechando pai do login -->";
            }
            ?>
            <div class="home">
                <ul>
                    <li><a href="home">Home</a></li>
                </ul>
            </div>
            <!--fim div que da contexto para seu filhos-->
        </div>
    </header>
    <main>
        <!--Este eh o bloco onde o cliente cadastra no sistema-->
        <div class="ban">
            <div>
                <p>
                    Confira nossos planos para sua empresa
                </p>
                <p>
                    Por menos de <span>R$ 0,14</span> centavos ao dia, você <span>garante</span> sua presença online!
                </p>
                <ul>
                    <li>
                        <a href='/anuncie/'>Ver planos</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="formBanner">
            <div class="piaSectCadastro">
                <section>
                    <h2>Apareça na internet, temos o melhor custo benefício.</h2>
                    <ul>
                        <li>
                            <a href="login/" lang="pt-br"><strong>Já possui cadastro?</strong> Acesse sua conta!</a>
                        </li>
                    </ul>
                    <!-- Retorno do cadastro do cliente -->
                    <div id="retorno"></div>
                    <div class="recSenh">
                        <button type="button">fechar</button>
                        <form action="#" method="post">
                            <fieldset class="cadast">
                                <legend>Suporte SempreNegócio</legend>
                                <p id="retRecoHome">Informe seu e-mail e você receberá instruções para recuperar sua senha.</p>

                                <label for="recP"> E-mail </label>
                                <input type="email" id="mailRecuperaHome" name="recP" value="" required title="Digite seu email" class="efeitoL">
                                <input type="button" id="recuperarHome" name="recu" value="Recuperar Senha">
                            </fieldset>
                        </form>
                    </div>

                    <form action="#" method="post">

                        <fieldset class="cadast">

                            <legend>Cadastre</legend>
                            <label for="tNome">Nome</label>
                            <input type="text" id="tNome" name="cNome"  required title="Digite seu nome" class="efeitoL">

                            <label for="tCadastro"> E-mail </label>
                            <input type="email" id="tCadastro" name="cCadastro"  required title="Digite seu email" class="efeitoL">
                            <label for="tSen">Senha </label>
                            <input type="password" id="tSen" name="cSen" class="tSenhas efeitoL" required title="senha" minlength="6" maxlength="30">
                            <input type="checkbox" class="mostraSe" id="olho" name="most">
                            <p>minímo de 6 caracteres</p>
                            <label for="tFinaliza"></label>
                            <input type="submit" id="tFinaliza" class='prevenir' name="cFinaliza" value="criar conta">
                            <p>Ao cadastrar, você estará concordando com nossa<a href="politica-de-privacidade/" hreflang="pt-br">Política de Privacidade.</a></p>

                            <label for="tCon">Receber Dicas e Novidades</label>
                            <input type="checkbox" name="cCon" id="tCon" checked="true">
                            <span></span>
                        </fieldset>
                    </form>
                </section>
            </div>
        </div>
    </main>
</div>
</body>
<!-- build:js js/index.min.js -->
<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/modernizr.custom.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/efeitoLabel.js"></script>
<script src="view/assets/js/gif.js"></script>
<script src="view/assets/js/mensagens.js"></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/revelaSenha.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<!-- endbuild -->

<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>

<!--fim div tudo-->
<script>

  //  $("#baiDinamic").html(geraSelectBairro());

	 $(document).ready(function(){
    $(function(){
        //Função que ao clicar no botão, irá fazer.
        $("#tFinaliza").click(function(){

	 
            var controller = "CadastroCliente";
            var action = "insertCadastro";
            var nome = $("#tNome").val();
            var email = $("#tCadastro").val();
            var senha = $("#tSen").val();


		if(!emailValidate(email) || senha == "" || nome == ""){

			 $( "#retorno" ).html("<p>* Erro: Nome, email ou senha invalidos, preencha todos os campos.</p>");
			 return false;

		}

            //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
            $.post("index.php", {
                    controller: controller,
                    action: action,
                    nome: nome,
                    email: email,
                    senha: senha
                },

                function (result) {
                    //Depois que foi completado o cadastro e tem a mensagem de retorno, esconde a div carregando_form que tem a barra de carregamento.
                    complete:$("#carregando_form").hide("slow");
                    //Aqui coloca o valor que retono na função get_retorno dentro da div retorno, e mostra a div com efeito em slow.
                    // $("#retorno").show("slow").text(result);
		   
                    $( "#retorno" ).html(result);
                    // $("#retorno").delay(4000).hide("slow");
                });
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
