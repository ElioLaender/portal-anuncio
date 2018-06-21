<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Cadastre seu anúncio, gerencie seus dados de login, troque foto de perfil e muito mais. Este é seu painel de controle para você poder acompanhar seus resultdos.">
    <meta name="keywords" content="Administrar anúncio,editar anúncio,editar perfil,ver resultados,painel de controle,dashboard.">
    <link rel="icon" href="imagens/flor.png">
    <title>Gerencie sua conta</title>
    <!-- build:css css/index.min.css -->
   
    <div id="cssImpress"></div>
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/dashboard.css" rel="stylesheet">
    <link href="view/assets/estilo/fotoUsu.css" rel="stylesheet">
    <link href="view/assets/estilo/configuraCheckbox.css" rel="stylesheet">
    <link href='view/assets/estilo/viewFolha.css' rel='stylesheet'>
    <link href='view/assets/estilo/breackFolha.css' rel='stylesheet'>
    <link href="view/assets/estilo/breackDasBoard.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <!-- endbuild -->

</head>
<body>

<?php

if(isset($_GET['menValid']) && !empty($_GET['menValid']) && $_GET['menValid'] == "true"){
 $menReturn = "Conta Validada! =)";
} else{
 $menReturn = "Painel de controle";
}

?>

<div class="tudo">
      <div id="carregando_form" class="load01">
        <figure>
            <img src="view/assets/imagens/488.gif" alt="imagem de load">
            <figcaption>Carregando...</figcaption>
        </figure>
        <p>Carregando...</p>
      </div>
    <header class="barraM">
        <h1><?php echo $menReturn; ?></h1>
        <div id='escBar'></div>
        <div class="paiBarra">
            <!-- primeira div sera hamburguer -->
            <button type="button"></button>
            <div>
                <nav>
                    <h2 class="sumir">links de navegação</h2>
                    <button type="button" class="fechar">Fechar</button>
                    <span></span>
                    <form>
                        <fieldset>
                            <label for="buscar">
                                <input type="search" id="buscar" placeholder="Pesquisar" class="completar" name="buscar" maxlength="25" required title="Digite aqui para que a pesquisa seja efetuada." >
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

            if(isset($arrayFace)){

                echo "<div>
                <div class='fotoBar' id='fotoDas'>
                    <figure id='figuHome'>
                            <img src='https://graph.facebook.com/".$arrayFace['id']."/picture' alt='imagem circular representando o proprietário da conta.'>
                        </figure>
                    <div id='blocoFot'>
                        <ul>
                            <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sairFace'>Sair</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class='logar'>
                </div>
                <!--este bloco eh recuperar senha esquecida-->
                <div class='recupSenha'>
                </div>
            </div>";


            } else {

                echo "<div>
                <div class='fotoBar' id='fotoDas'>
                    <figure>
                        <img src='".$arrayUser[0]['cli_foto']."' alt='imagem circular representando o proprietário da conta.'>
                    </figure>
                    <div id='blocoFot'>
                        <ul>
                            <li>
                                <a href='/completar-perfil/alterCad'>Completar Perfil</a>
                            </li>
                            <li>
                                <a href='".$URL_INI."?controller=Dashboard&action=sair'>Sair</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class='logar'>
                </div>
                <!--este bloco eh recuperar senha esquecida-->
                <div class='recupSenha'>
                </div>
            </div>";

            }


            ?>

            <!-- div fechando pai do login -->
            <div class="home efetua">
                <ul>
                    <li><a href="home">Home</a></li>
                </ul>
                <button type="button" class="butFechD">Opções do Painel</button>
            </div>

            <button type="button" id='butMobile' class="butFechD">Opções do Painel</button>
            <!--fim div que da contexto para seu filhos-->
        </div>
    </header>
    <main>
        <section class="sectDas">
            <h2>Gerenciar Conta</h2>

            <div id="deshP">
                <p><?php echo $menReturn; ?></p>
                <ul>
                    <li>
                        <a id="anunAtivos">Anuncios Ativos <strong>(<span class="spanAtiv"><?php echo $qtdAnuncioAtivo; ?></span>)</strong></a>
                        <figure>
                            <img src="view/assets/imagens/acit@2x.png" alt="Escudo laranja">
                        </figure>
                    </li>
                    <li>
                        <a id="anunInativos">Anuncios Inativos<strong>(<span class="spanDes"><?php echo $qtdAnuncioInativo; ?></span>)</strong></a>
                        <figure>
                            <img src="view/assets/imagens/des@2x.png" alt="Escudo verde com um x ao centro">
                        </figure>
                    </li>
                    <li>
                        <a id="alterCad">Meu Perfil</a>
                        <figure>
                            <img src="view/assets/imagens/conf@2x.png" alt="pasta com desenho de engrenagem ao centro">
                        </figure>
                    </li>
                    <li>
                        <a id="insertAnun" href="anuncie/#pacotes">Novo Anúncio</a>
                        <figure>
                            <img src="view/assets/imagens/new@2x.png" alt="desenho de um notebook com uma coruja na tela">
                        </figure>
                    </li>
                    <li>
                        <a id="" href="cadastrar-cupon/" >Cadastrar Cupon</a>
                        <figure>
                            <img src="view/assets/imagens/desc@1x.png" alt="Foguete colorido indicando impulsionamento">
                        </figure>
                    </li>

                    <li>
                        <a >Impulsionar anúncio</a>
                        <figure>
                            <img src="view/assets/imagens/fog@1x.png" alt="desenho ilustrando porta retrato">
                        </figure>
                    </li>
                    <li class="divulCur">
                         <a  id='cadCur' onclick='insertCur();'>Enviar Vagas</a>
                        <figure>
                            <img src='view/assets/imagens/cadastre@1x.png' alt='folha colorida de laranja'>
                        </figure>
                    </li>
                    <li class="pgInit">
                        <a href="<?php echo $URL_INI; ?>?controller=Dashboard&action=sair">Sair</a>
                        <figure>
                            <img src="view/assets/imagens/sair@2x.png" alt="Porta aberta verde com  uma seta azul indicando a saída">
                        </figure>
                    </li>
                    <li class="pgInit">
                        <a href="home">Página Inicial</a>
                        <figure>
                            <img src="view/assets/imagens/homePage@1x.png" alt="coruja azul">
                        </figure>
                    </li>
                </ul>
            </div>
            <!-- Em aside sera o elemento onde contera os demais que
            aparecem de maneira DINAMICAMENTE -->
            <div id="paiContDas">
		
                <aside>
                    <h2 class="sumir"></h2> 
                    <div id="inner">
                        <!-- class="man"></div>
                        <section class="boasVin">
                            <h3> Seja Bem Vindo! <?php echo $arrayUser[0]['cli_nome']; ?></h3>
                            <p>Agora é só aproveitar tudo que preparamos com carinho para você... </p>
                        </section>
                    </div -->
                </aside>
            </div>
        </section>
    </main>

    <!-- p>Usuário: <?php #echo $testeUm; ?></p>
    <p>Senha: <?php #echo $testeDois; ?></p -->
