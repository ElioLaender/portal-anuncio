<!DOCTYPE html>

<?php
//SOLUÇÃO PARA TIRAR ESSE CÓDIGO DO PHP É FAZER ELE NO METODO QUE GERA A /view DESSA PÁGINA
#esta gambiarra é provisória, tentar receber os dados de get e post diretamente via javascrit, é possível?
$stringBusca = "";
if(isset($_POST['busc']) && !empty($_POST['busc'])){
    $stringBusca = $_POST['busc'];
} elseif(isset($_GET['busc']) && !empty($_GET['busc'])){
    $stringBusca = $_GET['busc'];
}



#recebe o valor referente ao bairro, podendo este ser passado via $_POST ou $_GET
$stringBairro = "";
if(isset($_POST['bairro']) && !empty($_POST['bairro'])){
    $stringBairro = $_POST['bairro'];
} elseif(isset($_GET['bairro']) && !empty($_GET['bairro'])){
    $stringBairro = $_GET['bairro'];
} else{
    $stringBairro = "todos";
}

if (isset($_GET['fpg']) && !empty($_GET['fpg'])){
    $arrayFpg = $_GET['fpg'];
} else {

    $_GET['fpg'] = "";
}

$newSearch = "";
#verifica se a pesquisa se refere a uma nova busca na mesma página
if(isset($_POST['newSearch']) && !empty($_POST['newSearch'])) {

    #lógica onde uma variável recebera o valor de new search e caso esta variável estiver setada, será zerado os valores dos vetores que
    #armazenam a busca. Após esse processo, zerar a variável que recebe o aval de newSearch para que não fique sendo deletado toda hora.
    $newSearch = $_POST['newSearch'];

    $_POST['newSearch'] = "";

}
?>

<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio">
    <meta name="description" content="Encontre o que precisa aqui na Sempre Negócio">
    <meta name="keywords" content="Guia Eletrônico, Sempre Negócio, semprenegocio.com.br, semprenegocio.com">
    <link rel="icon" href="imagens/flor.png">

    <title>Sempre Negócio - Anúncios</title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/todosAnun.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackTodosAnun.css" rel="stylesheet">
    <!-- endbuild -->

    <style>

        .well{
            display: none !important;
        }

    </style>
