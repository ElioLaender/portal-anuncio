<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 23/02/16
 * Time: 10:39
 */

require_once 'model/CuponDescontoModel.php';
require_once 'dao/AccessObject/CuponCodigoDAO.php';
require_once 'dao/AccessObject/CuponImpressoDAO.php';

class CuponDescontoDAO extends CuponDescontoModel
{

    private $insert = "INSERT INTO Cupon_desconto ( cupon_desconto_anun_ref,
                                                    cupon_desconto_titulo,
                                                    cupon_desconto_descricao,
                                                    cupon_desconto_qtd_impress,
                                                    cupon_desconto_inicio,
                                                    cupon_desconto_termino,
                                                    cupon_desconto_tipo,
                                                    cupon_desconto_percent,
                                                    cupon_desconto_valor_de,
                                                    cupon_desconto_valor_para,
                                                    cupon_desconto_restantes) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",

        $select = "SELECT Cupon_desconto.*, Anuncio.anuncio_titulo FROM Cupon_desconto INNER JOIN Anuncio ON Cupon_desconto.cupon_desconto_anun_ref = Anuncio.anuncio_id WHERE cupon_desconto_excluido = 0 LIMIT %s, %s",

        $updade = "",
        $delete = "";



    #insere cadastro de cupon na base de dados
    public function cuponPersist($idAnun, $titulo, $descricao, $qtdImpress, $inicio, $termino, $tipo, $percent, $valorDe, $valorPara)
    {


        $this->setCuponDescontoAnunRef($idAnun);
        $this->setCuponDescontoTitulo($titulo);
        $this->setCuponDescontoDescricao($descricao);
        $this->setCuponDescontoQtdImpress($qtdImpress);
        $this->setCuponDescontoRestantes($qtdImpress);
        $this->setCuponDescontoInicio($inicio);
        $this->setCuponDescontoTermino($termino);
        $this->setCuponDescontoTipo($tipo);
        $this->setCuponDescontoPercent($percent);
        $this->setCuponDescontoValorDe($valorDe);
        $this->setCuponDescontoValorPara($valorPara);


        $sql = sprintf($this->insert, $this->getCuponDescontoAnunRef(),
            $this->getCuponDescontoTitulo(),
            $this->getCuponDescontoDescricao(),
            $this->getCuponDescontoQtdImpress(),
            $this->getCuponDescontoInicio(),
            $this->getCuponDescontoTermino(),
            $this->getCuponDescontoTipo(),
            $this->getCuponDescontoPercent(),
            $this->getCuponDescontoValorDe(),
            $this->getCuponDescontoValorPara(),
            $this->getCuponDescontoRestantes());

        if(empty($qtdImpress)){

            $this->insert = "INSERT INTO Cupon_desconto (   cupon_desconto_anun_ref,
                                                            cupon_desconto_titulo,
                                                            cupon_desconto_descricao,
                                                            cupon_desconto_inicio,
                                                            cupon_desconto_termino,
                                                            cupon_desconto_tipo,
                                                            cupon_desconto_percent,
                                                            cupon_desconto_valor_de,
                                                            cupon_desconto_valor_para,
                                                            cupon_desconto_restantes) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');";

            $sql = sprintf($this->insert, $this->getCuponDescontoAnunRef(),
                $this->getCuponDescontoTitulo(),
                $this->getCuponDescontoDescricao(),
                $this->getCuponDescontoInicio(),
                $this->getCuponDescontoTermino(),
                $this->getCuponDescontoTipo(),
                $this->getCuponDescontoPercent(),
                $this->getCuponDescontoValorDe(),
                $this->getCuponDescontoValorPara(),
                $this->getCuponDescontoRestantes());

        }




        if ($this->runQuery($sql)) {

            $sele = "SELECT cupon_desconto_id FROM Cupon_desconto WHERE cupon_desconto_anun_ref = %s AND cupon_desconto_titulo = '%s'";

            $sele = sprintf($sele, $this->getCuponDescontoAnunRef(), $this->getCuponDescontoTitulo());

            if ($row = $this->runSelect($sele)) {

                $consulta = "UPDATE Cupon_desconto SET cupon_desconto_img = '%s' WHERE cupon_desconto_id = %s AND cupon_desconto_titulo = '%s'"; // não vai poder ter o mesmo título

                $objCurControl = new DashboardCurriculoController();

                $consulta = sprintf($consulta, $objCurControl->upLoadImag('upload/cupon-images/', $row[0]['cupon_desconto_id']), $row[0]['cupon_desconto_id'], $this->getCuponDescontoTitulo());

                if ($this->runQuery($consulta)) {

                    $objCupCode = new CuponCodigoDAO();
                    $objCupCode->codePersist($row[0]['cupon_desconto_id'], $this->getCuponDescontoQtdImpress());

                } else {

                    echo "Não foi possível armazenar imagem.";
                }


            } else {

                echo "Não foi possível realizar o select no cupon";
            }


        } else {

            echo "Não foi possível persistir o cupon na base de dados." . $sql;
        }


    }

    #atualiza informaçẽs do cupon
    public function cuponUpdate($idCupon, $titulo, $descricao, $qtdImpress, $inicio, $termino, $tipo, $percent, $valorDe, $valorPara,$idAnun){


        $this->setCuponDescontoAnunRef($idAnun);
        $this->setCuponDescontoId($idCupon);
        $this->setCuponDescontoTitulo($titulo);
        $this->setCuponDescontoDescricao($descricao);
        $this->setCuponDescontoQtdImpress($qtdImpress);
        $this->setCuponDescontoRestantes($qtdImpress);
        $this->setCuponDescontoInicio($inicio);
        $this->setCuponDescontoTermino($termino);
        $this->setCuponDescontoTipo($tipo);
        $this->setCuponDescontoPercent($percent);
        $this->setCuponDescontoValorDe($valorDe);
        $this->setCuponDescontoValorPara($valorPara);

        $selectCupon = "SELECT * FROM Cupon_desconto WHERE cupon_desconto_id = %s"; //devemos pedir o id do cupon em vez so anuncio



        #lembrar de fazer o código que tira o cupon do ar quando vencer o prazo

        #fazer um select do registro atual e fazer comparações para saber o que foi mudado quando necessário.

        #ex: se o valor de quantidade for diferente do atual, será zerado a quantidade de cupons restantes para a nova quantidade de cupons disponíveis e também será deletado
        # da tabela de codigos todos os códigos disponíveis, ou seja, que não esteja setado como impresso por algum usuário. Logo depois será criado uma quantidade de código
        #de acordo com a nova quantidade de valores que o dono do anúncio disponibilizou.

        $selectCupon = sprintf($selectCupon, $this->getCuponDescontoId());

        $objCurControl = new DashboardCurriculoController();

        if($row = $this->runSelect($selectCupon)){

          #caso for passado um valor e este diferente de zero e do valor especificado anteriormente, será feito a arualização que no cupon de código.
          if($qtdImpress != "" && $row[0]['cupon_desconto_qtd_impress'] != $qtdImpress){

              $up = "UPDATE Cupon_desconto SET     cupon_desconto_titulo = '%s',
                                                   cupon_desconto_descricao = '%s',
                                                   cupon_desconto_qtd_impress = '%s',
                                                   cupon_desconto_inicio = '%s',
                                                   cupon_desconto_termino = '%s',
                                                   cupon_desconto_tipo = '%s',
                                                   cupon_desconto_percent = '%s',
                                                   cupon_desconto_valor_de = '%s',
                                                   cupon_desconto_valor_para = '%s',
                                                   cupon_desconto_restantes = '%s', ";
                    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){
                        $up .= " cupon_desconto_img = '%s' WHERE cupon_desconto_id = ".$this->getCuponDescontoId()." ";
                    } else {
                        $up .= " cupon_desconto_img = '".$row[0]['cupon_desconto_img']."' WHERE cupon_desconto_id = ".$this->getCuponDescontoId()." ";
                    }



              $up = sprintf($up,  $this->getCuponDescontoTitulo(),
                                  $this->getCuponDescontoDescricao(),
                                  $this->getCuponDescontoQtdImpress(),
                                  $this->getCuponDescontoInicio(),
                                  $this->getCuponDescontoTermino(),
                                  $this->getCuponDescontoTipo(),
                                  $this->getCuponDescontoPercent(),
                                  $this->getCuponDescontoValorDe(),
                                  $this->getCuponDescontoValorPara(),
                                  $this->getCuponDescontoRestantes(),
                                  $objCurControl->upLoadImag('upload/cupon-images/', $this->getCuponDescontoId()));



              if($this->runQuery($up)){



                //  echo "aqui no que gera os valores";
                  #chamar método que atualiza os códigos
                  #apagar os registros referentes ao cupon que não tenham cliene vinculado a ela
                  $objCuponCod = new CuponCodigoDAO();
                  $objCuponImpress = new CuponImpressoDAO();
                  $objCuponCod->regCodDel($this->getCuponDescontoId());
                  $objCuponImpress->excluImpreReg($this->getCuponDescontoId());
                  #gerar uma quantidade de codigos na tabela de acordo com an nova quantidade oferecida.
                  $objCuponCod->codePersist($this->getCuponDescontoId(),$this->getCuponDescontoQtdImpress());




              } else {

                  echo " não foi possível realizar update novo." . $up;

              }// else do update

          } else {


              $this->updade = "UPDATE Cupon_desconto SET cupon_desconto_titulo = '%s',
                                                        cupon_desconto_descricao = '%s',
                                                        cupon_desconto_inicio = '%s',
                                                        cupon_desconto_termino = '%s',
                                                        cupon_desconto_tipo = '%s',
                                                        cupon_desconto_percent = '%s',
                                                        cupon_desconto_valor_de = '%s',
                                                        cupon_desconto_valor_para = '%s',
                                                        cupon_desconto_restantes = '%s', ";
                                                        if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){

                                                            $this->updade .= "cupon_desconto_img = '%s' WHERE cupon_desconto_id = ".$this->getCuponDescontoId()." ";

                                                        } else {

                                                            $this->updade .= "cupon_desconto_img = '".$row[0]['cupon_desconto_img']."' WHERE cupon_desconto_id = ".$this->getCuponDescontoId()." ";
                                                        }

              $this->updade =  sprintf($this->updade, $this->getCuponDescontoTitulo(),
                                             $this->getCuponDescontoDescricao(),
                                             $this->getCuponDescontoInicio(),
                                             $this->getCuponDescontoTermino(),
                                             $this->getCuponDescontoTipo(),
                                             $this->getCuponDescontoPercent(),
                                             $this->getCuponDescontoValorDe(),
                                             $this->getCuponDescontoValorPara(),
                                             $this->getCuponDescontoRestantes(),
                                             $objCurControl->upLoadImag('upload/cupon-images/', $this->getCuponDescontoId()));

              if($this->runQuery($this->updade)){

                //echo "rolou o update" . $this->updade;

              } else {

                  echo "não foi possível realizar update." . $this->updade;

              }//else do update normal

          }//else da verificação de quantidade

        } else {

            echo "Não foi possível selecionar cupon." . $idCupon;

        } // else da consulta do select;

    }

    #retorna o via json os dados dos cupons vinculados a um dado anuncio.
    public function returnCuponsForId($idAnun)
    {

        $sql = "SELECT * FROM Cupon_desconto WHERE cupon_desconto_anun_ref = %s AND cupon_desconto_excluido = 0";

        $this->setCuponDescontoAnunRef($idAnun);

        $sql = sprintf($sql, $this->getCuponDescontoAnunRef());

        if ($row = $this->runSelect($sql)) {

            echo json_encode($row);

        } else {

            echo 0;
        }

    }

    #retorna os dados do registro do cupon passado como argumento
    public function returnCupon($idCupon,$json = 'on')
    {

        $sql = "SELECT Cupon_desconto.*, Anuncio.anuncio_id FROM Cupon_desconto
                INNER JOIN Anuncio ON Cupon_desconto.cupon_desconto_anun_ref = Anuncio.anuncio_id WHERE cupon_desconto_id = %s AND cupon_desconto_excluido = 0";

        $this->setCuponDescontoId($idCupon);

        $sql = sprintf($sql, $this->getCuponDescontoId());

        if ($row = $this->runSelect($sql)) {

	   if($json == 'on'){
		 echo json_encode($row);
	   }else{
		 return $row;
	   }
           

        } else {

            echo "Ops, não foi possível retornar os dados do cupon, tente mais tarde. " . $sql;

        }

    }

    #seta o cupon como excluído na base de dados.
    public function setExcluCupon($idCuopn)
    {

        $sql = "UPDATE Cupon_desconto SET cupon_desconto_excluido = 1 WHERE cupon_desconto_id = %s";

        $this->setCuponDescontoId($idCuopn);

        $sql = sprintf($sql, $this->getCuponDescontoId());

        if ($this->runQuery($sql)) {

            $objCodCupon = new CuponCodigoDAO();
            $objCodCupon->regCodDel($idCuopn);
            //echo "Seu cupon foi excluído com sucesso";

        } else {

            echo "Ops, não foi possível escluir cupon, tente mais tarde. =/";
        }

    }

    #retorna todos os anuncios não excluidos na base de dados
    public function returnCuponsForAll($offSet,$qtdPag)
    {

        $this->select = sprintf($this->select,$offSet,$qtdPag);

        if ($row = $this->runSelect($this->select)) {

            echo json_encode($row);

        } else {

            echo "Ops!.. Não foi possível retornar os cupons, tente mais tarde. =/";
        }


    }

    #retorna os dados necessários para criação dos links de paginação
    public function cuponPaginator(){

        $por_pagina = 8;

        $countReg = "SELECT COUNT(*) FROM Cupon_desconto WHERE cupon_desconto_excluido = 0;";

        $row = $this->runSelect($countReg);

        $total = $row[0]['COUNT(*)'];


       $paginas =  (($total % $por_pagina) > 0) ? (int)($total / $por_pagina) + 1 : ($total / $por_pagina);

        echo json_encode($paginas);


    }

    #retorna dados do cupon juntamente com os do anunciante.
    public function returnCupAun($idCupon)
    {

        $sql = "SELECT Cupon_desconto.*,Anuncio.anuncio_id,Anuncio.anuncio_titulo,Anuncio.anuncio_tel_cel,Anuncio.anuncio_tel_fixo,Anuncio.anuncio_email,Sub_categoria.sub_categoria_descricao,Endereco.* FROM Cupon_desconto
                INNER JOIN Anuncio ON Cupon_desconto.cupon_desconto_anun_ref = Anuncio.anuncio_id
                INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                INNER JOIN Endereco ON Anuncio.anuncio_endereco = Endereco.endereco_id
                WHERE Cupon_desconto.cupon_desconto_id = %s AND Cupon_desconto.cupon_desconto_excluido = 0";


        $this->setCuponDescontoId($idCupon);

        $sql = sprintf($sql, $this->getCuponDescontoId());

        if ($row = $this->runSelect($sql)) {

            echo json_encode($row);

        } else {

            echo "Não foi possível retornar dados do desconto, tente mais tarde.";

        }

    }


    #atualiza a contagem de restantes e impressos de acordo com a base de dados
    public function atualiConImpress($idCupon)
    {

        /*
         *
         * QUANDO CONTAGEM CHEGAR A ZERO DEIXAR COMO ESGOTADO ATÉ O PRAZO DO VENCIMENTO E ENVIAR UMA NOTIFICAÇÃO PARA O ANUNCIANTA, OU APENAS OCULTAR E SETAR NO RELATÓRIO PARA O
         * ANUNCIANTE QUE A QUANTIDADE DE CUPONS CHEGOU AO FIM
         *
         */

        $sql = "UPDATE Cupon_desconto SET  cupon_desconto_impressos = (cupon_desconto_impressos+1) ,cupon_desconto_restantes = (cupon_desconto_qtd_impress - cupon_desconto_impressos) WHERE cupon_desconto_id =  %s";

        $this->setCuponDescontoId($idCupon);
        $sql = sprintf($sql, $this->getCuponDescontoId());

        if ($this->runQuery($sql)) {


        } else {

            echo "Não foi possível atualizar contagem dos cupons";

        }


    }


    #Fera relatório referente aos cupons de desconto gerados.
    public function cuponRelImpress($idCupon,$infinit = ""){

        if($infinit == "off"){

            $sql = "SELECT Cupon_desconto.*,Anuncio.anuncio_id,Anuncio.anuncio_titulo,Sub_categoria.sub_categoria_descricao,Cupon_codigo.cc_cupon_ref,Cupon_codigo.cc_codigo FROM Cupon_desconto
                    INNER JOIN Anuncio ON Cupon_desconto.cupon_desconto_anun_ref = Anuncio.anuncio_id
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    INNER JOIN Cupon_codigo ON Cupon_desconto.cupon_desconto_id = Cupon_codigo.cc_cupon_ref
                    WHERE Cupon_desconto.cupon_desconto_id = %s AND Cupon_desconto.cupon_desconto_excluido = 0";

        } else {

            $sql = "SELECT Cupon_desconto.*,Anuncio.anuncio_id,Anuncio.anuncio_titulo,Sub_categoria.sub_categoria_descricao FROM Cupon_desconto
                    INNER JOIN Anuncio ON Cupon_desconto.cupon_desconto_anun_ref = Anuncio.anuncio_id
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    WHERE Cupon_desconto.cupon_desconto_id = %s AND Cupon_desconto.cupon_desconto_excluido = 0";

        }

        $this->setCuponDescontoId($idCupon);


        $sql = sprintf($sql,$this->getCuponDescontoId());



        if($row = $this->runSelect($sql)){

            if($infinit == "off"){

                $arrayCodes = array();

                for($i = 0; $i < count($row); $i++){
                    $arrayCodes[$i] = $row[$i]['cc_codigo'];
                }


                $row[0]['cc_codigo'] = $arrayCodes;



            }

            return $row;

        } else {

        }


    }

    #gera pdf do relatório dos cupons
    public function relCupPdf($idCupon,$infinit){

        $objPdf = new GeraPDF();
        $objPdf->pdfRelCup($this->cuponRelImpress($idCupon,$infinit));



    }


    #gera o codigo de barras a ser utilizado no cupon de desconto
    public function geraCodigoBarra($numero){

        $html = "";
        $fino = 1;
        $largo = 3;
        $altura = 50;

        $barcodes[0] = '00110';
        $barcodes[1] = '10001';
        $barcodes[2] = '01001';
        $barcodes[3] = '11000';
        $barcodes[4] = '00101';
        $barcodes[5] = '10100';
        $barcodes[6] = '01100';
        $barcodes[7] = '00011';
        $barcodes[8] = '10010';
        $barcodes[9] = '01010';

        for($f1 = 9; $f1 >= 0; $f1--){
            for($f2 = 9; $f2 >= 0; $f2--){
                $f = ($f1*10)+$f2;
                $texto = '';
                for($i = 1; $i < 6; $i++){
                    $texto .= substr($barcodes[$f1], ($i-1), 1).substr($barcodes[$f2] ,($i-1), 1);
                }
                $barcodes[$f] = $texto;
            }
        }

        $html .= '<img src="view/assets/imgBarras/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
        $html .= '<img src="view/assets/imgBarras/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
        $html .= '<img src="view/assets/imgBarras/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
        $html .= '<img src="view/assets/imgBarras/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';

        $html .= '<img ';

        $texto = $numero;

        if((strlen($texto) % 2) <> 0){
            $texto = '0'.$texto;
        }

        while(strlen($texto) > 0){
            $i = round(substr($texto, 0, 2));
            $texto = substr($texto, strlen($texto)-(strlen($texto)-2), (strlen($texto)-2));

            if(isset($barcodes[$i])){
                $f = $barcodes[$i];
            }

            for($i = 1; $i < 11; $i+=2){
                if(substr($f, ($i-1), 1) == '0'){
                    $f1 = $fino ;
                }else{
                    $f1 = $largo ;
                }

                $html .= 'src="view/assets/imgBarras/p.gif" width="'.$f1.'" height="'.$altura.'" border="0">';
                $html .= '<img ';

                if(substr($f, $i, 1) == '0'){
                    $f2 = $fino ;
                }else{
                    $f2 = $largo ;
                }

                $html .= 'src="view/assets/imgBarras/b.gif" width="'.$f2.'" height="'.$altura.'" border="0">';
                $html .= '<img ';
            }
        }
        $html .= 'src="view/assets/imgBarras/p.gif" width="'.$largo.'" height="'.$altura.'" border="0" />';
        $html .= '<img src="view/assets/imgBarras/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
        $html .= '<img src="view/assets/imgBarras/p.gif" width="1" height="'.$altura.'" border="0" />';

        return $html;
    }




}
