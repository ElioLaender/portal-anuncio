<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:08
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class LogradouroModel extends ConnectionFactory{

    private $logradouro_id,
            $logradouro_bairro_ref,
            $logradouro_tipo,
            $logradouro_nome,
            $logradouro_cep,
            $logradouro_data_cadastro,
            $logradouro_numero;

    /**
     * @return mixed
     */
    public function getLogradouroId()
    {
        return $this->logradouro_id;
    }

    /**
     * @param mixed $logradouro_id
     */
    public function setLogradouroId($logradouro_id)
    {
        $this->logradouro_id = $logradouro_id;
    }

    /**
     * @return mixed
     */
    public function getLogradouroBairroRef()
    {
        return $this->logradouro_bairro_ref;
    }

    /**
     * @param mixed $logradouro_bairro_ref
     */
    public function setLogradouroBairroRef($logradouro_bairro_ref)
    {
        $this->logradouro_bairro_ref = $logradouro_bairro_ref;
    }

    /**
     * @return mixed
     */
    public function getLogradouroTipo()
    {
        return $this->logradouro_tipo;
    }

    /**
     * @param mixed $logradouro_tipo
     */
    public function setLogradouroTipo($logradouro_tipo)
    {
        $this->logradouro_tipo = $logradouro_tipo;
    }

    /**
     * @return mixed
     */
    public function getLogradouroNome()
    {
        return $this->logradouro_nome;
    }

    /**
     * @param mixed $logradouro_nome
     */
    public function setLogradouroNome($logradouro_nome)
    {
        $this->logradouro_nome = $logradouro_nome;
    }

    /**
     * @return mixed
     */
    public function getLogradouroCep()
    {
        return $this->logradouro_cep;
    }

    /**
     * @param mixed $logradouro_cep
     */
    public function setLogradouroCep($logradouro_cep)
    {
        $this->logradouro_cep = $logradouro_cep;
    }

    /**
     * @return mixed
     */
    public function getLogradouroDataCadastro()
    {
        return $this->logradouro_data_cadastro;
    }

    /**
     * @param mixed $logradouro_data_cadastro
     */
    public function setLogradouroDataCadastro($logradouro_data_cadastro)
    {
        $this->logradouro_data_cadastro = $logradouro_data_cadastro;
    }

    /**
     * @return mixed
     */
    public function getLogradouroNumero()
    {
        return $this->logradouro_numero;
    }

    /**
     * @param mixed $logradouro_numero
     */
    public function setLogradouroNumero($logradouro_numero)
    {
        $this->logradouro_numero = $logradouro_numero;
    }


}