</head>
<body>
<div class="tudo">
    <header class="barraM">
        <h1 class="sumir">Anúncios da SempreNegócio</h1>
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
                            <input type="search" id="busc" name="busc" class="completar" placeholder="Bares, lojas, beleza..." maxlength="25" required title="Digite aqui para que a pesquisa seja efetuada." >
                        </label>

                        <label for='pesBair'>
                            <input type="search" id="pesBair" name="bairro" class="compleBairro" placeholder="Busca por bairros">
                        </label>

                        <input type="hidden" name="newSearch" value="newSearch" />

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
                                    <a href='?controller=Dashboard&action=ViewDashboard&option=alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Anuncio&dirAction=action=viewAnuncioPesquisa'>Sair</a>
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

                                    <input type='hidden' id='dirLogin' value='?controller=Anuncio&action=viewAnuncioPesquisa&busc=".$stringBusca."'>

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
        <div class='fun'></div>
        <div class="paiSe">
            <figure>
                <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio">
            </figure>
            <!-- div para controlar o banner e o conteudo do anuncio -->
            <section>
                <h2>Veja todos os anúncios</h2>
                <!-- filtro de busca -->
                <button id="ab" type='button'>Filtrar Anúncios</button>
                <!-- formulário de filtro de busca -->
                <button type="button" class="Abaner">abrir</button>
                <div class='paiBan'>
                    <button type="button">Fechar Blocos</button>
                    <aside>
                        <h3 class='sumir'>Para sua empresa</h3>

                        <div>
                            <a href="?controller=Home&action=viewInvistaNegocio">
                            </a>
                        </div>

                        <div>
                            <a href="?controller=Home&action=viewInvistaNegocio">
                            </a>
                        </div>

                        <div>
                            <a href="?controller=Home&action=viewInvistaNegocio">
                            </a>
                        </div>

                    </aside>
                </div>
                <form class="boxscroll2 for">
                    <fieldset class='priField'>
                        <legend class='ref'>Refine sua busca</legend>
                        <button type="button" class='fec'>Fechar filtro</button>

                        <!-- radio de categorias dinâmicas -->
                        <div class="radioCate boxscroll2"></div>
                        <!-- gera input check dos bairros dinamicamente -->
                        <div class="checkBairros boxscroll2"></div>

                        <fieldset>
                            <legend>Formas de pagamento:</legend>

                            <?php

                            $arrayPag = array('boleto'=>'','credito'=>'','debito'=>'','valeAli'=>'','cheque'=>'','dinheiro'=>'','outrosFormPag'=>'');

                            if(isset($_GET['fpg']) && !empty($_GET['fpg'])){

                                for($if = 0; $if < count($_GET['fpg']); $if++){

                                    switch($_GET['fpg'][$if]){
                                        case "boleto": $arrayPag['boleto'] = "checked" ;break;
                                        case "credito": $arrayPag['credito'] = "checked" ;break;
                                        case "debito": $arrayPag['debito'] = "checked";break;
                                        case "vale alimentação": $arrayPag['valeAli'] = "checked";break;
                                        case "cheque": $arrayPag['cheque'] = "checked";break;
                                        case "dinheiro": $arrayPag['dinheiro'] = "checked";break;
                                        case "outrosFormPag": $arrayPag['fpg'] = "checked";break;
                                        default: ;break;
                                    }

                                }

                            }



                            ?>

                            <label for="bol">Boleto Bancário
                                <input type="checkbox" id="bol" class="formPag filter" name="forma-pag[]" value="boleto" <?php echo $arrayPag['boleto']; ?> >
                                <p class="bole"></p>
                            </label>

                            <label for="cr">Crédito
                                <input type="checkbox" id="cr" class="formPag filter" name="forma-pag[]" value="credito" <?php echo $arrayPag['credito']; ?>>
                                <p class="cre"></p>
                            </label>

                            <label for="de">Débito
                                <input type="checkbox" id="de" class="formPag filter" name="forma-pag[]" value="debito" <?php echo $arrayPag['debito']; ?>>
                                <p class="deb"></p>
                            </label>

                            <label for="val">Vale Alimentação
                                <input type="checkbox" id="val" class="formPag filter" name="forma-pag[]" value="vale alimentação" <?php echo $arrayPag['valeAli']; ?>>
                                <p class="ali"></p>
                            </label>

                            <label for="ch">Cheque
                                <input type="checkbox" id="ch" class="formPag filter" name="forma-pag[]" value="cheque" <?php echo $arrayPag['cheque']; ?>>
                                <p class="che"></p>
                            </label>

                            <label for="di">Dinheiro
                                <input type="checkbox" id="di" class="formPag filter" name="forma-pag[]" value="dinheiro" <?php echo $arrayPag['dinheiro']; ?>>
                                <p class="din"></p>
                            </label>

                            <label for="ou">Outros
                                <input type="checkbox" id="ou" class="formPag filter" name="forma-pag[]" value="outrosFormPag" <?php echo $arrayPag['outrosFormPag']; ?>>
                                <p class="out"></p>
                            </label>


                        </fieldset>

                        <fieldset>
                            <legend>Facilidades</legend>

                            <?php

                            $arrayFpag = array('wifi'=>'','reserva'=>'','animais'=>'','cupons'=>'','estacio'=>'','seguranca'=>'','acessibilidades'=>'','arCondicionado'=>'','criancas'=>'','delivery'=>'');

                            if(isset($_GET['fac']) && !empty($_GET['fac'])){

                                for($fac = 0; $fac < count($_GET['fac']); $fac++){

                                    switch($_GET['fac'][$fac]){
                                        case "wifi": $arrayFpag['wifi'] = "checked" ;break;
                                        case "reserva": $arrayFpag['reserva'] = "checked" ;break;
                                        case "animais": $arrayFpag['animais'] = "checked";break;
                                        case "cupons": $arrayFpag['cupons'] = "checked";break;
                                        case "estacionamento": $arrayFpag['estacio'] = "checked";break;
                                        case "seguranca": $arrayFpag['seguranca'] = "checked";break;
                                        case "acessibilidades": $arrayFpag['acessibilidades'] = "checked";break;
                                        case "arCondicionado": $arrayFpag['arCondicionado'] = "checked";break;
                                        case "criancas": $arrayFpag['criancas'] = "checked";break;
                                        case "delivery": $arrayFpag['delivery'] = "checked";break;
                                        default: ;break;
                                    }

                                }

                            }



                            ?>

                            <label for="cWifi">Wi-fi
                                <input type="checkbox" id="cWifi" class="faci filter" name="facilidades[]" value="wifi" <?php echo $arrayFpag['wifi']; ?>>
                                <p class="wifii"></p>
                            </label>
                            <label for="cReserv">Necessita de reservas
                                <input type="checkbox" id="cReserv" class="faci filter" name="facilidades[]" value="reserva" <?php echo $arrayFpag['reserva']; ?>>
                                <p class="reser"></p>
                            </label>

                            <label for="cAnim">Permite animais
                                <input type="checkbox" id="cAnim" class="faci filter" name="facilidades[]" value="animais" <?php echo $arrayFpag['animais']; ?>>
                                <p class="ani"></p>
                            </label>

                            <label for="cCupon">Cupons de desconto
                                <input type="checkbox" id="cCupon" class="faci filter" name="facilidades[]" value="cupons" <?php echo $arrayFpag['cupons']; ?>>
                                <p class="desc"></p>
                            </label>

                            <label for="cEstac" >Estacionamento
                                <input type="checkbox" id="cEstac" class="faci filter" name="facilidades[]" value="estacionamento" <?php echo $arrayFpag['estacio']; ?>>
                                <p class="estaci"></p>
                            </label>

                            <label for="cSegur">Segurança
                                <input type="checkbox" id="cSegur" class="faci filter" name="facilidades[]" value="seguranca" <?php echo $arrayFpag['seguranca']; ?>>
                                <p class="seg"></p>
                            </label>

                            <label for="cCader">Acesso para caderantes
                                <input type="checkbox" id="cCader" class="faci filter" name="facilidades[]" value="acessibilidades" <?php echo $arrayFpag['acessibilidades']; ?>>
                                <p class="acess"></p>
                            </label>

                            <label for="cAr">Ar condicionado
                                <input type="checkbox" id="cAr" class="faci filter" name="facilidades[]" value="arCondicionado" <?php echo $arrayFpag['arCondicionado']; ?>>
                                <p class="ar"></p>
                            </label>
                            <label for="cri">Espaço para crianças
                                <input type="checkbox" id="cri" class="faci filter" name="facilidades[]" value="criancas" <?php echo $arrayFpag['criancas']; ?>>
                                <p class="cri"></p>
                            </label>

                            <label for="deli">Delivery (entrega)
                                <input type="checkbox" id="deli" class="faci filter" name="facilidades[]" value="delivery" <?php echo $arrayFpag['delivery']; ?>>
                                <p class="deli"></p>
                            </label>
                        </fieldset>

                        <fieldset>
                            <legend>Planos de saúde aceitos</legend>

                            <?php

                            $arrayFac = array('unimed'=>'','saudeVida'=>'','prontomed'=>'','promed'=>'','outros'=>'');

                            if(isset($_GET['pla']) && !empty($_GET['pla'])){

                                for($fac = 0; $fac < count($_GET['pla']); $fac++){

                                    switch($_GET['pla'][$fac]){
                                        case "unimed": $arrayFac['unimed'] = "checked" ;break;
                                        case "saudeVida": $arrayFac['saudeVida'] = "checked" ;break;
                                        case "prontomed": $arrayFac['prontomed'] = "checked";break;
                                        case "promed": $arrayFac['promed'] = "checked";break;
                                        case "outros": $arrayFac['outros'] = "checked";break;
                                        default: ;break;
                                    }

                                }

                            }



                            ?>

                            <label for="cUni">Unimed
                                <input type="checkbox" id="cUni" class="pSaude filter" name="planos[]" value="unimed" <?php echo $arrayFac['unimed']; ?>>
                                <p class="uni"></p>
                            </label>

                            <label for="cSaudVid">Saúde Vida
                                <input type="checkbox" id="cSaudVid" class="pSaude filter" name="planos[]" value="saudeVida" <?php echo $arrayFac['saudeVida']; ?>>
                                <p class="sauVi"></p>
                            </label>

                            <label for="cPronto">Prontomed
                                <input type="checkbox" id="cPronto" class="pSaude filter" name="planos[]" value="prontomed" <?php echo $arrayFac['prontomed']; ?>>
                                <p class="pront"></p>
                            </label>

                            <label for="cPromed">Promed
                                <input type="checkbox" id="cPromed" class="pSaude filter" name="planos[]" value="promed" <?php echo $arrayFac['promed']; ?>>
                                <p class="prom"> </p>
                            </label>

                            <label for="cOutrosPla">Outros
                                <input type="checkbox" id="cOutrosPla" class="pSaude filter" name="planos[]" value="outros" <?php echo $arrayFac['outros']; ?>>
                                <p class="outr"></p>
                            </label>
                        </fieldset>

                        <!-- input type="button" id="filter" value="filtrar" -->
                    </fieldset>
                </form><!-- encerra formulário de filtro -->

                <!-- Encerra filtro de busca -->
                <!--Retorna o anuncio, este eh o pai-->
                <div id="teste" class="inner"></div>
                <div id="gMais"></div>
                <!--Retorna o mapa, pai do mapa-->
                <div id="retorno"></div>
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
<script src="view/assets/js/jquery.nicescroll.min.js"></script>

