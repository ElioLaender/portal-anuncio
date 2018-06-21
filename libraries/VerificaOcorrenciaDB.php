<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 24/09/15
 * Time: 16:38
 */

include_once "dao/ConnectionFactory/ConnectionFactory.php";

class VerificaOcorrenciaDB extends ConnectionFactory{

    public $tabela,
            $atributo,
            $valor,
            $sql,
            $result;

    /**
     * @return mixed
     */
    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @param mixed $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

    /**
     * @return mixed
     */
    public function getAtributo()
    {
        return $this->atributo;
    }

    /**
     * @param mixed $atributo
     */
    public function setAtributo($atributo)
    {
        $this->atributo = $atributo;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * @param mixed $sql
     */
    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }


    # verifica a ocorrência de apenas um valor.
    /**
     * @param $tabela
     * @param $atributo
     * @param $valor
     * @return int
     */
    public function verificaOcorrenciaSimples($tabela, $atributo, $valor,$attWhere)

    {



        $this->setTabela($tabela);
        $this->setAtributo($atributo);
        $this->setValor($valor);


        $this->setSql("SELECT * FROM " . $this->getTabela() . " WHERE " . $this->getAtributo() . "= '".$this->getValor()."' AND ".$attWhere."= 0;");

        $this->setResult($this->runSelect($this->getSql()));

        # Verifica se o array retornado possui mais de uma posição. Caso possuir é porque o cadastro do email existe na base de dados.
        if (count($this->getResult()) > 0) {

            return 0;

        } else {

            return 1;

        }

    }



}

    #implementar um método mais robusto, que terá polimorfismo e podera fazer verificações mais complexas.