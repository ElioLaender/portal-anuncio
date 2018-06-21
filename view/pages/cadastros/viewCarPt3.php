<!DOCTYPE html>
<html>
 <head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Semprenegócio Anuncios.">
    <meta name="keywords" content="Carrinho semprenegócio, realizar compra.">
    <title>SempreNegócio - Cadastre seu anuncio</title>
    <base href="http://www.semprenegocio.com.br/" target="">
    <link rel="icon" href="imagens/flor.png">
    <link href='/view/assets/estilo/formAnun.css' rel='stylesheet'>
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/barraMenu.css" rel="stylesheet">
    <link href="view/assets/estilo/dashboard.css" rel="stylesheet">
    <link href="view/assets/estilo/fotoUsu.css" rel="stylesheet">
    <link href="view/assets/estilo/configuraCheckbox.css" rel="stylesheet">
    <link href='/view/assets/estilo//viewFolha.css' rel='stylesheet'>
    <link href='/view/assets/estilo/breackFolha.css' rel='stylesheet'>
    <link href="view/assets/estilo/breackDasBoard.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackBarraMenu.css" rel="stylesheet">
    <link href='/view/assets/estilo/breackFormAnun.css' rel='stylesheet'>
<style>

.alerta{
color:red;
}

.libe{
color: green;
}


</style>
</head>
<body>

    <?php

    require_once "dao/AccessObject/ClienteDAO.php";

    $objCli = new ClienteDAO();

        if(isset($arrayFace)){
            $arrayUser[0]['cli_nome'] = $arrayFace['name'];
             $arrayUser[0]['cli_email'] = $arrayFace['email'];
             $arrayUser[0]['cli_id'] = $objCli->returnIdUserFace($arrayFace['id']);
        }

	if(isset($_POST['plano']) && isset($_POST['pacote'])){

		$plano = $_POST['plano'];
		$pacote = $_POST['pacote'];

	} else {

	        $plano = $_GET['plano'];
		$pacote = $_GET['pacote'];
	}

	$back = "carrinho-parte-um/".$plano."/".$pacote;

	
	#seta as variáveis de acordo com o plano especificado.
	if($plano == "Grátis"){

		$pctAlert = " (Apenas Premium)";
		$inputCtrl = " disabled";
	} else {
		$pctAlert = "";
		$inputCtrl = "";
	}

     ?>
