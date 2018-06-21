<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 09:40
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class EnderecoModel extends ConnectionFactory{

 private $endereco_id,
         $endereco_cep,
         $endereco_rua,
         $endereco_bairro,
         $endereco_numero,
         $endereco_numero_complemento,
         $endereco_complemento,
         $endereco_cidade,
         $endereco_estado;

    /**
     * @return mixed
     */
    public function getEnderecoNumeroComplemento()
    {
        return $this->endereco_numero_complemento;
    }

    /**
     * @param mixed $endereco_numero_complemento
     */
    public function setEnderecoNumeroComplemento($endereco_numero_complemento)
    {
        $this->endereco_numero_complemento = $endereco_numero_complemento;
    }

    /**
     * @return mixed
     */
    public function getEnderecoId()
    {
        return $this->endereco_id;
    }

    /**
     * @param mixed $endereco_id
     */
    public function setEnderecoId($endereco_id)
    {
        $this->endereco_id = $endereco_id;
    }

    /**
     * @return mixed
     */
    public function getEnderecoCep()
    {
        return $this->endereco_cep;
    }

    /**
     * @param mixed $endereco_cep
     */
    public function setEnderecoCep($endereco_cep)
    {
        $this->endereco_cep = $endereco_cep;
    }

    /**
     * @return mixed
     */
    public function getEnderecoRua()
    {
        return $this->endereco_rua;
    }

    /**
     * @param mixed $endereco_rua
     */
    public function setEnderecoRua($endereco_rua)
    {
        $this->endereco_rua = $endereco_rua;
    }

    /**
     * @return mixed
     */
    public function getEnderecoBairro()
    {
        return $this->endereco_bairro;
    }

    /**
     * @param mixed $endereco_bairro
     */
    public function setEnderecoBairro($endereco_bairro)
    {
        $this->endereco_bairro = $endereco_bairro;
    }

    /**
     * @return mixed
     */
    public function getEnderecoNumero()
    {
        return $this->endereco_numero;
    }

    /**
     * @param mixed $endereco_numero
     */
    public function setEnderecoNumero($endereco_numero)
    {
        $this->endereco_numero = $endereco_numero;
    }

    /**
     * @return mixed
     */
    public function getEnderecoComplemento()
    {
        return $this->endereco_complemento;
    }

    /**
     * @param mixed $endereco_complemento
     */
    public function setEnderecoComplemento($endereco_complemento)
    {
        $this->endereco_complemento = $endereco_complemento;
    }

    /**
     * @return mixed
     */
    public function getEnderecoCidade()
    {
        return $this->endereco_cidade;
    }

    /**
     * @param mixed $endereco_cidade
     */
    public function setEnderecoCidade($endereco_cidade)
    {
        $this->endereco_cidade = $endereco_cidade;
    }

    /**
     * @return mixed
     */
    public function getEnderecoEstado()
    {
        return $this->endereco_estado;
    }

    /**
     * @param mixed $endereco_estado
     */
    public function setEnderecoEstado($endereco_estado)
    {
        $this->endereco_estado = $endereco_estado;
    }



}