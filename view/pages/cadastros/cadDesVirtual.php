<!DOCTYPE html>
<!-- Esta página será acessada apenas pelo administrador -->
    <html>
        <head>
            <title>Cadastro de desconto virtual</title>
  	    <base href="http://www.semprenegocio.com.br/" target="">
            <meta charset="UTF-8">
        </head>
        <body>

        <section>
            <h2>Cadastro de cupons</h2>
            <form action='?controller=Anuncio&action=insertCuponVirt' method='post' enctype='multipart/form-data'>
                <fieldset>

                    <legend style='color:red;'>Cadastre seu desconto</legend><br/>
                    <label for='url' style='color:red;'>Url do produto</label><br/>
                    <input type='text' id='url' name='url'><br/>
                    <label for='nomeLoja' style='color:red;'>Nome da loja</label><br/>
                    <input type='text' id='nomeLoja' name='nomeLoja'><br/>
                    <label for='tituCupon' style='color:red;'><Titulo>Titulo</Titulo></label><br/>
                    <input type='text'  id='tituCupon' name='tituCupon'><br/>
                    <label for='desCupon' style='color:red;'>Descrição</label><br/>
                    <input type='text' id='desCupon' name='dCupon'><br/>
                    <label for='qtdCupon' style='color:red;'>Qauntidade</label><br/>
                    <input type='text' id='qtdCupon' name='quanCupon'><br/>
                    <label for='ilimit' style='color:red;'>Quantidade ilimitada</label><br/>
                    <input type='checkbox' id='ilimit' value='ilimitada'><br/>
                    <label for='inicio' style='color:red;'>Inicio</label><br/>
                    <input type='text' id='inicio' name='pInicio'><br/>
                    <label for='termino' style='color:red;'>Término</label><br/>
                    <input type='text' id='qtdCupon' name='termino'><br/>
                    <select name='tipoDesc'>
                        <option value='porcentagem'> Porcentagem</option>
                        <option value='dePara'> Mais barato</option>
                        <option value='gratis'> Grátis </option>
                    </select>
                    <label for='percent' style='color:red;'>Informe a porcentagem de desoconto</label><br/>
                    <input type='text' id='percent' name='percentVal'><br/><br/>
                    <p style='color:red;'> Informe o valor seguido do valor com desconto </p><br/>
                    <label for='valde' style='color:red;'> De</label><br/>
                    <input type='text' id='valde' name='deVal'><br/>
                    <label for='para' style='color:red;'>Para</label><br/>
                    <input type='text' id='para' name='paraVal'><br/>
                    <fieldset class='fo'>
                        <legend class='legenP'>Inserir/alterar foto</legend><br/>
                        <input type='file' name='img' id='image-upload' class='inputfile'  data-multiple-caption={count} files selected><br/>
                        <label for='image-upload'><br/>
                            <span class='spanImg'>carregar foto</span>
                        </label>
                        <div class='paiFoto'>
                            <div id='image-preview'></div>
                        </div>
                        <button id='ex' type='button' class='excl'>Excluir</button>
                    </fieldset>

                    <div class='err'>
                        <p id='tes'>Arquivo não suportado !</p>
                        <button type='button'></button>
                    </div>
                    <input type='hidden' name='idAnun' value='idAnun'>
                    <input type='submit' value='Cadastrar cupon'>
                </fieldset>
            </form>
        </section>


        </body>
    <html>
