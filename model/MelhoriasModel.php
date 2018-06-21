<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 04/04/16
 * Time: 05:08
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class MelhoriasModel extends ConnectionFactory{

    private $melhorias_id,
            $melhorias_cli_ref,
            $melhorias_assunto,
            $melhorias_opiniao;

    /**
     * @return mixed
     */
    public function getMelhoriasId()
    {
        return $this->melhorias_id;
    }

    /**
     * @param mixed $melhorias_id
     */
    public function setMelhoriasId($melhorias_id)
    {
        $this->melhorias_id = $melhorias_id;
    }

    /**
     * @return mixed
     */
    public function getMelhoriasCliRef()
    {
        return $this->melhorias_cli_ref;
    }

    /**
     * @param mixed $melhorias_cli_ref
     */
    public function setMelhoriasCliRef($melhorias_cli_ref)
    {
        $this->melhorias_cli_ref = $melhorias_cli_ref;
    }

    /**
     * @return mixed
     */
    public function getMelhoriasAssunto()
    {
        return $this->melhorias_assunto;
    }

    /**
     * @param mixed $melhorias_assunto
     */
    public function setMelhoriasAssunto($melhorias_assunto)
    {
        $this->melhorias_assunto = $melhorias_assunto;
    }

    /**
     * @return mixed
     */
    public function getMelhoriasOpiniao()
    {
        return $this->melhorias_opiniao;
    }

    /**
     * @param mixed $melhorias_opiniao
     */
    public function setMelhoriasOpiniao($melhorias_opiniao)
    {
        $this->melhorias_opiniao = $melhorias_opiniao;
    }



}