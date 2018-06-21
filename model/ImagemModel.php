<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 10:27
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class ImagemModel extends ConnectionFactory{

    private $imagem_id,
            $imagem_anuncio_ref,
            $imagem_localizacao;

    /**
     * @return mixed
     */
    public function getImagemId()
    {
        return $this->imagem_id;
    }

    /**
     * @param mixed $imagem_id
     */
    public function setImagemId($imagem_id)
    {
        $this->imagem_id = $imagem_id;
    }

    /**
     * @return mixed
     */
    public function getImagemAnuncioRef()
    {
        return $this->imagem_anuncio_ref;
    }

    /**
     * @param mixed $imagem_anuncio_ref
     */
    public function setImagemAnuncioRef($imagem_anuncio_ref)
    {
        $this->imagem_anuncio_ref = $imagem_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getImagemLocalizacao()
    {
        return $this->imagem_localizacao;
    }

    /**
     * @param mixed $imagem_localizacao
     */
    public function setImagemLocalizacao($imagem_localizacao)
    {
        $this->imagem_localizacao = $imagem_localizacao;
    }


}