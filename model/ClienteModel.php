<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 00:16
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class ClienteModel extends ConnectionFactory
{

    private $cli_id,
        $cli_email,
        $cli_senha,
        $cli_data_ts,
        $cli_uid,
        $cli_ativo,
        $cli_nome,
        $cli_foto,
        $cli_complemento,
        $cli_endereco,
        $cli_cidade,
        $cli_estado,
        $cli_pais,
        $cli_twitter,
        $cli_facebook,
        $cli_descricao,
        $cli_estado_civil,
        $cli_sexo,
        $cli_data_nasc,
        $cli_sobrenome;

    /**
     * @return mixed
     */
    public function getCliComplemento()
    {
        return $this->cli_complemento;
    }

    /**
     * @param mixed $cli_complemento
     */
    public function setCliComplemento($cli_complemento)
    {
        $this->cli_complemento = $cli_complemento;
    }

    /**
     * @return mixed
     */
    public function getCliEndereco()
    {
        return $this->cli_endereco;
    }

    /**
     * @param mixed $cli_endereco
     */
    public function setCliEndereco($cli_endereco)
    {
        $this->cli_endereco = $cli_endereco;
    }

    /**
     * @return mixed
     */
    public function getCliCidade()
    {
        return $this->cli_cidade;
    }

    /**
     * @param mixed $cli_cidade
     */
    public function setCliCidade($cli_cidade)
    {
        $this->cli_cidade = $cli_cidade;
    }

    /**
     * @return mixed
     */
    public function getCliEstado()
    {
        return $this->cli_estado;
    }

    /**
     * @param mixed $cli_estado
     */
    public function setCliEstado($cli_estado)
    {
        $this->cli_estado = $cli_estado;
    }

    /**
     * @return mixed
     */
    public function getCliPais()
    {
        return $this->cli_pais;
    }

    /**
     * @param mixed $cli_pais
     */
    public function setCliPais($cli_pais)
    {
        $this->cli_pais = $cli_pais;
    }

    /**
     * @return mixed
     */
    public function getCliFacebook()
    {
        return $this->cli_facebook;
    }

    /**
     * @param mixed $cli_facebook
     */
    public function setCliFacebook($cli_facebook)
    {
        $this->cli_facebook = $cli_facebook;
    }

    /**
     * @return mixed
     */
    public function getCliTwitter()
    {
        return $this->cli_twitter;
    }

    /**
     * @param mixed $cli_twitter
     */
    public function setCliTwitter($cli_twitter)
    {
        $this->cli_twitter = $cli_twitter;
    }

    /**
     * @return mixed
     */
    public function getCliDescricao()
    {
        return $this->cli_descricao;
    }

    /**
     * @param mixed $cli_descricao
     */
    public function setCliDescricao($cli_descricao)
    {
        $this->cli_descricao = $cli_descricao;
    }

    /**
     * @return mixed
     */
    public function getCliEstadoCivil()
    {
        return $this->cli_estado_civil;
    }

    /**
     * @param mixed $cli_estado_civil
     */
    public function setCliEstadoCivil($cli_estado_civil)
    {
        $this->cli_estado_civil = $cli_estado_civil;
    }

    /**
     * @return mixed
     */
    public function getCliSexo()
    {
        return $this->cli_sexo;
    }

    /**
     * @param mixed $cli_sexo
     */
    public function setCliSexo($cli_sexo)
    {
        $this->cli_sexo = $cli_sexo;
    }

    /**
     * @return mixed
     */
    public function getCliDataNasc()
    {
        return $this->cli_data_nasc;
    }

    /**
     * @param mixed $cli_data_nasc
     */
    public function setCliDataNasc($cli_data_nasc)
    {
        $this->cli_data_nasc = $cli_data_nasc;
    }

    /**
     * @return mixed
     */
    public function getCliSobrenome()
    {
        return $this->cli_sobrenome;
    }

    /**
     * @param mixed $cli_sobrenome
     */
    public function setCliSobrenome($cli_sobrenome)
    {
        $this->cli_sobrenome = $cli_sobrenome;
    }

    /**
     * @return mixed
     */
    public function getCliNome()
    {
        return $this->cli_nome;
    }

    /**
     * @param mixed $cli_nome
     */
    public function setCliNome($cli_nome)
    {
        $this->cli_nome = $cli_nome;
    }

    /**
     * @return mixed
     */
    public function getCliFoto()
    {
        return $this->cli_foto;
    }

    /**
     * @param mixed $cli_foto
     */
    public function setCliFoto($cli_foto)
    {
        $this->cli_foto = $cli_foto;
    }

    /**
     * @return mixed
     */
    public function getCliId()
    {
        return $this->cli_id;
    }

    /**
     * @param mixed $cli_id
     */
    public function setCliId($cli_id)
    {
        $this->cli_id = $cli_id;
    }
    
    /**
     * @return mixed
     */
    public function getCliEmail()
    {
        return $this->cli_email;
    }

    /**
     * @param mixed $cli_email
     */
    public function setCliEmail($cli_email)
    {
        $this->cli_email = $cli_email;
    }

    /**
     * @return mixed
     */
    public function getCliSenha()
    {
        return $this->cli_senha;
    }

    /**
     * @param mixed $cli_senha
     */
    public function setCliSenha($cli_senha)
    {
        $this->cli_senha = $cli_senha;
    }

    /**
     * @return mixed
     */
    public function getCliDataTs()
    {
        return $this->cli_data_ts;
    }

    /**
     * @param mixed $cli_data_ts
     */
    public function setCliDataTs($cli_data_ts)
    {
        $this->cli_data_ts = $cli_data_ts;
    }

    /**
     * @return mixed
     */
    public function getCliUid()
    {
        return $this->cli_uid;
    }

    /**
     * @param mixed $cli_uid
     */
    public function setCliUid($cli_uid)
    {
        $this->cli_uid = $cli_uid;
    }

    /**
     * @return mixed
     */
    public function getCliAtivo()
    {
        return $this->cli_ativo;
    }

    /**
     * @param mixed $cli_ativo
     */
    public function setCliAtivo($cli_ativo)
    {
        $this->cli_ativo = $cli_ativo;
    }

}
