<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Invista em sua empresa, estamos preparados para melhorar sua visibilidade online. Veja nossos pacotes de incentivo a pequenas empresas e empreendedores individuais, aproveite nossas ofertas.">
    <meta name="keywords" content="ofertas,promoção,pacotes,assinatura semprenegócio,minha empresa online,anúnciar empresa,anúncios,apracer no google, semprenegocio.com.br, semprenegocio.com">


    <title>Sempre Negócio - Invista em seu negócio</title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/invista.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/banAnun.css" rel="stylesheet">
    <link href="view/assets/estilo/breakAnuncAt0.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackInvista.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBanAnun.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
    <header class="barraM">
        <h1>Invista em seu negócio</h1>
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
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Home&dirAction=action=viewInvistaNegocio'>Sair</a>
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
            }  else {

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

                                     <input type='hidden' id='dirLogin' value='?controller=Home&action=viewInvistaNegocio'>

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
                    <li><a href="?controller=Home&action=index">Home</a></li>
                </ul>
            </div>
            <!--fim div que da contexto para seu filhos-->
        </div>
    </header>
    <main>
        <div class='primDiv'>
            <section>
                <h2 class="sumir">Conecte-se a seus clientes e fornecedores e gere mais negócios</h2>
                <div>
                    <p>Conecte-se a seus clientes e fornecedores e gere mais negócios</p>
                    <p>A Sempre Negócio tem o melhor custo benefício para sua empresa.</p>
                    <ul class='plan'>
                        <li>
                            <a href="anuncie/#pacotes">Confira os planos</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3>Nossa soluções para sua empresa</h3>
                    <p>Mantenha focado em seu negócio, o marketing digital fica por nossa conta.</p>
                    <dl>
                        <dt>Goo<span>gle</span></dt>
                        <dd>Atuamos para que você seja encontrado, 67% das compras feitas em lojas físicas tiveram suas informações pesquisadas na internet antes.</dd>
                    </dl>

                    <dl>
                        <dt>Bai<span>xo</span> invest<span>imento</span></dt>
                        <dd>Estamos trabalhando com programa insentivo a pequenas empresas e empreendedores indivuais. Não perca esta oportunidade!</dd>
                    </dl>

                    <dl>
                        <dt>Avaliaç<span>ões</span></dt>
                        <dd>Avaliações servem como um meio de indicação, tendência que cresce a cada dia no Brasil, disponível para sua empresa.</dd>
                    </dl>

                    <dl>
                        <dt>Cup<span>ons</span></dt>
                        <dd>Oferecer descontos para seus clientes terem a oportunidade de economizar, esta é uma ótima estratégia para a empresa efetivar clientes.</dd>
                    </dl>

                    <dl>
                        <dt>Oti<span>mo</span> reto<span>rno</span></dt>
                        <dd>Sua empresa aparece todos os dias 24h por dia. Oferecemos várias funcionalidade para sua empresa atrair novos clientes !</dd>
                    </dl>
                </div>
                <div>
                    <h3>Tudo que você precisa é simplicidade em seu dia a dia.</h3>

                    <div>
                        <ul class='panel'>
                            <li>
                                <h4>Acompanhe suas avaliações</h4>
                                <p>Interaja com seus clientes. </p>
                            </li>
                            <li>
                                <h4>Altere textos facilmente</h4>
                                <p>Rápido e simples, você altera quando desejar.</p>
                            </li>
                            <li>
                                <h4>Mantenha fotos e vídeo atualizados</h4>
                                <p>Você tem o controle do visual da sua empresa.</p>
                            </li>
                            <li>
                                <h4>Gerencie seus cupons de descontos</h4>
                                <p>Criei cupns de descontos e atraia mais clientes.</p>
                            </li>
                        </ul>
                    </div>
                    <div class='paiImg'>
                        <div>
                            <p>Anuncios ativos</p>
                            <img src="view/assets/imagens/painel@1x.jpg" alt='imagem representando reviews de um anúncio'>
                        </div>
                        <div>
                            <p>Editar Anúncio</p>
                            <img src="view/assets/imagens/editarAnun@1x.jpg" alt='imagem representando edição de anúncio'>
                        </div>
                        <div>
                            <p>Alterar fotos</p>
                            <img src="view/assets/imagens/edtImagens@1x.jpg" alt='imagem representando edição de fotos'>
                        </div>
                        <div>
                            <p>Crie cupons</p>
                            <img src="view/assets/imagens/cuponPro@2x.jpg" alt='imagem representando reviews de um anúncio'>
                        </div>
                    </div>
                </div>
                <div>
                    <figure>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/gkY9xNanmuc" frameborder="0" allowfullscreen></iframe>
                     </figure>
                </div>

                <div>
                    <h3>Milhões de empresas no Brasil utlizam marketing digital</h3>
                    <p>
                      A sua realmente vai ficar de fora desta tendência?!  
                    </p>
                </div>

                <div class='passos'>
                    <h3>Simples e rápido anunciar</h3>
                    <div>
                        <p><strong>1º</strong> Escolha seu plano</p>
                        <figure>
                            <img src="view/assets/imagens/planos@1x.png" alt="Dois banner informando valores de dois pacotes">
                        </figure>
                    </div>
                    <div>
                        <p><strong>2º</strong> Cire seu anúncio </p>
                        <figure>
                            <img src="view/assets/imagens/form@1x.png" alt="Dois banner informando valores de dois pacotes">
                        </figure>
                    </div>
                    <div>
                        <p>Pronto!</p>
                        <figure class='an'>
                            <img src="view/assets/imagens/anunGra@2x.jpg" alt="Dois banner informando valores de dois pacotes">
                        </figure>
                    </div>
                </div>

                <div>
                    <h3>Sobre nossos planos</h3>
                    <div>
                        <div class="gratis">
                            <h4>Grátis</h4>
                            <div>
                                <p>Presença online:</p>
                                <p>
                                  A SempreNegócio garante sua presença online, não fique de fora em pesquisas de clientes, apareça e feche mais negócios para sua empresa. Oferecemos este pacote totalmente gratuíto para você sentir os resultados positivos em anúnciar na SempreNegócio. Receba solicitações de orçamento, avaliações, apareça em nosso terminal de busca e muito mais. Tudo isso grátis!
                                </p>
                            </div>
                        </div>
                        <div class="plat">
                            <h4>Premium</h4>
                            <div>
                                <p>Seu espaço no mercado:</p>
                                <p>
                                    Turbine seu anúncio e se destaque dos demais! Este pacote foi desenvolvido para empresas que pretendem mostrar com exclusivida seus produtos e serviços. Fotos e vídeo exclusivo de sua empresa, cria melhor relacionamento com clientes e gera mais confiança, atraindo mais pessoas ao seu estabelecimento. Conquiste mais espaço no mercado, anúncie na SempreNegócio.  
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='banners' id='pacotes'>
                    <h3>Escolha seu plano e tenha presença na internet.</h3>
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
                                    <p>Edição Online</p>
                                    <p>Redes Sociais</p>
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
                                        <p><span class='rs'>R$</span>60,00<span>/anual</span></p>
                                        <p>Saia na frente!</p>
                                    </div>
                                    <select class="comB" name="pacote">
                                        <option value="2">Anual</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class='itens'>
                                    <p>Terminal de Busca</p>
                                    <p>Edição Online</p>
                                    <p>Redes Sociais</p>
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

                        <div class='espec'>
                            <h5> Click nos ícones para visualizar Especificações:</h5>
                            <dl>
                                <dt role='img' arial-label='escrito youtube' title='vídeo'>Vídeo</dt>
                                <dd>Insira vídeo do youtube sobre sua empresa, mostrando seus serviços/produtos,
                                    essa é uma boa prática para atrair novos clientes.
                                </dd>
                                <dt role='img' arial-label='láps para editar' title='Edição online'>Edição online</dt>
                                <dd>
                                    Mantenha seus anúncios atualizados de maneira rápida de simples,
                                    você tem um painel de controle só seu para edições online.
                                </dd>
                                <dt role='img' arial-label='Imagem de um cupon' title='Cupon de desconto'>Cupons de desconto</dt>
                                <dd>
                                    Crie quantos cupons quiser para seus clientes trocarem em sua loja.
                                </dd>
                            </dl>
                            <dl>
                                <dt role='img' arial-label='mapa com um apontador ao centro' title='Mapa'>Mapa</dt>
                                <dd>
                                    Clientes sabem o tempo estimado e a rota para chegar até a sua empresa.
                                </dd>
                                <dt role='img' arial-label='casa representando comércio' title='Logotipo'>Logotípo da empresa</dt>
                                <dd>
                                    Logotipo da empresa, use para chamar atenção de usuários e conquistar mais clientes.
                                </dd>
                                <dt role='img' arial-label='dois balões indicando conversa' title='Responder comentários'>Responder comentários</dt>
                                <dd>
                                    Sua empresa responde á cometários feitos pelos clientes de maneira rápida e simples,
                                    tudo em um único local do sistema.
                                </dd>
                            </dl>
                            <dl>
                                <dt role='img' arial-label='carta com estrela no canto superior direito' title='Formulário de contato'>Formulário de contato</dt>
                                <dd>
                                    Solicitação de orçamento, permite ao cliente entrar em contato diretamente com você!
                                   Responda exclusivamente para cada cliente, direto do seu painel.
                                </dd>
                                <dt role='img' arial-label='ícone de imagem' title='fotos'>Fotos</dt>
                                <dd>
                                    Insira até 15 fotos em seu anúncio, altere quando quiser sem burocracias.
                                </dd>
                                <dt role='img' arial-label='folha com estrelas e imagem de perfil' title='Seu próprio site'>Seu próprio site</dt>
                                <dd>
                                    Tenha um site dentro do sistema, sua empresa ganha um subdominio.
                                    <strong>Ex:churrasco.semprenegocio.com.br</strong>
                                </dd>
                            </dl>
                            <dl>
                                <dt role='img' arial-label='boneco sendo atraído por imã' title='Cadastrar Vagas de Emprego'>Cadastrar Vagas de Emprego</dt>
                                <dd>
                                    Envie informações de vagas disponíveis em sua empresa, milhares candidatos visualizam sua empresa. Encontre a equipe dos sonhos!
                                </dd>
                                <dt role='img' arial-label='terminal de busca' title='Terminal de Busca'>Terminal de Busca</dt>
                                <dd>
                                    Sua empresa não pode ficar de fora de nosso terminal de busca, localizado em pontos estratégicos com grande fluxo de pessoas vizualizando seu negócio.
                                </dd>
                                <dt role='img' arial-label='medalha' title='Facilidades Oferecidas'>Facilidades Oferecidas</dt>
                                <dd>
                                    Mostre as facilidades oferecidas para seus clientes. Estacionamento, modo pagamento, acesso à internet, segurança dentre outras. Aqui sua empresa se destaca!
                                </dd>
                            </dl>
                            <dl>
                                <dt role='img' arial-label='estrelas' title='Avaliações com Estrelas'>Avaliações com Estrelas</dt>
                                <dd>
                                   Empresas com avaliações tem mais valor para os consumidores. A sua empresa realmente merece ficar fora desta tendência econômica?
                                </dd>
                                <dt role='img' arial-label='relógio' title='Congelar Anúncio'>Congelar Anúncio</dt>
                                <dd>
                                    Congele o tempo de seu anúncio, em dias que sua empresa não funciona, você pode parar a contagem do anúncio quando quiser, o tempo só é contabilizado quando ativo.
                                </dd>
                                <dt role='img' arial-label='Notebook com mão' title='Livre de Publicidade'>Livre de Publicidade</dt>
                                <dd>
                                    Em sua página exclusiva, aparece somente sobre sua empresa, sem propagandas paralelas.
                                </dd>
                            </dl>
                            <dl>
                                <dt role='img' arial-label='folha com seta para baixo e engrenagem' title='Página exclusiva'>Página exclusiva</dt>
                                <dd>
                                    Seu anúncio possui uma página exclusiva, com informações de sua empresa. Não perca esta oportunidade!
                                </dd>
                                <dt role='img' arial-label='pessoa com fone de ouvido' title='Suporte exclusivo'>Suporte exclusivo</dt>
                                <dd>
                                    Com suporte exclusivo sua empresa conta com profissionais para auxliarem em criação de
                                    cupons de desconto, anúncio, edição online.
                                </dd>
                                <dt role='img' arial-label='Celular' title='Botão ligue grátis'>Redes Sociais</dt>
                                <dd>
                                    Divulgamos seu anúncio nas redes sociais, atingindo ainda mais pessoas e atraindo novos clientes para sua empresa.
                                </dd>
                            </dl>
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
                        
                        <fieldset>
                            <legend>Cadastre e receba novidades da sua região</legend>
			    <p id="returnCadEmail"></p>
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
<!-- build:js js/index.min.js -->
<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/jquery.mask.min.js"></script>
<script src="view/assets/js/modernizr.custom.js"></script>
<script src="view/assets/js/efeito-foto.js"></script>
<script src="view/assets/js/efeitoLabel.js"></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/revelaSenha.js"></script>
<script src="view/assets/js/miniP.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>
<script src="view/assets/js/valorBan.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
    <!-- endbuild -->

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

