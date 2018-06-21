<?php


include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class ContViewsModel extends ConnectionFactory{

    private $cont_views_id,
            $cont_views_anuncio_ref,
            $cont_views_qtd_total;

    /**
     * @return mixed
     */
    public function getContViewsId()
    {
        return $this->cont_views_id;
    }

    /**
     * @param mixed $cont_views_id
     */
    public function setContViewsId($cont_views_id)
    {
        $this->cont_views_id = $cont_views_id;
    }

    /**
     * @return mixed
     */
    public function getContViewsAnuncioRef()
    {
        return $this->cont_views_anuncio_ref;
    }

    /**
     * @param mixed $cont_views_anuncio_ref
     */
    public function setContViewsAnuncioRef($cont_views_anuncio_ref)
    {
        $this->cont_views_anuncio_ref = $cont_views_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getContViewsQtdTotal()
    {
        return $this->cont_views_qtd_total;
    }

    /**
     * @param mixed $cont_views_qtd_total
     */
    public function setContViewsQtdTotal($cont_views_qtd_total)
    {
        $this->cont_views_qtd_total = $cont_views_qtd_total;
    }




}