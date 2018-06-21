<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Semprenegócio Anuncios.">
    <meta name="keywords" content="Carrinho semprenegócio, realizar compra.">
    <link rel="icon" href="view/assets/imagens/flor.png">
    <title>carrinho semprenegócio pacotes</title>
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/planos.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackPlanos.css" rel="stylesheet">
    <!-- endbuild -->
</head>
<body>
    <div class="tudo">
        <header>
            <h1 class="sumir">Escolha seu pacote e garanta sua presença online</h1>
            <ul>
                <li> <a href="anuncie/">Voltar</a> </li>
            </ul>
            <figure> <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio"> </figure>
            <p>Garantindo sua presença online.</p>
            <div>
                <ul>
                    <li>
                        <p>Carrinho</p>
                    </li>
                    <li>
                        <p>Identificação</p>
                    </li>
                    <li>
                        <p>Criar Anúncio</p>
                    </li>
                    <li>
                        <p>Pagamento</p>
                    </li>
                    <li>
                        <p>Confirmação</p>
                    </li>
                </ul>
            </div>
        </header>
        <div class="escuro"></div>
        <main>
           <?php

		if(isset($_POST['pacote']) && !empty($_POST['pacote'])){
			$pacote = $_POST['pacote'];
		}else if(isset($_GET['pacote']) && !empty($_GET['pacote'])){
			$pacote = $_GET['pacote'];
		}

		if(isset($_POST['plano']) && !empty($_POST['plano'])){
			$plano = $_POST['plano'];
		}else if(isset($_GET['plano']) && !empty($_GET['plano'])){
			$plano = $_GET['plano'];
		}


			if($pacote != '0' && $pacote != '1' && $pacote != '2'){
	
			if($plano == "Premium"){

						$pacote = "Anual";
					    	$valor = "60,00";

					} else {

						$pacote = "Anual";
					    	$valor = "0,00";

					}

			} else {


		      switch($pacote){
			    case 0:
				if($plano == "Premium"){
				    $pacote = "Anual";
				    $valor = "60,00";
				} else {
				    $pacote = "Anual";
				    $valor = "60,00";
				}
				;break;
			    case 1:
				if($plano == "Premium"){
				    $pacote = "Semestral";
				    $valor = "112,80";
				} else {
				    $pacote = "Semestral";
				    $valor = "302,50";
				};break;
			    case 2:
				if($plano == "Premium"){
				      $pacote = "Anual";
				    $valor = "60,00";
				} else if($plano == "Premium Plus"){
				    $pacote = "Anual";
				    $valor = "60,00";
				}else if($plano == "Básico") {
			   	    $pacote = "Anual";
				    $valor = "60,00";
			}else{
		
			   	    $pacote = "Anual";
				    $valor = "0,00";
			};break;




			}

		}
 ?>
            <div>
                <section>
                    <h2>Meu Carrinho</h2>
                    <form action="/carrinho-parte-tres/" method="post">
                        <div class='contValor'>
                            <p>Plano Selecionado</p>
                            <ul>
                                <li>
                                    <figure> <img class="imagem" src="view/assets/imagens/responsiv@1x.png" alt="motior,celular representando site responsivo."> </figure>
                                </li>
                                <li class='blo'>
                                    <p>Anúncio SempreNegócio</p>
                                    <p class="pls">Plano <strong><?php echo $plano; ?> / <?php echo $pacote; ?></strong></p>
                                    <p>R$<strong><?php echo $valor; ?></strong></p>
                                </li>
                                <li>
                                    <p>Total<strong><?php echo $valor; ?></strong></p>
                                </li> <input type="hidden" name="plano" value="<?php echo $plano; ?>"> <input type="hidden" name="pacote" value="<?php echo $pacote; ?>">
                                <li class='continuar'> <input type="submit" value="Continuar"> </li>
                            </ul>
                        </div>
                    </form>
                    <div class='alterar'>
                        <h2>Alterar plano</h2>
                     
                        <div class="basico">
                            <form action="/carrinho-parte-tres/" method="post">
                                <h3>Premium</h3>
                                <figure> <img src="view/assets/imagens/responsiv@2x.png" alt='motior,celular representando site responsivo.'> </figure>
                                <div>
                                    <div>
                                        <p><span>R$</span>60,00<span>/ano</span></p>
                                        <p>Contrate Já</p>
                                    </div>
                                </div> 
                                <select name="pacote"> 
                                <option value="Anual">Anual</option> 
                                </select> 
                                <button type="button" class='butAlt'>Alterar Plano</button>
                                <div class="alterado">
                                    <p>Seu plano foi alterado com sucesso !</p> <input type="hidden" value="Premium" name="plano">
                                    <ul>
                                        <li> <input type="submit" value="Próximo passo"> </li>
                                    </ul> <button type="button" class='can'>Cancelar</button> </div>
                            </form>
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
                                <legend>Cadastre e receba novidades da sua região</legend> <label for="prom"> <input type="email" id="prom" name="prom" placeholder="Insira seu E-mail" maxlength="25" required title="Insira seu e-mail"> </label> <label for="cadatroEm"> <input type="submit" class="prevenir" id="cadatroEm" name="cadatroEm" value="Receber"> </label> </fieldset>
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
                        <figure> <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, SempreNegócio"> </figure>
                    </div>
                </footer>
            </div>
            <!-- fim div paiRodape -->
        </main>
    </div>
</body>
    <script src="view/assets/js/jquery-1.11.3.min.js"></script>
    <script src="view/assets/js/valorBan.js"></script>
    <script src="view/assets/js/Assync/anuncioImpress.js"></script>
    <script src="view/assets/js/car01.js"></script>
    
   <!-- <script src="view/assets/js/revelaBloco.js"></script> -->
    <!-- endbuild -->
    <!--os dois abaixo eh suporte para medias queries e html5-->
    <!-- [If lt IE 9]>
         <script  src = "js/html5shiv.js"> </ script>
         <script  src="js/css3-mediaqueries.js"></script>
    <[endif]-->
</html>