<!-- build:js js/index.min.js -->
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/filterQtds.js"></script>
<script src="view/assets/js/todosAnunText.js"></script>
<script src="view/assets/js/estrelaReview.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<!-- endbuild -->

<!--os dois abaixo eh suporte para medias queries e html5-->

<!-- [If lt IE 9]>
     <script  src = "/view/assets/js/html5shiv.js"> </ script>
     <script  src="view/assets/js/css3-mediaqueries.js"></script>
<[endif]-->
<script type="text/javascript">
    $(window).scroll(function (e){
         $('p.estrelas').map(function(){
        var verP = $(this).text();
        switch (verP){
            case "0":
            $(this).css({
                background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
                backgroundSize:'5.5em',
            });
            break
            case "1":
            $(this).css({
                background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
                backgroundSize:'5.5em',
                backgroundPosition:'0 20%'
            });
            break
            case "2":
            $(this).css({
                background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
                backgroundSize:'5.5em',
                backgroundPosition:'0 40%'
            });
            break
            case "3":
            $(this).css({
                background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
                backgroundSize:'5.5em',
                backgroundPosition:'0 60%'
            });
            break
            case "4":
            $(this).css({
                background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
                backgroundSize:'5.5em',
                backgroundPosition:'0 80%'
            });
            break
            case "5":
            $(this).css({
                background:'url(/view/assets/imagens/stars@2x.png) no-repeat',
                backgroundSize:'5.5em',
                backgroundPosition:'0 100%'
                
            });
            break
        }
    }).get().join(', ');
});
</script>
<script>

    //fpag -- fac -- plan

    var dadosSearch = {pesquisa:"<?php echo $stringBusca; ?>",
        bairro:"<?php echo $stringBairro; ?>",
        tef:"<?php if (isset($_GET['tef'])) { echo json_encode($_GET['tef']); } else { echo '';} ?>",
        fpag:"<?php  if (isset($_GET['fpag'])) { echo json_encode($_GET['fpag']); } else {echo '';} ?>",
        faci:"<?php  if (isset($_GET['faci'])) { echo json_encode($_GET['faci']); } else {echo '';} ?>",
        plan:"<?php  if (isset($_GET['plan'])) { echo json_encode($_GET['plan']); } else {echo '';} ?>",
        fStatus:"<?php  if (isset($_GET['fstatus'])) { echo $_GET['fstatus']; } else {echo '';} ?>",
        totalCosul:""};

    var dadosFilter = {filtro:""};

    // alert("Pesquisa "+dadosSearch['pesquisa']+" Bairro: "+dadosSearch['bairro']);

    var cate = <?php
    //passar essas variáveis via json.
    if(isset($_GET['cat']) && !empty($_GET['cat'])){
      echo json_encode($_GET['cat']);
    } else{
      echo  "0";
    }



   ?>;



    var bairro = <?php if(isset($_GET['bai']) && !empty($_GET['bai'])){

   echo json_encode($_GET['bai']);

   } else {

       echo  "0";

       }

       ?>;

    var facilidades = <?php if(isset($_GET['fac']) && !empty($_GET['fac'])){
    echo json_encode($_GET['fac']);
   } else {

    echo  "0";

   }
       ?>;

    var formPag = <?php if(isset($_GET['fpg']) && !empty($_GET['fpg'])){
    echo json_encode($_GET['fpg']);

   } else{

     echo  "0";

   }
        ?>;


    var planos = <?php if(isset($_GET['pla']) && !empty($_GET['pla'])){
    echo json_encode($_GET['pla']);
   } else {
    echo  "0";
   }
         ?>;

    var newSearch = "<?php echo $newSearch; ?>";

    if(newSearch == "newSearch"){

		alert("entrou no newSarch");

        cate = "";
        bairro = "0";
        facilidades = "0";
        formPag = "0";
        planos = "0";
        newSearch = "";


        dadosSearch['fStatus'] = "";

        window.location.href = "?controller=Anuncio&action=viewAnuncioPesquisa"+dadosSearch['pesquisa'];

    }

    if(dadosSearch['fStatus'] == "filterOn"){

        // alert(dadosSearch['fStatus'] + "filtro foi clicado");

       // alert("Passou no filterOn" + cate);

	  // alert("entrou no filterOn");

        $(".radioCate").html(geraCatCheck(cate));
        $(".checkBairros").html(geraCheckBairros(cate,bairro));
        filterMount();
        //recebe a contagem total de registros da consulta.
        filterMountCount();

    } else {

       // alert("não passou no filterOn");

        $(".radioCate").html(geraCatCheck(dadosSearch['pesquisa']));
        $(".checkBairros").html(geraCheckBairros(dadosSearch['pesquisa'],""));
        //Renderiza resultados da pesquisa


        var html = htmlImpressAnuncio("pesquisa", "parcialTodos", dadosSearch['pesquisa'],dadosSearch['bairro'], 15,"");



        //recebe a contagem total de registros da consulta.
        dadosSearch['totalCosul'] = returnJason("?controller=Anuncio&action=countSearch&valores="+dadosSearch['pesquisa']+"&bairro="+dadosSearch['bairro']);

        if(html == "0"){

            $('div.fun').after("<div class='returVazio'>"+
            "<p>Sua pesquisa não retornou nenhum resultado !</p>"+
            "<div>"+
            "<p>Sugestões SempreNegócio.com para melhorar suas buscas:</p>"+
            "<p>Use termos diferentes em sua pesquisa</p>"+
            "<p>Utilize termos mais genéricos para ampliar suas buscas</p>"+
            "<p><em>Exemplo: use <strong>esporte</strong> ao invés de <strong>natação</strong></em></p>"+
            "<ul>"+
            "<li>"+
            "<a href='/anuncie/' hreflang='pt-br'>Quero cadastrar minha empresa.</a>"+
            "</li>"+
            "<li>"+
            "<a href='?controller=Anuncio&action=viewAnuncioPesquisa' hreflang='pt-br'>Continuar pesquisando...</a>"+
            "</li>"+
            "</ul>"+
            "</div>"+
            "</div>");

            $('div.paiSe').css({
                display:'none'
            });

        } else {
		
            $(".inner").html(html);
		
        }

    }

    contFilter();

    //marca os itens do filtro conforme estes sao selecionados.
    function checkFilter(){

    }

    function filterMount(){

        $.post("index.php", {

                controller: "Anuncio",
                action: "filterMount",
                categoria: cate,
                bairro: bairro,
                formPag: formPag,
                facilidades: facilidades,
                planos: planos,
                count: "not",
                limit: 8

            },

            function (result) {

                var html = htmlImpressAnuncio("pesquisaFiltro", "parcialTodos", "","","",result);
                // alert(cate+bairro+formPag+facilidades+planos);
                // alert(result);
                // alert("Retorno de html do filterOn "+ html);




                if(html == "0"){
                    $('div.fun').after("<div class='returVazio'>"+
                    "<p>Sua pesquisa não retornou nenhum resultado !</p>"+
                    "<div>"+
                    "<p>Sugestões SempreNegócio.com para melhorar suas buscas:</p>"+
                    "<p>Use termos diferentes em sua pesquisa</p>"+
                    "<p>Utilize termos mais genéricos para ampliar suas buscas</p>"+
                    "<p><em>Exemplo: use <strong>esporte</strong> ao invés de <strong>natação</strong></em></p>"+
                    "<ul>"+
                    "<li>"+
                    "<a href='/anuncie/' hreflang='pt-br'>Quero cadastrar minha empresa.</a>"+
                    "</li>"+
                    "<li>"+
                    "<a href='?controller=Anuncio&action=viewAnuncioPesquisa' hreflang='pt-br'>Continuar pesquisando...</a>"+
                    "</li>"+
                    "</ul>"+
                    "</div>"+
                    "</div>");

                    $('div.paiSe').css({

                        display:'none'

                    });

                } else {

                    $(".inner").html(html);

            }

            });

    }
    ////////////////////

    function filterMountCount(){


        $.post("index.php", {
                controller: "Anuncio",
                action: "filterMount",
                categoria: cate,
                bairro: bairro,
                formPag: formPag,
                facilidades: facilidades,
                planos: planos,
                count: "yes"
            },

            function (result) {

                setFilterCount(result);

                // alert(dadosSearch['totalCosul']);

            });

    }

    function setFilterCount(val){

        dadosSearch['totalCosul'] = val;

    }

    /////////


    $(function(){

        //Função que ao clicar no botão, irá fazer.
        $(".filter").click(function() {
            var categoria = $(".catCheck:checked").val();
            var bairro = returnBaiCheck(".bai");
            var formPag = returnBaiCheck(".formPag");
            var facilidades = returnBaiCheck(".faci");
            var planos = returnBaiCheck(".pSaude");
            //Se nenhum radio de categoria for marcado, categoria recebe o valor da pesquisa de texto.
            if (categoria === undefined) {
                categoria = dadosSearch["pesquisa"];
            }

            var url = "&cat="+categoria;


            var cont;
            var tef  = new Array();
            var fpag = new Array();
            var faci = new Array();
            var plan = new Array();

            for(cont = 0; cont < bairro.length; cont++){
                url += "&bai["+cont+"]="+bairro[cont];
                tef[cont] = bairro[cont];
            }

            for(cont = 0; cont < formPag.length; cont++){
                url += "&fpg["+cont+"]="+formPag[cont];
                fpag[cont] = formPag[cont];
            }

            for(cont = 0; cont < facilidades.length; cont++){
                url += "&fac["+cont+"]="+facilidades[cont];
                faci[cont] = facilidades[cont];
            }

            for(cont = 0; cont < planos.length; cont++){
                url += "&pla["+cont+"]="+planos[cont];
                plan[cont] = planos[cont];
            }

            // --> alert("ANtes: " + "bairro: "+tef.length+ "formas de paf" + fpag.length + "facilidades: " + faci.length + "Planos" + plan.length);

            url += "&fstatus=filterOn&busc="+dadosSearch["pesquisa"];

            if(tef.length != 0){
                url+= "&tef="+tef.toString();
            }
            if(fpag.length != 0){
                url+= "&fpag="+fpag.toString();
            }
            if(faci.length != 0){
                url+= "&faci="+faci.toString();
            }
            if(plan.length != 0){
                url+= "&plan="+plan.toString();
            }


            window.location.href = "?controller=Anuncio&action=viewAnuncioPesquisa"+url;


            //document.write("http://localhost/SempreNegocio/?controller=Anuncio&action=/viewAnuncioPesquisa"+url);


        });

    });


    function saveFilter(filter,categoria) {

        $.post("index.php", {
                controller: "Anuncio",
                action: "filterUpdate",
                filter: filter,
                categoria: categoria
            },

            function (result) {

                //alert(result);

            });

    }

    function returnFilter(){

        $.post("index.php", {
                controller: "Anuncio",
                action: "returnFilter"

            },
            function (result) {

                //alert("valor retornado direto da fonte " + result);
                return result;
                // $('.inner').html(htmlImpressAnuncio("pesquisaFiltro", "parcialTodos", "","","",result));

            });
    }

