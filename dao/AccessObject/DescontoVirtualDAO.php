<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 01/03/16
 * Time: 19:04
 */

include_once "model/DescontoVirtualModel.php";


class DescontoVirtualDAO extends DescontoVirtualModel {


        private $insert = "INSERT INTO Desconto_virtual (desconto_virtual_titulo,
                            desconto_virtual_descricao,
                            desconto_virtual_inicio,
                            desconto_virtual_termino,
                            desconto_virtual_tipo,
                            desconto_virtual_percent,
                            desconto_virtual_valor_de,
                            desconto_virtual_valor_para,
                            desconto_virtual_url,
                            desconto_virtual_nome_loja) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",

                $select = "SELECT * FROM Desconto_virtual";

    #retorna os dados do desconto online cadastrado
    public function returnDadosOnline(){

            if($row = $this->runSelect($this->select)){

                echo json_encode($row);

            } else {

                echo "Não foi possível retornar os dados online";
            }

    }

    #retorna os cupons por id
    public function returnOnlineId($idCupon){

        $sql = "SELECT * FROM Desconto_virtual WHERE desconto_virtual_id = %s";

        $this->setDescontoVirtualId($idCupon);

        $sql = sprintf($sql, $this->getDescontoVirtualId());

        if($row = $this->runSelect($sql)){

            echo json_encode($row);

        } else {
            echo "Não foi possível retornar os dados do cupon por Id";
        }

    }

    #persiste cupon online na base de dados
    public function cuponVirtualPersist($titulo,$descricao,$dataInicio,$dataTermino,$descTipo,$percent,$valorDe,$valorPara,$Img,$url,$lojaNome){

        $this->setDescontoVirtualTitulo($titulo);
        $this->setDescontoVirtualDescricao($descricao);
        $this->setDescontoVirtualInicio($dataInicio);
        $this->setDescontoVirtualTermino($dataTermino);
        $this->setDescontoVirtualTipo($descTipo);
        $this->setDescontoVirtualPercent($percent);
        $this->setDescontoVirtualValorDe($valorDe);
        $this->setDescontoVirtualValorPara($valorPara);
        $this->setDescontoVirtualImg($Img);
        $this->setDescontoVirtualUrl($url);
        $this->setDescontoVirtualNomeLoja($lojaNome);

        $this->insert = sprintf($this->insert,$this->getDescontoVirtualTitulo(),
                                            $this->getDescontoVirtualDescricao(),
                                            $this->getDescontoVirtualInicio(),
                                            $this->getDescontoVirtualTermino(),
                                            $this->getDescontoVirtualTipo(),
                                            $this->getDescontoVirtualPercent(),
                                            $this->getDescontoVirtualValorDe(),
                                            $this->getDescontoVirtualValorPara(),
                                            $this->getDescontoVirtualImg(),
                                            $this->getDescontoVirtualUrl(),
                                            $this->getDescontoVirtualNomeLoja());

            if($this->runQuery($this->insert)){

                //////////
                $sele = "SELECT desconto_virtual_id FROM Desconto_virtual WHERE  desconto_virtual_titulo = '%s'";

                $sele = sprintf($sele,$this->getDescontoVirtualTitulo());

                if ($row = $this->runSelect($sele)) {

                    $consulta = "UPDATE Desconto_virtual SET desconto_virtual_img = '%s' WHERE desconto_virtual_id = %s AND desconto_virtual_titulo = '%s'"; // não vai poder ter o mesmo título

                    $objCurControl = new DashboardCurriculoController();

                    $consulta = sprintf($consulta, $objCurControl->upLoadImag('upload/cupon-images/', $row[0]['desconto_virtual_id']), $row[0]['desconto_virtual_id'], $this->getDescontoVirtualTitulo());

                    if ($this->runQuery($consulta)) {


                    } else {

                        echo "Não foi possível armazenar imagem.";
                    }


                } else {

                    echo "Não foi possível realizar o select no cupon";
                }
                /////////

            } else {

                echo "Não foi possível persistir a base de dados.";
            }

    }

}

