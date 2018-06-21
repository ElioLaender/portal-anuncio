<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Tire suas dúvidas, temos as respostas para suas dúvidas.">
    <meta name="keywords" content="dúvidas frequentes,dúvidas,tirar dúvidas,respostas, Sempre Negócio, semprenegocio.com.br, semprenegocio.com">
    <link rel="icon" href="view/assets/imagens/flor.png">

    <title>Sempre Negócio - Dúvidas frequentes</title>
     <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/duvidas.css" rel="stylesheet">

    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
<div class="tudo">
        <header class="barraM">
            <h1>Dúvidas frequentes</h1>
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
                                    <a href='#'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Home&dirAction=action=duvidasFrequentes'>Sair</a>
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
                                            <a href='/cadastro/'>Cadastre-se !</a>
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
                        <li><a href="?controller=&action=">Home</a></li>
                    </ul>
                </div>
                <!--fim div que da contexto para seu filhos-->
            </div>
        </header>
    <main>
        <div class='primDiv'>
            <figure>
                <img src="view/assets/imagens/logo@1x.png">
            </figure>
            <section>
                <h3>Dúvidas Frequentes</h3>

                <div>
                    <article>
                        <h4>Dúvidas do usuários</h4>
                        <div class="pai">
                            <div>
                                <h5>O que são os cupons de descontos?</h5>
                                <p>
                                    <strong>Cupons de descontos</strong> são ofertas oferecidas por empresas cadastradas na SempreNegócio,
                                    é uma ótima oportunidade para clientes <strong>economizarem dinheiro</strong>  e empresas aumentarem as chances
                                    de conquistar novos clientes.
                                </p>
                            </div>
                            <div>
                                <h5>Como faço para ganhar cupons de descontos?</h5>
                                <p>
                                    Basta ter cadastro na <strong>SempreNegócio</strong>, qualquer pessoa pode se cadastrar no <strong>site gratuitamente</strong>.
                                    Acima da barra de pesquina, temos alguns links de navegação, lá você encontra a palavra <strong>Descontos</strong>,
                                    click neste link e aproveite todas as ofertas oferecidos para você.
                                </p>
                            </div>
                            <div>
                                <h5>Quero comentar sobre uma empresa.</h5>
                                <p>
                                    É bem simples, click no anúncio da empresa que deseja comentar,
                                    você sera redimencionado para a <strong>página da empresa</strong>, nesta página é encontrado uma <strong>área reservada</strong> para avaliações
                                    sobre a empresa.
                                    Basta estar logado para validar sua opnião sobre o estabelecimento.

                                </p>
                            </div>
                        
                            <div>
                                <h5>Quero solicitar orçamento para o anunciante, tem como?</h5>
                                <p>
                                    <strong>Sim</strong>, na página do anunciante temos um campo para de <strong>solicitação de orçamento</strong>, o anunciante terá acesso a sua mensagem, ele pode te responder direto do site para seu e-mail.
                                </p>
                            </div>
                        </div>
                    </article>

                    <article>
                        <h4>Dúvidas do anunciante</h4>
                        <div class="pai">
                            <div>
                                <h5>O botão ligue grátis, depende de velocidade da internet?</h5>
                                <p>
                                   Não. Suas ligações são encaminhadas através de <strong>canais de telefonia</strong> convencional. Devido a isso, a qualidade de voz não depende da sua banda de Internet.
                                   Conquiste mais <strong>satisfação de seus clientes</strong> oferecendo facilidades que seu concorrente não oferece! 

                                </p>
                            </div>
                          
                           
                            <div>
                                <h5>Porque oferecer cupons promocionais?</h5>
                                <p>
                                    Para empresas que pensam em atrair novos clientes, os cupons de descontos, são uma ótima auternativa,
                                    pessoas são atraídas por promoções, descontos e outros meios de <strong>economizarem,</strong> por estes motivos, cupons
                                    de descontos proporciona resultados positivos para sua empresa.
                                </p>
                            </div>

                            <div>
                                <h5>Excluí minha conta. E agora?</h5>
                                <p>
                                    Por segurança, a <strong>SempreNegócio</strong> mantém por 30 dias a possibilidade de reaver sua conta com todos os dados recuperados,
                                    após este período, não será possível recuperar a conta excluída.
                                    Para a recurar a conta dentro dos 30 dias, basta entrar em contado com nosso suporte.
                                </p>
                            </div>

                            <div>
                                <h5>Esqueci minha senha. E agora?</h5>
                                <p>
                                    Muito simples recurar sua senha, em todos os paineis de login, você encontra, <strong>esqueceu sua senha?</strong> Click neste
                                    link, informe seu e-mail, lhe enviaremos uma nova senha. Caso nenhuma das tentativas de recuperar senha tenha sido bem sucedida, entre em contato com
                                    o suporte SempreNegócio.
                                </p>
                            </div>
                            <div>
                                <h5>Como funciona o impulsionar?</h5>
                                <p>
                                    Impulsionar anúncio é para empresas que desejam aparecer no topo das pesquisas,
                                    são apenas <strong>3 anúncios</strong> para cada categoria aparecerem no topo, para estes anúncios impulsionados,
                                    é dado um destaque diferenciando dos demais anúnciantes.
                                </p>
                            </div>
                        </div>
                    </article>
                    <article>
                        <h4>Dúvidas para currículos</h4>
                        <div class="pai">
                            <div>
                                <h5>Como cadastrar meu currículo?</h5>
                                <p>
                                    Vá em <a href="http://curriculo.semprenegocio.com.br/"><strong>curriculo.semprenegócio.com.br</strong></a>, lá você encontra nossos planos para você cadastrar, temos a versão grátis, você pode experimentar o plano mais completo por <strong>10 dias grátis</strong>. São milhares soluções para aumentar sua empregabilidade, fique mais perto de quem contrata!
                                </p>
                            </div>

                            <div>
                                <h5>Quais vantagens de cadastrar meu currículo?</h5>
                                <p>
                                    A <strong>SempreNegócio</strong> esta em constante crescimento, fechando negócios com inúmeras empresas, oferecemos gratuitamente a chance de você ser encontrado por nossos parceiros.
                                    Mantenha seu currículo atualizado, tenha seu próprio site, download de seu currículo, receba <strong>notificações de vagas</strong> e muito mais.
                                </p>
                            </div>
                            <div>
                                <h5>Quero fazer parte da SempreNegócio!</h5>
                                <p>
                                    A <strong>SempreNegócio</strong> trabalho com gestão horizontal, sem burocracia departamental, valorizamos nosso profissionais,
                                    entendemos que a empresa é constituída por pessoas, se você se identifica com nossos valores, ao <strong>cadastrar seu currículo</strong>, o caditado tem a opção de enviar para nosso banco de canditatos.
                                </p>
                            </div>
                            <div>
                                <h5>Esqueci minha senha. E agora?</h5>
                                <p> Muito simples recuperar sua senha, em todos os paineis de login, você encontra, <strong>esqueceu sua senha?</strong> Click neste
                                    link, informe seu e-mail, lhe enviaremos uma nova senha. Caso nenhuma das tentativas de recuperar senha tenha sido bem sucedida, entre em contato com
                                    o suporte SempreNegócio.</p>
                            </div>
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
                                <input type="email" id="prom" name="prom" class='required' placeholder="Insira seu E-mail" maxlength="25" title="Insira seu e-mail">
				<span></span>
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
<script src="view/assets/js/duvidas.min.js"></script>
<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
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
