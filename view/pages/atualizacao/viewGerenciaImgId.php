    <!DOCTYPE html>
    <html>
    <head>
        <meta name="language" content="pt-br">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
        <meta name="author" content="SempreNegócio soluções inteligentes">
        <meta name="description" content="Suba imagens para seu anúncio, mostre para seus clientes, produtos ou serviços, que sua empresa desenvolve. Aproveite ao máximo nossos serviços para sua empresa obter os melhores resultados.">
        <meta name="keywords" content="imagens de anúncio,subir imagens,foto de empresa,foto de seerviço,foto de produtos,imagens de produtos,imagens de serviços,imagens de anunciantes">
        <link rel="icon" href="view/assets/imagens/flor.png">
        <base href="http://www.semprenegocio.com.br/" target="">
        <title>Genrencie sua galeria de fotos</title>
        <!-- build:css css/index.min.css -->
        <link href="view/assets/estilo/reset.css" rel="stylesheet">
        <link href="view/assets/estilo/index.css" rel="stylesheet">
        <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
        <link href="view/assets/estilo/img.css" rel="stylesheet">
        <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
        <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
        <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
        <!-- endbuild -->
    </head>
    <body>
    <div class="tudo">
        <header class="barraM">
        <h1>Entre em contato com a Sempre negócio</h1>
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
                                    <a href='/completar-perfil/alterCad'>Completar Perfil</a>
                                </li>
                                <li>
                                    <a href='".$URL_INI."?controller=Dashboard&action=sair&dirControl=?controller=Funcionario&dirAction=action=viewTrabalheConosco'>Sair</a>
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
                                            <a href='#'>Entrar com facebook</a>
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

                                    <input type='hidden' id='dirLogin' value='?controller=Funcionario&action=viewTrabalheConosco'>

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

                                    <p>Informe seu e-mail e você receberá instruções para recuperar sua senha.</p>

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
                    <li><a href="/painel-de-controle/">Voltar</a></li>
                </ul>
            </div>
            <!--fim div que da contexto para seu filhos-->
        </div>
        </header>
        <div class="escuro"></div>
        <div class='paiForm'>

    
        <?php

            if($pacote == "Grátis"){

            echo "<h2>O cadastro gratuito não possui inserção de Imagens.<br/> Contrate o Plano Premium por apenas R$50,00/Ano!<br/>
                <br/><a href='?controller=Home&action=viewCarPt4&plano=Premium&pacote=Anual&anunRef=".$ID."'><h3>- Quero ser Premium e sair na frente! - </h3></a></h2>
                <br/>";

            }else{

               echo "<h2>Adcione imagens em seu anúncio.</h2>
                <form id='form' method='post'>
                    <div id='uploader'>
                    <p>
                        Seu navegador não tem suporte Flash, Silverlight ou HTML5.
                    </p>
                    </div>
                    <br/>
                    <input type='submit' value='Concluir' />
                </form>
                <div class='mensagem'>
                    <p>Você deve ter pelo menos um arquivo na fila.</p>
                    <button type='button'> fechar</button>
                </div>
         </div>";
	
	if($arrayImg[0]["imagem_localizacao"] != 'N'){
	       
		echo "<section class='secFoto'>
		<h3>Excluir fotos do anúncio.</h3>
		    <div id='galeria'>
		       <div id='refe'>
		          <ul>";

	   

		   for($cont = 0; $cont < count($arrayImg); $cont++){

                     echo  "<li>
                        <a href='?controller=Anuncio&action=imgEx&ref=".$arrayImg[$cont]["imagem_localizacao"]."'>
                            <img src='upload/anuncio-images/".$arrayImg[$cont]["imagem_localizacao"]."' alt='Descrição da foto' width='100' height='75' class='foto' />
                        </a>
                         <button type='button' class='lixo' value='?controller=Anuncio&action=imgEx&ref=".$arrayImg[$cont]["imagem_id"]."&id=".$_GET['id']."#galeria'></button>
                        <span class='fun'></span></li>";
                }

	   }
        
            

            }

    ?>
     

                  </ul>
                </div>
            </div>
            <div class='excluir'>
                <div>
                    <p>Realmente deseja excluir esta imagem?</p>
                    <div>
                <button type="button" value="Não" class="nao">Não</button> 
                        <a id="gan" href="#"><button type="button" value="Sim" class="sim">Sim</button></a>
                
                    </div>
                </div>
            </div>    
        </section>
        <!--fim div paiRodape-->
        </main>
    </div>
    </body>
    <!-- build:js js/index.min.js -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/efeito-foto.js"></script>
    <script src="js/revelaSenha.js"></script>
    <!-- endbuild -->

    <!-- <script src="view/assets/js/revelaBloco.js"></script> -->
    <!-- Código responsável pelo autocomplete-->
    <script src="view/assets/js/Assync/anuncioImpress.js"></script>
    <link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
    <script src="view/assets/js/jquery-ui.min.js"></script>
    <script src="view/assets/js/autocomplete.js"></script>
    <script  src="view/assets/js/loginDash.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
    <link href="view/assets/estilo/csss/jquery.ui.plupload.css" rel="stylesheet">
    <script src="/ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="/ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <!-- production -->
    <script src="view/assets/js/jss/plupload.full.min.js"></script>
    <script src="view/assets/js/jss/jquery.ui.plupload.js"></script>
    <!-- debug
    <script type="text/javascript" src="../../js/moxie.js"></script>
    <script type="text/javascript" src="../../js/plupload.dev.js"></script>
    <script type="text/javascript" src="../../js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
    -->
    <script src="view/assets/js/barraMenu.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('<div id="tela">'+
            '<div class="paiBut">'+
                '<button class="butF" type="button"></button>'+
            '</div>'+    
        '</div>')
            .insertAfter('#refe');
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

            $("#gan").attr("href", this.value);
         });
        });

    </script>
    <script type="text/javascript">

        var id = "<?php echo $ID; ?>";



        // Initialize the widget when the DOM is ready
        $(function() {
        $("#uploader").plupload({
            // General settings
            runtimes : 'html5,flash,silverlight,html4',
            url : '?controller=Anuncio&action=uploadAnuncioImagem&id='+ id,

            // User can upload no more then 20 files in one go (sets multiple_queues to false)
            max_file_count: 20,

            chunk_size: '1mb',

            // Resize images on clientside if we can
            resize : {
                width : 500,
                height : 500,
                quality : 90,
                crop: true // crop to exact dimensions
            },

            filters : {
                // Maximum file size
                max_file_size : '10mb',
                // Specify what files to browse for
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ]
            },

            // Rename files by clicking on their titles
            rename: true,

            // Sort files
            sortable: true,

            // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
            dragdrop: true,

            // Views to activate
            views: {
                list: true,
                thumbs: true, // Show thumbs
                active: 'thumbs'
            },

            // Flash settings
            flash_swf_url : 'js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url : 'js/Moxie.xap'
        });


        // Handle the case when form was submitted before uploading has finished
        $('#form').submit(function(e) {
            // Files in queue upload them first
            if ($('#uploader').plupload('getFiles').length > 0) {

                // When all files are uploaded submit form
                $('#uploader').on('complete', function() {
                    $('#form')[0].submit();
                });

                $('#uploader').plupload('start');
            } else {
                $('div.mensagem').fadeIn();
                $('div.fundoEscuro').show();
                $('div.mensagem').find('button').click(function(){
                    $('div.mensagem, div.fundoEscuro').hide();
                });
                $('div.fundoEscuro').click(function(){
                    $('div.mensagem').hide();
                });
            }
            return false; // Keep the form from submitting
        });
        });
    </script>
    </html>

    <?php

    /*
     * <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

        <title>Plupload - jQuery UI Widget</title>

        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
        <link href="view/assets/estilo/csss/jquery.ui.plupload.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
        <!-- production -->
        <script src="view/assets/js/jss/plupload.full.min.js"></script>
        <script src="view/assets/js/jss/jquery.ui.plupload.js"></script>
        <!-- debug
        <script type="text/javascript" src="../../js/moxie.js"></script>
        <script type="text/javascript" src="../../js/plupload.dev.js"></script>
        <script type="text/javascript" src="../../js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
        -->

    </head>
    <body style="font: 13px Verdana; background: #eee; color: #333">




    <form id="form" method="post" >
        <div id="uploader">
        <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
        </div>
        <br />
        <input type="submit" value="Submit" />
    </form>

    <script type="text/javascript">

    var id = "<?php echo $ID; ?>";



        // Initialize the widget when the DOM is ready
        $(function() {
        $("#uploader").plupload({
            // General settings
            runtimes : 'html5,flash,silverlight,html4',
            url : '?controller=Anuncio&action=uploadAnuncioImagem&id='+ id,

            // User can upload no more then 20 files in one go (sets multiple_queues to false)
            max_file_count: 20,

            chunk_size: '1mb',

            // Resize images on clientside if we can
            resize : {
                width : 500,
                height : 500,
                quality : 90,
                crop: true // crop to exact dimensions
            },

            filters : {
                // Maximum file size
                max_file_size : '1000mb',
                // Specify what files to browse for
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ]
            },

            // Rename files by clicking on their titles
            rename: true,

            // Sort files
            sortable: true,

            // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
            dragdrop: true,

            // Views to activate
            views: {
                list: true,
                thumbs: true, // Show thumbs
                active: 'thumbs'
            },

            // Flash settings
            flash_swf_url : 'js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url : 'js/Moxie.xap'
        });


        // Handle the case when form was submitted before uploading has finished
        $('#form').submit(function(e) {
            // Files in queue upload them first
            if ($('#uploader').plupload('getFiles').length > 0) {

                // When all files are uploaded submit form
                $('#uploader').on('complete', function() {
                    $('#form')[0].submit();
                });

                $('#uploader').plupload('start');
            } else {
                alert("You must have at least one file in the queue.");
            }
            return false; // Keep the form from submitting
        });
        });
    </script>
    </body>
    </html>

     */

    ?>
