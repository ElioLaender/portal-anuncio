<!DOCTYPE>
<html>
<head>
    <title>SempreNegocio - Insira fotos no seu anuncio</title>
    <base href="http://www.semprenegocio.com.br/" target="">
</head>
<body>
<h1>Parte dois do cadastro - Insira fotos no seu anuncio <?php echo $idAnun; ?></h1>




<form action="?controller=Anuncio&action=inserImagensId&id=<?php echo $ID; ?>"  method="post" enctype="multipart/form-data">


    <input type="file"  name="img[]" multiple data-multiple-caption="{count} files selected">


    <input type="submit" value="Enviar imagens">
</form>


<h3>Limitar a quantidade de arquivos no upload</h3>

<p>$('.uploadClassificado').change(function(){
    var files = this.files; // SELECIONA OS ARQUIVOS
    var qtde = files.length; // CONTA QUANTOS TEM

    if(qtde > 5) { // VERIFICA SE É MAIOR DO QUE 5
    alert("Não é permitido enviar mais do que 5 arquivos.");
    $(this).val("");
    return false;
    } else { // SE NÃO FOR MAIS DO QUE 5 ELE CONTINUA.
    return true;
    }
    });</p>
<p>http://forum.imasters.com.br/topic/509793-limitar-quantidade-de-arquivos-enviados-do-input-file-html5/</p>
</body>
</html>
