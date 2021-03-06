<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    
    <meta name="description" content="Estamos ansiosos para escutar você, entre em contato com a SempreNegócio e vamos falar mais sobre seu negócio.">
    <meta name="keywords" content="negócio,entre em contato,fale conosco,nosso contato, Sempre Negócio, semprenegocio.com.br, semprenegocio.com">
    <link rel="icon" href="view/assets/imagens/flor.png">

    <title>Sempre Negócio - Fale conosco</title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/entreCont.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/breakAnuncAt0.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
        <header class="barraM">
            <h1>Entre em contato com a Sempre negócio</h1>
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
                    <!-- Pesquisa div este parecera so no desktop-->
                    <div>
                        <form action="pesquisa" method="post">
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
                                    <a href='?controller=Dashboard&action=ViewDashboard'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sairFace'>Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>";

                }  else if(isset($arrayFace)){

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

                                    <p id='returnLogin' style='font-size: 14px; background-color: silver;'></p>
                                    <label for='tM'>E-mail</label>
                                    <input type='email' id='tM' class='efeitoL' name='cM' required title='Digite seu email !'>

                                    <label for='tSenha'>Senha</label>
                                    <input type='password' name='cSenha' id='tSenha' class='tSenhas efeitoL' size='10' maxlength='30' title='Digite sua senha'>
                                    <input type='checkbox' class='mostraSe' name='mostraS'>

                                     <input type='hidden' id='dirLogin' value='?controller=cliente&action=viewFaleConosco'>

                                    <label for='tEntrar'>Entrar</label>
                                    <input type='submit' id='tEntrar' class='prevenir' name='cEntrar' value='Entrar'>

                                    <label for='tManter'>Manter conectado
                                        <input type='checkbox' name='tManter' id='tManter' value='logado' checked='true'>
                                        <span></span></label>

                                    <button type='button' class='esqSen'> Esqueceu sua senha?</button>
                                    <ul>
                                        <li>
                                            <a href='". $URL_INI ."?controller=CadastroCliente&action=telaCadastro'>Cadastre-se !</a>
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
                                    <input type='button' id='recuperar' name='recuperar' value='Recuperar Senha'>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- div fechando pai do login -->";
                }
                ?>
                <div class="home">
                    <ul>
                        <li><a href="?controller=Home&action=index">Home</a></li>
                    </ul>
                </div>
                <!--fim div que da contexto para seu filhos-->
            </div>
        </header>
      <main>
        <div class='primDiv'>
            <p>Entre em <strong>contato</strong> e vamos gerar <strong>soluções !</strong></p>
        </div>

        <div class="faleCom">
            <section>
                <h2>É bom ter você aqui</h2>
                <form>
                    <fieldset>
                        <legend id="retorno">Deixe sua mensagem</legend>
                        <label for="mNome" id="nome">Nome</label>
                        <input type="text" class="efeitoL" name="nome" id="mNome">

                        <label for="mEmail" id="email">Email</label>
                        <input type="text" name="email" class="efeitoL" id="mEmail">

                        <label for="mTel" id="telefone">Telefone</label>
                        <input type="tel" name="tel" class="efeitoL tel-fixo" id="mTel" required maxlength="15">
                        <fieldset>
                            <legend>Assunto</legend>
                            <select name="mAssunt" id="assunto">
                                <optgroup label="Informe o assunto"></optgroup>

                                <option value='Sugestão'>Sugestão</option>
                                <option value='Reclamação'>Reclamação</option>
                                <option value="Orçamento franquia">Orçamento franquia</option>
                                <option value='Proposta'>Proposta</option>
                                <option value='Dúvidas' selected>Dúvidas</option>
                                <option value='Outros'>Outros</option>
                            </select>
                        </fieldset>
                        <label for="tTex" id="mensa">escreva sua mensagem</label>
                        <textarea id="tTex" name="cDescricao"></textarea>

                        <input type="button" id="enviar" value="Enviar mensagem">
                    </fieldset>
                </form>
            </section>
        </div>
        <div class="paiAsi">
            <aside>
                <h3 ></h3>
                <ul>
                    <li>
                        <a href="?controller=Home&action=index">Sair</a>
                    </li>
                </ul>
            </aside>
        </div>
        
         <div class="paiRodape">
                <footer>
                <!-- Pesquisa div este parecera so no desktop-->
                <div>
                    <form>
                        <p id="returnCadEmail"></p>
                        <fieldset>
                            <legend>Cadastre e receba novidades da sua região</legend>
                            <label for="prom">
                                <input type="email" id="prom" name="prom"  placeholder="Insira seu E-mail" maxlength="25" required title="Insira seu e-mail">
                            </label>
                            <label for="cadatroEm">
                                <input type="submit" class="prevenir" id="cadatroEm" name="cadatroEm" value="Receber">
                            </label>
                        </fieldset>
                    </form>
                </div>
                    <nav>
                        <h3>Decubra mais</h3>
                        <ul>
                            <li>
                                <p>SempreNegócio</p>
                            </li>
                            <li><a href="?controller=Funcionario&action=viewTrabalheConosco" id="trab">Trabalhe conosco</a></li>
                            <li><a href="?controller=Home&action=viewTermosDeUso" id="cont">Fale conosco</a></li>
                            <li><a href="#" id="sit"  hreflang="pt-br" target="_blank">Conheça nossos sistemas</a></li>
                        </ul>
                        <ul>
                            <li>
                                <p>Para Você</p>
                            </li>
                            <li><a href="?controller=Home&action=duvidasFrequentes" id="duvi">Dúvidas frequêntes</a></li>
                            <li><a href="?controller=Home&action=viewTermosDeUso" id="term">Termos de uso</a></li>
                            <li><a href="?controller=Home&action=viewPoliticaPri" id="poli">Política de privacidade</a></li>
                        </ul>
                        <ul>
                            <li>
                                <p>Para Anunciantes</p>
                            </li>
                            <li><a href="?controller=Dashboard&action=ViewDashboard" hreflang="pt-br">Painel de Controle</a></li>
                            <li><a href="?controller=Home&action=viewTermosGerais" id="poli">Termos gerais</a></li>
                            <li><a href="?controller=Home&action=dicasFraude">Cuidados com fraudes</a></li>
                        </ul>
                        <ul>
                            <li>
                                <p>Siga-nos</p>
                            </li>
                            <li><a href="https://www.facebook.com/semprenegocio/?fref=ts" target="_blank" id="face">Facebook</a></li>
                            <li><a href="#" target="_blank" id="face">Twitter</a></li>
                        </ul>
                    </nav>
                <div>
                    <p>&copy; 2015</p>
                     <figure>
                        <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, semprenegócio">
                    </figure>
                </div>
            </footer>
        </div>
        <!--fim div paiRodape-->
    </main>
