<?php

class ConnectionFactory {



    private $user = 'root',

        $pass = '',

        $host = 'localhost',

        $dataBase = 'semprene_sndb';

    //Método responsável pela conexão com o banco de dados.
    protected function conecta(){
        try{
            $conectDB = new PDO("mysql:host=".$this->host.";dbname=".$this->dataBase, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' "));
            return $conectDB;
        } catch (Exception $ex){
            exit($ex);
        }
    }

    //executa uma consulta
    public function runQuery($sql){

        $stm = $this->conecta()->prepare($sql); #Prepare faz parte da classe PDO(nativa do php)
        return $stm->execute(); #também faz parte da class PDO.
    }

    //Executa consulta de select na base de dados.
    public function runSelect($sql){
        $stm = $this->conecta()->prepare($sql);
        $stm->execute();
        #retorna array multidimensional contendo os dados retornados.
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }



}
