<!DOCTYPE html>
<html>
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SempreNegócio soluções inteligentes">
    <base href="http://www.semprenegocio.com.br/" target="">
    <meta name="keywords" content="Descontos, cupons, cupons de descontos, economizar, Sempre Negócio, sempre negócio, semprenegocio.com.br, semprenegocio.com">
    <base href="http://www.semprenegocio.com.br/" target="">
    <link rel="icon" href="/view/assets/imagens/flor.png">
    <title>Sempre Negócio - Cupon de desconto <?php echo $description[0]['cupon_desconto_titulo']; ?></title>
    <meta name="description" content="<?php echo $description[0]['cupon_desconto_descricao']; ?>">
    <link href="/view/assets/estilo/reset.css" rel="stylesheet">
    <link href="/view/assets/estilo/index.css" rel="stylesheet">
    <link href="/view/assets/estilo/painelCupon.css" rel="stylesheet">
</head>
<body>
<header>
    <h1 class='sumir'>Cupons SempreNegócio</h1>
    <h1> <img style='display:none;' href='<?php echo $description[0]['cupon_desconto_img']; ?>'> </h1>  
    <ul>
        <li>
            <a href="/descontos/">Voltar</a>
        </li>
    </ul>
    <p>Cupons de desconto</p>
    <figure>
        <img style='' src='/view/assets/imagens/logo@1x.png' alt="Imagen do cupon">
    </figure>
</header>
<div class="fundo"></div>
<section class='sectCupon'>
    <h2 class="sumir">Descontos</h2>
    <div id="cuponCompleto"></div>
</section>
</body>

<script src="/view/assets/js/Assync/anuncioImpress.js"></script>
<script src="/view/assets/js/jquery-1.11.3.min.js"></script>
<script src="/view/assets/js/cuponPorld.js"></script>

<?php

$idCupon = "";
$tipoCupon = "";
if(isset($_GET['cupon']) && !empty($_GET['cupon'])) {$idCupon = $_GET['cupon'];}
if(isset($_GET['tipoCupon']) && !empty($_GET['tipoCupon'])) {$tipoCupon = $_GET['tipoCupon'];}

?>

<script>

    var dadosUser = {nome:"<?php echo $arrayUser[0]['cli_nome']; ?>",email:"<?php echo $arrayUser[0]['cli_email']; ?>",id:"<?php echo $arrayUser[0]['cli_id']; ?>"};

    $(function() {

        if("<?php echo $tipoCupon; ?>" == 'virtual'){
            $("#cuponCompleto").html(renderVirtualCompleto(<?php echo $idCupon; ?>));
        } else {
            $("#cuponCompleto").html(renderCuponCompleto(<?php echo $idCupon; ?>));
        }
    });

</script>

</html>
