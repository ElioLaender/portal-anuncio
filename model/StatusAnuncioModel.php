<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 05/11/15
 * Time: 12:35
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class StatusAnuncioModel extends ConnectionFactory{

    private $status_anuncio_id,
            $status_anuncio_situacao;

    /**
     * @return mixed
     */
    public function getStatusAnuncioId()
    {
        return $this->status_anuncio_id;
    }

    /**
     * @param mixed $status_anuncio_id
     */
    public function setStatusAnuncioId($status_anuncio_id)
    {
        $this->status_anuncio_id = $status_anuncio_id;
    }

    /**
     * @return mixed
     */
    public function getStatusAnuncioSituacao()
    {
        return $this->status_anuncio_situacao;
    }

    /**
     * @param mixed $status_anuncio_situacao
     */
    public function setStatusAnuncioSituacao($status_anuncio_situacao)
    {
        $this->status_anuncio_situacao = $status_anuncio_situacao;
    }




}