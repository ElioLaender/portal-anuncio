<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 09:38
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class EmailPromocaoModel extends ConnectionFactory{

    private $email_promocao_id,
            $email_promocao_descricao;

    /**
     * @return mixed
     */
    public function getEmailPromocaoDescricao()
    {
        return $this->email_promocao_descricao;
    }

    /**
     * @param mixed $email_promocao_descricao
     */
    public function setEmailPromocaoDescricao($email_promocao_descricao)
    {
        $this->email_promocao_descricao = $email_promocao_descricao;
    }

    /**
     * @return mixed
     */
    public function getEmailPromocaoId()
    {
        return $this->email_promocao_id;
    }

    /**
     * @param mixed $email_promocao_id
     */
    public function setEmailPromocaoId($email_promocao_id)
    {
        $this->email_promocao_id = $email_promocao_id;
    }



}