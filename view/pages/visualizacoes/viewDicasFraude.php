<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Cuidado com fraudes, a SempreNegócio não aceita pagamentos em dinheiro, fique atento, verifique se o banco do boleto é o mesmo que informamos. Nossos profissionais tem identificações com crachá semprenegócio.">
    <meta name="keywords" content="imagens de anúncio,subir imagens,foto de empresa,foto de seerviço,foto de produtos,imagens de produtos,imagens de serviços,imagens de anunciantes, semprenegocio.com, semprenegocio.com.br">
    <link rel="icon" href="view/assets/imagens/flor.png">

    <title>Sempre Negócio - Aviso de fraudes</title>
      <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/fraude.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
        <header class="barraM">
            <h1 class="sumir">Guia de endereços, sua melhor escolha para encontar empresas e profissionais !</h1>
            <div id='escBar'></div>
            <div class="paiBarra">
                <!-- primeira div sera hamburguer -->
                <button type="button" id="hamburguer"></button>
                <div>
                    <aside>
                        <h3 class="sumir">links para auxílio</h3>
                        <button type="button" class="fechar">Fechar</button>
                        <span></span>
                        <form action="?controller=Anuncio&action=viewAnuncioPesquisa" method="post">
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
                    </aside>
                </div>
                <!--div criado para efeito de escurecer o fundo do aside -->
                <div class="fundoEscuro"></div>

              <!-- Pesquisa div este parecera so no desktop-->
            <div class="pesBarraM">
                <form action="?controller=Anuncio&action=viewAnuncioPesquisa" method="post">
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
                                    <a href='?controller=Dashboard&action=ViewDashboard'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sairFace'>Sair</a>
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

                                    <input type='hidden' id='dirLogin' value='?controller=Home&action=dicasFraude'>

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
         <div class='primDiv'>
           <section>
              <h2>Cuidado com fraudes</h2>

              <p>
                  A Sempre Negócio, alerta sobre golpes e fraudes que tem sido aplicado as pessoas físicas e jurídicas pelo Brasil. Fique atento!
              </p>
              <div>
                  <h3>Saiba como os fraudadores agem:</h3>
                  <p>- Os golpistas ligam identificando-se como nossos funcionários, usando nome da nossa empresa e marcas.</p>
                  <p>
                     - Enviam boletos bancários falsos de cobrança por e-mail.
                  </p>
                  <p>
                    - Os fraudadores solicitam um novo pagamento e envia o boleto de cobrança. E em muitos casos com nomes da SempreNegócio Ltda. e o mesmo CNPJ, além de utilizar nomes fictícios na identificação do favorecido para confundir quem recebe o boleto, mas a conta corrente não pertence a nossa empresa, caracterizando o desvio e a fraude. Aceitamos somente cartão de crédito ou débito.
                  </p>
                  <p>
                     - Os golpistas oferecem descontos em casos de pagamentos antecipados.
                  </p>
                  <p>
                    - Enviam dívidas que não existem e outros serviços oferecendo propostas de descontos e negociações.
                  </p>
                  <p>
                     - Ligam informando ter um título a ser protestado em seu nome ou em nome de sua empresa, de anúncios contratados com a SempreNegócio Ltda, e oferecem a possibilidade de efetuar o pagamento do mesmo por depósito em conta.

                  </p>
                  <p>
                     - Os Tabeliões de Protesto só podem intimar para pagamento no próprio Tabelionato por intimações ao devedor apenas por correspondência. Também não acate e-mails ou telefonemas com a mesma finalidade passados por falsos tabeliães e ou em nome das Centrais de Protestos.
                  </p>
              </div>
              <div>
                  <h3>Fique atento e proteja-se!</h3>
                  <p>
                      Sabemos que a grande similaridade dos boletos alterados é uma tentativa clara de indução ao erro dos usuários do serviço, pois alguns acabam pagando, e como medida preventiva nós alertamos nossos clientes a seguir as orientações abaixo.
                  </p>
              </div>
              <div>
                  <h3>Dicas Importantes:</h3>
                  <p>
                    - Não dê informações ou assine contratos sem ter certeza de que se trata de uma empresa séria. Verifique a identificação dos representantes e procure se informar sobre a idoneidade da companhia.
                  </p>
                  <p>
                    - Informamos que não emitimos boletos de cobrança.
                  </p>

                  <p>
                      - Não registramos seu CPF em órgãos de proteção ao crédito.
                  </p>
                  <p>
                     - Dica Importante: Não passe informações de sua conta bancária e cartão de crédito, nenhum de nossos representantes tem autorização para tal.
                  </p>
                  <p>
                    Não seja vítima deste golpe! Qualquer dúvida entre em contato com o Serviço de Atendimento ao Cliente pelo telefone (37) 3512-2429 E caso tenha sido vítima de alguma fraude envolvendo nossa empresa, faça denúncia ao Procon ou a Delegacia de Defraudações e Falsificações de sua cidade.
                  </p>
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
        </div
        <!--fim div paiRodape-->
    </main>
</div>
</body>
<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/fraude.min.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>

      <!-- <script src="view/assets/js/revelaBloco.js"></script> -->
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

