<?php

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class AvaliacaoRespostasModel extends ConnectionFactory{

    private $avaliacao_respostas_id,
            $avaliacao_respostas_cliente_ref,
            $avaliacao_respostas_retorno,
            $avaliacao_respostas_data_hora,
            $avaliacao_respostas_avaliacao_ref,
            $avaliacao_respostas_dono;

    /**
     * @return mixed
     */
    public function getAvaliacaoRespostasDono()
    {
        return $this->avaliacao_respostas_dono;
    }

    /**
     * @param mixed $avaliacao_respostas_dono
     */
    public function setAvaliacaoRespostasDono($avaliacao_respostas_dono)
    {
        $this->avaliacao_respostas_dono = $avaliacao_respostas_dono;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoRespostasId()
    {
        return $this->avaliacao_respostas_id;
    }

    /**
     * @param mixed $avaliacao_respostas_id
     */
    public function setAvaliacaoRespostasId($avaliacao_respostas_id)
    {
        $this->avaliacao_respostas_id = $avaliacao_respostas_id;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoRespostasClienteRef()
    {
        return $this->avaliacao_respostas_cliente_ref;
    }

    /**
     * @param mixed $avaliacao_respostas_cliente_ref
     */
    public function setAvaliacaoRespostasClienteRef($avaliacao_respostas_cliente_ref)
    {
        $this->avaliacao_respostas_cliente_ref = $avaliacao_respostas_cliente_ref;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoRespostasRetorno()
    {
        return $this->avaliacao_respostas_retorno;
    }

    /**
     * @param mixed $avaliacao_respostas_retorno
     */
    public function setAvaliacaoRespostasRetorno($avaliacao_respostas_retorno)
    {
        $this->avaliacao_respostas_retorno = $avaliacao_respostas_retorno;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoRespostasDataHora()
    {
        return $this->avaliacao_respostas_data_hora;
    }

    /**
     * @param mixed $avaliacao_respostas_data_hora
     */
    public function setAvaliacaoRespostasDataHora($avaliacao_respostas_data_hora)
    {
        $this->avaliacao_respostas_data_hora = $avaliacao_respostas_data_hora;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoRespostasAvaliacaoRef()
    {
        return $this->avaliacao_respostas_avaliacao_ref;
    }

    /**
     * @param mixed $avaliacao_respostas_avaliacao_ref
     */
    public function setAvaliacaoRespostasAvaliacaoRef($avaliacao_respostas_avaliacao_ref)
    {
        $this->avaliacao_respostas_avaliacao_ref = $avaliacao_respostas_avaliacao_ref;
    }


}