<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta property="og:image" content="http://www.semprenegocio.com.br/view/assets/imagens/sn-apresentation.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600"> 
    <meta property="og:image:height" content="400"> 
    <meta name="description" content="Guia eletrônico, Classificados, semprenegocio.com.br, semprenegocio.com, Sempre Negócio, sempre negocio, Anúncios grátis, descontos">
    <link rel="icon" href="imagens/flor.png">
    <title>Sempre Negócio, endereços na ponta dos dedos</title>
    <!-- base href="http://www.semprenegocio.com.br/" target="" -->
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/propaganda.css" rel="stylesheet">
    <link href="view/assets/estilo/vantagens.css" rel="stylesheet">
    <link href="view/assets/estilo/aEmpresa.css" rel="stylesheet">
    <link href="view/assets/estilo/parteCurriculo.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenuHome.css" rel="stylesheet">
    <link href="view/assets/estilo/cadastre.css" rel="stylesheet">
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/botoes.css" rel="stylesheet">
    <link href="view/assets/estilo/indexBlocAnun.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBlockAnun.css" rel="stylesheet">
    <link href="view/assets/estilo/breackCadastre.css" rel="stylesheet">
    <link href="view/assets/estilo/breakPropaganda.css" rel="stylesheet">
    <link href="view/assets/estilo/breackVantagens.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBotoes.css" rel="stylesheet">
    <link href="view/assets/estilo/breakAempresa.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackParteCorriculo.css" rel="stylesheet" >
    <!-- endbuild -->