<div class="tudo">
        <header>
            <h1 class="sumir">Cadastre seu anúncio</h1>
            <ul>
                <li> <a href="<?php echo $back; ?>">Voltar</a> </li>
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
		<?php 
			if($plano == "Grátis"){

		       echo "<li>
		               <p>Criar Anúncio</p>
		            </li>
			     <li>
		                <p>Painel</p>
		            </li>";

			} else {

			   echo "<li>
		               <p>Criar Anúncio</p>
		            </li>
		            <li>
		                <p>Pagamento</p>
		            </li>
		            <li>
		                <p>Confirmação</p>
		            </li>";

			}
                       
		?>
                </ul>
            </div>
        </header>
    <div class="paiS"> 
        <section> 
            <h2 class="sumir">Publicar novo anúncio !</h2> 
            <div class="buscaCep">
                <button type="button" id="fechaFram" value="fechar">Fechar Janela</button>
                <iframe src="http://m.correios.com.br/movel/buscaCep.do" name="janela" id="frame"></iframe>
                </div>
            <div class="fundoAzul"></div>

            <div class="paiF"> 
                <input type="hidden" name="MAX_FILE_SIZE" value="1024000" /> 
                <form  id="fileupload" name="formAnuncio" action="?controller=Anuncio&action=insertAnuncio" method="post" enctype="multipart/form-data"> 
                    <fieldset> 
                        <legend class="sumir">Preencher formulário</legend> 

                        <fieldset class="PaiEnder"> 
                            <legend>Preencher dados da empresa</legend> 

                            <fieldset> 
                                <legend class="sumir">Título/Endereço</legend> 

                                <label for="tLog">Título do anúncio  
                                    <input type="text" id="tLog" name="titulo" class="required"  minlength="3">
				 <div id='ret'></div>
				 <span></span>
                                    </label> 

                                <label for="bairro">Bairro: 
                                    <input type="text" id="bairro" name="bairro" class="required" title="Bairro" minlength="3"> 
				     <span></span>
                                    </label> 

                                <label for="cep">Cep: 
                                    <input type="text" id="cep" name="cep" class="cep" class="required cep" title="Informe seu cep, ex: 35500-002" maxlength="9"> 
				    <span><span>
                                    </label> 
                                <button type="button" id="buttonBus" value="buscar por cep." >Não sei meu cep !</button>

                                <label for="rua">Rua: 
                                    <input type="text" id="rua" name="rua" title="Nome da rua" class="required" minlength="3"> 
				     <span></span>
                                    </label> 
                                <label for="numero">número: 
                                    <input type="number" id="numero" class="required numeric" name="numero"  title="Número da residencia" min="1" max="1000000"> 
				    <span></span>
                                    </label> 
                                </fieldset> 

                            <fieldset> 
                                <legend>Complemento</legend> 
                                <select name="cComplemento"> 
                                    <optgroup label="Complemento"></optgroup> 
                                     <option value="Casa">Casa</option> 
                                     <option value="Apartamento">Apartamento</option> 
                                     <option value="Galpao">Galpão</option>
				     <option value="Loja">Loja</option>  
                                     <option value="Sala">Sala</option> 
                                     <option value="Fundos">Fundos</option> 
                                     <option value="Condominio">Condomínio</option> 
                                     <option value="Outros">Outros</option> 
                                    </select> 
                                <label for="numCom">Nº complemento 
                                    <input type="number" id="numCom" name="numCom" title="Número do apartamento" class="numeric" min="1" max="1000000"> 
                                     </label> 
                                 <label for="cidade">Cidade 
                                     <input type="text" id="cidade" name="cidade" class="required" title="Cidade onde reside, ex:Divinópolis"> 
                                     </label> 
                                 <label for="estado">Estado 
                                     <input type="text" id="estado" class="required" name="uf"  title="ex:MG"> 
                                     </label> 
                                </fieldset> 
                            </fieldset> 

                        <fieldset class="paiCont"> 
                            <legend class="sumir">Formas de contato</legend> 
                             <fieldset> 
                                <legend class="sumir"> seus contatos</legend>
                                <fieldset> 
                                    <legend>Contatos</legend> 
                                    <label for="tLo">Email 
                                        <input type="text" id="tLo" name="email" class="required email efeitoL" title="expressahost@outlook.com"> 
					<span></span>
                                         </label> 
                                    <label for="tel-fixo">Tel-01 
                                        <input type="text" id="tel-fix" name="tel-fixo" class="required"  maxlength="12">
					 <span></span>
                                        </label> 
                                    <label for="tel-cel">Tel-02 
                                        <input type="text" id="tel-ce" name="tel-cel"  maxlength="12"> 
					 <span></span>
                                        </label> 
                                    <label for="tel-whatapp">Whatsapp 
                                        <input type="text" class="tel-cel" id="tel-whatapp" name="tel-whats" maxlength="12"> 
					 <span></span>
                                        </label> 
                                    </fieldset> 

                                <fieldset class="revelar"> 
                                     <legend class="sumir">Adicione redes sociais</legend> 
                                    <button type="button">Adicione redes sociais</button> 
                                    </fieldset> 


                                <fieldset class="redes"> 
                                    <legend>Redes sociais</legend> 

                                     <label for="site">Website da empresa: 
                                        <input type="text" id="site" name="site" title="Ex: www.expressahost.com.br">
					 <span></span>
                                         </label> 
                                    <label for="youtube">Video do Youtube <?php echo $pctAlert; ?>
                                        <input type="text" id="youtube" name="youtube" <?php echo $inputCtrl; ?>> 
					 <span></span>
                                        </label> 
                                    <label for="face">Facebook 
                                        <input type="text" id="face" name="facebook"> 
					 <span></span>
                                        </label> 
                                    <label for="Twitter">Twitter 
                                        <input type="text" id="Twitter" name="twitter"> 
					 <span></span>
                                         </label> 
                                     <label for="Linkedin">Linkedin 
                                        <input type="text" id="Linkedin" name="linkedin"> 
					 <span></span>
                                        </label> 
                                    <label for="lattes">Lattes 
                                          <input type="text" id="lattes" name="lattes"> 
					  <span></span>
                                         </label> 
                                     </fieldset> 
                                 </fieldset> 
                            </fieldset> 

                        <fieldset class="categoria"> 
                            <legend>Informe sua categoria</legend> 
                            <fieldset> 
                                 <legend class="sumir">Ver dica</legend> 
                                 <button type="button" id="dicaUm">Dica importante!</button> 
                                 <p>
                                     <button type="button" class="fec">fechar</button> 
                                     As buscas são feitas por palavras chaves, sua categoria é uma, fique atento ao escolher, 
                                     tente encontrar a categoria que melhor se enquadre á empresa. 
                                    </p> 
                          <p> No campo abaixo, escreva palavras que identifiquem com seu negócio.<br />Essas são utilizadas nas pesquisas, aconselhamos  que escolha até 7 palvras chaves para seu anúncio. 
                                    </p> 
				
                                <div id="categ"></div> 
                                </fieldset> 
				
                            <fieldset> 
                                <legend class="sumir">Palavras chaves de seu anúncio</legend> 
				
                                 <label for="te">Palavras chaves 
                                    <textarea id="te" name="brevDes" rows="4" cols="35" maxlength="100"></textarea> 
                                     </label> 
				
                                 </fieldset> 
                            </fieldset> 
				
                        <fieldset class="saud"> 
                             <legend>Planos de saúde aceitos</legend> 
				
                             <label for="cUni">Unimed 
                                 <input type="checkbox" id="cUni" name="planos[]" value="unimed"> 
                                 <span></span></label> 
				
                            <label for="cSaudVid">Saúde Vida 
                                 <input type="checkbox" id="cSaudVid" name="planos[]" value="saudeVida"> 
                                 <span></span></label> 
				
                            <label for="cPronto">Prontomed 
                                 <input type="checkbox" id="cPronto" name="planos[]" value="prontomed"> 
                                 <span></span></label> 
				
                            <label for="cPromed">Promed 
                                 <input type="checkbox" id="cPromed" name="planos[]" value="promed"> 
                                 <span></span></label> 
				
                            <label for="cOutrosPla">Outros 
                                 <input type="checkbox" id="cOutrosPla" name="planos[]" value="outros"> 
                                 <span></span></label> 
                            </fieldset> 

                        <fieldset class="desc"> 
                            <legend>Descrição</legend> 

                             <p class="textDica"> 
                                 Faça uma descrição completa de sua empresa, caso queira inclua números de telefones complementares.<br> 
                                 </p> 
                             <label for="text">Descrição do Anúncio 
                                <textarea id="text" name="descricao" class="required" rows="4" cols="35" minlength="5" maxlength="2000"></textarea> 
				<span></span>
                                 </label> 
                            </fieldset> 

                        <fieldset  class="diasFunc"> 
                            <legend class="sumir">Dias de funcionamento</legend> 
                            <!-- será gerado dinamicamente o código do fieldset responsável por exibir o select das categoria --> 
                            <fieldset> 
                                <legend class="sumir">Horário e dias de funcionamento</legend> 
                                <fieldset class="dias"> 
                                    <legend>Dias de funcionamento</legend> 
                                    <span class="cli">Click na semana para validar seu horário</span>

                                    <label for="diasUm">Segunda a Sexta 
                                         <input type="checkbox" id="diasUm" name="dias_expediente" value="Segunda à Sexta" > 
                                        <span></span> 
                                        </label> 

                                     <label for="diasDois">Sábado 
                                         <input type="checkbox" id="diasDois" name="dias_expediente" value="Sábado"> 
                                         <span></span> 
                                        </label> 

                                    <label for="diasTres">Domingo 
                                        <input type="checkbox" id="diasTres" name="dias_expediente" value="Domingo"> 
                                        <span></span> 
                                         </label> 
                                    </fieldset> 

                                <fieldset class="horas"> 
                                    <legend class="sumir">Horários</legend> 
                                    <!-- será impresso o option de horário dinâmicamente --> 
                                    <fieldset id="semana"> 
                                        <legend>segunda a sexta</legend> 
                                        </fieldset> 
                                    <!-- Sabado --> 
                                    <fieldset id="sabado"> 
                                        <legend>segunda a sábado</legend> 
                                        </fieldset> 
                                    <!-- Domingo --> 
                                    <fieldset id="domingo"> 
                                         <legend>segunda a domingo</legend> 
                                        </fieldset> 
                                    </fieldset> 
                                </fieldset> 
                            </fieldset> 

                        <fieldset class="receb"> 
                            <legend class="sumir">Modo de recebimento</legend> 
                            <fieldset> 
                                <legend class="sumir">Modos de pagamento</legend> 
                                <fieldset class="paga"> 
                                    <legend>Escolha modo de pagamento da sua empresa.</legend> 

                                    <label for="tod">Marcar todos 
                                        <input type="checkbox" id="tod" name="forma-pag[]" value="todos"> 
                                        <span></span></label> 

                                    <label for="bol">Boleto Bancário 
                                        <input type="checkbox" id="bol" name="forma-pag[]" value="boleto"> 
                                        <span></span></label> 

                                    <label for="cr"> Crédito 
                                        <input type="checkbox" id="cr" name="forma-pag[]" value="credito"> 
                                        <span></span></label> 

                                    <label for="de"> Débito 
                                        <input type="checkbox" id="de" name="forma-pag[]" value="débito">Débito 
                                        <span></span></label> 

                                    <label for="val">Vale Alimentação 
                                        <input type="checkbox" id="val" name="forma-pag[]" value="vale alimentação"> 
                                        <span></span></label> 

                                    <label for="ch">Cheque 
                                        <input type="checkbox" id="ch" name="forma-pag[]" value="cheque"> 
                                        <span></span></label> 

                                    <label for="di">Dinheiro 
                                        <input type="checkbox" id="di" checked name="forma-pag[]" value="dinheiro"> 
                                        <span></span></label> 

                                    <label for="ou">Outros 
                                        <input type="checkbox" id="ou" name="forma-pag[]" value="outrosFormPag"> 
                                        <span></span></label> 
                                    </fieldset> 

                                <fieldset class="band"> 
                                    <legend>Quais bandeiras são aceitas?</legend> 

                                    <label for="todos">Marcar todos 
                                        <input type="checkbox" id="todos"  name="forma-pag[]" value="todos"> 
                                        <span></span></label> 

                                    <label for="master">Master card 
                                        <input type="checkbox" id="master" name="forma-pag[]" value="master"> 
                                        <span></span></label> 

                                    <label for="visa">Visa electron 
                                        <input type="checkbox" id="visa" name="forma-pag[]" value="visa"> 
                                        <span></span></label> 

                                    <label for="ameri">American express 
                                        <input type="checkbox" id="ameri" name="forma-pag[]" value="american express"> 
                                        <span></span></label> 

                                    <label for="diner">Diner club int. 
                                        <input type="checkbox" id="diner" name="forma-pag[]" value="diner club internacional"> 
                                        <span></span></label> 

                                    <label for="elo">Elo 
                                        <input type="checkbox" id="elo" name="forma-pag[]" value="elo"> 
                                        <span></span></label> 

                                    <label for="pags">Pagseguro 
                                        <input type="checkbox" id="pags" name="forma-pag[]" value="pagseguro"> 
                                        <span></span></label> 

                                    <label for="pay">Pay pal 
                                        <input type="checkbox" id="pay" name="forma-pag[]" value="pay pal"> 
                                        <span></span></label> 

                                    <label for="mer">Mercado Pago 
                                        <input type="checkbox" id="mer" name="forma-pag[]" value="mercado pago"> 
                                        <span></span></label> 

                                    <label for="sod">Sodexo 
                                        <input type="checkbox" id="sod" name="forma-pag[]" value="sodexo"> 
                                        <span></span></label> 

                                    <label for="tick">Ticket restaurant 
                                        <input type="checkbox" id="tick" name="forma-pag[]" value="ticket restaurant"> 
                                        <span></span></label> 

                                    <label for="outr">Outros 
                                        <input type="checkbox" id="outr" name="forma-pag[]" value="outrosBand"> 
                                        <span></span></label> 
                                    </fieldset> 
                                </fieldset> 
                            </fieldset> 

                        <fieldset class="paifacil"> 
                            <legend>Facilidades oferecidas</legend> 
                            <fieldset> 
                                <legend class="sumir">Oque a empresa oferece</legend> 

                                <label for="criancas">Espaço para crianças 
                                    <input type="checkbox" id="criancas" name="facilidades[]" value="criancas"> 
                                    <span></span></label> 

                                <label for="cEstac">Estacionamento 
                                    <input type="checkbox" id="cEstac" name="facilidades[]" value="estacionamento"> 
                                    <span></span></label> 

                                <label for="cSegur">Segurança 
                                    <input type="checkbox" id="cSegur" name="facilidades[]" value="seguranca"> 
                                    <span></span></label> 

                                <label for="cCader">Acesso para caderantes 
                                    <input type="checkbox" id="cCader" name="facilidades[]" value="acessibilidades"> 
                                    <span></span></label> 

                                <label for="cAr">Ar condicionado 
                                    <input type="checkbox" id="cAr" name="facilidades[]" value="arCondicionado"> 
                                    <span></span></label> 
                                </fieldset> 
                            <fieldset> 
                                <legend class="sumir">Oque a empresa oferece</legend> 

                                <label for="cWifi">Wi-fi 
                                    <input type="checkbox" id="cWifi" name="facilidades[]" value="wifi"> 
                                    <span></span></label> 

                                <label for="cReserv">Necessita de reservas 
                                    <input type="checkbox" id="cReserv" name="facilidades[]" value="reserva"> 
                                    <span></span></label> 

                                <label for="cAnim">Permite animais 
                                    <input type="checkbox" id="cAnim" name="facilidades[]" value="animais"> 
                                    <span></span></label> 

                                <label for="cCupon">Cupons de desconto sempreNegócio 
                                    <input type="checkbox" id="cCupon" name="facilidades[]" value="cupons"> 
                                    <span></span></label> 

                                <label for="delivery">Delivery (entrega) 
                                    <input type="checkbox" id="delivery" name="facilidades[]" value="delivery"> 
                                    <span></span></label> 

                                </fieldset> 
                            </fieldset> 

                        <fieldset class="fo">
                            <legend class="legenP">Insira foto do Anúncio</legend>

                            <input type="file" name="img" id="image-upload" class="inputfile">
                            <label for="image-upload">
                                <span class="spanImg">carregar foto</span>
                                </label>
                            <div class="paiFoto">
                                <div id="image-pre/view"></div>
                                </div>

                            <button id="ex" type="button" class="excl">Excluir</button>
                            </fieldset>

                        <div class="err">
                             <p id="te">Arquivo não suportado !</p>
                            <button type="button"></button>
                         </div>
			<input type="hidden" name="pacote" value="<?php echo $pacote; ?>">
                        <input type="hidden" name="plano" value="<?php echo $plano; ?>">
                        <div class="butCad"> 
                            <input id="subirCur" class="sub validate" type="submit" name="cFinaliza" value="Cadastrar anúncio !" > 
                        </div> 
                        <!-- fecha a fieldset principal --> 
                        </fieldset> 

                    <!-- Aqui fecho o fieldset principal--> 
                    </form> 
                </div> 
            </section> 
        </div> 
    <!-- fecha o divi pai section--> 
    </div>

