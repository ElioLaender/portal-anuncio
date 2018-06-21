<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 15/01/16
 * Time: 22:12
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class FacilidadesModel extends ConnectionFactory{

    private $facilidades_idPrimária,
            $facilidades_anuncio_ref,
            $facilidades_estacionamento,
            $facilidades_seguranca,
            $facilidades_acessibilidade,
            $facilidades_ar_condicionado,
            $facilidades_wifii,
            $facilidades_reservar,
            $facilidades_permite_animais,
            $facilidades_cupons_desconto,
            $facilidades_criancas,
            $facilidades_delivery;

    /**
     * @return mixed
     */
    public function getFacilidadesCriancas()
    {
        return $this->facilidades_criancas;
    }

    /**
     * @param mixed $facilidades_criancas
     */
    public function setFacilidadesCriancas($facilidades_criancas)
    {
        $this->facilidades_criancas = $facilidades_criancas;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesDelivery()
    {
        return $this->facilidades_delivery;
    }

    /**
     * @param mixed $facilidades_delivery
     */
    public function setFacilidadesDelivery($facilidades_delivery)
    {
        $this->facilidades_delivery = $facilidades_delivery;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesIdPrimária()
    {
        return $this->facilidades_idPrimária;
    }

    /**
     * @param mixed $facilidades_idPrimária
     */
    public function setFacilidadesIdPrimária($facilidades_idPrimária)
    {
        $this->facilidades_idPrimária = $facilidades_idPrimária;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesAnuncioRef()
    {
        return $this->facilidades_anuncio_ref;
    }

    /**
     * @param mixed $facilidades_anuncio_ref
     */
    public function setFacilidadesAnuncioRef($facilidades_anuncio_ref)
    {
        $this->facilidades_anuncio_ref = $facilidades_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesEstacionamento()
    {
        return $this->facilidades_estacionamento;
    }

    /**
     * @param mixed $facilidades_estacionamento
     */
    public function setFacilidadesEstacionamento($facilidades_estacionamento)
    {
        $this->facilidades_estacionamento = $facilidades_estacionamento;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesSeguranca()
    {
        return $this->facilidades_seguranca;
    }

    /**
     * @param mixed $facilidades_seguranca
     */
    public function setFacilidadesSeguranca($facilidades_seguranca)
    {
        $this->facilidades_seguranca = $facilidades_seguranca;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesAcessibilidade()
    {
        return $this->facilidades_acessibilidade;
    }

    /**
     * @param mixed $facilidades_acessibilidade
     */
    public function setFacilidadesAcessibilidade($facilidades_acessibilidade)
    {
        $this->facilidades_acessibilidade = $facilidades_acessibilidade;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesArCondicionado()
    {
        return $this->facilidades_ar_condicionado;
    }

    /**
     * @param mixed $facilidades_ar_condicionado
     */
    public function setFacilidadesArCondicionado($facilidades_ar_condicionado)
    {
        $this->facilidades_ar_condicionado = $facilidades_ar_condicionado;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesWifii()
    {
        return $this->facilidades_wifii;
    }

    /**
     * @param mixed $facilidades_wifii
     */
    public function setFacilidadesWifii($facilidades_wifii)
    {
        $this->facilidades_wifii = $facilidades_wifii;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesReservar()
    {
        return $this->facilidades_reservar;
    }

    /**
     * @param mixed $facilidades_reservar
     */
    public function setFacilidadesReservar($facilidades_reservar)
    {
        $this->facilidades_reservar = $facilidades_reservar;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesPermiteAnimais()
    {
        return $this->facilidades_permite_animais;
    }

    /**
     * @param mixed $facilidades_permite_animais
     */
    public function setFacilidadesPermiteAnimais($facilidades_permite_animais)
    {
        $this->facilidades_permite_animais = $facilidades_permite_animais;
    }

    /**
     * @return mixed
     */
    public function getFacilidadesCuponsDesconto()
    {
        return $this->facilidades_cupons_desconto;
    }

    /**
     * @param mixed $facilidades_cupons_desconto
     */
    public function setFacilidadesCuponsDesconto($facilidades_cupons_desconto)
    {
        $this->facilidades_cupons_desconto = $facilidades_cupons_desconto;
    }




}