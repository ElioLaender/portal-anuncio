<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Leia nossos termos de uso, e saiba como funciona nossos procedimentos legais, referente a anúnciantes e usuários.">
    <meta name="keywords" content="termos de uso,direitos do consumidor,sempre negócio termos de uso, Sempre Negócio, semprenegocio.com.br, semprenegocio.com">
    <link rel="icon" href="/view/assets/imagens/flor.png">

    <title>Sempre Negócio - Termos de uso</title>
    <!-- build:css css/index.min.css -->
    <link href="/view/assets/estilo/reset.css" rel="stylesheet">
    <link href="/view/assets/estilo/index.css" rel="stylesheet">
    <link href="/view/assets/estilo/termosUso.css" rel="stylesheet">
    <link href="/view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="/view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="/view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="/view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
	<base href="http://www.semprenegocio.com.br/" target="">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
        <header class="barraM">
            <h1>Nossos termeos de uso</h1>
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
                              <a href="/home" hreflang="pt-br" >Home</a>
                           </li>
                             <li>
                            <a href="?controller=CadastroCliente&action=telaCadastro" hreflang="pt-br">Cadastrar</a>
                        </li>
                        <li>
                            <a href="/descontos/" hreflang="pt-br">Descontos</a>
                        </li>
                        <li>
                            <a href="/duvidas-frequentes/" hreflang="pt-br">Dúvidas Freguentes</a>
                        </li>
                        <li>
                            <a href="/dicas/" hreflang="pt-br">Dicas</a>
                        </li>
                         <li>
                            <a href="/anuncie/" hreflang="pt-br" class="cor">Anuncie Grátis</a>
                        </li>
                            <li>
                                <a href="/home" hreflang="pt-br">A empresa</a>
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
                                     <a href='/painel-de-controle/'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='/completar-perfil/alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Home&dirAction=action=viewTermosDeUso'>Sair</a>
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
                                    <input type='email' id='tM' class='efeitoL' name='cM' required title='Digite seu email !'>

                                    <label for='tSenha'>Senha</label>
                                    <input type='password' name='cSenha' id='tSenha' class='tSenhas efeitoL' size='10' maxlength='30' title='Digite sua senha'>
                                    <input type='checkbox' class='mostraSe' name='mostraS'>

                                    <input type='hidden' id='dirLogin' value='?controller=Home&action=viewTermosDeUso'>

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
                        <li><a href="/home">Home</a></li>
                    </ul>
                </div>
                <!--fim div que da contexto para seu filhos-->
            </div>
        </header>
      <main>
        <div class='primDiv'>
          <div>
              <section>
                  <h3>Termos de Uso de Perfil de Usuário Sempre Negócio</h3>
                  <div>
                      <h4>1.Partes</h4>
                      <p>1.1 - Este Termo de Uso aplica-se entre, de um lado, ao site <strong>Sempre Negócio</strong>, 
                         de domínio da empresa <strong>Impulsionar Marketing Ltda.</strong>, e, de outro lado, a toda e qualquer pessoa física 
                        ou jurídica, usuária dos serviços contidos no mencionado site, prestados por meio do cadastro ao site www.semprenegocio.com.br, doravante designado <strong>USUÁRIO</strong>.
                      </p>
                      <p>
                          1.2 - Ao se cadastrar no site <strong>SEMPRENEGOCIO</strong>, o <strong>USUÁRIO</strong> fica ciente e concorda que está sujeito a todas as disposições deste Termo de Uso, declarando,
                           para todos os fins de Direito, possuir capacidade jurídica para tanto.
                      </p>
                  </div>
                  <div>
                      <h4>2. Objeto</h4>
                      <p>2.1 - Este Termo de Uso rege a utilização, pelo <strong>USUÁRIO</strong>, do acesso aos serviços prestados pelo site <strong>SEMPRENEGOCIO</strong>, 
                      um serviço online de visualização de mapas, localização de endereços, estabelecimentos, cupom de desconto e demais pontos públicos, 
                      incluindo-se a exibição de imagens e informações a respeito dos locais indicados, e definição de rotas para deslocamento 
                      urbano e rodoviário, prestado gratuitamente pelo SEMPRENEGOCIO por meio do site www.semprenegocio.com.br.</p>
                  </div>
                  <div>
                      <h4>A Sempre Negócio garante sigilo e segurança</h4>
                      <p>Nosso banco de dados foi desenvolvido com tecnologia de ponta, utilizando os melhores padrões de segurança, afim de preservar os dados de nossos clientes. .</p>
                    
                      <p>Este documento informa as responsabilidades, deveres e obrigações que todo <strong>USUÁRIO</strong> assume ao acessar e/ou utilizar o site.</p>
                  </div>
                  <div>
                      <h4>3. Condições gerais de uso</h4>
                      <p>
                        3.1 - <strong>O USUÁRIO</strong> fica ciente e concorda que o SEMPRENEGOCIO não poderá garantir a qualidade, exatidão, completude, adequação, efetividade, 
                        confiabilidade ou utilidade dos mapas, endereços, estabelecimentos, cupons de desconto, pontos públicos, 
                        imagens, informações, rotas ou de qualquer outro conteúdo do serviço SEMPRENEGOCIO.
                      </p>
                      <p>
                          3.2 - Desse modo recomendam-se ao <strong>USUÁRIO</strong> que verifique a veracidade das informações obtidas e proceda, eventualmente, às medidas cabíveis para sua proteção com relação a eventuais danos.
                      </p>
                      <p>
                         O site <strong>SEMPRENEGOCIO</strong>, assim como a página do <strong>SEMPRENEGOCIO DESCONTOS</strong>, captura e divulga anúncios advindos de diversos <strong>ANUNCIANTE(S),</strong> logo, 
                         não atua como prestador de serviços de consultoria ou ainda intermediário ou participante em nenhum negócio jurídico 
                         que venha a ser eventualmente realizado entre o <strong>USUÁRIO e o(s) ANUNCIANTE(S)</strong>. 
                      </p>

                      <p>
                          Assim, o site <strong>SEMPRENEGOCIO</strong> não assume qualquer responsabilidade que advenha das relações existentes entre o <strong>USUÁRIO e o(s) ANUNCIANTE(S),</strong> sejam elas diretas ou indiretas.
                      </p>
                  </div>

                  <div>
                      <h4>4. Cadastro e senha do usuário</h4>
                      <p>
                       4.1 - A utilização de determinadas funcionalidades do serviço <strong>SEMPRENEGOCIO</strong> se condiciona ao prévio cadastro do <strong>USUÁRIO,</strong> por meio do site www.semprenegocio.com.br, mediante o fornecimento dos dados pessoais solicitados, definição de uma identificação ou indicação de um endereço de e-mail, bem como de uma senha, de uso pessoal e intransferível.
                      </p>
                      <p>
                          4.2 - <strong>O USUÁRIO</strong> deverá fornecer ao <strong>SEMPRENEGOCIO</strong>, por ocasião do seu cadastro, informações verdadeiras, atuais e completas, bem como a assim mantê-las durante todo o período em que utilizar o serviço <strong>SEMPRENEGOCIO</strong>.
                      </p>
                      <p>
                          4.3 - <strong>O USUÁRIO</strong> deverá, ainda, manter a confidencialidade e pessoalidade da sua senha e a notificar imediatamente a <strong>SEMPRENEGOCIO</strong> a respeito de eventual acesso indevido ou uso não autorizado da sua senha por terceiros.
                      </p>
                      <p>
                          4.4 - <strong>O USUÁRIO,</strong> ao seu exclusivo critério, poderá a qualquer momento cessar a utilização do serviço, através do cancelamento de sua conta, através do painel de controle, sendo que o conteúdo gerado por este permanecerá no site.
                      </p>
                      <p>
                          4.5 - A Impulsionar Marketing Ltda poderá, a qualquer tempo, excluir o <strong>USUÁRIO</strong>do site em razão de inobservância as condições deste Termo de Uso, comunicando o cancelamento da conta via e-mail.
                      </p>
                  </div>
                  <div>
                      <h4>5. Conteúdo criado pelo usuário</h4>

                      <p>5.1 - O <strong>USUÁRIO</strong> poderá incluir avaliações de um estabelecimento, para exibição no serviço <strong>SEMPRENEGOCIO</strong>.</p>
                      
                      <p>5.2 - Qualquer pessoa poderá visualizar as avaliações incluídas no serviço <strong>SEMPRENEGOCIO</strong>.</p>
                      
                      <p>5.3 - <strong>O USUÁRIO</strong> deverá fornecer ao <strong>SEMPRENEGOCIO</strong>, ao incluir avaliações para exibição no serviço, informações verdadeiras, objetivas, atuais e pertinentes à finalidade do serviço <strong>SEMPRENEGOCIO</strong>, de forma ética.</p>

                      <p>
                          5.4 - Recomenda-se que o <strong>USUÁRIO</strong> somente insira imagens cuja procedência seja por ele conhecida não podendo o site ser responsabilizado pelas inserções efetivadas, em inobservância as normas legais aplicáveis.
                      </p>
                  </div>
                  <div class='pratica'>
                      <h4>6. Práticas proibidas</h4>
                      <p>
                         6.1 - <strong>O USUÁRIO</strong> fica ciente e concorda que, na utilização do serviço <strong>SEMPRENEGOCIO</strong>, é terminantemente proibido: 
                      </p>
                      <p>
                          (i) - Distribuir, modificar, vender, alugar ou de qualquer forma explorar economicamente o serviço <strong>SEMPRENEGOCIO</strong>, os dados e informações a ele relacionados, bem como utilizá-los para finalidade que não seja pessoal imediata ou, ainda, para a criação ou fornecimento de outros produtos ou serviços
                      </p>
                      <p>
                          (ii) - Usuário se compromete a não fazer avaliações e ou inserir conteúdos impróprios que:
                      </p>

                      <p class='esq'>
                      - Viole a lei, a moral, os bons costumes, a propriedade intelectual, os direitos à honra, à vida privada, o sigilo das comunicações, à imagem, à intimidade pessoal e familiar;</p>

                      <p class='esq'>
                          - Infrinjam patentes, marcas, segredos comerciais, direitos autorais;
                      </p>

                      <p class='esq'>
                         - Estimulem a prática de condutas ilícitas;
                      </p>

                      <p class='esq'>
                         - Incitem a prática de atos de discriminação, seja em razão de sexo, raça, religião, crenças, idade ou qualquer outra condição;
                      </p>

                      <p class='esq'>
                         - Coloquem à disposição ou possibilitem o acesso a mensagens, produtos ou serviços ilícitos, violentos, pornográficos, degradantes;
                      </p>

                      <p class='esq'>
                         - Induzam ou incitem práticas perigosas, de risco ou nocivas para a saúde e para o equilíbrio psíquico;
                      </p>

                      <p class='esq'>
                        - Sejam falsos, ambíguos, inexatos, exagerados, de forma que possam induzir a erro sobre seu objeto ou sobre as intenções ou propósitos do comunicador;  
                      </p>

                      <p class='esq'>
                         - Constituam publicidade ilícita, enganosa ou desleal, e que configurem concorrência desleal;
                      </p>

                      <p class='esq'>
                        - Veiculem, incitem ou estimulem a pedofilia;  
                      </p>

                      <p class='esq'>
                         - Hostilizem terceiros;
                      </p>

                      <p class='esq'>
                         - Transmitam conteúdos ilegais, danosos, incômodos, ameaçadores, abusivos, tortuosos, difamatórios, vulgares, obscenos, invasores da intimidade de terceiros, odiosos, xenófobos, ou, de algum modo, inaceitáveis.
                      </p>

                      <p>
                          (iii) - Fornecer a <strong>SEMPRENEGOCIO</strong>, por ocasião do cadastro no site <strong>www.semprenegocio.com.br</strong>, informações falsas, inexatas, desatualizadas ou incompletas, bem como assumir intencionalmente a personalidade de outra pessoa, física ou jurídica;
                      </p>

                      <p>
                          (iv) - Disseminar ou instalar vírus ou qualquer outro código, arquivo ou software com o propósito de interromper, destruir, acessar indevidamente, limitar ou interferir no funcionamento ou segurança do serviço <strong>SEMPRENEGOCIO</strong>, bem como das informações, dados e equipamentos da <strong>SEMPRENEGOCIO</strong>, de seus <strong>USUÁRIOS</strong> ou de terceiros, ou, ainda, para qualquer outra finalidade ilícita; e
                      </p>

                      <p>
                          (v) - Praticar qualquer ato contrário à legislação em vigor.
                      </p>
                      <p>
                          Os conteúdos inseridos no portal <strong>SEMPRENEGOCIO</strong> estarão sujeitos à validação posterior à sua publicação, pela ExpressaHost sistemas, quanto ao teor e qualidade, podendo ser excluídos ou suprimidos se violarem qualquer um dos dispositivos explicitados na cláusula 6.1, relativa a conteúdos impróprios.
                      </p>
                      <p>
                        A Impulsionar Marketing Ltda Ltda. não controla os conteúdos transmitidos ou disponibilizados a terceiros pelo Usuário no uso dos serviços disponíveis no <strong>SEMPRENEGOCIO</strong>. Não obstante, ao detectar qualquer conduta e/ou método do (a) Usuário que contrarie o disposto neste Termo de Uso, poderá excluir/suspender avaliação do <strong>SEMPRENEGOCIO</strong> e poderá notificar, posteriormente, o (a) Usuário para que a situação seja regularizada. 
                      </p>

                      <p>
                        A Impulsionar Marketing Ltda Sistemas Ltda. não se responsabiliza pelo destino sugerido em links vinculados na página dos estabelecimentos e não mantém vínculos com outros sites eventualmente sugeridos por estes links.  
                      </p>
                  </div>
                  <div>
                      <h4>7. Bloqueio e cancelamento de cadastro do usuário</h4>
                      <p>
                          7.1 - <strong>O USUÁRIO</strong> fica ciente e concorda que o <strong>SEMPRENEGOCIO</strong>, tomando conhecimento de qualquer violação ao disposto neste Termo de Uso, poderá bloquear temporariamente ou cancelar em caráter definitivo o seu cadastro no site www.semprenegocio.com.br independentemente de prévia comunicação.
                      </p>
                  </div>
                  <div>
                      <h4>8. Utilização e divulgação de dados do usuário</h4>
                      <p>
                          8.1 <strong>- USUÁRIO</strong> fica ciente e concorda que a <strong>SEMPRENEGOCIO</strong> poderá utilizar o endereço de e-mail porventura fornecido por ocasião do seu cadastro no site para o envio de informações, de que natureza for relacionadas ao serviço <strong>SEMPRENEGOCIO</strong>.
                      </p>

                      <p>
                          8.2 - <strong>O USUÁRIO</strong> fica ciente e concorda que os dados que fornece ao <strong>SEMPRENEGOCIO</strong> e, os porventura registrados por este, por ocasião de seu cadastro e em decorrência da utilização dos serviços, incluindo informações relativas à sua identificação e localização, poderão, eventualmente ser preservados e/ou fornecidos às autoridades competentes em cumprimento de ordens judiciais.
                      </p>
                  </div>
                  <div>
                     <h4>9. Responsabilidade</h4>
                     <p>
                        9.1 - O USUÁRIO fica ciente e concorda que o SEMPRENEGOCIO não é responsável: 
                     </p>
                     <p>
                        (i) - Por eventual falta de qualidade, de exatidão, de completude, de adequação, de efetividade, de confiabilidade ou de utilidade dos mapas, endereços, cupons de desconto, estabelecimentos, pontos públicos, imagens, informações, rotas ou de qualquer outro conteúdo do serviço <strong>SEMPRENEGOCIO</strong>; 
                     </p>

                     <p>
                        (ii) - Por qualquer serviço, anúncio, propaganda, imagem, texto ou outro conteúdo relacionado ao serviço <strong>SEMPRENEGOCIO</strong> que seja criado, mantido ou prestado por <strong>USUÁRIOS</strong> ou por terceiros, ainda que acessível ou visualizável no site; 
                     </p>

                     <p>
                       (iii) - Pelas condições reais de uso, consequências e eventuais danos decorrentes do uso dos mapas, endereços, estabelecimentos, pontos públicos, imagens, informações, rotas, vias ou de qualquer outro conteúdo dos serviços de informação prestados pelo <strong>SEMPRENEGOCIO</strong>;  
                     </p>

                     <p>
                        (iv) - Por eventuais danos decorrentes da inobservância, pelo USUÁRIO, do dever de manutenção da confidencialidade e pessoalidade da sua senha, bem como da falta ou atraso no envio de notificação à <strong>SEMPRENEGOCIO</strong> a respeito de eventual acesso indevido ou uso não autorizado da sua senha por terceiros; 
                     </p>

                     <p>
                       (v) - Por qualquer dano sofrido pelo <strong>USUÁRIO</strong> em decorrência da conduta de outros <strong>USUÁRIOS</strong> ou terceiros, ainda que no âmbito do serviço <strong>SEMPRENEGOCIO</strong>;    
                     </p>
                     <p>
                       (vi) - Por qualquer dano sofrido pelo <strong>USUÁRIO</strong> em decorrência da remoção de qualquer conteúdo que criar, incluir ou divulgar no serviço <strong>SEMPRENEGOCIO</strong>, do cancelamento do seu cadastro no site, bem como da preservação ou fornecimento de informações a seu respeito, incluindo relativas à sua identificação e localização, pela <strong>SEMPRENEGOCIO</strong>, em cumprimento de ordens judiciais; e  
                     </p>
                     <p>
                       (vii) - Por eventual modificação, suspensão ou interrupção do serviço <strong>SEMPRENEGOCIO</strong> 
                     </p>
                     <p>
                       (viii) - Por manter os serviços disponíveis no período de 24 (vinte e quatro) horas por dia, todos os dias do ano.  
                     </p>
                 
                    <p>9.2 - <strong>O USUÁRIO</strong> fica ciente e concorda que é integralmente responsável:</p>

                    <p>
                        (i) - Por quaisquer danos decorrentes das ações e ou omissões por si praticadas em inobservância ao item 6 – “Praticas Proibidas” do presente Termo de Uso.
                    </p>
               
                    <p>9.3 - <strong>O USUÁRIO</strong> poderá a vir a ressarcir o <strong>SEMPRENEGOCIO</strong> das despesas que o site venha a dispender quando da violação das condições previstas neste Termo.</p>
                  
                    <p>9.4 -<strong>O USUÁRIO</strong> detêm todos os direitos de propriedade sobre a informação, texto, cupons de desconto, gráfico ou outros materiais que o <strong>USUÁRIO</strong> publicar no site. No entanto, o site fica autorizado a reproduzir, publicar e distribuir todos os arquivos, textos, cupons de desconto, gráficos integral ou em partes do seu conteúdo.</p>
                 
                    <p>9.5 - A ExpressaHost não endossa qualquer conteúdo enviado por qualquer <strong>USUÁRIO</strong> quer seja uma opinião, recomendação ou conselho ali expresso.</p>
                  </div>
                  <div>
                      <h4>10. Modificação dos Termos de Uso</h4>
                      <p>
                        10.1 - <strong>O USUÁRIO</strong> fica ciente e concorda que este Termo de Uso poderá ser alterado pela <strong>SEMPRENEGOCIO</strong>, a qualquer tempo, independentemente de qualquer comunicação.  
                      </p>
                      <p>
                          <strong>O USUÁRIO</strong> poderá, a qualquer momento, acessar a versão atualizada deste Termo de Uso no endereço www.semprenegocio.com.br.
                      </p>
                  </div>
                  <div>
                      <h4>13.Foro</h4>
                      <p>
                         13.1 - As partes elegem o Foro Central da Comarca de Divinópolis-MG para dirimir quaisquer controvérsias e demandas decorrentes ou relacionadas ao objeto destes Termos de Uso, renunciando a qualquer outro, por mais privilegiado que possa ser.
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
                        <li><a href="/trabalhe-conosco/" id="trab">Trabalhe conosco</a></li>
                        <li><a href="/fale-conosco/" id="cont">Fale conosco</a></li>
                        <li><a href="http://www.expressahost.com.br" id="sit"  hreflang="pt-br" target="_blank">Conheça nossos sistemas</a></li>
                    </ul>
                    <ul>
                        <li>
                            <p>Para Você</p>
                        </li>
                        <li><a href="/duvidas-frequentes/" id="duvi">Dúvidas frequêntes</a></li>
                        <li><a href="/termos-de-uso/" id="term">Termos de uso</a></li>
                        <li><a href="/politica-de-privacidade/" id="poli">Política de privacidade</a></li>
                    </ul>
                    <ul>
                        <li>
                          <p>Para Anunciantes</p>
                        </li>
                            <li><a href="/painel-de-controle/" hreflang="pt-br">Painel de Controle</a></li>
                        <li><a href="/termos-gerais/" id="poli">Termos gerais</a></li>
                        <li><a href="/cuidados-com-fraudes/">Cuidados com fraudes</a></li>
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
                        <img src="/view/assets/imagens/logo@1x.png" alt="logo com escrito, semprenegócio">
                    </figure>
                </div>
            </footer>
        </div>
        <!--fim div paiRodape-->
    </main>
</div>
</body>
<script src="/view/assets/js/jquery-1.11.3.min.js"></script>
<script src="/view/assets/js/modernizr.custom.js"></script>
<!-- build:js js/index.min.js -->
<script src="/view/assets/js/barraMenu.js"></script>
<script  src="/view/assets/js/loginDash.js"></script>
<!-- <script src="/view/assets/js/revelaBloco.js"></script> -->
<!-- endbuild -->
<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
<script src="/view/assets/js/Assync/anuncioImpress.js"></script>
<link rel="stylesheet" href="/view/assets/estilo/jquery-ui.css">
<script src="/view/assets/js/jquery-ui.min.js"></script>
<script src="/view/assets/js/autocomplete.js"></script>
<script src="/view/assets/js/recoverPass.js"></script>
<script src="/view/assets/js/preventSubmit.js"></script>


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

