<?php
if($_GET['transaction_id'] == ""){
	header("location: /home/");
}
 ?>
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
    <title>Compra confirmada com sucesso</title>
    <!-- Custom divfacil -->
    <!-- build:css css/index.min.css -->
    <link href="view/assets/estilo/reset.css" rel="stylesheet">
    <link href="view/assets/estilo/index.css" rel="stylesheet">
    <link href="view/assets/estilo/planos.css" rel="stylesheet">
    <link href="view/assets/estilo/confirmado.css" rel="stylesheet">
    <link href="view/assets/estilo/breakReset.css" rel="stylesheet">
    <link href="view/assets/estilo/breakIndex.css" rel="stylesheet">
    <link href="view/assets/estilo/breackPlanos.css" rel="stylesheet">
   
</head>
<body>
  <div class="tudo">
    <header>
        <h1 class="sumir">Parabéns, sua empresa embreve estará online!</h1>
        <ul>
            <li>
                <a href="home/">Voltar a página inicial</a>
            </li>
        </ul>
        <figure>
            <img src="view/assets/imagens/logo@1x.png" alt="logo com escrito, sempre negócio">
        </figure>
        <p>Sua presença online foi garantida!</p>
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
        <section>
            <h2>Retorno de transação ok ;)</h2>
            <p>Sua contratação foi efetuada com sucesso.</p>
            <p>Estamos aguardando a confirmação do pagamento.</p>
            <!-- p>Status de pagamento: </p -->
	    <p><a href="painel-de-controle/" style="color: blue;">- Ir para o painel de controle -</a></p>
        </section>
    </main>
  </div>         
</body>
    <script src="view/assets/js/jquery-1.11.3.min.js"></script>
    <script src="view/assets/js/modernizr.custom.js"></script>
<!-- build:js js/index.min.js -->
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
