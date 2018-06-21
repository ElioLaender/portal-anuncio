<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 00:08
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class CategoriaModel extends ConnectionFactory{

    private $categoria_id,
            $categoria_descricao;

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @return mixed
     */
    public function getCategoriaDescricao()
    {
        return $this->categoria_descricao;
    }

    /**
     * @param mixed $categoria_descricao
     */
    public function setCategoriaDescricao($categoria_descricao)
    {
        $this->categoria_descricao = $categoria_descricao;
    }


}