</div>
</body>
<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/contato.min.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>

<!-- <script src="view/assets/js/revelaBloco.js"></script> -->
<!-- endbuild -->
<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
<script>
    $(function(){
        //Função que ao clicar no botão, irá fazer.
        $("#enviar").click(function(){
            var controller = "cliente";
            var action = "FCPersist";
            var nome = $("#mNome").val();
            var email = $("#mEmail").val();
            var telefone = $("#mTel").val();
            var assunto = $("#assunto").val();
            var mensagem = $("#tTex").val();

	   if(nome == ""){
		$( "#nome" ).html("O nome deve ser preenchido");
		return false;
	   }

	   var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
	   if(!er.test($.trim(email))){

		    $( "#email" ).html("Email não válido");
		    return false;
	   } else {
		    $( "#email" ).html("Email válido");
	   }

	  if(telefone == ""){
		$( "#telefone" ).html("O telefone deve ser preenchido.");
		return false;
	   }

	   if(assunto == ""){
		$( "#assunto" ).html("Informe o assunto.");
		return false;
	   }

	   if(mensagem == ""){
		$( "#mensa" ).html("Mensagem deve ser preenchida.");
		return false;
	   }

	   

            //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
            $.post("index.php", {

                    controller: controller,
                    action: action,
                    nome: nome,
                    email: email,
                    telefone: telefone,
                    assunto: assunto,
                    mensagem: mensagem
                },

                function (result) {

                    $( "#retorno" ).html(result);

                    $("#mNome").val("");
                    $("#mEmail").val("");
                    $("#mTel").val("");
                    $("#assunto").val("");
                    $("#tTex").val("");
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