</script>

<script type="text/javascript">
    // var cont = 1;
    var limit = 15;



    $(document).ready(function(){


        //contabiliza a quantidade de vinculos entre filtros e anuncios
        contFilter();

        $(window).scroll(function () {

            if(($(window).scrollTop() + $(window).height()) > ($('body').height() * 1.00) ){

                //alert(dadosSearch['totalCosul'] +"---"+$( "article" ).length );

                //se a contagem de anuncios for igual ao total de registros, não exibe o botão.
                if($( "article" ).length < dadosSearch['totalCosul']){

                    // alert("Qtd articles "+ $( "article" ).length +"Qtd total registros "+ dadosSearch['totalCosul']);

                    $("#gMais").html("<button id='moreG' onclick=moreGeneretor('"+dadosSearch['fStatus']+"');>Veja mais resultados</button>");

                }




            }


        });

    });



    function moreGeneretor(fStatus){

        // alert("teste por fora" + tesa + "O que tava" + dadosSearch['fstatus']);
        if(fStatus == 'filterOn'){

            $(function(){

                $.post("index.php", {
                        controller: "Anuncio",
                        action: "filterMount",
                        categoria: cate,
                        bairro: bairro,
                        formPag: formPag,
                        facilidades: facilidades,
                        planos: planos,
                        count: "not",
                        limit: limit
                    },
                    function (result) {
                        //dadosFilter['filtro'] = result;
                        $('.inner').html(htmlImpressAnuncio("pesquisaFiltro", "parcialTodos", "","","",result));

                        //dadosSearch['totalCosul'] = returnJason("?controller=Anuncio&action=countSearch&valores="+dadosSearch['pesquisa']+"&bairro="+dadosSearch['bairro']+"&con"+result);
                    });

            });


        } else {

            //alert("entrou no else");
            var html = htmlImpressAnuncio("pesquisa", "parcialTodos",dadosSearch['pesquisa'],dadosSearch['bairro'], (limit + 15),"");

            if(html != ""){
                $( ".inner" ).html(html);

                // alert($( "article" ).length);

            }else {
                //   alert("nenhum dado");
            }

            // alert("entrou no else");

        }

        limit += 15;

        $( "button" ).remove( "#moreG" );

    }

