<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/12/15
 * Time: 18:12
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class FaleConoscoModel extends ConnectionFactory{

    private $fale_conosco_id,
            $fale_conosco_nome,
            $fale_conosco_email,
            $fale_conosco_assunto,
            $fale_conosco_telefone,
            $fale_conosco_mensagem;

    /**
     * @return mixed
     */
    public function getFaleConoscoId()
    {
        return $this->fale_conosco_id;
    }

    /**
     * @param mixed $fale_conosco_id
     */
    public function setFaleConoscoId($fale_conosco_id)
    {
        $this->fale_conosco_id = $fale_conosco_id;
    }

    /**
     * @return mixed
     */
    public function getFaleConoscoNome()
    {
        return $this->fale_conosco_nome;
    }

    /**
     * @param mixed $fale_conosco_nome
     */
    public function setFaleConoscoNome($fale_conosco_nome)
    {
        $this->fale_conosco_nome = $fale_conosco_nome;
    }

    /**
     * @return mixed
     */
    public function getFaleConoscoEmail()
    {
        return $this->fale_conosco_email;
    }

    /**
     * @param mixed $fale_conosco_email
     */
    public function setFaleConoscoEmail($fale_conosco_email)
    {
        $this->fale_conosco_email = $fale_conosco_email;
    }

    /**
     * @return mixed
     */
    public function getFaleConoscoAssunto()
    {
        return $this->fale_conosco_assunto;
    }

    /**
     * @param mixed $fale_conosco_assunto
     */
    public function setFaleConoscoAssunto($fale_conosco_assunto)
    {
        $this->fale_conosco_assunto = $fale_conosco_assunto;
    }

    /**
     * @return mixed
     */
    public function getFaleConoscoTelefone()
    {
        return $this->fale_conosco_telefone;
    }

    /**
     * @param mixed $fale_conosco_telefone
     */
    public function setFaleConoscoTelefone($fale_conosco_telefone)
    {
        $this->fale_conosco_telefone = $fale_conosco_telefone;
    }

    /**
     * @return mixed
     */
    public function getFaleConoscoMensagem()
    {
        return $this->fale_conosco_mensagem;
    }

    /**
     * @param mixed $fale_conosco_mensagem
     */
    public function setFaleConoscoMensagem($fale_conosco_mensagem)
    {
        $this->fale_conosco_mensagem = $fale_conosco_mensagem;
    }



}