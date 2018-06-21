<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 05/11/15
 * Time: 12:40
 */

include_once 'model/StatusAnuncioModel.php';

class StatusAnuncioDAO extends StatusAnuncioModel{

    #método para retornar os registros que fazem o anuncio ficar ativo ou inativo. Por default retorna os que fazem ficar ativo.
    #$tipoReg = seleciona quais os tipos de registro devem ser retornados.
    public function retornaRegStatus($tipoReg){


        #caso algum dos dois for verdadeiro, será executado o select com like.
        if($tipoReg == "online" || $tipoReg == "inativo"){

            $sql = "SELECT status_anuncio_id FROM Status_anuncio WHERE status_anuncio_situacao LIKE '%{$tipoReg}%'";

            $row = $this->runSelect($sql);

            #retorna array contendo os valores do registro
            return $row;

        } else {
            echo "O valor passado como argumento não corresponde a ativo ou inativo.";
        }



    }



}