</head>
<body>
<!--Div tudo usada para controlar todo conteudo da pagina-->
<div class="tudo">
    <!--Este e a barra principal da pg, sendo fixa, nela vai dois icones para navegacao e o botao que chama o nav-->
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

                echo  "<div id='fotoHome' class='fotoBar'>
                        <figure id='figuHome'>
                            <img src='".$arrayUser[0]['cli_foto']."' alt='imagem circular representando o proprietário da conta.'>
                        </figure>
                        <div id='blocoFot'>
                            <ul>
                               <li>
                                    <a href='?controller=Dashboard&action=ViewDashboard'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='?controller=Dashboard&action=ViewDashboard&option=alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=&dirAction=action'>Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>";

            } else if(isset($arrayFace)){

                echo  "<div id='fotoHome' class='fotoBar'>
                        <figure id='figuHome'>
                            <img src='https://graph.facebook.com/".$arrayFace['id']."/picture' alt='imagem circular representando o proprietário da conta.'>
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
                    <li><a href="home/">Home</a></li>
                </ul>
            </div>
            <!--fim div que da contexto para seu filhos-->
        </div>
    </header>

    <!--Inicio do corpo do site-->
    <main>
        <!--section principal do site-->
        <section class="sectIndex">
            <h1>Guia eletrônico com opiniões e vantagens para você !</h1>
            <div class="paiLogo">
                <!--paiLogo eh onde esta cendo usado para colocara imagem de background inicial-->
                <div>
                    <p>Guia eletrônico com opiniões e vantagens para você !</p>

                    <!--este div esta sendo usado para mascara escura da imagem background principal-->
                    <figure>
                        <img src="view/assets/imagens/logo@1x.png" alt="logo com texto sempre negócio com uma coruja encima da letra n">
                    </figure>
                </div>
            </div>

            <!--Os dois botoes,de pesquisas-->
            <div class="contextB">
                <div>
                    <form action="?controller=Anuncio&action=viewAnuncioPesquisa" method="post">
                        <h3 class="sumir">Pesquisar</h3>
                        <fieldset>
                            <legend class="sumir">Pesquisar</legend>

                            <label for="pesquisaHom" class="sumir">Pesquisar</label>
                            <input type="search" id="pesquisaHom" name="busc" class="completar" placeholder="Bares, lojas, hoteis..." maxlength="70" required title="Digite aqui para que a pesquisa seja efetuada." >
                            <!-- SERA GERADO DINAMICAMENTE ELEMENTO SELECT-->
                            <label for="pesBair">Pesquisar Por Bairro</label>
                            <input type="text" name="bairro" class="compleBairro" placeholder="Busca por bairros" id="pesBair" >

                            <label for="pesHom">
                                <input type="submit" id="pesHom" name="pesHom" value="pesquisa">
                                <span></span>
                            </label>
                        </fieldset>
                    </form>
                </div>
            </div>
            <article class="artIndex">
                <h4>Mais Buscadas</h4>
                <div>
                    <ul>
                        <li>
                            <a href="?controller=Anuncio&action=viewAnuncioPesquisa&busc=alimentação"></a>
                            <p>Alimentação</p>
                        </li>
                        <li>
                            <a href="?controller=Anuncio&action=viewAnuncioPesquisa&busc=Limpeza"></a>
                            <p>Limpeza</p>
                        </li>
                        <li>
                            <a href="?controller=Anuncio&action=viewAnuncioPesquisa&busc=Transporte"></a>
                            <p>Transporte</p>
                        </li>
                        <li>
                            <a href="?controller=Anuncio&action=viewAnuncioPesquisa&busc=Saúde"></a>
                            <p>Saúde e Beleza</p>
                        </li>
                        <li>
                            <a href="?controller=Anuncio&action=viewAnuncioPesquisa&busc=Construção"></a>
                            <p>Construção</p>
                        </li>
                        <li>
                            <a href="?controller=Home&action=seeAll"></a>
                            <p>Ver todos</p>
                        </li>
                    </ul>
                </div>
                <!--fecha div.cadastre -->
            </article>
            <article class="sectRev">
                <h4>Últimos comentários</h4>
                <!--fazer slid colocar o id e class necessarios -->
                <div class="tituloRev">
                    <p>Avaliações Recentes</p>
                </div>

                <div class="sl" id="revews"></div>
                <div class="chamaRev">
                    <button type="button"  id="prev01"> </button>
                    <button type="button"  id="next01"> </button>
                </div>
            </article>
            <div class="paiContext">
                <div class="contextCur">
                    <div class="scrol scrolLeft">
                        <h3>Cadastre seu currículo com poucos clicks !</h3>
                        <p>Visualize <em>currículos,</em> prontos para serem <em>baixados</em> e <em>impressos</em> na hora!</p>
                        <ul class="efeito">
                            <li><a href="#" hreflang="pt-br" target="_blanck" class="bairro">Cadastrar meu currículo</a></li>
                        </ul>
                    </div>

                    <!--Aqui vai a uma um gif-->
                    <div></div>
                </div>
            </div>
            <div class="controlaAlt"></div>
            <!--Fim do div contro buttons-->

            <!-- Bloco cadastre aqui-->
            <div class="slideCa" id="slide">
                <div>
                    <h3>Integração com clientes e você !</h3>

                    <p> <em> Cadastre Grátis</em> e marque presença nas pesquisas de seus clientes. Sua empresa não pode ficar de fora!</p>
                    <div class="butCad">
                        <ul>
                            <li><a href="anuncie/">Anuncie já!</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3>Página exclusiva</h3>
                    <p>Disversos <em>dispositivos</em> e seu negócio,
                        agerre sua <em>oportunidade...</em></p>
                </div>
                <div>
                    <h3>Aproveite seu tempo</h3>
                    <p><em>Cadastre</em> seu currículo e seja <em>encontrado</em> pela melhores empresas !</p>
                    <div class="butCad linkCur">
                        <ul>
                            <li><a href="#" target="_black">Cadastrar!</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3>Receba solicitações de orçamentos! </h3>
                    <p><em> Seus clientes</em> podem solicitar orçamentos sem <em>nenhum custo</em>, conquiste mais clientes.</p>
                    <div class="butCad linkAnu">
                        <ul>
                            <li><a href="?controller=Home&action=viewInvistaNegocio">Começar !</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav" id="nav"> </div>
            <!--fecha div.cadastre -->
            <div class="chamaImg">
                <button type="button" class="btn1" id="prev"> </button>
                <button type="button" class="btn2" id="next"> </button>
            </div>

            <!-- conteudo VANTAGENS -->
            <div class="paiTextos">
                <section class="sect">
                    <h3>Porquer anunciar aqui ?</h3>
                    <!--class fech criado para selecionar via js-->
                    <div class="primText">
                        <div>
                            <h3> Conheça melhor este mercado</h3>
                            <p>Sua <em>empresa</em> não está presente na <em>internet ?!</em></p>
                            <figure>
                                <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio">
                            </figure>
                            <p>Oferecemos o <em>melhor custo</em> benefício para sua <em>empresa.</em></p>
                            <div>
                                <p>+115 milhões</p>
                                <p>de brasileiros estão conectados á internet !</p>
                            </div>
                            <div>
                                <p>+55% </p>
                                <p>Ações de marketing digital motivam pessoas á comprarem produtos/serviços</p>
                            </div>
                            <div>
                                <p>+50% </p>
                                <p>chegam até á sua empresa a partir da publicidade online</p>
                            </div>
                        </div>
                        <!--Segundo bloco de texto filho de div.PrimText-->

                        <div>
                            <!--Foi usado dl para especificar sobre um determinado objeto, no caso 'beneficios'-->
                            <dl>
                                <dt>Benefícios</dt>
                                <dd>Anuncie aqui, temos planos de incentivo a pequenas empresas e profissionais autônomos.
                                Veja algumas de nossas vantagens.</dd>
                            </dl>
                            <dl class="paiCores" id="tr">
                                <dl>
                                    <dt>Página exclusiva</dt>
                                    <dd>O anunciante tem sua própria página web, sem propagandas paralelas ao seu negócio!
                                        Fácil e rápido de ser usado, ganhe mais eficiência em atrair seus clientes ate á você.
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>Melhor custo benefício</dt>
                                    <dd>Oferecemos marketing digital acessível ao seu negócio, trabalhamos para que sua empresa seja encotrada, estimulando
                                    seus clientes a consumerem seus produtos/serviços.</dd>
                                </dl>

                                <dl>
                                    <dt>Insira até 15 fotos</dt>
                                    <dd>São 15 imagens e você não paga nada a mais por isto, sem pacotes adicionais ou pegadinhas.</dd>
                                </dl>

                                <dl>
                                    <dt>Vídeo da sua empresa</dt>
                                    <dd>O anunciante pode subir um vídeo de seu negócio, seus clientes terão mais informações sobre seu negócio,
                                    aumentando as chances de atraílos até você.</dd>
                                </dl>

                                <dl>
                                    <dt>Cupons de desconto</dt>
                                    <dd>Atraia novos clientes com cupons de descontos, utilize esta estratégia para que seu público alvo vá em sua empresa. </dd>
                                </dl>

                                <dl>
                                    <dt>Avaliações de empresas</dt>
                                    <dd>As empresas são avaliados por clientes, esta é uma tendência cada vez mais forte,
                                    as avaliaçõe são levandas em conta por novos ou futuros clientes. Podemos dizer que estes comentários são a evolução do boca a boca.</dd>
                                </dl>
                            </dl>
                            <!--Aqui eh uma lista de itens, pertence a vantegens-->
                            <ul class="verTodas">
                                <li>
                                    <a href="?controller=Home&action=viewMoreInfo">Ver Todas Vantagens !</a>
                                </li>
                            </ul>
                        </div>
                        <!--Fim div pai do bloco empresa-->

                    </div>
                    <!--fecha o div primText-->
                    <!--fim da primeira section pertencente ha o bloco do anunciante-->
                </section>

                <div class="backAempr">
                    <p>Sempre Negócio, tecnologia ao seu alcance !</p>
                </div>

                <!--section sobre a empresa-->
                <section class="sect">
                    <h3 class="tituloEmpresa">Sua empresa agora pode ter seu próprio site, leia mais e veja nossos planos!</h3>

                    <!--class fech criado para selecionar via js-->
                    <div class="segunText">
                        <!--bloco a empresa-->
                       <p>Oferecemos oportunidade de sua empresa ter seu próprio site como nosso programa de incentivo, <strong>minha empresa online!</strong></p>
                      <div>
                       <a href="#" hreflang="pt-br" target="_blank">
                        <figure>
                             <img src="view/assets/imagens/1a.png"  alt="logo da empresa expressaHost onde tem o escrito em cinza e azul">
                         </figure>
                        </a>
                        <ul>
                            <li>
                                <a  href="#" hreflang="pt-br" target="_blank" id="parc">
                                    Quero site para minha empresa!
                                </a>
                            </li>
                        </ul>
                       </div>
                        <!--Fim div pai do bloco empresa-->
                    </div>
                </section>
                <!--fim section como funciona-->
            </div>
            <!--Fim pai textos-->
            <div class="recSenh">
                <button type="button">fechar</button>
                <form action="#" method="post">
                    <fieldset class="cadast">
                        <legend>Suporte SempreNegócio</legend>
                        <p id="retRecoHome" style="position:absolute; top:5.5em; color:#e67e22;">Informe seu e-mail e você receberá instruções para recuperar sua senha.</p>

                        <label for="mailRecupera"> E-mail </label>
                        <input type="email" id="mailRecuperaHome" name="recP" value=""  required title="Digite seu email" class="efeitoL">
                        <input type="button" id="recuperarHome" name="recu" value="Recuperar Senha">
                    </fieldset>

                </form>
            </div>
            <!--Este foi criado para coletar email de usuarios-->
            <section class="colherEmail">
                <div class="paiForm">
                    <p id="retornoCadCli">Economize com cupons de descontos, aqui você ganha mais.</p>
                    <h3>Cadastre-se!</h3>

                    <form>
                        <fieldset>
                            <label for="tNome">Nome</label>
                            <input type="text" id="tNome" name="cNome" value="" required title="Digite seu nome" class="efeitoL">

                            <label for="tMail">Email</label>
                            <input type="email" id="tCadastro" name="cmail" class="efeitoL" required title="Digite seu email">

                            <label for="tS">Senha</label>
                            <input type="password" name="cS" id="tS" class="tSenhas tS efeitoL" size="10" minlength="6" maxlength="30" title="Digite sua senha">
                            <input type="checkbox" class="mostraSe mos" name="moS" class="mostraSe" id="olho">
                            <p class="min">minímo de 6 caracteres</p>

                            <label for="tReceber"></label>
                            <input type="submit" id="tReceber" class="prevenir cadNewCli" name="cReceber" value="Cadastrar !">
                        </fieldset>
                    </form>
                </div>
            </section>

            <!--div para sec contexto da section usuario-->

                <!--uma section para detalhes do site, parte do usuario-->
                <section class="sectCur">
                    <h3>Aumente sua empregabilidade!</h3>
                    <div>
                        <p>Inove em sua forma de <strong>apresentar</strong> suas qualificaçõe para o <strong>mercado!</strong></p>

                        <dl class="curriculo">

                             <dt>Como funciona ?</dt>
                            <dd>
                               Você tem um currículo como uma página web, um site só seu para apresentar seu currículo, com fotos de portifólio, vídeo para sua apresentação, domínio com o seu nome, formulário para contato e muito mais.
                            </dd>

                            <dt>Objetivo</dt>
                            <dd>
                                Facilitar seu dia e aumentar suas chances de se inserir no mercado de trabalho. Para isso,
                                seu currículo pode ser imprimido na hora, e ser visualizado de qualquer parte do mundo e dispositivos com internet.
                            </dd>

                            <dt>Vantagens</dt>
                            <dd>
                                 Saia na frente com a tecnologia, nosso currículo permite que você passe suas informações para o mercado de maneira complenta e eficiente. Disponabilizamos seu currículo para buscas na semprenegocio.curriculo!
                            </dd>
                        </dl>
                        <!--class criada para fazer efeito via css padrao para quem tem esta class-->
                       <div class="contImg">
                          <a href="view/pessoal/index.html" hreflang="pt-br" target="_blanck">
                              <figure>
                                  <img src="view/assets/imagens/2.png" alt="iamgem de um pc com site representativo">
                             </figure>
                          </a>
                          <ul>
                             <li><a href="#" hreflang="pt-br" target="_blanck">Veja mais aqui!</a></li>
                          </ul>
                       </div>


                    </div>
                    <!--fom da div pai section usuario-->
                </section>


            <!--Fim da section principal do site-->
        </section>
        <!--Conteudo complementar do site, no caso para pegar email-->



        <img style='display:none' src="view/assets/imagens/sn-apresentation.jpg" alt="iamgem de um pc com site representativo">





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
                        <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, expressa host">
                    </figure>
                </div>
            </footer>
        </div>
        <!--fim div paiRodape-->
    </main>
</div>
<!--fim div tudo-->
</body>
<!-- build:js js/index.min.js -->
<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/modernizr.custom.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/gif.js"></script>
<script src="view/assets/js/cycle.js"></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/barraMenuHome.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src="view/assets/js/modEstrela.js"></script>
<script src="view/assets/js/efeito-aparecer.js"></script>
<script src="view/assets/js/efeitoLabel.js"></script>
<script src="view/assets/js/revelaSenha.js"></script>
<script src="view/assets/js/mensagens.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/cadNewCli.js"></script>

<!-- endbuild -->

<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>
<script src="view/assets/js/revewForHome.js"></script>


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


<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
</html>





