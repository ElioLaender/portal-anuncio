<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 01/03/16
 * Time: 18:45
 */

require_once "dao/ConnectionFactory/ConnectionFactory.php";

class DescontoVirtualModel extends ConnectionFactory{

      private   $desconto_virtual_id,
                $desconto_virtual_titulo,
                $desconto_virtual_descricao,
                $desconto_virtual_redireciona,
                $desconto_virtual_inicio,
                $desconto_virtual_termino,
                $desconto_virtual_tipo,
                $desconto_virtual_percent,
                $desconto_virtual_valor_de,
                $desconto_virtual_valor_para,
                $desconto_virtual_img,
                $desconto_virtual_url,
                $desconto_virtual_nome_loja;

    /**
     * @return mixed
     */
    public function getDescontoVirtualUrl()
    {
        return $this->desconto_virtual_url;
    }

    /**
     * @param mixed $desconto_virtual_url
     */
    public function setDescontoVirtualUrl($desconto_virtual_url)
    {
        $this->desconto_virtual_url = $desconto_virtual_url;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualNomeLoja()
    {
        return $this->desconto_virtual_nome_loja;
    }

    /**
     * @param mixed $desconto_virtual_nome_loja
     */
        public function setDescontoVirtualNomeLoja($desconto_virtual_nome_loja)
    {
        $this->desconto_virtual_nome_loja = $desconto_virtual_nome_loja;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualId()
    {
        return $this->desconto_virtual_id;
    }

    /**
     * @param mixed $desconto_virtual_id
     */
    public function setDescontoVirtualId($desconto_virtual_id)
    {
        $this->desconto_virtual_id = $desconto_virtual_id;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualTitulo()
    {
        return $this->desconto_virtual_titulo;
    }

    /**
     * @param mixed $desconto_virtual_titulo
     */
    public function setDescontoVirtualTitulo($desconto_virtual_titulo)
    {
        $this->desconto_virtual_titulo = $desconto_virtual_titulo;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualDescricao()
    {
        return $this->desconto_virtual_descricao;
    }

    /**
     * @param mixed $desconto_virtual_descricao
     */
    public function setDescontoVirtualDescricao($desconto_virtual_descricao)
    {
        $this->desconto_virtual_descricao = $desconto_virtual_descricao;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualRedireciona()
    {
        return $this->desconto_virtual_redireciona;
    }

    /**
     * @param mixed $desconto_virtual_redireciona
     */
    public function setDescontoVirtualRedireciona($desconto_virtual_redireciona)
    {
        $this->desconto_virtual_redireciona = $desconto_virtual_redireciona;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualInicio()
    {
        return $this->desconto_virtual_inicio;
    }

    /**
     * @param mixed $desconto_virtual_inicio
     */
    public function setDescontoVirtualInicio($desconto_virtual_inicio)
    {
        $this->desconto_virtual_inicio = $desconto_virtual_inicio;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualTermino()
    {
        return $this->desconto_virtual_termino;
    }

    /**
     * @param mixed $desconto_virtual_termino
     */
    public function setDescontoVirtualTermino($desconto_virtual_termino)
    {
        $this->desconto_virtual_termino = $desconto_virtual_termino;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualTipo()
    {
        return $this->desconto_virtual_tipo;
    }

    /**
     * @param mixed $desconto_virtual_tipo
     */
    public function setDescontoVirtualTipo($desconto_virtual_tipo)
    {
        $this->desconto_virtual_tipo = $desconto_virtual_tipo;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualPercent()
    {
        return $this->desconto_virtual_percent;
    }

    /**
     * @param mixed $desconto_virtual_percent
     */
    public function setDescontoVirtualPercent($desconto_virtual_percent)
    {
        $this->desconto_virtual_percent = $desconto_virtual_percent;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualValorDe()
    {
        return $this->desconto_virtual_valor_de;
    }

    /**
     * @param mixed $desconto_virtual_valor_de
     */
    public function setDescontoVirtualValorDe($desconto_virtual_valor_de)
    {
        $this->desconto_virtual_valor_de = $desconto_virtual_valor_de;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualValorPara()
    {
        return $this->desconto_virtual_valor_para;
    }

    /**
     * @param mixed $desconto_virtual_valor_para
     */
    public function setDescontoVirtualValorPara($desconto_virtual_valor_para)
    {
        $this->desconto_virtual_valor_para = $desconto_virtual_valor_para;
    }

    /**
     * @return mixed
     */
    public function getDescontoVirtualImg()
    {
        return $this->desconto_virtual_img;
    }

    /**
     * @param mixed $desconto_virtual_img
     */
    public function setDescontoVirtualImg($desconto_virtual_img)
    {
        $this->desconto_virtual_img = $desconto_virtual_img;
    }


}