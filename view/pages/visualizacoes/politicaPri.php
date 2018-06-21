<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="A SempreNegócio respeita sua privacidade, e seus diretios, leia nossas política de privacidade e saiba como trabalhamos com nossos parceiros e usuários.">
    <meta name="keywords" content="privacidade,política de privacidade,usuários,parceiros,direitos de usuários, Sempre Negócio, semprenegocio.com, semprenegocio.com.br">
    <link rel="icon" href="view/assets/imagens/flor.png">

    <title>Sempre Negócio - Política de segunça</title>
    <!-- build:css css/index.min.css -->
        <link href="view/assets/estilo/reset.css" rel="stylesheet">
        <link href="view/assets/estilo/index.css" rel="stylesheet">
        <link href="view/assets/estilo/politica.css" rel="stylesheet">
        <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">

        <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
        <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
        <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
        <header class="barraM">
            <h1>Política de privacidade e segurança</h1>
            <div id='escBar'></div>
            <div class="paiBarra">
                <!-- primeira div sera hamburguer -->
                <button type="button"></button>
                <div>
                    <nav>
                        <h3 class="sumir">links de navegação</h3>
                        <button type="button" class="fechar">Fechar</button>
                        <span></span>
                        <form action="/pesquisa/" method="post">
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
                              <a href="home" hreflang="pt-br" >Home</a>
                           </li>
                           <li>
                            <a href="?controller=CadastroCliente&action=telaCadastro" hreflang="pt-br">Cadastrar</a>
                        </li>
                        <li>
                            <a href="descontos/" hreflang="pt-br">Descontos</a>
                        </li>
                        <li>
                            <a href="duvidas-frequentes/" hreflang="pt-br">Dúvidas Freguentes</a>
                        </li>
                        <li>
                            <a href="dicas/" hreflang="pt-br">Dicas</a>
                        </li>
                         <li>
                            <a href="anuncie/" hreflang="pt-br" class="cor">Anuncie Grátis</a>
                        </li>
                            <li>
                                <a href="home" hreflang="pt-br">A empresa</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--div criado para efeito de escurecer o fundo do aside -->
                <div class="fundoEscuro"></div>

                <!-- Pesquisa div este parecera so no desktop-->
                <div>
                    <form action="/pesquisa/" method="post">
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
                                     <a href='/painel-de-controle/'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='/completar-perfil/alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Home&dirAction=action=viewPoliticaPri'>Sair</a>
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
                                    <a href='/painel-de-controle/'>Painel de controle</a>
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
                                            <a href='#'>Entrar com facebook</a>
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


                                    <input type='hidden' id='dirLogin' value='?controller=Home&action=viewPoliticaPri'>

                                    <label for='tEntrar'>Entrar</label>
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
                        <li><a href="home">Home</a></li>
                    </ul>
                </div>
                <!--fim div que da contexto para seu filhos-->
            </div>
        </header>
       <main>
         <div class='primDiv'>
           <div>
              <section>
                  <h3>Política de privacidade e segurança</h3>
                   <div>
                      <h4>A Sempre Negócio garante sigilo e segurança</h4>
                      <p>A SempreNegócio possui alta tecnologia em proteção de dados e garante sua privacidade, sigilo e segurança, independente do valor da compra ou da forma de pagamento..</p>
                  </div>
                  <div>
                      <h4>Estatísticas de páginas visitadas</h4>
                      <p>Visando ajudá-lo a encontrar rapidamente o que você precisa, dentro das normas estabelecidas juridicamente, a SempreNegócio armazena estatísticas sobre páginas mais visitadas, criando maior interatividade entre você e o nosso site..</p>
                  </div>
                 
                  <div>
                      <h4>Utilização de cookies (arquivos de texto)</h4>
                      <p>A SempreNegócio.com.br colhe as informações através dos cookies (a informação que o identifica como o usuário único). O nosso site utiliza cookies para melhorar a qualidade do nosso serviço e para entender melhor nossa base de usuários. Para isto SempreNegócio.com armazena as preferências do usuário em cookies e nunca para rastrear ou controlar suas preferências.</p>
                      <p>A SempreNegócio.com.br não revelará seus cookies a terceiros, a não ser que requeira um processo legal válido como uma permissão de busca, uma citação ou uma ordem judicial.</p>
                      <p>A maioria dos navegadores está inicialmente configurada para aceitar cookies. Pode-se configurar o seu navegador para rejeitar todos os cookies ou para indicar que se enviará um cookie. Considere que é possível que algumas partes do serviço de busca SempreNegócio.com não funcionem corretamente sem os cookies.</p>
                  </div>

                  <div>
                      <h4>Proteção e privacidade de dados</h4>
                      <p>
                      Você pode comprar com segurança no SempreNegócio, pois todas as informações coletadas durante nosso sistema de compra passam pela empresa PagSeguro. Esse sistema protege seus dados e os armazena em um ambiente de proteção, que passa por processos de segurança auditados periodicamente.
                      </p>
                  </div>

                  <div>
                      <h4>Mensagens publicitárias</h4>
                      <p>
                        Eventualmente, você poderá receber informações, convites, promoções e ofertas de nossos produtos.
                      </p>
                  </div>
              </section>
          </div>
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
                       <li><a href="trabalhe-conosco/" id="trab">Trabalhe conosco</a></li>
                        <li><a href="fale-conosco/" id="cont">Fale conosco</a></li>
                        <li><a href="http://www.expressahost.com.br" id="sit"  hreflang="pt-br" target="_blank">Conheça nossos sistemas</a></li>
                    </ul>
                    <ul>
                        <li>
                            <p>Para Você</p>
                        </li>
                              <li><a href="duvidas-frequentes/" id="duvi">Dúvidas frequêntes</a></li>
                        <li><a href="termos-de-uso/" id="term">Termos de uso</a></li>
                        <li><a href="politica-de-privacidade/" id="poli">Política de privacidade</a></li>	
                    </ul>
                    <ul>
                        <li>
                          <p>Para Anunciantes</p>
                        </li>
                          <li><a href="painel-de-controle/" hreflang="pt-br">Painel de Controle</a></li>
                        <li><a href="termos-gerais/" id="poli">Termos gerais</a></li>
                        <li><a href="cuidados-com-fraudes/">Cuidados com fraudes</a></li>
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
<script src="view/assets/js/modernizr.custom.js"></script>
<!-- build:js js/index.min.js -->
<script src="view/assets/js/barraMenu.js"></script>
<script  src="view/assets/js/loginDash.js"></script>
<!-- <script src="view/assets/js/revelaBloco.js"></script> -->
<!-- endbuild -->
<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
<!-- Código responsável pelo autocomplete-->
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>


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