</body>
</div>

<!-- build:js js/index.min.js -->
<!--gera o js dinâmico-->
<script id='jsImpress'></script>
<script  src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script>
    $("#cssImpress").html(cssSelAnunDes());
</script>
<script src='view/assets/js/efeitoLabel.js'></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/revelaSenha.js"></script>
<script src="view/assets/js/sumirBloco.js"></script>
<script src='view/assets/js/jsAnuA.js'></script>
<script src='view/assets/js/estrelaReview01.js'></script>
<script src='view/assets/js/verifAnun.js'></script>
<!-- <script src='/view/assets/js/veriCur.js'></script> -->
<!-- <script src='/view/assets/js/curJobs.js'></script> -->
<script src="view/assets/js/gif.js"></script>
<!-- endbuild -->
<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>


<script>

    anunAtivos();

    <?php

    require_once "dao/AccessObject/ClienteDAO.php";

    $objCli = new ClienteDAO();

        if(isset($arrayFace)){
            $arrayUser[0]['cli_nome'] = $arrayFace['name'];
             $arrayUser[0]['cli_email'] = $arrayFace['email'];
             $arrayUser[0]['cli_id'] = $objCli->returnIdUserFace($arrayFace['id']);
        }

     ?>


    var dadosUser = {nome:"<?php echo $arrayUser[0]['cli_nome']; ?>",email:"<?php echo $arrayUser[0]['cli_email']; ?>",id:"<?php echo $arrayUser[0]['cli_id']; ?>"};

    renderizer("<?php echo $option; ?>","<?php echo $idAnun; ?>");

    if( $("#inner").html() == ""){
        $("#carregando_form").show("slow");
    }


    function giff(){

        $("#inner").html('');
        $("#carregando_form").show("slow");

    }

 
  
	
 


</script>
</html>

