<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 15/09/15
 * Time: 21:58
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class AvaliacaoModel extends ConnectionFactory{

    private $avaliacao_id,
            $avaliacao_nota,
            $avaliacao_comentario,
            $avaliacao_data_horario,
            $avaliacao_anuncio_ref,
            $avaliacao_cli_ref,
            $avaliacao_titulo,
            $avaliacao_curtidas;

    /**
     * @return mixed
     */
    public function getAvaliacaoCurtidas()
    {
        return $this->avaliacao_curtidas;
    }

    /**
     * @param mixed $avaliacao_curtidas
     */
    public function setAvaliacaoCurtidas($avaliacao_curtidas)
    {
        $this->avaliacao_curtidas = $avaliacao_curtidas;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoTitulo()
    {
        return $this->avaliacao_titulo;
    }

    /**
     * @param mixed $avaliacao_titulo
     */
    public function setAvaliacaoTitulo($avaliacao_titulo)
    {
        $this->avaliacao_titulo = $avaliacao_titulo;
    }



    /**
     * @return mixed
     */
    public function getAvaliacaoCliRef()
    {
        return $this->avaliacao_cli_ref;
    }

    /**
     * @param mixed $avaliacao_cli_ref
     */
    public function setAvaliacaoCliRef($avaliacao_cli_ref)
    {
        $this->avaliacao_cli_ref = $avaliacao_cli_ref;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoId()
    {
        return $this->avaliacao_id;
    }

    /**
     * @param mixed $avaliacao_id
     */
    public function setAvaliacaoId($avaliacao_id)
    {
        $this->avaliacao_id = $avaliacao_id;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoNota()
    {
        return $this->avaliacao_nota;
    }

    /**
     * @param mixed $avaliacao_nota
     */
    public function setAvaliacaoNota($avaliacao_nota)
    {
        $this->avaliacao_nota = $avaliacao_nota;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoComentario()
    {
        return $this->avaliacao_comentario;
    }

    /**
     * @param mixed $avaliacao_comentario
     */
    public function setAvaliacaoComentario($avaliacao_comentario)
    {
        $this->avaliacao_comentario = $avaliacao_comentario;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoDataHorario()
    {
        return $this->avaliacao_data_horario;
    }

    /**
     * @param mixed $avaliacao_data_horario
     */
    public function setAvaliacaoDataHorario($avaliacao_data_horario)
    {
        $this->avaliacao_data_horario = $avaliacao_data_horario;
    }

    /**
     * @return mixed
     */
    public function getAvaliacaoAnuncioRef()
    {
        return $this->avaliacao_anuncio_ref;
    }

    /**
     * @param mixed $avaliacao_anuncio_ref
     */
    public function setAvaliacaoAnuncioRef($avaliacao_anuncio_ref)
    {
        $this->avaliacao_anuncio_ref = $avaliacao_anuncio_ref;
    }





}