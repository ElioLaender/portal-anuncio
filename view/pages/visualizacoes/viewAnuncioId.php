<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Página exclusiva do anúnciante,orçamento, avaliações, vídeos e muito mais informações,estão disponíveis para a empresa visualizar como está seu anúncioS.">
    <meta name="keywords" content="anúncio,minha empresa,empresa,dados de empresa,avalições,orçamento,vídeo,album de fotos,estrelas">
    <link rel="icon" href="imagens/flor.png">
   <base href="http://www.semprenegocio.com.br/" target="">

    <title>Sempre Negócio - Seu Anúncio</title>
    <!-- build:css css/index.min.css -->
     <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/pgAnCompleto.css" rel="stylesheet">
    <link href="view/assets/estilo/review.css" rel="stylesheet">
    <link href="view/assets/estilo/mensagens.css" rel="stylesheet">
    <link href="view/assets/estilo/breackMens.css" rel="stylesheet">
    <link href="view/assets/estilo/breackReview.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/breackPgAnComp.css" rel="stylesheet">
    <link href="view/assets/estilo/breakAnuncAt0.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
</head>
<body>
<div class="tudo">
    <header class="barraM">
        <h1>Painel de controle</h1>
        <div id='escBar'></div>
        <div class="paiBarra">

            <!-- primeira div sera hamburguer -->
            <button type="button"></button>
            <div>
                <nav>
                    <h2 class="sumir">links de navegação</h2>
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
                    <li><a href="painel-de-controle/">Voltar</a></li>
                </ul>
            </div>
            <ul class='voltarDas'>
                <li><a href="painel-de-controle/">Voltar</a></li>
            </ul>
            <!--fim div que da contexto para seu filhos-->
        </div>
    </header>
    <div class="fund01"></div>
    <main>
        <div class='cupon'>
            <button type="button" class='feche'>fechar</button>
            <p>A SempreNegócio gera cupons de descontos para sua empresa.</p>
            <p>Você escolhe o valor de desconto e o produto/serviço que sera oferecido o desconto, a quantidade de cupons
                que poderam ser imprimidos é limitado por você.</p>
            <p>Mas porquê criar cupons de desconto?</p>
            <p>Esta é uma boa estratégia para atrair novos clientes para seu negócio, é uma oportunidade em termpo de
                crise, as pessoas são atraídas por descontos, essa é uma tendência crescente no mercado, experimente você também.</p>
        </div>

        <div class="cresc">
            <button type="button" class='feche'>fechar</button>
            <p>Ajude-nos a melhorar!.</p>
            <p>Diga-nos nossos erros e acertos, analizaremos com atenção sua opnião sobre nós.</p>


            <form>
                <p id="returnOpini"></p>
                <fieldset>
                    <legend>Assunto</legend>
                    <select name="mAssunt" id="assunto">
                        <optgroup label="Informe o assunto"></optgroup>

                        <option value='Sugestão' selected>Sugestão</option>
                        <option value='Reclamação'>Reclamação</option>
                        <option value='Dúvidas'>Elogios</option>
                    </select>
                    <label for="tTex" >Deixe sua opnião</label>
                    <textarea id="tTex" name="cDescricao"></textarea>

                    <input type="button" value='enviar' onclick="submitOpini();">
                </fieldset>
            </form>

        </div>
        <div class="controlaBa">
            <div class="paiBan">
                <aside>
                    <h2>Nossas <strong>ofertas</strong> para seu negócio!</h2>
                    <div class="ban01">
                        <div class="zoom">
                            <div></div>
                        </div>
                        <p>Sua <strong>empresa</strong> ganha, e seus clientes também!</p>
                        <ul>
                            <li>
                                <a class='saiba'>Saiba como</a>
                            </li>
                        </ul>
                    </div>

                    <div class="ban01 ban02">
                        <div class="zoom">
                            <div></div>
                        </div>
                        <p><strong>Ajude-nos</strong> a melhorar, e cresceremos juntos!</p>
                        <ul>
                            <li>
                                <a class='ajude'>Dê sua opnião</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <section>
                <h2>Anúncio Completo</h2>
                <div class="inner"></div>
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
                      <li><a href="trabalhe-conosco/" id="trab">Trabalhe conosco</a></li>
                        <li><a href="fale-conosco/" id="cont">Fale conosco</a></li>
                        <li><a href="http://www.expressahost.com.br" id="sit"  hreflang="pt-br" target="_blank">Conheça nossos sistemas</a></li>
                    </ul>
                    <ul>
                        <li>
                            <p>Para Você</p>
                        </li>
                          <li><a href="duvidas-frequentes/" id="duvi">Dúvidas frequêntes</a></li>
                        <li><a href="termos-de-uso/" id="term">Termos de uso</a></li>
                        <li><a href="politica-de-privacidade/" id="poli">Política de privacidade</a></li>
                    </ul>
                    <ul>
                        <li>
                            <p>Para Anunciantes</p>
                        </li>
                         <li><a href="painel-de-controle/" hreflang="pt-br">Painel de Controle</a></li>
                        <li><a href="termos-gerais/" id="poli">Termos gerais</a></li>
                        <li><a href="cuidados-com-fraudes/">Cuidados com fraudes</a></li>
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
        <div class="escuro"></div>
        <!--fim div paiRodape-->
    </main>
