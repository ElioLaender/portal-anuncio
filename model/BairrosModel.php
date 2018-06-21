<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 22/01/16
 * Time: 14:44
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class BairrosModel extends ConnectionFactory{

    private $bairros_id,
            $bairros_nome;

    /**
     * @return mixed
     */
    public function getBairrosId()
    {
        return $this->bairros_id;
    }

    /**
     * @param mixed $bairros_id
     */
    public function setBairrosId($bairros_id)
    {
        $this->bairros_id = $bairros_id;
    }

    /**
     * @return mixed
     */
    public function getBairrosNome()
    {
        return $this->bairros_nome;
    }

    /**
     * @param mixed $bairros_nome
     */
    public function setBairrosNome($bairros_nome)
    {
        $this->bairros_nome = $bairros_nome;
    }


}