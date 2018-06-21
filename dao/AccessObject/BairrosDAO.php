<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 22/01/16
 * Time: 14:54
 */

include_once 'model/BairrosModel.php';
include_once 'dao/AccessObject/EnderecoDAO.php';
include_once 'dao/AccessObject/AnuncioDAO.php';

class BairrosDAO extends BairrosModel{

    private $select = "SELECT * FROM Bairros";


    #retorna os registros da tabela cidade
    public function returnBairros($pesqui){



        if($row = $this->runSelect($this->select)){

            $objEndDAO = new EnderecoDAO();
           // $objAnun = new AnuncioDAO();
            $pesquisa = $pesqui;


            for($i = 0; $i < count($row); $i++){
                $row[$i]['qtdAnun'] = $objEndDAO->qtdAnunBai($row[$i]['bairros_nome'],$pesquisa);
            }

            echo json_encode($row);

        }else {
            echo "Não foi possível retornar os bairros cadastrados.";
        }

    }

}


