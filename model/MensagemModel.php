<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:00
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class MensagemModel extends ConnectionFactory{

    private $mensagem_id,
            $mensagem_nome,
            $mensagem_texto,
            $mensagem_anuncio_ref,
            $mensagem_email,
            $mensagem_exclu,
            $mensagem_tel;

    /**
     * @return mixed
     */
    public function getMensagemExclu()
    {
        return $this->mensagem_exclu;
    }

    /**
     * @param mixed $mensagem_exclu
     */
    public function setMensagemExclu($mensagem_exclu)
    {
        $this->mensagem_exclu = $mensagem_exclu;
    }

    /**
     * @return mixed
     */
    public function getMensagemTel()
    {
        return $this->mensagem_tel;
    }

    /**
     * @param mixed $mensagem_tel
     */
    public function setMensagemTel($mensagem_tel)
    {
        $this->mensagem_tel = $mensagem_tel;
    }

    /**
     * @return mixed
     */
    public function getMensagemId()
    {
        return $this->mensagem_id;
    }

    /**
     * @param mixed $mensagem_id
     */
    public function setMensagemId($mensagem_id)
    {
        $this->mensagem_id = $mensagem_id;
    }

    /**
     * @return mixed
     */
    public function getMensagemNome()
    {
        return $this->mensagem_nome;
    }

    /**
     * @param mixed $mensagem_nome
     */
    public function setMensagemNome($mensagem_nome)
    {
        $this->mensagem_nome = $mensagem_nome;
    }

    /**
     * @return mixed
     */
    public function getMensagemTexto()
    {
        return $this->mensagem_texto;
    }

    /**
     * @param mixed $mensagem_texto
     */
    public function setMensagemTexto($mensagem_texto)
    {
        $this->mensagem_texto = $mensagem_texto;
    }

    /**
     * @return mixed
     */
    public function getMensagemAnuncioRef()
    {
        return $this->mensagem_anuncio_ref;
    }

    /**
     * @param mixed $mensagem_anuncio_ref
     */
    public function setMensagemAnuncioRef($mensagem_anuncio_ref)
    {
        $this->mensagem_anuncio_ref = $mensagem_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getMensagemEmail()
    {
        return $this->mensagem_email;
    }

    /**
     * @param mixed $mensagem_email
     */
    public function setMensagemEmail($mensagem_email)
    {
        $this->mensagem_email = $mensagem_email;
    }


}