</body>


<script  src="view/assets/js/jquery-1.11.3.min.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>


<script src='view/assets/js/efeitoLabel.js'></script>
<script src="view/assets/js/barraMenu.js"></script>
<script src="view/assets/js/revelaSenha.js"></script>
<script src="view/assets/js/sumirBloco.js"></script>
<script src='view/assets/js/jsAnuA.js'></script>
<script src='view/assets/js/verifAnun.js'></script>
<script src='view/assets/js/veriCur.js'></script>

<script src="view/assets/js/gif.js"></script>
<!-- endbuild -->
<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>

<script src='view/assets/js/jquery.mask.min.js'></script>
<script src='view/assets/js/modernizr.custom.js'></script>
<script src='view/assets/js/efeito-foto.js'></script>
<script src='view/assets/js//viewFoto.js'></script>
<script src='view/assets/js/custom-file-input.js'></script>
<script src='view/assets/js/cep.js'></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src='view/assets/js/checkAnunc.js'></script>
<script src='view/assets/js/formAn.js'></script>  
<script src='view/assets/js/titleVeriry.js'></script>
<script src="view/assets/js/jquery.validate.js"></script>
<script type='text/javascript'>

    $(document).ready(function() {

    $.uploadPre/view({
    input_field: '#image-upload',   // Default: .image-upload
    pre/view_box: '#image-pre/view',  // Default: .image-pre/view
    label_field: '#image-label',    // Default: .image-label
    label_default: '#Choose File',  // Default: Choose File
    label_selected: '#Change File', // Default: Change File
    no_label: false                 // Default: false
    });
    });

    </script>

  <script>



//////////

    $('#semana').html(geraOptionHorario('semIni','semTer','horario_func_semana_inicio','horario_func_semana_termino','Horário de funcionamento',""));
    $('#sabado').html(geraOptionHorario('sabIni','sabTer','horario_func_sabado_inicio','horario_func_sabado_termino','Funcionamento no sábado',""));
    $('#domingo').html(geraOptionHorario('domIni','domTer','horario_func_domingo_inicio','horario_func_domingo_termino','Funcionamento no domingo', ""));
    $('#categ').html(geraOptionCat('anuncio'));

	
	

    </script>




</html>
