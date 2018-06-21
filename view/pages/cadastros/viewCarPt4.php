<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <meta name="description" content="Semprenegócio Anuncios.">
    <meta name="keywords" content="Carrinho semprenegócio, realizar compra.">
    <link rel="icon" href="view/assets/imagens/flor.png">
    <title>carrinho semprenegócio Identificação</title>
    <!-- Custom divfacil -->
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/planos.css" rel="stylesheet">
    <link href="view/assets/estilo/pagamento.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackPlanos.css" rel="stylesheet">
</head>
<body>
<?php

	if(isset($_POST['plano']) && isset($_POST['pacote']) && isset($_POST['anunRef'])){

		$plano = $_POST['plano'];
		$pacote = $_POST['pacote'];
                $anunRef = $_POST['anunRef'];

	} else {

	        $plano = $_GET['plano'];
		$pacote = $_GET['pacote'];
                $anunRef = $_GET['anunRef'];
	}



?>



<div class="tudo">
    <header>
        <h1 class="sumir">Preencha seus dados para pagamento</h1>
        <ul>
            <li>
                <a href="painel-de-controle">Cancelar e voltar ao Painel</a>
            </li>
        </ul>
        <figure>
            <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio">
        </figure>
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
      <div>
        <section>
             <h2 class="sumir">Pagamento</h2>
                <form action="?controller=Pagamento&action=checkOutPay" method="post"> 
                   <fieldset>
                       <legend>Insira seus dados aqui</legend>
                        <label for="name" id='nomePg'>Nome completo:</label>
                        <input type="text" id="name" name="name">

                        <label for="email" id="emailPg">Email:</label>
                        <input type="email" id="email" name="email">

                        <label for="ddd" id="dddPg">DDD: (Apenas 2 digitos, ex: 37)</label>
                        <input type="text" id="ddd" name="ddd" maxlength="2" size="2">

                        <label for="tel">Tel: (Apenas digitos, ex: 991192233)</label>
                        <input type="text" id="tel"  name="tel" axlength="9" size="9">

                        <label for="cpf" id="cpfId">CPF:</label>
                        <input type="text" id="cpf" name="cpf">
			<input type="hidden" name="anunRef" value="<?php echo $anunRef; ?>">
                        <input type="hidden" name="pacote" value="<?php echo $pacote; ?>">
                        <input type="hidden" name="plano" value="<?php echo $plano; ?>">

                        <input type="submit" value="Quero contratar">
                   </fieldset> 
                </form>
          </section>
      </div> 
    </main>
  </div>           
</body>

<script  src="view/assets/js/jquery-1.11.3.min.js"></script>
<script  src="view/assets/js/modernizr.custom.js"></script>

<!-- build:js js/index.min.js -->
<script src='view/assets/js/jquery.mask.min.js'></script>
<script src="view/assets/js/efeito-foto.js"></script>
<script src="view/assets/js/efeitoLabel.js"></script>
<script src="view/assets/js/revelaSenha.js"></script>
<script src="view/assets/js/preventSubmit.js"></script>
<script src="view/assets/js/carrinho.js"></script>
<script src="view/assets/js/Assync/anuncioImpress.js"></script>
<!-- endbuild -->

<!--os dois abaixo eh suporte para medias queries e html5-->
<!-- [If lt IE 9]>
     <script  src = "js/html5shiv.js"> </ script>
     <script  src="js/css3-mediaqueries.js"></script>
<[endif]-->
<!-- Código responsável pelo autocomplete-->
<link rel="stylesheet" href="view/assets/estilo/jquery-ui.css">
<script src="view/assets/js/jquery-ui.min.js"></script>
<script src="view/assets/js/autocomplete.js"></script>

<script>

 $('#ddd').mask('99');
 $('#tel').mask('99999-9999');
 $('#cpf').mask('999.999.999-99');

	$('form').submit(function(){
		
		var nome  =  $('#name').val();
		var email =  $('#email').val();
		var ddd   =  $('#ddd').val();
		var tel   =  $('#tel').val();
		var cpf   =  $('#cpf').val();

		tel = tel.replace("-", "");

		//alert(tel);
		
		var er = /[a-z]\s[a-z]/gim;

		if(er.test(nome)){
		  $("#nomePg").html("Nome válido.");
 		} else{
	
		$("#nomePg").html("* Favor, informe o nome completo.");
		return false;

	 	}

		if(!emailValidate(email)){
		$("#emailPg").html("* Email inválido.");
		return false;
		} else {
		$("#emailPg").html("Email válido");
		}

		  var nan = new RegExp(/(^-?\d\d*\d*$)|(^-?\d\d*$)|(^-?\d\d*$)/);

		

		if(ddd == "" || ddd.length > 2 || ddd.length < 2){
			$("#dddPg").html("* Favor, informe um numero contendo 2 digitos conforme ex: 37");
			return false;
		} else if(!nan.test(ddd)) {
			$("#dddPg").html("* Permitido somente numeros em dois digitos, ex: 37");
			return false;
		}else {
			$("#dddPg").html("DDD válido");
		}


		if(cpf == "" || cpf.length < 14 || cpf.length > 14 ){

			$("#cpfId").html("* O CPF deve ser preenchido corretamente");
			return false;
		}else if(!validaCPF(cpf)){

			$("#cpfId").html("* Este NÃO é um cpf válido");
                        return false;

		} else {
			$("#cpfId").html("* CPF Válido");
			
				
		}


	});




</script>


<script>





	

   function validaCPF(cpf)
  {



	var cpf  = cpf.replace('.', '');
	    cpf  = cpf.replace('.', '');
            cpf  = cpf.replace('-', '');

    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11)
          return false;
    for (i = 0; i < cpf.length - 1; i++)
          if (cpf.charAt(i) != cpf.charAt(i + 1))
                {
                digitos_iguais = 0;
                break;
                }
    if (!digitos_iguais)
          {
          numeros = cpf.substring(0,9);
          digitos = cpf.substring(9);
          soma = 0;
          for (i = 10; i > 1; i--)
                soma += numeros.charAt(10 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(0))
                return false;
          numeros = cpf.substring(0,10);
          soma = 0;
          for (i = 11; i > 1; i--)
                soma += numeros.charAt(11 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(1))
                return false;
          return true;
          }
    else
        return false;
  }




</script>



</html>
