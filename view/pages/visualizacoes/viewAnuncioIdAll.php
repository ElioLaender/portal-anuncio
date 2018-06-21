<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="<?php echo $metas[0]['anuncio_descricao']; ?>">
    <meta name="keywords" content="Guia eletrônico, Classificados, semprenegocio.com.br, semprenegocio.com, Sempre Negócio, sempre negocio, Anúncios grátis, descontos, <?php echo $metas[0]['anuncio_breve_descricao'];?>">
    <meta property="og:title" content="<?php echo $metas[0]['anuncio_titulo']; ?>">
    <meta property="og:site_name" content="SempreNegócio">
    <!-- meta property="og:description" content="<?php //echo $metas[0]['anuncio_descricao']; ?>" -->
    <meta property="og:type" content="website">

    <link rel="icon" href="imagens/flor.png">
    <base href="http://www.semprenegocio.com.br/" target="">
    <title>Sempre Negócio - <?php echo $metas[0]['anuncio_titulo']; ?></title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/parteAnunPg.css" rel="stylesheet">
    <link href="view/assets/estilo/review.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/breackparteAnunPg.css" rel="stylesheet">
    <link href="view/assets/estilo/breackReview.css" rel="stylesheet">

</head>
<body>

<?php

if(isset($arrayFace)){

    echo "<input type='hidden' id='idCliAnu' value='".$idCli."' />";

} else {


  echo "<input type='hidden' id='idCliAnu' value='".$arrayUser[0]['cli_id']."' />";
}

?>

<div class="tudo">
    <header class="barraM">
        <h1>Entre em contato com a Sempre negócio</h1>
        <div id="escBar"></div>
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
                                     <a href='/painel-de-controle/'>Painel de controle</a>
                                </li>
                                <li>
                                    <a href='/completar-perfil/alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair'>Sair</a>
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

                                    <p id='returnLogin' style='font-size: 14px; background-color: silver;'></p>
                                    <label for='tM'>E-mail</label>
                                    <input type='email' id='tM' class='efeitoL' name='cM' required title='Digite seu email !'>

                                    <label for='tSenha'>Senha</label>
                                    <input type='password' name='cSenha' id='tSenha' class='tSenhas efeitoL' size='10' maxlength='30' title='Digite sua senha'>

                                    <input type='hidden' id='dirLogin' value='?controller=Anuncio&action=viewAnuncioIdAll&id=".$idAnun."'>

                                    <input type='checkbox' class='mostraSe' name='mostraS'>
                                    <label for='tEntrar'> Entrar </label>

                                    <input type='submit' id='tEntrar' class='prevenir' name='cEntrar' value='Entrar'>
                                    <label for='tManter'>Manter conectado
                                        <input type='checkbox' name='tManter' id='tManter' value='logado' checked='true'>
                                        <span></span></label>

                                    <button type='button' class='esqSen'> Esqueceu sua senha? </button>
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
                    <li><a href="home">Home</a></li>
                </ul>
            </div>
            <!--fim div que da contexto para seu filhos-->
        </div>
    </header>
    <main>
        <div class="paiPg">
            <section>
                <h2 class="sumir">Anúncio Completo</h2>
                <div class="inner"></div>
                <div></div>
                <!-- <h1 class="retorno"></h1> -->
                <div class="paiRetLik">
                    <div class='returLik'>
                        <p class='curt'>Você só pode curtir apenas uma vez essa avaliação</p>
                        <button type='button' value='fechar' id='fechaB'>Fechar</button>
                    </div>
                </div>
            </section>
        </div>
         <div class="paiRodape">
                <footer>
			<?php echo "<img style='display:none;' src='".str_replace(' ', '', $imgCapa)."' alt='Imagem do anunciante'>"; ?>
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
        <!--fim div paiRodape-->
    </main>
</div>
    <div class="escuro"></div>
<!-- fecha div tudo-->
</body>

<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="view/assets/js/gmaps.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="view/assets/js/jquery.mask.min.js"></script>

<!-- build:js js/index.min.js -->
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/jsAnuA.js"></script>
<script src="view/assets/js/modoDePag.js"></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/efeito-foto.js"></script>
<script src="view/assets/js/efeitoLabel.js"></script>
<script src="view/assets/js/estrelaRevew.js"></script>
<script src="view/assets/js/loginDash.js"></script>
<script src="view/assets/js/avaliacaoIdAll.js"></script>
<!-- endbuild -->
<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>
<script src="view/assets/js/recoverPass.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<!--os dois abaixo eh suporte para medias queries e html5-->

