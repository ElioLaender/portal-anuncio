<?php

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class SubCategoriaModel extends ConnectionFactory {

    private $sub_categoria_id,
            $sub_categoria_descricao,
            $sub_categoria_cat_ref;

    /**
     * @return mixed
     */
    public function getSubCategoriaId()
    {
        return $this->sub_categoria_id;
    }

    /**
     * @param mixed $sub_categoria_id
     */
    public function setSubCategoriaId($sub_categoria_id)
    {
        $this->sub_categoria_id = $sub_categoria_id;
    }

    /**
     * @return mixed
     */
    public function getSubCategoriaDescricao()
    {
        return $this->sub_categoria_descricao;
    }

    /**
     * @param mixed $sub_categoria_descricao
     */
    public function setSubCategoriaDescricao($sub_categoria_descricao)
    {
        $this->sub_categoria_descricao = $sub_categoria_descricao;
    }

    /**
     * @return mixed
     */
    public function getSubCategoriaCatRef()
    {
        return $this->sub_categoria_cat_ref;
    }

    /**
     * @param mixed $sub_categoria_cat_ref
     */
    public function setSubCategoriaCatRef($sub_categoria_cat_ref)
    {
        $this->sub_categoria_cat_ref = $sub_categoria_cat_ref;
    }




}