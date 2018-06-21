<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 10:12
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class FormaPagamentoModel extends ConnectionFactory{

    private $forma_pag_id,
            $forma_pag_visa,
            $forma_pag_master_card,
            $forma_pag_boleto,
            $forma_pag_cheque,
            $forma_pag_vale_alimentacao,
            $forma_pag_dinheiro,
            $forma_pag_credito,
            $forma_pag_debito,
            $forma_pag_american_express,
            $forma_pag_diner_club,
            $forma_pag_elo,
            $forma_pag_pagseguro,
            $forma_pag_paypal,
            $forma_pag_mercado_pago,
            $forma_pag_sodexo,
            $forma_pag_ticket_restaurant,
            $forma_pag_anuncio_ref,
            $forma_pag_outros_formPag,
            $forma_pag_outros_band;

    /**
     * @return mixed
     */
    public function getFormaPagOutrosBand()
    {
        return $this->forma_pag_outros_band;
    }

    /**
     * @param mixed $forma_pag_outros_band
     */
    public function setFormaPagOutrosBand($forma_pag_outros_band)
    {
        $this->forma_pag_outros_band = $forma_pag_outros_band;
    }

    /**
     * @return mixed
     */
    public function getFormaPagOutrosFormPag()
    {
        return $this->forma_pag_outros_formPag;
    }

    /**
     * @param mixed $forma_pag_outros_formPag
     */
    public function setFormaPagOutrosFormPag($forma_pag_outros_formPag)
    {
        $this->forma_pag_outros_formPag = $forma_pag_outros_formPag;
    }

    /**
     * @return mixed
     */
    public function getFormaPagAnuncioRef()
    {
        return $this->forma_pag_anuncio_ref;
    }

    /**
     * @param mixed $forma_pag_anuncio_ref
     */
    public function setFormaPagAnuncioRef($forma_pag_anuncio_ref)
    {
        $this->forma_pag_anuncio_ref = $forma_pag_anuncio_ref;
    }



    /**
     * @return mixed
     */
    public function getFormaPagAmericanExpress()
    {
        return $this->forma_pag_american_express;
    }

    /**
     * @param mixed $forma_pag_american_express
     */
    public function setFormaPagAmericanExpress($forma_pag_american_express)
    {
        $this->forma_pag_american_express = $forma_pag_american_express;
    }

    /**
     * @return mixed
     */
    public function getFormaPagElo()
    {
        return $this->forma_pag_elo;
    }

    /**
     * @param mixed $forma_pag_elo
     */
    public function setFormaPagElo($forma_pag_elo)
    {
        $this->forma_pag_elo = $forma_pag_elo;
    }

    /**
     * @return mixed
     */
    public function getFormaPagDinerClub()
    {
        return $this->forma_pag_diner_club;
    }

    /**
     * @param mixed $forma_pag_diner_club
     */
    public function setFormaPagDinerClub($forma_pag_diner_club)
    {
        $this->forma_pag_diner_club = $forma_pag_diner_club;
    }

    /**
     * @return mixed
     */
    public function getFormaPagPagseguro()
    {
        return $this->forma_pag_pagseguro;
    }

    /**
     * @param mixed $forma_pag_pagseguro
     */
    public function setFormaPagPagseguro($forma_pag_pagseguro)
    {
        $this->forma_pag_pagseguro = $forma_pag_pagseguro;
    }

    /**
     * @return mixed
     */
    public function getFormaPagPaypal()
    {
        return $this->forma_pag_paypal;
    }

    /**
     * @param mixed $forma_pag_paypal
     */
    public function setFormaPagPaypal($forma_pag_paypal)
    {
        $this->forma_pag_paypal = $forma_pag_paypal;
    }

    /**
     * @return mixed
     */
    public function getFormaPagMercadoPago()
    {
        return $this->forma_pag_mercado_pago;
    }

    /**
     * @param mixed $forma_pag_mercado_pago
     */
    public function setFormaPagMercadoPago($forma_pag_mercado_pago)
    {
        $this->forma_pag_mercado_pago = $forma_pag_mercado_pago;
    }

    /**
     * @return mixed
     */
    public function getFormaPagSodexo()
    {
        return $this->forma_pag_sodexo;
    }

    /**
     * @param mixed $forma_pag_sodexo
     */
    public function setFormaPagSodexo($forma_pag_sodexo)
    {
        $this->forma_pag_sodexo = $forma_pag_sodexo;
    }

    /**
     * @return mixed
     */
    public function getFormaPagTicketRestaurant()
    {
        return $this->forma_pag_ticket_restaurant;
    }

    /**
     * @param mixed $forma_pag_ticket_restaurant
     */
    public function setFormaPagTicketRestaurant($forma_pag_ticket_restaurant)
    {
        $this->forma_pag_ticket_restaurant = $forma_pag_ticket_restaurant;
    }

    /**
     * @return mixed
     */
    public function getFormaPagId()
    {
        return $this->forma_pag_id;
    }

    /**
     * @param mixed $forma_pag_id
     */
    public function setFormaPagId($forma_pag_id)
    {
        $this->forma_pag_id = $forma_pag_id;
    }

    /**
     * @return mixed
     */
    public function getFormaPagVisa()
    {
        return $this->forma_pag_visa;
    }

    /**
     * @param mixed $forma_pag_visa
     */
    public function setFormaPagVisa($forma_pag_visa)
    {
        $this->forma_pag_visa = $forma_pag_visa;
    }

    /**
     * @return mixed
     */
    public function getFormaPagMasterCard()
    {
        return $this->forma_pag_master_card;
    }

    /**
     * @param mixed $forma_pag_master_card
     */
    public function setFormaPagMasterCard($forma_pag_master_card)
    {
        $this->forma_pag_master_card = $forma_pag_master_card;
    }

    /**
     * @return mixed
     */
    public function getFormaPagCheque()
    {
        return $this->forma_pag_cheque;
    }

    /**
     * @param mixed $forma_pag_cheque
     */
    public function setFormaPagCheque($forma_pag_cheque)
    {
        $this->forma_pag_cheque = $forma_pag_cheque;
    }

    /**
     * @return mixed
     */
    public function getFormaPagBoleto()
    {
        return $this->forma_pag_boleto;
    }

    /**
     * @param mixed $forma_pag_boleto
     */
    public function setFormaPagBoleto($forma_pag_boleto)
    {
        $this->forma_pag_boleto = $forma_pag_boleto;
    }

    /**
     * @return mixed
     */
    public function getFormaPagValeAlimentacao()
    {
        return $this->forma_pag_vale_alimentacao;
    }

    /**
     * @param mixed $forma_pag_vale_alimentacao
     */
    public function setFormaPagValeAlimentacao($forma_pag_vale_alimentacao)
    {
        $this->forma_pag_vale_alimentacao = $forma_pag_vale_alimentacao;
    }

    /**
     * @return mixed
     */
    public function getFormaPagDinheiro()
    {
        return $this->forma_pag_dinheiro;
    }

    /**
     * @param mixed $forma_pag_dinheiro
     */
    public function setFormaPagDinheiro($forma_pag_dinheiro)
    {
        $this->forma_pag_dinheiro = $forma_pag_dinheiro;
    }

    /**
     * @return mixed
     */
    public function getFormaPagDebito()
    {
        return $this->forma_pag_debito;
    }

    /**
     * @param mixed $forma_pag_debito
     */
    public function setFormaPagDebito($forma_pag_debito)
    {
        $this->forma_pag_debito = $forma_pag_debito;
    }

    /**
     * @return mixed
     */
    public function getFormaPagCredito()
    {
        return $this->forma_pag_credito;
    }

    /**
     * @param mixed $forma_pag_credito
     */
    public function setFormaPagCredito($forma_pag_credito)
    {
        $this->forma_pag_credito = $forma_pag_credito;
    }


}