<!-- [If lt IE 9]>
     <script  src = "/view/assets/js/html5shiv.js"> </ script>
     <script  src="view/assets/js/css3-mediaqueries.js"></script>
<[endif]-->


<?php
$idAnun = $_GET['id'];
?>

<script>
    $(document).ready(function() {

        $( ".inner" ).html(anunPorId(<?php echo $idAnun; ?>, "completoTodos"));

    });
</script>


<script type="text/javascript">
    $(window).load(function() {

    $('input:radio').click(function(){
        var ver = $(this).val();
        switch (ver){
            case "1":
                $(this).next().css({
                    backgroundPosition: '50% 100%'
                });

                $(this).closest('label').prevAll('label').find('span').css({
                    backgroundPosition: '50% 100%'
                });
                
                $(this).closest('label').nextAll('label').find('span').css({
                    backgroundPosition: '50% 0%'
                });
            break
            case "2":
                $(this).next().css({
                    backgroundPosition: '50% 100%'
                });

                $(this).closest('label').prevAll('label').find('span').css({
                    backgroundPosition: '50% 100%'
                });
                
                $(this).closest('label').nextAll('label').find('span').css({
                    backgroundPosition: '50% 0%'
                });
            break
            case "3":
                $(this).next().css({
                    backgroundPosition: '50% 100%'
                });

                $(this).closest('label').prevAll('label').find('span').css({
                    backgroundPosition: '50% 100%'
                });
                
                $(this).closest('label').nextAll('label').find('span').css({
                    backgroundPosition: '50% 0%'
                });
    
            break
            case "4":
                $(this).next().css({
                    backgroundPosition: '50% 100%'
                });

                $(this).closest('label').prevAll('label').find('span').css({
                    backgroundPosition: '50% 100%'
                });
                
                $(this).closest('label').nextAll('label').find('span').css({
                    backgroundPosition: '50% 0%'
                });
    
            break
            case "5":
                $(this).next().css({
                    backgroundPosition: '50% 100%'
                });

                $(this).closest('label').prevAll('label').find('span').css({
                    backgroundPosition: '50% 100%'
                });
                
                $(this).closest('label').nextAll('label').find('span').css({
                    backgroundPosition: '50% 0%'
                });

            break
        }
    });

    $('p.estrelas').map(function(){
        var verP = $(this).text();
        // alert(verP);
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
<script type="text/javascript">
   $(document).ready(function() {
         $('<div id="tela">'+
            '<div class="paiBut">'+
                '<button class="butF" type="button"></button>'+
            '</div>'+    
        '</div>').insertAfter('#refe');
      $('.foto').click(function(event) {
            event.preventDefault();
            $('#tela img').remove();
            $('div.escuro').show();
            $('div#galeria').css({
                border:'solid rgba(0,0,0,.1) 2px'
            });
            $('body').css({
                background:'rgba(0,0,0,.8)',
                 
            });
            $('#tela').show();
            $('<img />')
                .attr('src', $(this).attr('src'))
                .css('opacity', '0.3')
                .appendTo('#tela')
                .animate({opacity:1}, 200);
        });
        $('.butF').click(function(){
            $('#tela').hide();
            $('div.escuro').hide();
            $('div#galeria').css({
                border:'solid #ecf0f1 2px'
            });
             $('body').css({
                background:'#fff'
            });
            $('div.excluir').hide();
        });
         $('#tela,button.nao').click(function(){
            $('div.escuro').hide();
            $('div#galeria').css({
                border:'solid #ecf0f1 2px'
            });
            $('#tela').hide();
            $('body').css({
                background:'#fff'
            });
            $('div.excluir').hide();

         });
         $('span.fun,button.lixo').click(function(){
                $('div.excluir').show();
                $('div.escuro').show();
                $('body').css({
                     background:'rgba(0,0,0,.9)',
                 });
                $('#tela').show();
                $('#tela').find('img').hide();

                $('div#galeria').css({
                        border:'solid rgba(0,0,0,.1) 1px'
                });
         });
    });
    // ]]>
</script>

<script>
    //Enviar avaliação
    $(function(){
        //Função que ao clicar no botão, irá fazer.
        $("#envMenssage").click(function(){

            var controller = "Anuncio";
            var action = "insertMensager";
            var nome = $("#menNome").val();
            var telefone = $("#menTel").val();
            var email = $("#menEmail").val();
            var mensagem = $("#menText").val();

	    if(nome == ""){

		$("#nome").html("* O nome deve ser preenchido");
		return false;

	    }

	    if(telefone == "" || telefone == "() -"){

		$("#telefone").html("* O numero de telefone deve ser preenchido");
		return false;
	    }

            if(!emailValidate(email)){

		$("#email").html("* O email deve ser preenchido");
		return false;

	    } else {
		$("#email").html("* Email válido");
	    }

            if(mensagem == ""){

		$("#mensa").html("* Favor, digite a mensagem");
		return false;

	    }
	   
           


            //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
            $.post("index.php", {


                    controller: controller,
                    action: action,
                    idAnun: <?php echo $idAnun; ?>,
                    nome: nome,
                    telefone: telefone,
                    email: email,
                    mensagem: mensagem
                },

                function (result) {

                    $(".retorno").html(result);

		    $("#mensagem").trigger("reset");

		    setTimeout(function(){ location.reload(); }, 1000);
			

                });
        });
    });



    //Salva revew na base de dados
    $(function(){

        var idCliente = "<?php echo $idCli; ?>";
        //Função que ao clicar no botão, irá fazer.
        $("#envRevew").click(function() {

            if(idCliente  > 0){
                var controller = "Anuncio";
                var action = "insertRevew";
                var titulo = $("#revTitulo").val();
                var opiniao = $("#revText").val();
                //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php


		if(titulo == ""){
			 $("#opTitle").html("* O título deve ser preenchido");
			 return false;
		}

		if(opiniao == ""){
			 $("#op").html("* O campo opinião deve ser preenchido");
			 return false;
		}

                $.post("index.php", {
                        controller: controller,
                        action: action,
                        idAnun: <?php echo $idAnun; ?>,
                        cliRef: <?php echo $idCli; ?>,
                        nota: extraiNota(),
                        titulo: titulo,
                        opiniao: opiniao
                    },

                    function (result) {
                        $(".retorno").html(result);
			setTimeout(function(){ location.reload(); }, 1000);
                    });

            } else {
                $('.fundoEscuro').fadeIn();
                $('div.logar').addClass('aparecer');
                $('.efetua').find('div:eq(0)').fadeIn(500);
            }

        });

    });

    //verifica se o usupario está logado
    function loginVerify(){
        var idCliente = "<?php echo $idCli; ?>";
        if(idCliente > 0){
            return true;
        } else {

            $('.fundoEscuro').fadeIn();
            $('div.logar').addClass('aparecer');
            $('.efetua').find('div:eq(0)').fadeIn(500);
        }
    }
    $('body').on('click', '.trw', function(){
        loginVerify();
    });

    function extraiNota(){
        var valor = "";
        //Executa Loop entre todas as Radio buttons com o name de valor
        $("input:radio[name='nota']").each(function() {
            //Verifica qual está selecionado
            if ($(this).is(':checked')){
                valor = parseInt($(this).val());
            }
        });
        return valor;
    }

    //envia dados da resposta de um revew a serem persistidos na base de dados.
    function submitRes(){



        var controller = "Anuncio";
        var action = "insertRespostaRevew";
        var cliRef = $("#cliRef").val();
        var revewRef = $("#vewRef").val();
        var respText = $("#respMen").val();
        var anunDon = 0;

        var cliDonAnun = returnJason("?controller=Anuncio&action=soliIdCli&idAnun=" + <?php echo $idAnun; ?>); //retorna numero do cliente dono do anuncio da página
        //caso o revew for do dono d    o anuncio será setado o valor um. fazer uma consulta que retorna dono do anuncio da página, sendo passádo um id por argumento, dai retorna true ou false.
        if(cliDonAnun[0]['anuncio_cliente_ref'] == <?php echo $idCli; ?>){
            anunDon = 1;
        }


	if(respText == ""){
	   $("#retornoRes").html("O campo de mensagem deve ser preenchido");
	   return false;	
	}

        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {

                controller: controller,
                action: action,
                cliRef: <?php echo $idCli; ?>,
                revewRef: revewRef,
                respText: respText,
                anunDon: anunDon

            },

            function (result) {

                $("#retornoRes").html(result);
		setTimeout(function(){ location.reload(); }, 1000);

            });


    }

/////////////////

$(window).load(function() {
	$('#media').map(function(){
		var ver = $(this).text();

		switch (ver){
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

</html>
