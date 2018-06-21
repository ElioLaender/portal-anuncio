<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Tire suas dúvidas, temos as respostas para suas dúvidas.">
    <meta name="keywords" content="dúvidas frequentes,dúvidas,tirar dúvidas,respostas.">
    <link rel="icon" href="view/assets/imagens/flor.png">
<base href="http://www.semprenegocio.com.br/" target="">
    <title>Sempre Negócio - Vantagens para anunciantes</title>
     <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/todasVan.css" rel="stylesheet">
    <link href="view/assets/estilo/banAnun.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBanAnun.css" rel="stylesheet">
    <link href="view/assets/estilo/breackTodasVan.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
        <header class="barraM">
            <h1>Milhares recursos para sua empresa</h1>
            <div id='escBar'></div>
            <div class="paiBarra">
                <!-- primeira div sera hamburguer -->
                <button type="button"></button>
                <div>
                    <nav>
                        <h3 class="sumir">links de navegação</h3>
                        <button type="button" class="fechar">Fechar</button>
                        <span></span>
                        <form action="pesquisa" method="post">
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

                                    <p id='returnLogin' style='font-size: 14px; background-color: silver;'></p>
                                    <label for='tM'>E-mail</label>
                                    <input type='email' id='tM' class='efeitoL' name='cM' required title='Digite seu email!'>

                                    <label for='tSenha'>Senha</label>
                                    <input type='password' name='cSenha' id='tSenha' class='tSenhas efeitoL' size='10' maxlength='30' title='Digite sua senha'>
                                    <input type='checkbox' class='mostraSe' name='mostraS'>

                                    <input type='hidden' id='dirLogin' value='?controller=Home&action=duvidasFrequentes'>

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
                        <li><a href="home">Home</a></li>
                    </ul>
                </div>
                <!--fim div que da contexto para seu filhos-->
            </div>
        </header>
    <main>
        <div class="totem">
           <section>
           <div>
               <div> 
                    <h3>Terminal de Pesquisa SempreNegócio</h3>
                    <p>Mais interação com você! Em ponto estratégico em Divinópolis-MG, este terminal é visto por milhares de pessoas por dia, sua empresa pode receber ligações sem nenhum custo para seu cliente!
                    </p> 
               </div>      
               <figure class="terminal">
                   <img src="view/assets/imagens/terminalSn.png" alt="logo com escrito, sempre negócio">
                </figure>
           </div>     
           </section> 
        </div>
                    <!-- conteudo VANTAGENS -->
            <div class="paiTextos">
                <section>
                    <h3>Soluções desenvolvidas para sua empresa!</h3>
                    <p class="benef">Você vai gostar de ver todos estes benefícios em seu negócio.</p>
                    <!--class fech criado para selecionar via js-->
                    <div>
                        <!--Segundo bloco de texto filho de div.PrimText-->
                        <div class="pai">
                            <!--Foi usado dl para especificar sobre um determinado objeto, no caso 'beneficios'-->
                            <dl>
                                <dl>
                                    <dt>Edição Online</dt>
                                    <dd>
                                    Mantenha seus anúncios atualizados de maneira rápida de simples, você tem um painel de controle só seu para editar quando for necessário. Anuncie na SempreNegócio e mantenha o contrele de suas informações.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Cadastrar Vagas de Emprego</dt>
                                    <dd>
                                    Envie informações de vagas disponíveis em sua empresa, milhares candidatos visualizam, além de você poder encontrar um profissional com o perfil adequado, você ganha publicidade e mais visualização.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Congelar Anúncio</dt>
                                    <dd>
                                        Entendemos que imprevistos acontecem, por isso criamos a opção de você congelar seu anúncio, neste intervalo o tempo não é contabilizado. Anúncie sem se preoculpar. 
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Solicitação de Orçamento</dt>
                                    <dd>
                                        Receba solicitação de orçamento direto de sua página exclusiva. Sua empresa responde direto do sistema para o e-mail do cliente a solicitação de seu orçamento.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Responder Comentários</dt>
                                    <dd>
                                        Desenvolvemos a melhor maneira para facilitar a sua comunicação com o público, podendo responder a comentários de sua empresa através de seu painel de administração.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Logotipo da Empresa</dt>
                                    <dd>
                                    Logotipo da empresa, use para chamar atenção de usuários e conquistar mais clientes. Este é como seu cartão de visita, use a logo da sua marca para melhor indetificação da sua empresa.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Facilidades Oferecidas</dt>
                                    <dd>Mostre as facilidades oferecidas para seus clientes. Estacionamento, modo pagamento, acesso à internet, segurança dentre outras. Aqui sua empresa se destaca facilitando a comunicação com seu público alvo.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Mapa com localização</dt>
                                    <dd>
                                    Clientes sabem o tempo estimado e a rota para chegar até a sua empresa. Esta é mais uma funcionalidade que sua empresa pode oferecer aos consumidores, invista nesta tendência!
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Redes Socias</dt>
                                    <dd>
                                        Seus anúncios são divulgados em redes sociais, sua empresa é vista por milhares de pessoas! Conquiste mais espeço no mercado.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Suporte Exclusivo</dt>
                                    <dd>
                                        Você é muito importante para nós, por isso desenvolvemos atendimento especializados para conseguir proporcionar a melhor experiência possível ao utilizar o painel de administração de seu anúncio.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Terminal de Busca</dt>
                                    <dd>
                                        Disponabilizamos nosso terminal de buscas em pontos estratégicos em Divinópolis-MG, são milhares de pessoas visualizando seu anúncio gratuitamente.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Modo de Pagamento</dt>
                                    <dd>Informe quais modos de pagamentos são aceitos por sua empresa, estas informações facilitam as tomadas de decisões de seus clientes na hora de decidir onde consumir.
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Página exclusiva</dt>
                                    <dd>O anunciante tem sua própria página web, focada em sua empresa
                                    fácil e rápido de ser usado, ganhe mais eficiência em atrair seus clientes ate á você, com informações exclusivas de seu negócio.
                                    </dd>
                                </dl>

                                <dl>
                                    <dt>Melhor custo benefício</dt>
                                    <dd>Oferecemos marketing digital acessível ao seu negócio, trabalhamos para que sua empresa seja encotrada, estimulando
                                    seus clientes a consumerem seus produtos/serviços.</dd>
                                </dl>

                                <dl>
                                    <dt>Insira até 30 fotos</dt>
                                    <dd>Mais facilidades para inserir, substituir imagens em seu anúncio, a qualquer momento que você desejar. Usuários que pesquisam anúnciantes, conhecem melhor sua empresa, aumentando as chances de você conquistar mais clientes!</dd>
                                </dl>

                                <dl>
                                    <dt>Vídeo da sua empresa</dt>
                                    <dd>Apresente seus produtos e serviços de maneira exclusiva, utilizando vídeo para conseguir atrair mais atençao para seu anúncio. Conquiste credibilidade e desenvolva mais clientes!</dd>
                                </dl>

                                <dl>
                                    <dt>Cupons de desconto</dt>
                                    <dd>Atraia novos clientes com cupons de descontos, utilize esta estratégia para que seu público alvo vá em sua empresa. Lembre-se que pessoas são atraídas por promoções, aproveite esta oportunidade em sua empresa.</dd>
                                </dl>

                                <dl>
                                    <dt>Avaliações com Estrelas</dt>
                                    <dd>As empresas são avaliados por clientes, esta é uma tendência cada vez mais forte, empresas passam a ser mais valorizadas com essas avaliações.</dd>
                                </dl>
                            </dl>
                            <!--Aqui eh uma lista de itens, pertence a vantegens-->
                        </div>
                        <!--Fim div pai do bloco empresa-->
                    </div>
                    <!--fecha o div primText-->
                    <!--fim da primeira section pertencente ha o bloco do anunciante-->
                 <div class='banners' id='pacotes'>
                    <h3>Sua empresa pode ter todos estas funcionalidades!</h3>
                    <div class='paiBlo'>
                       <div>
                            <form action="/carrinho-parte-um/" method="post">
                                <h4>Grátis</h4>
                                <div class="bloc grat">
                                    <div>
                                        <p><span class='rs'>R$</span>0,00<span>/ano</span></p>
                                        <p>Contrate já</p>
                                    </div>
                                    <select name="pacote">
                                        <option value="2">Anual</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class='itens'>
                                    <p>Terminal de Busca</p>
                                    <p>Redes Sociais</p>
                                    <p>Edição Online</p>
                                    <p>Cadastrar Vagas de Emprego</p>
                                    <p>Congelar Anúncio</p>
                                    <p>Solicitação de Orçamento</p>
                                    <p>Responder Comentários</p>
                                    <p>Avaliações com Estrelas</p>
                                    <p>Logotipo da Empresa</p>
                                    <p>Página Exclusiva</p>
                                    <p>Facilidades Oferecidas</p>
                                    <p class='x'>Suporte Exclusivo</p>
                                    <p class='x'>Cupom de Desconto</p>
                                    <p class='x'>Mapa com localização</p>
                                    <p class='x'>Livre de Publicidade</p>
                                    <p class='x'>Página com subdomínio</p>
                                    <p class='x'>Até 15 fotos</p>
                                    <p class='x'>Vídeo</p>
                                </div>
                                <input type="hidden" value="Grátis" name="plano">
                                <ul class='basic'>
                                    <li>
                                        <input type="submit" value="Experimente agora">
                                    </li>
                                </ul>
                            </form>
                        </div>
                         <div>
                            <form action="/carrinho-parte-um/" method="post">
                                <h4>Premium</h4>
                                <div class='bloc pri'>
                                    <div>
                                        <p><span class='rs'>R$</span>50,00<span>/anual</span></p>
                                        <p>Saia na frente!</p>
                                    </div>
                                    <select class="comB" name="pacote">
                                        <option value="2">Anual</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class='itens'>
                                    <p>Terminal de Busca</p>
                                    <p>Redes Sociais</p>
                                    <p>Edição Online</p>
                                    <p>Cadastrar Vagas de Emprego</p>
                                    <p>Congelar Anúncio</p>
                                    <p>Solicitação de Orçamento</p>
                                    <p>Responder Comentários</p>
                                    <p>Avaliações com Estrelas</p>
                                    <p>Logotipo da Empresa</p>
                                    <p>Página Exclusiva</p>
                                    <p>Facilidades Oferecidas</p>
                                    <p>Suporte Exclusivo</p>
                                    <p>Cupom de Desconto</p>
                                    <p>Mapa com localização</p>
                                    <p>Livre de Publicidade</p>
                                    <p>Página com subdomínio</p>
                                    <p>Até 30 Fotos</p>
                                    <p>Vídeo</p>
                                </div>
                                <input type="hidden" value="Premium" name="plano">
                                <ul class='complet'>
                                    <li>
                                        <input type="submit" value="Experimente agora">
                                    </li>
                                </ul>
                             </form>
                        </div>
                </div>
            </section>
                <!--fim section como funciona-->
            </div>
       
        <div class="paiRodape">
            <footer>
                <!-- Pesquisa div este parecera so no desktop-->
                <div>
                    <form>
                  
                        <fieldset>
                            <legend>Cadastre e receba novidades da sua região</legend>
			     <p id="returnCadEmail"></p>
                            <label for="prom">
                                <input type="text" id="prom" name="prom"  placeholder="Insira seu E-mail" maxlength="25" required title="Insira seu e-mail">
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
<script src="view/assets/js/duvidas.min.js"></script>
<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src="view/assets/js/.js"></script>


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
