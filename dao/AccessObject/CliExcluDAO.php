<?php

include_once 'model/CliExcluModel.php';

class CliExcluDAO extends CliExcluModel{

    private $insert = "";

    #exclui cadastro do usuário e seta no seu histórico
    public function setExcluUser($cliId,$motivo,$descricao){

        $this->insert = "INSERT INTO Cli_exclu (cli_exclu_cli_ref,cli_exclu_motivo,cli_exclu_descricao) VALUES ('%s','%s','%s');";

        $this->setCliExcluId($cliId);
        $this->setCliExcluMotivo($motivo);
        $this->setCliExcluDescricao($descricao);

        $this->insert = sprintf($this->insert,$this->getCliExcluId(),$this->getCliExcluMotivo(),$this->getCliExcluDescricao());

        if($this->runQuery($this->insert)){

        } else {
            echo "Não foi possível registrar histórico de exclusão do cliente.";
        }

      //  echo $this->insert;


    }

    /*
    #retorna relatório de clientes deletados
    public function allCliExclu(){

    }

    #retorna cliente excluido de acordo com id
    public function cliExcluId($id){

    }
    */





}