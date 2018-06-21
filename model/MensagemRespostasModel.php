<?php

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class MensagemRespostasModel extends ConnectionFactory{

    private $men_resp_id,
            $men_resp_men_ref,
            $men_resp_assunto,
            $men_resp_mensagem;

    /**
     * @return mixed
     */
    public function getMenRespId()
    {
        return $this->men_resp_id;
    }

    /**
     * @param mixed $men_resp_id
     */
    public function setMenRespId($men_resp_id)
    {
        $this->men_resp_id = $men_resp_id;
    }

    /**
     * @return mixed
     */
    public function getMenRespMenRef()
    {
        return $this->men_resp_men_ref;
    }

    /**
     * @param mixed $men_resp_men_ref
     */
    public function setMenRespMenRef($men_resp_men_ref)
    {
        $this->men_resp_men_ref = $men_resp_men_ref;
    }


    /**
     * @return mixed
     */
    public function getMenRespAssunto()
    {
        return $this->men_resp_assunto;
    }

    /**
     * @param mixed $men_resp_assunto
     */
    public function setMenRespAssunto($men_resp_assunto)
    {
        $this->men_resp_assunto = $men_resp_assunto;
    }


    /**
     * @return mixed
     */
    public function getMenRespMensagem()
    {
        return $this->men_resp_mensagem;
    }

    /**
     * @param mixed $men_resp_mensagem
     */
    public function setMenRespMensagem($men_resp_mensagem)
    {
        $this->men_resp_mensagem = $men_resp_mensagem;
    }



}