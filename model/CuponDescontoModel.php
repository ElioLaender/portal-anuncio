<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 23/02/16
 * Time: 10:30
 */
include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class CuponDescontoModel extends ConnectionFactory
{

    private $cupon_desconto_id,
        $cupon_desconto_titulo,
        $cupon_desconto_descricao,
        $cupon_desconto_qtd_impress,
        $cupon_desconto_inicio,
        $cupon_desconto_termino,
        $cupon_desconto_tipo,
        $cupon_desconto_percent,
        $cupon_desconto_valor_de,
        $cupon_desconto_valor_para,
        $cupon_desconto_img,
        $cupon_desconto_cli_id,
        $cupon_desconto_anun_ref,
        $cupon_desconto_excluido,
        $cupon_desconto_impressos,
        $cupon_desconto_restantes;

    /**
     * @return mixed
     */
    public function getCuponDescontoCliId()
    {
        return $this->cupon_desconto_cli_id;
    }

    /**
     * @param mixed $cupon_desconto_cli_id
     */
    public function setCuponDescontoCliId($cupon_desconto_cli_id)
    {
        $this->cupon_desconto_cli_id = $cupon_desconto_cli_id;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoImpressos()
    {
        return $this->cupon_desconto_impressos;
    }

    /**
     * @param mixed $cupon_desconto_impressos
     */
    public function setCuponDescontoImpressos($cupon_desconto_impressos)
    {
        $this->cupon_desconto_impressos = $cupon_desconto_impressos;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoRestantes()
    {
        return $this->cupon_desconto_restantes;
    }

    /**
     * @param mixed $cupon_desconto_restantes
     */
    public function setCuponDescontoRestantes($cupon_desconto_restantes)
    {
        $this->cupon_desconto_restantes = $cupon_desconto_restantes;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoExcluido()
    {
        return $this->cupon_desconto_excluido;
    }

    /**
     * @param mixed $cupon_desconto_excluido
     */
    public function setCuponDescontoExcluido($cupon_desconto_excluido)
    {
        $this->cupon_desconto_excluido = $cupon_desconto_excluido;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoAnunRef()
    {
        return $this->cupon_desconto_anun_ref;
    }

    /**
     * @param mixed $cupon_desconto_anun_ref
     */
    public function setCuponDescontoAnunRef($cupon_desconto_anun_ref)
    {
        $this->cupon_desconto_anun_ref = $cupon_desconto_anun_ref;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoId()
    {
        return $this->cupon_desconto_id;
    }

    /**
     * @param mixed $cupon_desconto_id
     */
    public function setCuponDescontoId($cupon_desconto_id)
    {
        $this->cupon_desconto_id = $cupon_desconto_id;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoTitulo()
    {
        return $this->cupon_desconto_titulo;
    }

    /**
     * @param mixed $cupon_desconto_titulo
     */
    public function setCuponDescontoTitulo($cupon_desconto_titulo)
    {
        $this->cupon_desconto_titulo = $cupon_desconto_titulo;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoDescricao()
    {
        return $this->cupon_desconto_descricao;
    }

    /**
     * @param mixed $cupon_desconto_descricao
     */
    public function setCuponDescontoDescricao($cupon_desconto_descricao)
    {
        $this->cupon_desconto_descricao = $cupon_desconto_descricao;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoQtdImpress()
    {
        return $this->cupon_desconto_qtd_impress;
    }

    /**
     * @param mixed $cupon_desconto_qtd_impress
     */
    public function setCuponDescontoQtdImpress($cupon_desconto_qtd_impress)
    {
        $this->cupon_desconto_qtd_impress = $cupon_desconto_qtd_impress;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoInicio()
    {
        return $this->cupon_desconto_inicio;
    }

    /**
     * @param mixed $cupon_desconto_inicio
     */
    public function setCuponDescontoInicio($cupon_desconto_inicio)
    {
        $this->cupon_desconto_inicio = $cupon_desconto_inicio;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoTermino()
    {
        return $this->cupon_desconto_termino;
    }

    /**
     * @param mixed $cupon_desconto_termino
     */
    public function setCuponDescontoTermino($cupon_desconto_termino)
    {
        $this->cupon_desconto_termino = $cupon_desconto_termino;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoTipo()
    {
        return $this->cupon_desconto_tipo;
    }

    /**
     * @param mixed $cupon_desconto_tipo
     */
    public function setCuponDescontoTipo($cupon_desconto_tipo)
    {
        $this->cupon_desconto_tipo = $cupon_desconto_tipo;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoPercent()
    {
        return $this->cupon_desconto_percent;
    }

    /**
     * @param mixed $cupon_desconto_percent
     */
    public function setCuponDescontoPercent($cupon_desconto_percent)
    {
        $this->cupon_desconto_percent = $cupon_desconto_percent;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoValorDe()
    {
        return $this->cupon_desconto_valor_de;
    }

    /**
     * @param mixed $cupon_desconto_valor_de
     */
    public function setCuponDescontoValorDe($cupon_desconto_valor_de)
    {
        $this->cupon_desconto_valor_de = $cupon_desconto_valor_de;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoValorPara()
    {
        return $this->cupon_desconto_valor_para;
    }

    /**
     * @param mixed $cupon_desconto_valor_para
     */
    public function setCuponDescontoValorPara($cupon_desconto_valor_para)
    {
        $this->cupon_desconto_valor_para = $cupon_desconto_valor_para;
    }

    /**
     * @return mixed
     */
    public function getCuponDescontoImg()
    {
        return $this->cupon_desconto_img;
    }

    /**
     * @param mixed $cupon_desconto_img
     */
    public function setCuponDescontoImg($cupon_desconto_img)
    {
        $this->cupon_desconto_img = $cupon_desconto_img;
    }




}