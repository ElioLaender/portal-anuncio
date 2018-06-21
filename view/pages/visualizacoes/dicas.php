<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Aproveite nossas dicas, temos parceria com os melhores profissionais para lhe oferecer milhares de dicas para sua empresa, turbinar suas vendas. Dicas de balada, saúde e beleza, fique atualizado aqui na SempreNegócio.">
    <meta name="keywords" content="semprenegocio.com.br, semprenegocio.com, Sempre Negócio, sempre negócio, semprenegocio, Dicas de saúde,dicas para empreendedorismo,dicas de beleza,dicas para balada,balada,empresas,empreendedorismo,saúde.">
    <link rel="icon" href="view/assets/imagens/flor.png">

    <title>Sempre Negócio - Dicas para seu negócio, para</title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/dicas.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">

    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/breackDicas.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
        <header class="barraM">
            <h1 class="sumir">Aproveite nossas dicas para voce e seu negócio.</h1>
            <div id='escBar'></div>
            <div class="paiBarra">
                <!-- primeira div sera hamburguer -->
                <button type="button" id="hamburguer"></button>
                <div>
                    <aside>
                        <h3 class="sumir">links para auxílio</h3>
                        <button type="button" class="fechar">Fechar</button>
                        <span></span>
                        <form action="/pesquisa/" method="post">
                            <fieldset>
                                <label for="buscar">
                                    <input type="search" id="buscar" placeholder="Pesquisar" class="completar" name="busc" maxlength="70" required title="Digite aqui para que a pesquisa seja efetuada." >
                                </label>
                                <label for="pes">
                                    <input type="submit" id="pes" name="pes" value="pesquisar">
                                    <span></span>
                                </label>
                            </fieldset>
                        </form>
                         <ul>
                            <li>
                                <a href="?controller=Home&action=index" hreflang="pt-br" >Home</a>
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
                                <a href="?controller=Home&action=index" hreflang="pt-br">A empresa</a>
                            </li>
                         </ul>
                    </aside>
                </div>
                <!--div criado para efeito de escurecer o fundo do aside -->
                <div class="fundoEscuro"></div>

            <!-- Pesquisa div este parecera so no desktop-->
            <div class="pesBarraM">
                <form action="/pesquisa/" method="post">
                    <fieldset>
                        <legend class="sumir">Pesquisar</legend>
                        <label for="busc">
                            <input type="search" id="busc" name="busc" class="completar" placeholder="Bares, lojas, beleza..." maxlength="70" required title="Digite aqui para que a pesquisa seja efetuada." >
                        </label>

                       <label for='pesBair'>
                          <input type="search" id="pesBair" name="bairro" class="compleBairro" placeholder="Busca por bairros">
                       </label>
                       
                       <label for="pesq">
                          <input type="submit" id="pesq" name="pesq" value="pesquisa">
                       </label>
                    </fieldset>
                </form>
            </div>

                <?php
                #verifica se está logado, caso positivo exibe código da foto com as opções, caso negativo opções de login.
                if(isset($arrayUser) && !empty($arrayUser)){

                    echo  "<div class='fotoBar' id='paiFoto'>
                        <figure id='figuHome'>
                            <img src='".$arrayUser[0]['cli_foto']."' alt='imagem circular representando o proprietário da conta.'>
                        </figure>
                        <div id='blocoFot'>
                            <ul>
                               <li>
                                    <a href='/painel-de-controle/'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=viewDashboard&option=alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Home&dirAction=action=viewDicas'>Sair</a>
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

                                    <input type='hidden' id='dirLogin' value='?controller=Home&action=viewDicas'>

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
                        <li><a href="?controller=Home&action=index">Home</a></li>
                    </ul>
                </div>
                <!--fim div que da contexto para seu filhos-->
            </div>
        </header>
        <main>
        <div class='primDiv'>
          <section class='prinSect'>
          <h2 class='sumir'>Dicas SempreNegócio</h2>
            <figure>
               <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio">
            </figure>
            <div>
                <div class="paiDic">
                    <p>Dicas da SempreNegócio</p>
                    <p>Escolha quais dicas você deseja ver no momento</p>
                    <div>
                        <article>
                            <h3>Para seu negócio</h3>
                            <p>Dicas para sua empresa atingir seus objetivos.</p>
                             <ul>
                                <li>
                                    <a href="#" class="empr">Ver Dicas</a>
                                </li>
                            </ul>
                        </article>
                    </div>
                    <div>
                        <article>
                            <h3>Melhore seu network</h3>
                            <p>Dicas para você ser um profissional desejado.</p>
                            <ul>
                                <li>
                                    <a href="#" class="net">Ver Dicas</a>   
                                </li>
                            </ul>
                        </article>
                    </div>
                    <div>
                        <article>
                            <h3>Dicas de entreterimento</h3>
                            <p>Conheça os locais onde a galera ta curtindo</p>
                            <ul>
                                <li>
                                    <a href="#" class="entr">Ver Dicas</a>
                                </li>
                            </ul>
                        </article>
                    </div>
                    <div>
                        <article>
                            <h3>Saúde e Beleza</h3>
                            <p>Sinta-se melhor com nossas dicas</p>
                             <ul>
                                <li>
                                    <a href="#" class="saud">Ver Dicas</a>
                                </li>
                            </ul>
                        </article>
                    </div>
                </div>

                <div class="paiCon">
                        <button type="button" value="filtro">filtro</button>
                    <div class='filtro'>
                          <aside>
                              <h2>Veja outras dicas</h2>
                              <button type='button' value='fechar'>fechar</button>
                              <ul class="filtro">
                                 <li>
                                    <a href="#" hreflang='pt-br'>Para seu negócio</a>
                                 </li>
                                 <li>
                                    <a href="#" hreflang='pt-br'>Melhore seu network</a>
                                 </li>

                                 <li>
                                    <a href="#" hreflang='pt-br'>Dicas de entreterimento</a>
                                 </li>

                                  <li>
                                    <a href="#" hreflang='pt-br'>Saúde e Beleza </a>
                                 </li> 
                              </ul>
                          </aside>
                    </div>
                    <div class='paiArtigos'>
                        <section>
                            <h2 class='sumir'>Nossos artigos</h2>
                            <div class='empresa'>
                              <article>
                                  <h3>Em breve dicas especias para sua empresa</h3>
                                  <figure>
                                    <img src='/view/assets/imagens/manAndwoman@2x.jpg' alt='Imagem da postagem'>
                                  </figure>
                                 <!-- <p>
                                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os 
                                </p>
                                 <p>Postado por:<em>José Élio</em></p>
                                 <p>data:04/02/2016</p>                               
                                 <ul>
                                    <li>
                                        <a href="#">Continuar lendo...</a>
                                    </li>
                                </ul> -->
                              </article>
                            </div>

                             <div class='network'>
                                <article>
                                  <h3>Em breve dicas especias para melhorar sua rede de contatos</h3>
                                  <figure>
                                    <img src='/view/assets/imagens/manAndwoman@2x.jpg' alt='Imagem da postagem'>
                                  </figure>
                            <!--      <p>
                                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os 
                                </p>
                                 <p>Postado por:<em>José Élio</em></p>
                                 <p>data:04/02/2016</p>                               
                                 <ul>
                                    <li>
                                        <a href="#">Continuar lendo...</a>
                                    </li>
                                </ul> -->
                              </article>
                            </div>

                            <div class='balada'>
                              <article>
                                  <h3>Em breve dicas para baladas</h3>
                                  <figure>
                                    <img src='/view/assets/imagens/show01.jpg' alt='Imagem da postagem'>
                                  </figure>
                                 <!--  <p>
                                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os 
                                 </p>
                                 <p>Postado por:<em>José Élio</em></p>
                                 <p>data:04/02/2016</p>                               
                                  <ul>
                                    <li>
                                        <a href="#">Continuar lendo...</a>
                                    </li>
                                </ul> -->
                              </article>
                            </div>
                            <div class='saude'>
                              <article>
                                  <h3>Em breve dicas especias para sua saúde</h3>
                                  <figure>
                                    <img src='/view/assets/imagens/saude01.jpg' alt='Imagem da postagem'>
                                  </figure>
                                  <!-- <p>
                                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os 
                                 </p>
                                 <p>Postado por:<em>José Élio</em></p>
                                 <p>data:04/02/2016</p>                               
                                  <ul>
                                    <li>
                                        <a href="#">Continuar lendo...</a>
                                    </li>
                                  </ul> -->
                              </article>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
             </div>
          </section>
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
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<!-- build:js js/index.min.js -->
<script src="view/assets/js/barraMenu.js"></script>
<script  src="view/assets/js/loginDash.js"></script>
<script  src="view/assets/js/dica.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<!-- endbuild -->
<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->


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