</script>


<script>

    function returnBaiCheck(seletor){

        var val = new Array();

        $(seletor+':checked').each(function(){

            val.push($(this).val());

        });

        //   for(var i=0; i< val.length; i++){
        //    alert(val[i]);
        //    }

        return val;

    };

    $(".catCheck").click(function(){

        var categoria = $(this).val();

        dadosSearch['pesquisa'] = categoria;
        dadosSearch['bairro'] = "";
        dadosFilter['filtro'] = "";

        //$(".checkBairros").html(geraCheckBairros(dadosSearch['pesquisa'],""));
        //solicitar recalculo de acordo com a categoria selecionada.
        contFilter();

        //  $(".inner").html(htmlImpressAnuncio("pesquisa", "parcialTodos", categoria,"", 10,""));

    });


    //verifica se foi retornado algum resultado
    function resultVerify(){

        // alert($(".inner").find("article").length);

        //verifica se a pesquisa retornou elemento, caso contrário imprime mensagem.

        if($('.inner').html() == ""){

            $('div.fun').after("<div class='returVazio'>"+
            "<p>Sua pesquisa não retornou nenhum resultado !</p>"+
            "<div>"+
            "<p>Sugestões SempreNegócio.com para melhorar suas buscas:</p>"+
            "<p>Use termos diferentes em sua pesquisa</p>"+
            "<p>Utilize termos mais genéricos para ampliar suas buscas</p>"+
            "<p><em>Exemplo: use <strong>esporte</strong> ao invés de <strong>natação</strong></em></p>"+
            "<ul>"+
            "<li>"+
            "<a href='/anuncie/' hreflang='pt-br'>Quero cadastrar minha empresa.</a>"+
            "</li>"+
            "<li>"+
            "<a href='?controller=Anuncio&action=viewAnuncioPesquisa' hreflang='pt-br'>Continuar pesquisando...</a>"+
            "</li>"+
            "</ul>"+
            "</div>"+
            "</div>");
            $('div.paiSe').css({
                display:'none'
            });
        }


    }

</script>

<script>

    $(document).ready(function() {
        $(".boxscroll2").niceScroll({touchbehavior:false,cursorcolor:"#999",cursoropacitymax:0.7,cursorwidth:6,background:"#ccc",autohidemode:false});
    });

</script>



</html>












