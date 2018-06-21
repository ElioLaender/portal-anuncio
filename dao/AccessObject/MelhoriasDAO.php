<?php

/**
 * Created by PhpStorm.
 * User: laender
 * Date: 04/04/16
 * Time: 05:10
 */

include_once 'model/MelhoriasModel.php';

class MelhoriasDAO extends MelhoriasModel{


    private $insert = "INSERT INTO Melhorias (melhorias_cli_ref,melhorias_assunto,melhorias_opiniao) VALUES ('%s','%s','%s')",
            $select,
            $update,
            $delete;


    #insere as opinões na base de dados
    public function MelhoriPersist($cliRef,$assunt,$opini){

        $this->setMelhoriasCliRef($cliRef);
        $this->setMelhoriasAssunto($assunt);
        $this->setMelhoriasOpiniao($opini);

        $sql = sprintf($this->insert,$this->getMelhoriasCliRef(),$this->getMelhoriasAssunto(),$this->getMelhoriasOpiniao());

        if($this->runQuery($sql)){

            echo "<p>Sua opinião foi enviada com sucesso. Obrigado!</p>";

        } else {

            echo "<p>Não foi possível persistir opinião na base de dados, tente mais tarde.</p>";
        }

    }

}