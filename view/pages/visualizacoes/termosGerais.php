<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Termos gerais semprenegócio, leia nossos termos gerais e fique por dentro de nossos direitos e deveres.">
    <meta name="keywords" content="direitos e deveres,termos gerais,regras, Sempre Negócio, semprenegocio.com.br, semprenegocio.com ">
    <link rel="icon" href="view/assets/imagens/flor.png">

    <title>Sempre Negócio - Termos Gerais</title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/termosGerais.css" rel="stylesheet">
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
            <h1 class="sumir">Termos gerais da SempreNegócio</h1>
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
                    <form action="?controller=Anuncio&action=viewAnuncioPesquisa" method="post">
                        <fieldset>
                            <legend class="sumir">Pesquisar</legend>
                            <label for="busc">
                                <input type="search" id="busc" name="busc" class="completar" placeholder="Bares, lojas, beleza..." maxlength="25" required title="Digite aqui para que a pesquisa seja efetuada." >
                            </label>

                            <label for='pesBair'>
                                <input type="search" id="pesBair" name="tCat" class="compleBairro" placeholder="Busca por bairros">
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
                                    <a href='/completar-perfil/alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Home&dirAction=action=viewTermosGerais'>Sair</a>
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

                                    <input type='hidden' id='dirLogin' value='?controller=Home&action=viewTermosGerais'>

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
                <h2 class='sumir'>Termos gerais</h2>
                <figure>
                    <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio">
                </figure>
                <div class='paiArt'>
                    <p>Termos gerais</p>

                    <div>
                        <p>Condições Gerais</p>
                        <button type="button" value="clientes" class="cliente">Clientes</button>
                        <button type="button" value="clientes" class="contratar">Contratação</button>
                        <h2>Condições Específicas</h2>
                        <button type="button" value="clientes" class="sn">semprenegocio.com.br</button>
                        <button type="button" value="clientes" class="cupons">Cupons de Desconto</button>
                    </div>

                    <article>
                        <h3 class="sumir">Clientes</h3>
                        <div id="cli">
                            <p><strong>1.Objeto</strong></p>
                            <p>
                                O objeto destas Condições Específicas é a prestação de serviços de divulgação de anúncio no site SempreNegocio (http://www.semprenegocio.com.br) por parte de <strong>CONTRATADA</strong>, com caráter de não exclusividade, nos termos estabelecidos nestas Condições Específicas e no Formulário correspondente.
                            </p>
                            <p>
                                <strong> 1.1 O CLIENTE</strong> deverá optar por uma das modalidades de planos oferecidas pela <strong>CONTRATADA</strong>;
                            </p>
                            <p>
                                <strong>1.2</strong> Para que o material publicitário seja divulgado, deverá o <strong>CLIENTE</strong> preencher a integralidade das informações indicadas no formulário, especialmente, logotipo, fotos e texto
                            </p>

                            <p><strong> 2.VIGÊNCIA</strong> </p>
                            <p>
                                <strong>2.1</strong> A vigência contratada será a expressamente constante no formulário de contratação e terá início no momento da publicação do anúncio no site <strong>SEMPRENEGOCIO</strong>;
                            </p>
                            <p>
                                <strong>2.2</strong> O presente contrato será automaticamente renovado mantendo o mesmo plano e parcelamento inicialmente contratados, excluindo-se eventuais bonificações, promoções ou descontos concedidos anteriormente, salvo prévio cancelamento do contrato pelo <strong>CLIENTE</strong>.
                            </p>
                            <p><strong>3. DO CANCELAMENTO</strong></p>
                            <p>
                                <strong>3.1</strong>   O cancelamento realizado após 3 (três) meses de vigência do contrato não implica no pagamento de qualquer multa;
                            </p>
                            <p>
                                <strong>3.2   Caso o CLIENTE</strong> efetue o cancelamento após o prazo determinado nas Condições Gerais e antes do definido na cláusula 3.1 do presente instrumento, o cancelamento estará condicionado ao pagamento de mensalidades correspondentes ao período de 03 (três) meses, vez que tal valor corresponde aos ressarcimentos e investimentos para a disponibilização do espaço publicitário ao <strong>CLIENTE</strong>, nos termos do artigo 473, Código Civil;
                            </p>
                            <p>
                                <strong>3.3</strong>  Os valores já pagos pelo <strong>CLIENTE</strong> não serão devolvidos em hipótese de cancelamento, tendo o <strong>CLIENTE</strong> direito a usufruir do serviço durante o período correspondente a valores já pagos;
                            </p>
                            <p>
                                <strong>3.4  3.4.</strong> Para que seja efetivado o cancelamento, o <strong>CLIENTE</strong> deverá registrar solicitação perante o <strong>SAC</strong> da <strong>CONTRATADA</strong>.
                            </p>
                            <p><strong>4. LIMITAÇÃO DE RESPONSABILIDADES</strong></p>
                            <p>
                                <strong>O CLIENTE</strong> fica ciente que a <strong>CONTRATADA</strong> não será responsável:
                            </p>
                            <p>
                                <strong>4.1</strong> Por eventual falta de exatidão, adequação, efetividade e utilidade dos mapas, endereços, estabelecimentos, pontos públicos, imagens, informações, rotas ou de qualquer outro conteúdo do website <strong>SEMPRENEGOCIO</strong>;
                            </p>
                            <p>
                                <strong>4.2</strong> Por dano eventualmente sofrido pelo <strong>CLIENTE</strong> por conduta de usuários ou por terceiros no âmbito dos serviços prestados pelo <strong>SEMPRENEGOCIO</strong>;
                            </p>
                            <p>
                                <strong>4.3</strong> Por eventuais irregularidades no funcionamento do SEMPRENEGOCIO, incluindo as hipóteses de caso fortuito, força maior, ato de terceiro ou inobservância, por parte do <strong>CLIENTE</strong> das condições básicas para a veiculação dos anúncios;
                            </p>
                            <p>
                                <strong>4.4</strong> Por qualquer posicionamento em mecanismos de busca ou entre os anúncios dos demais anunciantes, exceto se esta condição for expressamente contratada como um serviço adicional, estando ele desvinculado do plano escolhido, se disponível.
                            </p>
                            <p><strong>5. DIREITOS E OBRIGAÇÕES DA CONTRATADA</strong></p>

                            <p><strong>5.1 A CONTRATADA</strong> compromete-se a envidar esforços para que a veiculação de anúncios no <strong>SEMPRENEGOCIO</strong> seja realizada em conformidade com as características descritas no Contrato e disposições vigentes;</p>

                            <p>
                                <strong>5.2 A CONTRATADA</strong> poderá remover qualquer conteúdo criado, incluído ou divulgado pelo <strong>CLIENTE no SEMPRENEGOCIO</strong>, que esteja em contrariedade com as disposições contratuais, independentemente de comunicação;
                            </p>

                            <p>
                                <strong>5.3</strong> Os dados fornecidos pelo <strong>CLIENTE a CONTRATADA</strong> e os porventura registrados por esta, por ocasião de seu cadastro no <strong>SEMPRENEGOCIO</strong> e em decorrência da utilização do <strong>SEMPRENEGOCIO</strong>, incluindo informações relativas à sua identificação e localização, poderão ser preservados e/ou fornecidos às autoridades competentes em cumprimento de ordens judiciais;
                            </p>

                            <p>
                                <strong>5.4 A CONTRATADA</strong>, através do <strong>SEMPRENEGOCIO</strong>, possui ampla base de dados, sendo que todo conteúdo inserido no site poderá continuar disponível após o término do contrato e ser utilizado em outros sites cedidos ou licenciados pela <strong>CONTRATADA</strong> a terceiros, com o que desde já concorda o <strong>CLIENTE</strong>;
                            </p>

                            <p>
                                <strong>5.5 A CONTRATADA</strong> poderá a seu exclusivo critério e a qualquer tempo alterar as características da veiculação dos anúncios, mediante informação da nova versão dos serviços/anúncios de cada "pacote" contratado;
                            </p>

                            <p>
                                <strong>5.6</strong> As informações relativas ao anúncio preenchidas pelo <strong>CLIENTE</strong> estarão sujeitas a avaliação e eventual revisão da <strong>CONTRATADA</strong>, que poderá, a seu exclusivo critério e com o objetivo de manter a qualidade do site, solicitar novas informações ao <strong>CLIENTE</strong>.
                            </p>

                            <p>
                                <strong>5.7 A CONTRATADA</strong> se exonera de responsabilidades na hipótese do CLIENTE não ser o legítimo proprietário do estabelecimento indicado no cadastro e/ou não possuir autorização para contratação.
                            </p>

                            <p><strong>6. DIREITOS E OBRIGAÇÕES DO CLIENTE:</strong></p>
                            <p>
                                <strong>6.1</strong> Fornecer à <strong>CONTRATADA</strong> através do site <strong>SEMPRENEGOCIO</strong> ou em quaisquer outros meios aplicáveis, como a Central do Anunciante (http://semprenegocio.com.br), informações atuais e completas em relação ao estabelecimento, bem como responder os comentários ou avaliações feitas pelos usuários com lisura e objetividade;
                            </p>

                            <p>
                                <strong>6.2</strong> Nas aquisições realizadas através da Internet ("digital store"), o <strong>CLIENTE</strong> será responsável pelo correto e completo preenchimento das informações necessárias ao desenvolvimento e publicação do anúncio, exonerando a <strong>CONTRATADA</strong> de quaisquer responsabilidades relacionadas à obtenção de informações;
                            </p>

                            <p>
                                <strong>6.3</strong> Manter a confidencialidade da sua senha e a notificar a <strong>CONTRATADA</strong> acerca de eventual acesso indevido ou uso não autorizado;
                            </p>
                            <p>
                                <strong>6.4</strong> Não reproduzir, armazenar ou utilizar para fins não previstos expressamente neste Contrato qualquer conteúdo do <strong>SEMPRENEGOCIO</strong>;
                            </p>
                            <p>
                                <strong>6.5</strong> Manter todos os direitos e autorizações necessários para a inclusão de informações relacionadas ao estabelecimento, produto ou serviço oferecido (fotografias, vídeos e/ou outras imagens) incluindo, mas não se limitando, aqueles relativos aos direitos autorais e de imagem;
                            </p>
                            <p>
                                <strong>6.6</strong> Atender com brevidade às solicitações da <strong>CONTRATADA</strong> em relação ao conteúdo que o <strong>CLIENTE</strong> criar, incluir ou divulgar no <strong>SEMPRENEGOCIO</strong>.
                            </p>

                            <p><strong>7. PREÇO E FORMA DE PAGAMENTO</strong></p>
                            <p>
                                <strong>7.1 O CLIENTE</strong> pagará à <strong>CONTRATADA</strong> os valores constantes dos planos descritos no site <strong>SEMPRENEGOCIO</strong> (venda pela Internet) ou do formulário de contratação (vendas pessoais), de acordo com sua opção e mediante os meios de pagamento disponíveis;
                            </p>
                            <p>
                                <strong>7.2</strong> Em caso de atraso no pagamento, o <strong>CLIENTE</strong> ficará sujeito ao pagamento de multa de 2,0% (dois por cento) e juros de 1,0% (um por cento) ao mês, sobre o valor em atraso, incidentes a partir do vencimento até o efetivo pagamento do débito.
                            </p>
                            <p> <strong>8.  DA SUSPENSÃO DA DISPONIBILIDADE</strong></p>
                            <p>
                                <strong> A CONTRATADA</strong> reserva o direito de suspender a disponibilidade na internet do anúncio do <strong>CLIENTE</strong> no <strong>SEMPRENEGOCIO</strong> na ocorrência de atraso no pagamento superior a 3 (três) dias. O anúncio será novamente disponibilizado no prazo de até 72 (setenta e duas) horas após comprovação do pagamento.
                            </p>
                        </div>
                    </article>

                    <article >
                        <h3 class="sumir">Contratação</h3>
                        <div id="cont">
                            <p>
                                <strong>
                                    Contrato de adesão condições gerais de contratação de produtos e serviços SempreNegócio informação
                                </strong>
                            </p>
                            <p>
                                <strong>Impulsionar Marketing LTDA.</strong>
                            </p>

                            <p>1. Definições:</p>
                            <p>
                                Para efeitos deste Contrato, os seguintes termos deverão ser entendidos conforme constante no Glossário disponível no site http://semprenegocio.com.br
                            </p>
                            <p>
                                <strong>1.1 ANÚNCIO:</strong> mensagem publicitária disponibilizada através de meios impressos e/ou digitais para divulgação da marca e informações adicionais do <strong>CLIENTE</strong>, como contato, promoções, portifólio de produtos;
                            </p>
                            <p>
                                <strong>1.2 PLANO:</strong> descrição da modalidade do serviço contratado que corresponde a critérios de vigência, permanência mínima, valor total e funcionalidades. Aplica-se apenas aos serviços/anúncios digitais;
                            </p>
                            <p>
                                <strong>1.3 ASSINATURA:</strong> forma de renovação automática adotada para a contratação, tendo diferentes períodos cíclicos de vigência, conforme opção realizada no ato da contratação. Aplica-se apenas aos serviços/anúncios digitais;
                            </p>
                            <p>
                                <strong>1.4 TÍTULO:</strong> Segmentação com a identificação das atividades, serviços e produtos comercializados pelo <strong>CLIENTE.</strong> Aplica-se apenas aos serviços/anúncios impressos;
                            </p>
                            <p>
                                <strong>1.5 FIGURAÇÃO:</strong> Aplica-se aos serviços/anúncios impressos, com vistas a esclarecer as dimensões, cores e localização do anúncio. Aplica-se apenas aos serviços/anúncios impressos;
                            </p>
                            <p>
                                <strong>1.6 SEÇÃO:</strong> Divisão interna da lista em três setores (aplica-se apenas aos serviços/anúncios impressos):
                            </p>
                            <p>
                                <strong>1.6.1</strong> Assinantes <strong>(ASN):</strong> também conhecida como páginas brancas. Constitui-se de relação de assinantes de linhas telefônicas comerciais e/ou residenciais pertencentes às localidades de abrangência da lista, organizadas alfabeticamente, por nome, razão social ou nome de fantasia;
                            </p>
                            <p>
                                <strong>1.6.2</strong> Endereços <strong>(END):</strong> Relação de Assinantes comerciais pertencentes às localidades que compõem a lista, organizadas alfabeticamente por nome do endereço e dentro destes, por número e complementos;
                            </p>
                            <p>
                                <strong>1.6.3</strong> Classificada <strong>(CLA):</strong> Relação de Assinantes comerciais pertencentes às localidades que compõem a lista, organizadas alfabeticamente por nome do endereço e dentro destes, por número e complementos.
                            </p>
                            <p>
                                <strong>1.6.4</strong> Compras e Serviços <strong>(C&S):</strong> Relação de Empresas e profissionais liberais pertencentes às localidades que compõem a lista, organizadas alfabeticamente por títulos de atividades comerciais (anúncios/serviços) de interesse do cotidiano doméstico, contendo anúncios e inserções gratuitas.
                            </p>
                            <p>
                                <strong>1.7 ABRANGÊNCIA:</strong> extensão geográfica em que o anúncio será divulgado. Poderá ser nacional, regional, local, etc., conforme condições contratadas;
                            </p>
                            <p>
                                <strong>1.8 LINK:</strong> endereço ou comando eletrônico alocado em uma determinada página de Internet que, ao ser acessado por um usuário, remetendo-o a outra página pré-determinada na Internet;
                            </p>
                            <p>
                                <strong>1.9 CLIQUE:</strong> acesso, por qualquer usuário, a um link presente num anúncio ou qualquer espaço de uma página, ato que resulta no acesso a uma página definida previamente no contrato. Aplica-se apenas aos serviços/anúncios digitais.
                            </p>
                            <p>
                                <strong>2. TERMO DE ADESÃO E ANEXOS</strong>
                            </p>
                            <p>
                                Integra este contrato os formulários denominados "Termo de Adesão" e "Anexo".
                            </p>
                            <p>
                                <strong>3. DA RESPONSABILIDADE EXCLUSIVA DO CLIENTE</strong>
                            </p>
                            <p>
                                O conteúdo dos anúncios, independentemente da modalidade de divulgação, é de responsabilidade exclusiva do <strong>CLIENTE</strong>, não sendo responsabilidade da <strong>CONTRATADA</strong> a violação de direitos autorais, de imagem, de privacidade, de propriedade industrial, do consumidor ou direito de terceiros, bem como quanto aos dados fornecidos (telefone, endereço e imagens), respondendo o <strong>CLIENTE</strong> na forma da lei, por eventuais prejuízos causados a terceiros.
                            </p>
                            <p>
                                <strong>3.1</strong> Na eventualidade de a <strong>CONTRATADA</strong> vir a ser condenada ao pagamento de quaisquer valores a título de danos materiais, morais, multas administrativas, honorários advocatícios decorrentes do conteúdo do <strong>CLIENTE</strong> nos termos do caput do item 3, a <strong>CONTRATADA</strong> emitirá um boleto e encaminhará juntamente com uma notificação extrajudicial, com o valor total dos prejuízos assumidos.
                            </p>
                            <p>
                                <strong>3.2</strong> O montante indicado no item 3.1 será cobrado sem prejuízo da adoção de outras medidas judiciais ou extrajudiciais, e não configura o ressarcimento por danos morais, materiais e lucros cessantes, eventualmente comprovados como devidos.
                            </p>
                            <p>
                                <strong>3.3</strong> A falta de aprovação ou de entrega do conteúdo do anúncio não isenta o <strong>CLIENTE</strong> de eventuais multas contratuais.
                            </p>
                            <p>
                                <strong>4. DO PAGAMENTO E DO INADIMPLEMENTO</strong>
                            </p>
                            <p>
                                O adimplemento de parcela ou quitação de contrato importará em ratificação e em anuência aos termos e condições de contratação.
                            </p>
                            <p>
                                <strong>4.1</strong> A aprovação do parcelamento está sujeita ao critério exclusivo da <strong>CONTRATADA</strong> e dependerá de inexistência de restrição de crédito do <strong>CLIENTE</strong>, esta entendida como qualquer anotação nos cadastros de entidades de controle de crédito, protestos e ou distribuidores de ações judiciais.
                            </p>
                            <p>
                                <strong>4.2</strong> Qualquer pagamento, por meio de cheques, se feito a empregados ou representantes da <strong>CONTRATADA</strong>, será necessariamente efetuado através de cheques cruzados, nominais a Impulsionar Marketing Ltda., sob pena de ser considerada a nulidade do pagamento.
                            </p>
                            <p>
                                <strong>4.3 O CLIENTE</strong> declara-se ciente e concorda que em caso da cobrança tornar-se inviável ou de difícil efetivação na modalidade originalmente escolhida, seja qual for o motivo, a <strong>CONTRATADA</strong> ficará expressamente autorizada a emitir boletos bancários representativos da dívida.
                            </p>
                            <p>
                                <strong>4.4 O CLIENTE</strong> declara-se ciente de que a eventual falta de cobrança, por parte da <strong>CONTRATADA</strong>, qualquer que seja a razão, não o isentará da obrigatoriedade de efetivação dos pagamentos, pela forma e nos vencimentos contratados.
                            </p>
                            <p>
                                <strong>4.5</strong> O inadimplemento implicará em vencimento antecipado, sendo o saldo devedor existente acrescido de multa de 2% (dois por cento), juros de mora de 1% (um por cento) ao mês e atualização monetária com aplicação do IPCA, ou outro índice que venha a substituí-lo, calculados entre a data do vencimento e o dia do efetivo pagamento.
                            </p>
                            <p>
                                <strong>4.6</strong> Em caso de inadimplência superior a 3 (três) dias, os anúncios do <strong>CLIENTE</strong> poderão ser suspensos até efetiva regularização dos débitos e serão reativados em até 72 (setenta e duas) horas úteis pela <strong>CONTRATADA.</strong>
                            </p>
                            <p>
                                <strong>4.7 O CLIENTE</strong> manifesta conhecimento das formas de quitação adotadas pela CONTRATADA, tendo sido informada, inclusive, sobre as empresas de cobrança conveniadas e do teor do comunicado disponibilizado no link http//www.semprenegocio.com.br
                            </p>
                            <p>
                                <strong>4.8 O CLIENTE</strong> deverá comunicar por escrito à <strong>CONTRATADA</strong> a alteração de seu endereço de cobrança, o não recebimento do aviso de cobrança antes do vencimento, o erro no valor em cobrança ou ainda a não inclusão da cobrança na forma contratada do valor do anúncio/serviço, sendo que a não observância destes preceitos sujeitá-lo-á às cominações da inadimplência.
                            </p>
                            <p><strong>5. DO REAJUSTE DOS VALORES DE MENSALIDADE</strong></p>
                            <p>
                                Para os produtos com renovação automática, o valor será corrigido automaticamente, a cada 12 (doze) meses, pelo <strong>IPCA</strong>.
                            </p>
                            <p>
                                <strong>5.1</strong> Após o término da vigência inicialmente contratada, os planos poderão sofrer alterações, inclusive de configuração e valores. Nesta oportunidade, o <strong>CLIENTE</strong> será notificado para conhecer das novas condições de contratação e, não havendo concordância, poderá rescindir o contrato, em até 07 (sete) dias após ciência, sem pagamento de multa, mas arcando com as despesas do serviço já prestado, conforme valores anteriormente contratado. Após o prazo de sete dias, implicará em concordância com as novas condições de contratação.
                            </p>
                            <p>
                                <strong>5.2</strong> A responsabilidade da CONTRATADA por eventuais danos, inclusive morais e lucros cessantes, causados por culpa exclusiva relativos à prestação dos serviços está limitada ao valor do contrato, acrescido do percentual de 10% (dez por cento).
                            </p>
                            <p>
                                <strong>5.3</strong> Em caso de erro na publicação do anúncio por responsabilidade da <strong>CONTRATADA</strong>, o preço respectivo será abatido na proporção da gravidade do erro, tendo em vista a utilidade do anúncio publicado. O valor eventualmente pago a maior pelo <strong>CLIENTE</strong> será devolvido corrigido monetariamente segundo a variação do <strong>IPCA</strong>, ou de outro índice que venha a substituí-lo.
                            </p>
                            <p>
                                <strong>6. DA LIMITAÇÃO DE RESPONSABILIDADE DA CONTRATADA POR OMISSÃO DE ANÚNCIO</strong>
                            </p>
                            <p>
                                <strong> 6.1</strong> Em caso de omissão do anúncio impresso, o respectivo valor pago será devolvido ao <strong>CLIENTE,</strong> corrigido monetariamente segundo o critério descrito na cláusula <strong>7.1.</strong>
                            </p>
                            <p>
                                <strong>6.2 A CONTRATADA</strong> não estima com a campanha, nenhum tipo de rendimento econômico ou resultado comercial para o <strong>CLIENTE</strong>, nem tampouco pode provisionar número de acessos ou contato com o <strong>CLIENTE</strong> através do anúncio ora contratado.
                            </p>
                            <p>
                                <strong>7. DO CANCELAMENTO</strong>
                            </p>
                            <p>
                                <strong>O CLIENTE</strong> poderá solicitar o cancelamento da contratação no prazo de até 07 (sete) dias após a contratação, sem o pagamento de qualquer multa. Nesta oportunidade, o <strong>CLIENTE</strong> se compromete a saldar e liquidar, imediatamente, eventuais débitos e pendências existentes, em razão dos serviços já prestados e ainda não adimplidos.7.
                            </p>
                            <p>
                                <strong>7.1</strong> Após este prazo, para anúncios impressos, exceto os guias com contratação por tiragem, o cancelamento poderá ser feito até o último dia da comercialização da lista, mediante o pagamento de multa de 20% (vinte por cento) sobre o valor do produto cancelado.
                            </p>
                            <p>
                                <strong>7.2</strong> Para os anúncios comercializados por tiragem determinada, não será possível o cancelamento após o prazo indicado neste caput.
                            </p>
                            <p>
                                <strong>7.3</strong> Para os anúncio/serviços on-line, devem ser observadas as regras específicas de permanência mínima e/ou multa para cada serviço contratado, nas condições específicas disponibilizadas em empresas.semprenegocio.com.br
                            </p>
                            <p>
                                <strong>8. DA RECUSA DE PUBLICIDADE</strong>
                            </p>
                            <p>
                                <strong>A CONTRATADA</strong> reserva-se o direito de recusar a contratação cujo conteúdo do anúncio, a seu exclusivo critério, não atenda princípios legais, éticos ou morais ou não seja adequada à linha editorial da <strong>CONTRATADA</strong>, sem que tal recusa se configure como mora contratual.
                            </p>
                            <p>
                                <strong>8.1 O CLIENTE</strong> declara-se ciente de que, sem prévia e expressa anuência da <strong>CONTRATADA</strong>, os anúncios não poderão ter como conteúdo serviços concorrentes aos ofertados pela <strong>CONTRATADA</strong>.
                            </p>
                            <p>
                                <strong>9. DA NÃO EXCLUSIVIDADE DA CONTRATAÇÃO</strong>
                            </p>
                            <p>
                                A prestação de serviços não tem caráter exclusivo para a <strong>CLIENTE</strong>, sendo permitido à CONTRATADA realizar outros serviços publicitários com marcas e/ou produtos de concorrentes do material publicitário em promoção.
                            </p>
                            <p>
                                <strong>10. DISPOSIÇÕES FINAIS</strong>
                            </p>
                            <p>
                                <strong>10.1</strong> Qualquer tolerância das partes no cumprimento deste contrato não constituirá novação.
                            </p>
                            <p>
                                <strong>10.2</strong> Na hipótese de quaisquer dúvidas sobre os serviços contratados o <strong>CLIENTE</strong> deverá entrar em contato com o Serviço de Atendimento ao Cliente <strong>(SAC) da CONTRATADA</strong>, através do telefone 37 3512 2429, nos dias úteis, de Segunda-feira a Sexta-feira, das 09:00 às 18:00 horas.
                            </p>
                            <p>
                                <strong>10.3</strong> O foro do presente contrato é o domicílio e/ou sede do <strong>CLIENTE</strong>.
                            </p>
                        </div>
                    </article>

                    <article>
                        <h3 class="sumir">semprenegocio.com.br</h3>
                        <div id="sn">
                            <p>Condições específicas - SempreNegocio.com</p>
                            <p>
                                Os seguintes Termos completam o Contrato de Adesão de Publicidade em Internet e se destinam aos Clientes/Anunciantes.
                            </p>
                            <p>
                                O www.semprenegocio.com.br é um site com divulgações de anúncios e publicidades on-line, onde o contratante terá que optar por uma das modalidades de planos oferecidas e disponíveis no ato da contratação.
                            </p>
                            <p>
                                <strong>SEMPRENEGOCIO</strong> Descontos, atua conjuntamente com o site <strong>SEMPRENEGOCIO</strong>, como uma vertical ou página adicional, proporcionando aos clientes a criação e divulgação de cupons de desconto.
                            </p>
                            <p>
                                Somente aos anunciantes que firmaram contrato junto ao <strong>SEMPRENEGOCIO</strong>, contratando o serviço de anúncio e estando vigente, terá direito a divulgação de cupons de desconto.
                            </p>
                            <p>
                                Estando o cliente e de acordo com as condições descritas, terá disponível uma nova página no site <strong>SEMPRENEGOCIO</strong> , que lhes permitirá a publicação de até dois espaços publicitários, de produto e/ou serviço em forma de cupom de desconto.
                            </p>
                            <p>
                                Respeitando todas as regras e permanecendo todas as obrigações, direitos, politica de privacidade e regulamento, este será publicado, de forma gratuita apenas condicionada a contratação de um anúncio no <strong>SEMPRENEGOCIO</strong>.
                            </p>

                            <p><strong>Limitação da Responsabilidade</strong></p>
                            <p>
                                De acordo com a legislação aplicável, a <strong>CONTRATADA</strong> não assume qualquer responsabilidade contratual ou extracontratual em razão de danos e ou prejuízos diretos e indiretos, que possa vir a ocasionar: (I) impossibilidade de utilização do serviço. (II) eventuais custos incorridos para obtenção de serviços substitutivos, ou de qualquer bem comprado ou adquirido ou informação ou mensagem recebidos ou operações concretizadas através destes serviços. (III) do acesso não autorizado ou a alteração de suas transmissões de dados. (IV) declarações de conduta de terceiros através do serviço.
                            </p>
                            <p>
                                <strong>O CLIENTE</strong> concorda que, além disso, a <strong>CONTRATADA</strong> não será responsável por nenhum dano ou prejuízo derivados da interrupção, suspensão ou término do serviço, incluindo, mais não se limitando, a danos, lucros, uso, dados ou outros bens intangíveis, prejuízos diretos, indiretos, acidentais, especiais, consequentes, ou exemplares, mesmo que a interrupção, suspensão ou terminação seja justificada ou não, negligente ou intencional, advertida ou inadvertida. (V) a CONTRATADA não se responsabilizará por quaisquer danos e ou indenizações geradas em função das avaliações dos usuários do site em relação aos estabelecimentos anunciantes.
                            </p>
                            <p>
                                Cada Cupom terão suas próprias características, como local de uso, código de confirmação, prazo de entrega, meios de entrega ou utilização, prazo de validade, limitações de ofertas no estabelecimento comercial, dia e hora para utilização.
                            </p>
                            <p>
                                É de responsabilidade do usuário verificar tais condições na página do cupom, sendo este parceiro e/ou anunciante, responderá pela veracidade e correção de tais informações acima citadas.
                            </p>
                            <p>
                                O cliente <strong>SEMPRENEGOCIO</strong> poderá divulgar seus cupons de desconto por meio da Central do Anunciante (http:.com.br). O mesmo receberá a senha e usuário no ato da ativação do produto ou poderá solicitar via SAC da Contratada.
                            </p>
                            <p>
                                Negociações com Anunciantes
                            </p>
                            <p>
                                Os anúncios no site <strong>SEMPRENEGOCIO</strong> são de responsabilidade exclusiva dos anunciantes. Cabe aos anunciantes, assegurarem idoneidade em seus negócios e transações. Assim como a criação e divulgação de cupons de desconto na página <strong>SEMPRENEGOCIO</strong> Descontos.
                            </p>
                            <p>
                                <strong> A CONTRATADA</strong>, por meio do <strong>SEMPRENEGOCIO</strong>, não realiza qualquer intermediação de venda, compra e/ou descontos, trocas ou qualquer tipo de transação feita pelos usuários de seu site, tratando-se de serviço exclusivamente de disponibilização de mídia para divulgação. A transação deverá ser feita diretamente entre as partes interessadas.
                            </p>
                            <p>
                                <strong>Indenizações</strong>
                            </p>
                            <p>
                                <strong>O CLIENTE</strong> se obriga a indenizar a <strong>CONTRATADA</strong>, seus representantes, agentes, sócios e funcionários, de eventuais condenações relativas a reclamações administrativas ou demandas judiciais incluídos eventuais reembolsos de honorários de advogados de seus procuradores e ou de terceiros, em razão de quaisquer danos sofridos pelo <strong>SEMPRENEGOCIO</strong> e /ou <strong>SEMPRENEGOCIO</strong> Descontos provenientes do uso ou transmissão de informações indevidas, realizadas através dos diversos login(s) e senha(s) cadastrados no <strong>SEMPRENEGOCIO</strong> que viole os termos de uso, lei ou regulamento local, nacional ou internacional, que venham a prejudicar os direitos de terceiros, desde que devidamente comprovados.
                            </p>
                            <p>
                                Proibição da Revenda do Serviço
                            </p>
                            <p>
                                <strong>O CLIENTE</strong> se obriga a não reproduzir, duplicar, copiar, vender, revender para fins comerciais, qualquer seção do serviço, uso ou acesso ao mesmo.
                            </p>
                            <p>
                                Links
                            </p>
                            <p>
                                <strong>A CONTRATADA</strong> não se responsabiliza pelo destino sugerido em links vinculados nos anúncios e não mantém vínculos com outros sites sugeridos por eles. Bem como não será responsável, direta ou indiretamente, por qualquer dano ou prejuízo causado, ou que presume tenham sido ocasionados por tais conteúdos, produtos ou serviços disponíveis em ditos sites ou recursos externos, ou pela utilização ou confiança depositada pelo CLIENTE, usuário ou terceiros em tais conteúdos, produtos ou serviços.
                            </p>
                            <p>
                                <strong>Direitos de Propriedade</strong>
                            </p>
                            <p>
                                Todo conteúdo do <strong>SEMPRENEGOCIO</strong> e ou <strong>SEMPRENEGOCIO</strong> Descontos, não se limitando a: textos, programas, canções, sons, fotografias, gráficos, vídeos e outros materiais contidos em propagandas disponíveis no serviço, assim como também informações divulgadas ao usuário através do site dos anunciantes, estão devidamente protegidos pelas leis de direito autoral, marcas comerciais, patentes e outros direitos de propriedade intelectual. Os materiais e informações somente poderão ser utilizados de acordo com as autorizações expressas da <strong>CONTRATADA</strong> e anunciantes, não podendo ser copiadas, reproduzidas, transmitidas e distribuídas sem a expressa autorização do respectivo proprietário. O serviço e qualquer software usado em relação ao serviço contêm informações confidenciais protegida pela legislação de propriedade intelectual e outras disposições legais.
                            </p>
                            <p>
                                O conteúdo dos anúncios veiculados no <strong>SEMPRENEGOCIO</strong> ou <strong>SEMPRENEGOCIO</strong> Descontos é de responsabilidade exclusiva do <strong>CLIENTE</strong>.
                            </p>
                            <p>
                                <strong>Garantia Limitada</strong>
                            </p>
                            <p>
                                Tanto o serviço como assinantes, usuários e terceiros poderão estabelecer vínculos a outros sites ou recursos da rede mundial, exonerando-se a <strong>CONTRATADA</strong> pela disponibilização dos sites ou recursos externos ou por conteúdos, publicidade, produtos, serviços ou outro tipo de material contido ou a disposição em tais sites ou recursos.
                            </p>
                            <p>
                                <strong>A CONTRATADA</strong> não garante que o serviço cumprirá com todos os requisitos e/ou necessidades do <strong>CLIENTE</strong>, usuário e ou terceiro, ou que o serviço se prestará de maneira ininterrupta, segura ou isenta de erro.
                            </p>
                            <p>
                                O site <strong>SEMPRENEGOCIO / SEMPRENEGOCIO</strong> Descontos tampouco concede qualquer garantia quanto aos resultados que se pode obter do uso do serviço ou em relação a exatidão ou confiabilidade de qualquer informação obtida através do serviço, nem que os defeitos nos programas sejam corrigidos.
                            </p>
                            <p>
                                Nenhuma assessoria ou informação, seja oral ou por escrito, obtida pelo <strong>CLIENTE</strong>, usuário ou terceiro interessado da <strong>CONTRATADA</strong> através do serviço dará origem a nenhuma garantia que não seja expressamente especificada no presente acordo.
                            </p>
                            <p>
                                <strong>A CONTRATADA</strong> permite que os usuários avaliem e comentem os serviços e produtos dos anunciantes <strong>SEMPRENEGOCIO</strong>, inserindo conteúdo no site. A CONTRATADA não revisa o conteúdo inserido e não se responsabiliza pelo seu teor. No entanto, a <strong>CONTRATADA</strong> reserva-se o direito de retirar do ar e/ou suprimir o conteúdo inserido se não estiver de acordo com os dispostos nos Termos de Uso de Perfil de Usuário <strong>SEMPRENEGOCIO</strong>.
                            </p>
                            <p>
                                <strong>A CONTRATADA</strong> não se responsabiliza por eventuais danos ou prejuízos ocasionados por esses comentários e avaliações ou pela transmissão desse conteúdo através do serviço.
                            </p>
                            <p>
                                <strong>Obrigações do cliente</strong>
                            </p>
                            <p>
                                <strong>O (a) CLIENTE</strong> se compromete a não divulgar e inserir conteúdos impróprios e a não enviar material para produção dos anúncios que: (a) Violem a lei, a moral, os bons costumes, a propriedade intelectual, os direitos à honra, à vida privada, o sigilo das comunicações, à imagem, à intimidade pessoal e familiar; (b) Infrinjam patentes, marcas, segredos comerciais, direitos autorais; (c) Estimulem a prática de condutas ilícitas; (d) Incitem a prática de atos de discriminação, seja em razão de sexo, raça, religião, crenças, idade ou qualquer outra condição; (e) Coloquem à disposição ou possibilitem o acesso a mensagens, produtos ou serviços ilícitos, violentos, pornográficos, degradantes; (f) Induzam ou incitem práticas perigosas, de risco ou nocivas para a saúde e para o equilíbrio psíquico; (g) Sejam falsos, ambíguos, inexatos, exagerados, de forma que possam induzir a erro sobre seu objeto ou sobre as intenções ou propósitos do comunicador; (h) Constituam publicidade ilícita, enganosa ou desleal, e que configurem concorrência desleal; (i) Veiculem, incitem ou estimulem a pedofilia; (j) Incorporem vírus ou outros elementos físicos ou eletrônicos que possam danificar ou impedir o normal funcionamento da rede, do sistema ou dos equipamentos informáticos (hardware e software) de terceiros ou que possam danificar os documentos eletrônicos e arquivos armazenados nestes equipamentos informáticos; (k) Hostilizem terceiros; (l) Transmitam conteúdos ilegais, daninhos, incômodos, ameaçadores, abusivos, tortuosos, difamatórios, vulgares, obscenos, invasores da intimidade de terceiros, odiosos, xenófobos, ou, de algum modo, inaceitáveis. (m) Utilizem de falsificação de rubricas ou, de outro modo de manipular identificadores com o fim de disfarçar a natureza do conteúdo transmitido. Responsabiliza-se por toda e qualquer divulgação e promoção de produtos e/ou serviços, sendo ele o único responsável pela publicação na página <strong>SEMPRENEGOCIO</strong> Descontos de seu anúncio e para seu cupom. O CLIENTE se compromete a enviar e manter conteúdos dos anúncios de acordo com as especificações desse Termo de Uso.
                            </p>
                            <p>
                                <strong>A CONTRATADA</strong> reserva-se o direito de recusar o conteúdo do material enviado pelo <strong>CLIENTE</strong> e o direito de suprimir e retirar do ar conteúdos impróprios ou de algum modo inaceitáveis e que não estejam de acordo com esses Termos de Uso.
                            </p>
                            <p>
                                <strong>A CONTRATADA</strong> não assumirá responsabilidade alguma, por nenhuma circunstância, pelo conteúdo, incluindo, sem limitação, erros ou omissões, danos ou prejuízos derivados do uso do conteúdo exibido, enviado por e-mail ou, de qualquer modo, transmitido através do serviço.
                            </p>
                            <p>
                                <strong>O CLIENTE</strong> reconhece que a <strong>CONTRATADA</strong> pode manter ou revelar o conteúdo se for requerido para ele em virtude das disposições legais aplicáveis ou, de boa fé, e o considera necessário para: (a) Dar cumprimento a lei e a procedimentos legais, tais como ordens judiciais ou de órgãos administrativos competentes; (b) Fazer cumprir as presentes Condições; (c) Contestar reclamações relativas a violações de direitos de terceiros; ou (d) Proteger os legítimos interesses de SEMPRENEGOCIO seus usuários e o público.
                            </p>
                            <p>
                                <strong>O CLIENTE</strong> entende e aceita que o processo técnico e a transmissão do serviço, incluindo seu conteúdo, podem implicar em: (a) Transmissões através de diversas redes; e (b) Modificações ou mudanças realizadas no objeto para tornar compatível o conteúdo com as necessidades técnicas de conexão de redes ou dispositivos.
                            </p>
                            <p>
                                <strong>Definições de Internet</strong>
                            </p>
                            <p>
                                Para efeito das presentes condições do Termo de Uso, todas as palavras ou expressões constantes da lista abaixo deverão ser entendidas conforme o respectivo significado:
                            </p>
                            <p>
                                <strong>SEMPRENEGOCIO:</strong> site de propriedade da Impulsionar Marketing Ltda. acessível através da URL www.semprenegocio.com.br O Portal semprenegocio foi concebido com a finalidade de ser um buscador hiperlocal de serviços.
                            </p>
                            <p>
                                SEMPRENEGOCIO Descontos: página destinada ao cliente SEMPRENEGOCIO para criação e divulgação de cupons de descontos de produtos e/ou serviços, no mesmo endereço www.semprenegocio.com.br ou diretamente pela URL http:semprenegocio.com.br
                            </p>
                            <p>
                                Conteúdo: toda e qualquer modalidade de dados ou informações textuais, visuais e audiovisuais inseridas e veiculadas no <strong>SEMPRENEGOCIO</strong>.
                            </p>
                            <p>
                                Contrato: significa todas as cláusulas e disposições previstas neste Termo de Uso e Adesão, que dão suporte à relação jurídica entre a <strong>CONTRATADA</strong> e o <strong>CLIENTE</strong>.
                            </p>
                            <p>
                                Internet: significa a rede mundial de computadores interligados pelo protocolo <strong>TCP/IP</strong> (Transmission Control Protocol/Internet Protocol).
                            </p>
                            <p>
                                Link: menção em um documento que faz referência a outro documento. "Link" é, portanto, uma ligação e/ou atalho de um documento a outras partes de si mesmo ou a outro documento. O "Link" é um elemento clicável em forma de imagem ou texto que direciona uma página à outra.
                            </p>
                            <p>
                                Servidor: mecanismo responsável pelo armazenamento de páginas e conteúdos de sites.
                            </p>
                            <p>
                                Briefing: é o conjunto de informações prestadas pelo <strong>CLIENTE</strong>, contendo, no mínimo, informações institucionais, dos produtos e serviços a serem ofertados, a respectiva marca e o público alvo ao qual se destina a prestação de serviços.
                            </p>
                            <p>
                                Template: são desenhos pré-definidos de site que servem como modelo para adaptação de novos sites, ou seja, é um layout pronto para que somente sejam inseridas a comunicação visual (logotipo, imagens, fotografias etc.) e o texto enviado pelo Cliente. Os templates são de propriedade exclusiva da <strong>CONTRATADA</strong> e permanecem à disposição dos <strong>CLIENTES</strong> durante a vigência do contrato, sendo expressamente vedada sua utilização após o encerramento deste.
                            </p>
                            <p>
                                <strong>Clique:</strong> é quando um usuário aciona um link ou seleciona um endereço no mecanismo de busca para um site determinado, o servidor registrará o clique para esse evento, para efeito de contabilidade dos acessos ao site efetivamente gerados pelo link.
                            </p>
                            <p>
                                Domínio: é o conjunto de endereços na Internet organizado de forma hierárquica. O domínio superior identifica a área geográfica ou propósito (por exemplo, ".br" ou ".edu"). O segundo nível identifica uma organização, empresa ou outro local único da Internet. Um nome de domínio consiste em uma sequência de nomes separados por ponto, por exemplo, www.semprenegocio, podendo se estendida como a versão legível do endereço IP, ou seja, é o nome e o endereço de um site na Internet. A empresa contratada é responsável pelo pagamento do domínio e este seguirá a mesma vigência do Site.
                            </p>
                            <p>
                                Hospedagem: é o espaço reservado em um servidor. É utilizado para armazenar arquivos (textos, imagens, áudio, vídeo, etc.) de forma que fiquem disponíveis para serem acessados pela internet.
                            </p>
                            <p>
                                Indexação: é a inclusão e ordenação de informações em um índice. No caso da Internet, usa-se muito a expressão "indexar no mecanismo de busca" que corresponde à entrada de um documento (página ou todo o site) no banco de dados de um mecanismo de busca.
                            </p>
                            <p>
                                Mecanismo de Busca: programa que realiza pesquisas na internet ou em um banco de dados através de palavras-chave.
                            </p>
                            <p>
                                Otimização (de site): consiste no emprego de técnicas utilizadas com o intuito de tornar um site mais racional e que seja legível para as ferramentas de busca.
                            </p>
                            <p>
                                Pixel: (aglutinação de Picture e Element, ou seja, elemento da imagem, sendo Pix a abreviatura em inglês para Picture). Um pixel é o menor ponto que forma uma imagem digital, sendo que o conjunto de milhares de pixels forma a imagem inteira.
                            </p>
                            <p>
                                Atributos diferenciais: são diferenciais competitivos da empresa a serem selecionados em formulário próprio que, rubricado pelo cliente, integra o contrato de publicidade.
                            </p>
                            <p>
                                Para um domínio estar disponível na internet é preciso o prévio "Registro de Domínio" junto à FAPESP e o pagamento de boleto bancário enviado pelo órgão responsável, o Registro.br. O pedido de registro do domínio e pagamento do boleto bancário são serviços oferecidos pela CONTRATADA na contratação de um site.
                            </p>
                            <p>
                                Site: é o conjunto de páginas interligadas sobre determinado assunto, cujo início é chamado 'home page' e estão localizados sob um mesmo domínio.
                            </p>
                            <p>
                                Transferência de Hosting: é a transferência dos arquivos armazenados (texto, imagens, áudio, vídeo etc.) que compõem um domínio ou um site do espaço alocado em um servidor para outro servidor, sendo um serviço oferecido pela <strong>CONTRATADA ao CLIENTE</strong>.
                            </p>
                            <p>
                                <strong>WAP:</strong> é a sigla para Wireless Application Protocol, em português Protocolo para Aplicações sem Fio, é o padrão internacional para aplicações que utilizam comunicações sem fio (Internet móvel), como por exemplo, acesso à Internet a partir de um telefone móvel.
                            </p>
                            <p>
                                Descrição dos Serviços:
                            </p>
                            <p>
                                Pontuação: Escala de posicionamento na página do listing.
                            </p>
                            <p>
                                Nome fantasia: É a designação popular de Título de Estabelecimento (nome comercial, nome de fachada).
                            </p>
                            <p>
                                Logradouro: (rua, avenida, alameda, etc.),Nome do logradouro, Número, Complemento (apto., andar, sala, etc.),bairro, cidade, estado.
                            </p>
                            <p>
                                Telefone: possui encurtador para que tenhamos como extrair relatórios aos nossos cliente. Anunciante conta com o link "Mais Telefones". Os Telefones Adicionais aparecerão somente como figuração e não serão buscáveis.
                            </p>
                            <p>
                                Categoria: Titulo comercializado para busca do cliente dentro do Portal SEMPRENEGOCIO.
                            </p>
                            <p>
                                Horário de Funcionamento: Horário que o estabelecimento estará disponível para receber o cliente ou prestar serviço.
                            </p>
                            <p>
                                Formas de pagamento: Informa como poderá ser o pagamento naqueles estabelecimentos: á vista, no cartão, em cheque, apenas dinheiro... Entre outros.
                            </p>
                            <p>
                                Linha de informação: Consiste em informações reduzidas (Produto, serviço, Slogan...) com no máximo 180 caracteres e possui indexação nos Buscadores, apenas no plano Bronze ele não aparecerá na página de resultado, apenas na do anúncio.
                            </p>
                            <p>
                                Saiba Mais = texto na segunda página: Conteúdo direcionado ao negocio do cliente, contendo maiores informações para o usuário, estreitando a relação e aumentando a chance de ser contatado, necessário texto bem elaborado com conteúdo relevante do segmento.
                            </p>
                            <p>
                                Logo da empresa: Identidade visual da marca, podendo ser desenvolvida pelo <strong>SEMPRENEGOCIO</strong> ou ser enviada pelo cliente.
                            </p>
                            <p>
                                Link Site: Ponto de contato que ao clicar redireciona para o Site do cliente.
                            </p>
                            <p>
                                Link e-mail: Ponto de contato que ao clicar informa o e-mail do cliente abrindo o out-look.
                            </p>
                            <p>
                                Link Compartilhe: apresenta o código HTML já pronto para que o cliente copie e cole em seu site para que tenha o mapa do seu estabelecimento através do <strong>SempreNEgocio</strong>.
                            </p>
                            <p>
                                Link de Como Chegar: Apresenta o mapa, conforme endereço apresentado no anuncio e permite traçar rota.
                            </p>
                            <p>
                                Mapa de localização: Mapa apresentando conforme endereço do anunciante, extraído a geolocalização do Google Maps.
                            </p>
                            <p>
                                Fotos: Apresentada uma quantidade na primeira página de resultado (listing), outra visualização no anuncio e uma página exclusiva só de fotos, quantidade condicionada ao plano contratado.
                            </p>
                            <p>
                                Faixa de preço: Permite demostrar quanto se gasta para usufruir do estabelecimento e seus serviços.
                            </p>
                            <p>
                                Redes Sociais: Permite que do próprio anúncio, seja possível compartilhar as redes sociais a informação.
                            </p>
                            <p>
                                Facilidades: Acesso a deficientes, ar condicionado, espaço para crianças, estacionamento, fraldário, segurança, valett entre outras facilidades disponíveis no estabelecimento do anunciante.
                            </p>
                            <p>
                                Vídeos: Permite a apresentação de vídeos, desde que o cliente informe a URL. Compartilhamento por SMS: Envio de informações básicas de uma empresa para um celular de um amigo sem custo, apenas clicando e enviado através do site <strong>SEMPRENEGOCIO</strong>.
                            </p>
                            <p>
                                Cotação: Permite que em uma mesma página de busca o usuário faça uma cotação de todosos anunciantes Ouro e Diamante, sem ter que ficar direcionando e-mail individualmente, basta acionar o flag do cliente que queira solicitar.
                            </p>
                            <p>
                                Adicionar: Localizado na 2º página do anúncio, permite que ao acionar o Código de HTML para que o cliente inclua em seu site ou blog.
                            </p>
                            <p>
                                Avaliação: Permite que o usuário Logado faça um comentário sobre a empresa e/ou produto e/ou serviço do anunciante, este comentário ficará durante o dia da publicação por um período na Home.
                            </p>
                            <p>
                                Eventos: Permite que o cliente publique seus eventos na segunda página do anúncio gerando maior atratividade junto ao usuário de seus eventos.
                            </p>
                            <p>
                                Cupom de desconto: Espaço publicitário destinado à veiculação de cupons de desconto de produtos e/ou serviços.
                            </p>
                            <p>
                                <strong>A) A SempreNegócio </strong>. prestará ao <strong>CLIENTE</strong>,  serviços de anúncio de internet, com as seguintes características:
                            </p>
                            <p>
                                <strong>PLANO Grátis:</strong>
                            </p>
                            <p>
                                Dados Básicos (Listing)
                            </p>
                            <p>
                                -Razão social ou nome fantasia
                                -Endereço Completo
                                -Telefone - mínimo 01 e máximo 05
                                -Categoria (título)
                                -Atributos da Página do Anúncio (SaibaMais):
                            </p>
                            <p>
                                -1 página de conteúdo da empresa
                                -1 página de fotos (álbum de fotos) de produtos/serviços da empresa
                                -Linha de informação Saiba Mais com até 180 caracteres
                                - Descontos : divulgação de até 2 cupons
                                - 3 fotos pequenas
                            </p>
                            <p>
                                <strong>Pontos de Contrato</strong>
                            </p>
                            <p>
                                -Link para site da empresa
                                -Link e-mail da empresa
                                -Link compartilhe (redes sociais da empresa)
                                -Facebook
                                -Twitter
                                -Skype
                                -YouTube
                                -Google+
                                -Pinterest
                                -Instagram
                                -Link como chegar à empresa - Mapa Google
                                -Avaliações de usuários
                                -Informações Adicionais:
                            </p>
                            <p>
                                Horário de Funcionamento
                                Formas de Pagamento
                                Facilidades oferecidas pela empresa
                                Álbum de Fotos
                            </p>
                            <p>
                                06 fotos grandes na página de fotos (álbum de fotos).
                                Opcional (Contratação avulsa)
                            </p>
                            <p>
                                Pacote de Pontos (Estrelas): soma-se 10 pontos a pontuação do anúncio contratado
                            </p>
                            <p>
                                <strong>PLANO Premium</strong>
                            </p>
                            <p>
                                Dados Básicos (Listing)
                            </p>
                            <p>
                                Razão social ou nome fantasia
                                Endereço Completo
                                Telefone - mínimo 01 e máximo 05
                                Categoria (título)
                                Logo (100x80px | Formato JPG ou GIF | Peso 6Kb)
                                Linha de informação com até 180 caracteres na página da empresa
                                Descontos: divulgação de até 2 cupons de descontos
                                Atributos da Página do Anúncio (SaibaMais):
                            </p>
                            <p>
                                -1 página de conteúdo da empresa
                                -1 página de fotos (álbum de fotos) de produtos/serviços da empresa
                                -Texto Saiba Mais de até 500 caracteres (mínimo de 200 caracteres e máximo de -500 caracteres)
                                -7 fotos pequenas
                                -Pontos de Contato

                                -Link para site da empresa
                                -Link e-mail da empresa
                                -Link compartilhe (redes sociais da empresa)
                                -Facebook
                                -Twitter
                                -Skype
                                -YouTube
                                -Google+
                                -Pinterest
                                -Instagram
                                -Link como chegar à empresa - Mapa Google
                                -Avaliações de usuários
                                -Informações Adicionais:
                            </p>
                            <p>
                                Horário de Funcionamento
                                Formas de Pagamento
                                Facilidades oferecidas pela empresa (ex. ar-condicionado, estacionamento etc.)
                                Álbum de Fotos:
                            </p>
                            <p>
                                09 grandes na página de fotos (álbum de fotos)
                                Opcional (Contratação avulsa)
                            </p>
                            <p>
                                <strong>SUPER BANNER (NACIONAL E ESTADUAL):</strong>
                            </p>
                            <p>
                                <strong>C)</strong> Objetos Especiais -<strong> A Impulsionar Marketing LTDA</strong>. prestará ao <strong>CLIENTE</strong> objetos complementares aos anúncios adquiridos.
                            </p>
                        </div>
                    </article>
                    <article>
                        <h3 class="sumir">Cupons de Desconto</h3>
                        <div id="cupon">
                            <p>
                                <strong>1.</strong> Estas condições têm por objeto regular o serviço "SempreNegócio", prestado pela <strong>CONTRATADA</strong>.
                            </p>
                            <p><strong>2. DEFINIÇÕES</strong></p>
                            <p>
                                <strong>2.1</strong> Usuário: terceiro que acessará o site www.semprenegocio.com.br e poderá consultar e apresentar cupons de desconto no estabelecimento do CLIENTE para obter benefícios relacionados à compra de produtos ou serviços;
                            </p>
                            <p>
                                <strong>2.2</strong> Cupom: é um código que gera gratuidade ou vantagem econômica (desconto em compras, parcelamento, etc.), sem que ocorra qualquer pagamento antecipado pelo usuário;
                            </p>
                            <p>
                                <strong>2.3</strong> Login: endereço do e-mail do  <strong>CLIENTE</strong> que permite sua identificação no uso dos serviços oferecidos;
                            </p>
                            <p>
                                <strong>2.4</strong> E-mail: endereço eletrônico ligado a uma caixa postal virtual pela qual o usuário pode enviar e receber mensagens através da Internet;
                            </p>
                            <p>
                                <strong>2.5</strong> Senha: conjunto de dígitos alfanuméricos sigilosos, de conhecimento exclusivo do usuário, que completa o processo de identificação no uso dos serviços prestado;.
                            </p>
                            <p>
                                <strong>2.6 Setup:</strong> conjunto de providências e tarefas necessárias, além de suporte de equipe técnica especializada para a criação do cupom de descontos e veiculação no site.
                            </p>
                            <p>
                                <strong>3. OBJETO</strong>
                            </p>
                            <p>
                                Concessão de espaço publicitário, não exclusivo, para divulgação de cupons de desconto no site www.semprenegocio.com.br e sites parceiros.
                            </p>
                            <p>
                                <strong>3.1</strong> Os cupons de desconto poderão ser gerados pelo  <strong>CLIENTE</strong> através de interface on-line disponibilizada pela  <strong>CONTRATADA</strong>, devendo definir validade, descrição, regras específicas e demais critérios para utilização do cupom pelo usuário;
                            </p>
                            <p>
                                <strong>3.2</strong> Os cupons de desconto poderão ainda ser gerados pela CONTRATADA (serviços de setup) através de solicitação do  <strong>CLIENTE</strong> ou a partir de contato telefônico efetuado pela equipe de Pós Vendas da  <strong>CONTRATADA</strong>;
                            </p>
                            <p>
                                <strong>3.2.1O CLIENTE</strong> arcará com os custos para os serviços de "setup", conforme constante no formulário que acompanha este contrato;
                            </p>
                            <p>
                                <strong>3.2.2</strong> Na hipótese de solicitação de cancelamento dos serviços de "setup" do cupom de desconto, pelo  <strong>CLIENTE</strong>, a CONTRATADA não se obrigará à devolução dos valores pagos;
                            </p>
                            <p>
                                <strong>3.2.3</strong> Nos casos de contratação de serviços de "setup", o CLIENTE permanecerá como único responsável pela definição dos descontos e regras para os usuários a serem aplicadas ao cupom de desconto e também por sua publicação, uma vez que a  <strong>CONTRATADA</strong>, ainda que ofereça suporte para a criação do cupom, não efetuará a publicação do mesmo sem a expressa anuência do cliente através da ferramenta on-line;
                            </p>
                            <p>
                                <strong>3.3</strong> A não utilização do espaço publicitário contratado não implica em descumprimento contratual, tendo em vista que é de exclusividade do  <strong>CLIENTE</strong> a criação de cupons de desconto ou a solicitação de criação de cupons para a  <strong>CONTRATADA</strong>;
                            </p>
                            <p>
                                <strong>3.3.1</strong> A não localização do  <strong>CLIENTE</strong> pela  <strong>CONTRATADA</strong>, após várias tentativas de contato, não implicará em infração contratual, cabendo, em regra, sempre ao  <strong>CLIENTE</strong> buscar a comunicação com a  <strong>CONTRATADA</strong>.
                            </p>
                            <p>
                                <strong>4. VIGÊNCIA</strong>
                            </p>
                            <p>
                                <strong>4.1 </strong> A vigência contratada será a expressamente constante no formulário de contratação;
                            </p>
                            <p>
                                <strong>4.2</strong> O contrato sempre terá vigência com renovação automática.
                            </p>
                            <p>
                                <strong>5. OBRIGAÇÕES DA CONTRATADA</strong>
                            </p>
                            <p>
                                <strong>5.1</strong> Manter disponível o espaço publicitário para publicação de cupons pelo  <strong>CLIENTE</strong>, conforme contratado, nos limites previstos no plano escolhido e com as ressalvas expressas no item 11 do presente contrato;
                            </p>
                            <p>
                                <strong>5.2</strong> Fornecer acesso à ferramenta de criação e publicação de cupons de desconto;
                            </p>
                            <p>
                                <strong>5.3</strong> Permitir o acesso, através de painel disponível em interface com acesso restrito por login e senha, a estatísticas de acesso dos cupons publicados;
                            </p>
                            <p>
                                <strong>5.4 A CONTRATADA</strong> não garante qualquer ordem de posicionamento de exibição das ofertas de cupom de desconto.
                            </p>
                            <p>
                                <strong>6. OBRIGAÇÕES DO CLIENTE</strong>
                            </p>
                            <p>
                                <strong>6.1</strong> Criar e publicar cupons de descontos para divulgação no site www.semprenegocio.com.br;
                            </p>
                            <p>
                                <strong>6.2</strong> Manter seu login (e-mail e senha) em sigilo, podendo, para tal, trocar regularmente de senha, no "Painel de Informação do Parceiro";
                            </p>
                            <p>
                                <strong>6.3</strong> Cumprir, perante os usuários e terceiros, as condições comerciais, técnicas e de qualidade dos produtos ou serviços anunciados;
                            </p>
                            <p>
                                <strong>6.4</strong> Elaborar os termos e condições dos cupons com redação objetiva, clara e de fácil entendimento pelos usuários.
                            </p>
                            <p>
                                <strong>7. DO CANCELAMENTO</strong>
                            </p>
                            <p>
                                <strong>7.1</strong> O cancelamento realizado após 3 (três) meses de vigência do contrato não implica no pagamento de qualquer multa;
                            </p>
                            <p>
                                <strong>7.2</strong> Caso o  <strong>CLIENTE</strong> efetue o cancelamento após o prazo determinado nas Condições Gerais e antes do definido na cláusula 7.1 do presente instrumento, o cancelamento estará condicionado ao pagamento de mensalidades correspondentes ao período de três meses, vez que tal valor corresponde aos ressarcimentos e investimentos para a disponibilização do espaço publicitário ao  <strong>CLIENTE</strong>, nos termos do artigo 473, Código Civil;
                            </p>
                            <p>
                                <strong>7.3</strong> Os valores já pagos pelo  <strong>CLIENTE</strong> não serão devolvidos em hipótese de cancelamento, tendo o  <strong>CLIENTE</strong> direito a usufruir do serviço durante o período correspondente a valores já pagos.
                            </p>
                            <p>
                                <strong>8. DA RENOVAÇÃO DO CONTRATO</strong>
                            </p>
                            <p>
                                <strong>8.1</strong> O presente contrato é celebrado com renovação automática, mantendo o mesmo plano e parcelamento inicialmente contratados, excluindo-se eventuais bonificações, promoções ou descontos concedidos anteriormente.
                            </p>
                            <p>
                                <strong>9. DA SUSPENSÃO DOS SERVIÇOS POR INADIMPLÊNCIA</strong>
                            </p>
                            <p>
                                <strong>9.1 A CONTRATADA</strong> poderá suspender a veiculação dos cupons em caso de inadimplência do  <strong>CLIENTE</strong> superior a três dias;
                            </p>
                            <p>
                                <strong>10. O CLIENTE MANIFESTA CIÊNCIA</strong>
                            </p>
                            <p>
                                <strong>10.1</strong> Da impossibilidade técnica do funcionamento integral e ininterrupto de qualquer sistema de informática. Deste modo, anui que a  <strong>CONTRATADA</strong> não será responsabilizada pelo não funcionamento do site  <strong>Semprenegócio</strong> decorrente de falha ou interrupção de qualquer serviço de telecomunicação, conexão à internet, provedor de acesso à internet ou de qualquer outro provedor de comunicações, caso fortuito, força maior ou de qualquer outra falha ou problema não atribuíveis à  <strong>CONTRATADA</strong>;
                            </p>
                            <p>
                                <strong>10.2</strong> Que para um melhor desempenho do serviço contratado, deve o  <strong>CLIENTE</strong> providenciar a atualização e preenchimento completo sobre o seu estabelecimento, no "Painel de Informação do Parceiro", bem como elaborar e publicar cupons de desconto com condições atraentes a seu público-alvo;
                            </p>
                            <p>
                                <strong>10.3</strong> O acesso ao "Painel de Informação do Parceiro" dar-se-á exclusivamente através de login (composto de e-mail e senha);
                            </p>
                            <p>
                                <strong>10.4</strong> Que receberá no e-mail indicado na contratação, os dados para login, devendo mantê-lo sob sigilo.
                            </p>
                        </div>
                    </article>
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
        </div>
        <!--fim div paiRodape-->
    </main>
</div>
</body>
<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/modernizr.custom.js"></script>
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