</div>
<!-- fecha div tudo-->
</body>

<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<!-- build:js js/index.min.js -->
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<script src="view/assets/js/jsAnuA.js"></script>
<script src="view/assets/js/contagemReviews.js"></script>
<script src="view/assets/js/modoDePag.js"></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/estrelaReview.js"></script>
<script src="view/assets/js/respClin.js"></script>

<!-- endbuild -->
<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>

<!--os dois abaixo eh suporte para medias queries e html5-->

<!-- [If lt IE 9]>
     <script  src = "/view/assets/js/html5shiv.js"> </ script>
     <script  src="view/assets/js/css3-mediaqueries.js"></script>
<[endif]-->
<script>
    $(document).ready(function() {

       $( ".inner" ).html(anunPorId(<?php echo $ID; ?>, "completo"));

    });
</script>
<script type="text/javascript">
    //<![CDATA[

    $(document).ready(function() {
         // var whatsApp = $('a.whats').attr('href');
         // $('a.whats').find('strong').text(whatsApp);

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
                background:'rgba(0,0,0,.8)'
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
                     background:'rgba(0,0,0,.8)'
                 });
                $('#tela').show();
                $('#tela').find('img').hide();

                $('div#galeria').css({
                        border:'solid rgba(0,0,0,.1) 1px'
                });
         });
    });
    // ]]>

    //envia dados da resposta de um revew a serem persistidos na base de dados.
    function submitRes(){


        var controller = "Anuncio";
        var action = "insertRespostaRevew";
        var cliRef = $("#cliRef").val();
        var revewRef = $("#vewRef").val();
        var respText = $("#respMen").val();
        var anunDon = 1; // já vai ser um pois está no painel do anunciante.

	if(respText == ''){
		 $("#retornoRes").html("* Você deve preencher uma mensagem antes de enviar");
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

                $(".retorno").html(result);
		setTimeout(function(){ location.reload(); }, 1000);

            });

    }


    /////////////////

    //envia dados da resposta de um revew a serem persistidos na base de dados.
    function submitOpini(){


        var controller = "cliente";
        var action = "cliOpiPersist";
        var assunt = $("#assunto").val();
        var opini = $("#tTex").val();


        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {

                controller: controller,
                action: action,
                cliRef: <?php echo $idCli; ?>,
                assunt: assunt,
                opini: opini

            },

            function (result) {

                $("#returnOpini").html(result);

            });

    }


</script>

</html>
