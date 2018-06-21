<?php



include_once "dao/AccessObject/CuponDescontoDAO.php";

class GeraPDF {

    private $html;

    /**

     *
     * http://imasters.com.br/artigo/10394/php/convertendo-html-para-pdf-em-php
     *
     */
    #método responsável por gerar o PDF do currículo
    public function geraPdfCurriculo($CurriculoDados){  #passar todos os dados como argumento, inclusive foto.



        $this->html = "

    <!DOCTYPE html>
    <html>
    <head>
    <meta name='language' content='pt-br'>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='view/assets/estilo/viewFolhaPdf.css'>
</head>
<body>
<div class='tudo'>
    <main>
        <header>
                <h1>currículo</h1>
            <div>
            </div>
        </header>

        <section>
            <div>";

        #se o usuário subiu alguma foto, ela irá aparecer, caso contrário não.
        if(!empty($CurriculoDados[0]['curriculum_foto'])){
            $this->html .=  "<img src='" . $CurriculoDados[0]['curriculum_foto'] . "'>";
        }


        $this->html .=  "</div>
<!--h2 eh o nome em destaque, nome do candidato-->
<h2>" . $CurriculoDados[0]['curriculum_nome'] . "</h2>
<dl>

    <dt>Dados Pessoais</dt>

    <dd>IDADE:  " . $CurriculoDados[0]['curriculum_idade'] . "  </dd>
    <dd>NACIONALIDADE: " . $CurriculoDados[0]['curriculum_nacionalidade'] . " </dd>
    <dd>SEXO:  " . $CurriculoDados[0]['curriculum_sexo'] . " </dd>
    <dd>ESTADO CIVIL: " . $CurriculoDados[0]['curriculum_estado_civil']  . " </dd>


    <dt>Endereço</dt>

    <dd>CEP:  " . $CurriculoDados[0]['endereco_cep'] . " </dd>
    <dd>RUA:  " . $CurriculoDados[0]['endereco_rua'] . " </dd>
    <dd>BAIRRO:  " . $CurriculoDados[0]['endereco_bairro'] . " </dd>
    <dd>NÚMERO:  " . $CurriculoDados[0]['endereco_numero'] . " </dd>
    <dd>COMPLEMENTO:  " . $CurriculoDados[0]['endereco_complemento'] . " </dd>
    <dd>N complemento:" . $CurriculoDados[0]['endereco_numero_complemento'] . "</em></dd>
    <dd>CIDADE: " . $CurriculoDados[0]['endereco_cidade'] . " </dd>
    <dd>ESTADO:  " . $CurriculoDados[0]['endereco_estado'] . " </dd>

    <dt>Contato</dt>

    <dd>CELULAR: " . $CurriculoDados[0]['curriculum_tel_cel'] . " </dd>
    <dd>TELEFONE FIXO:   " . $CurriculoDados[0]['curriculum_tel_fixo'] . " </dd>
    <dd>EMAIL: "  . $CurriculoDados[0]['curriculum_email'] . " </dd>
    <dd>FACEBOOK:   " . $CurriculoDados[0]['curriculum_facebook'] . " </dd>
    <dd>CURRÍCULO LATTES:   " . $CurriculoDados[0]['curriculum_lattes'] . "</dd>
    <dd>LINKEDIN: " . $CurriculoDados[0]['curriculum_linkedin'] . " </dd>

    <dt>Formação acadêmica</dt>
    <dd>ESCOLARIDADE:  " . $CurriculoDados[0]['curriculum_escolaridade'] . " </dd>

    <dt>Cursos e Eventos     </dt>
    <dd>QUALIFICAÇÕES: <br/> <br/> " . $CurriculoDados[0]['curriculum_descricao'] . " </dd>

    <dt>Experiência Profissional</dt>

    <dd>NOME DA ÚLTIMA EMPRESA OU ATUAL:  " . $CurriculoDados[0]['curriculum_nome_empresa'] . " </dd>
    <dd>DATA ADMISSÃO:  " . $CurriculoDados[0]['curriculum_data_admissao'] . " </dd>
    <dd>DATA DEMISSÃO:  " . $CurriculoDados[0]['curriculum_data_demissao'] . " </dd>
    <dd>CARGO OCUPADO:  " . $CurriculoDados[0]['curriculum_cargo']  ."  </dd>
    <dd>ATIVIDADES REALIZADAS:<br/><br/>  " . $CurriculoDados[0]['curriculum_atividades_realizadas'] . " </dd>

    <dt>Informações Adicionais</dt>

    <dd>HABILITAÇÃO:  " . $CurriculoDados[0]['curriculum_habilitacao'] ." </dd>
    <dd>OBSERVAÇÕES:<br/>  " . $CurriculoDados[0]['curriculum_descricao'] . " </dd>

</dl>

</section>
</main>
</div>
</body>
</html> ";

        define('MPDF_PATH', 'libraries/mpdf60/');
        include(MPDF_PATH.'mpdf.php');
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->html);
        $mpdf->Output();
        exit();

    }



    #gera PDF do cupon a ser impresso pelo usuário
    public function CuponPdf($arrayCupon){

        $objCuponDes = new CuponDescontoDAO();

        $this->html =
            "<article>
                            <p style='margin-left:240px;margin-bottom:40px'><a style='color:#555; font-size:28px;text-decoration:none' href='?controller=Anuncio&action=viewAnuncioIdAll&id=".$arrayCupon[0]['anuncio_id']."'>".$arrayCupon[0]['anuncio_titulo']."</a></p>

                            <img style='width:15em; height:8em' src='". $arrayCupon[0]['cupon_desconto_img'] ."' alt='Imagen do cupon'>
                            <p style='margin-left:250px;margin-top:-120px'>".$arrayCupon[0]['cupon_desconto_titulo']."</p>";

        if(!empty($arrayCupon[0]['cc_codigo'])){
            $this->html .= "<p style='margin-left:250px'>".$objCuponDes->geraCodigoBarra($arrayCupon[0]['cc_codigo'])."<br/>".$arrayCupon[0]['cc_codigo']."</p>";
        }


        $this->html .= "<p style='margin-top:40px'><strong>Categoria:</strong>".$arrayCupon[0]['sub_categoria_descricao']."</p>

                            <p><strong>Valido até:</strong>".$arrayCupon[0]['cupon_desconto_termino']."</p>

                            <p style='width:500px'><strong>Descrição do Cupon:</strong><br>".$arrayCupon[0]['cupon_desconto_descricao']."</p>

                            <p><strong>Contato:</strong> ".$arrayCupon[0]['anuncio_tel_cel']."/".$arrayCupon[0]['anuncio_tel_fixo']."</p>

                            <p><strong>Email:</strong> ".$arrayCupon[0]['anuncio_email']."</p>

                            <p style='width:500px'><strong>Endereço:</strong><br> ".$arrayCupon[0]['endereco_cep'].", ".$arrayCupon[0]['endereco_rua'].", ".$arrayCupon[0]['endereco_numero'].", ".$arrayCupon[0]['endereco_bairro'].", Complemento:".$arrayCupon[0]['endereco_complemento'].", N complemento".$arrayCupon[0]['endereco_numero_complemento'].", ".$arrayCupon[0]['endereco_cidade'].", ".$arrayCupon[0]['endereco_estado']."</p>";



        $this->html .= "<p><strong>Regras:</strong><br>
                                            Este cupom não é acumulativo com outros descontos e promoções.</p>
                                            <p style='width:500px'>Confira os termos para utilização do cupon: http://www.semprenegocio.com.<br/>/regras-gerais/</p>
                                            <p style='width:500px'>Este cupom tem caráter informativo e é de total responsabilidade do anunciante.
                                                A SempreNegócio não se responsabiliza pela eventual invalidade do mesmo.</p>

                              <img class='figura' src='view/assets/imagens/logo@1x.png' alt='Imagen do cupon'>

                    </article>";


        define('MPDF_PATH', 'libraries/mpdf60/');
        include(MPDF_PATH.'mpdf.php');
        $mpdf= new mPDF();
        $css = file_get_contents("libraries/viewPdf.css");
        $mpdf->WriteHTML($css,1);
        $mpdf->WriteHTML($this->html);
        $mpdf->Output();
        exit();

    }


    #gera html do relatório de cupons criados
    public function pdfRelCup($arrayRel){


        #responsável por instânciar o método que irá gerar o código de barra
        $objCuponDes = new CuponDescontoDAO();

        $this->html = "<h1>Controle de cupons:</h1>
                        <article>
                        <p>".$arrayRel[0]['anuncio_titulo']."</p><br/>
                        <img style='width:15em; height:8em' src='". $arrayRel[0]['cupon_desconto_img'] ."' alt='Imagen do cupon'>
                            <p>".$arrayRel[0]['cupon_desconto_titulo']."</p>
                            <p style='margin-top:40px'><strong>Categoria - </strong>".$arrayRel[0]['sub_categoria_descricao']."</p>
                            <p> <strong>Cupon válido de </strong>".$arrayRel[0]['cupon_desconto_inicio']."<strong> até </strong>".$arrayRel[0]['cupon_desconto_termino']."</p>

                        </article>";

        if(!empty($arrayRel[0]['cc_codigo'])){

            $this->html .= "<dl>";

            for($i = 0; $i < count($arrayRel[0]['cc_codigo']); $i++){

                $this->html .= "<dt>Cupon - ".($i+1)."</dt>";
                $this->html .= "<dd><p>".$objCuponDes->geraCodigoBarra($arrayRel[0]['cc_codigo'][$i])."<br/>".$arrayRel[0]['cc_codigo'][$i]."</p></dd>";
            }

            $this->html .= "</dl>";

        } else {
            $this->html .= "<h1>Este cupon não possui limite de impressões.</h1>";
        }




        define('MPDF_PATH', 'libraries/mpdf60/');
        include(MPDF_PATH.'mpdf.php');
        $mpdf= new mPDF();
        $css = file_get_contents("libraries/viewPdf.css");
        $mpdf->WriteHTML($css,1);
        $mpdf->WriteHTML($this->html);
        $mpdf->Output();
        exit();



    }





}







