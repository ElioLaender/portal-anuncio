<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 10:24
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class HorarioFuncionamentoModel extends ConnectionFactory{

    private $horario_func_id,
            $horario_func_semana_inicio,
            $horario_func_semana_termino,
            $horario_func_anuncio_ref,
            $horario_func_sabado_inicio,
            $horario_func_sabado_termino,
            $horario_func_domingo_inicio,
            $horario_func_domingo_termino;

    /**
     * @return mixed
     */
    public function getHorarioFuncId()
    {
        return $this->horario_func_id;
    }

    /**
     * @param mixed $horario_func_id
     */
    public function setHorarioFuncId($horario_func_id)
    {
        $this->horario_func_id = $horario_func_id;
    }

    /**
     * @return mixed
     */
    public function getHorarioFuncSemanaInicio()
    {
        return $this->horario_func_semana_inicio;
    }

    /**
     * @param mixed $horario_func_semana_inicio
     */
    public function setHorarioFuncSemanaInicio($horario_func_semana_inicio)
    {
        $this->horario_func_semana_inicio = $horario_func_semana_inicio;
    }

    /**
     * @return mixed
     */
    public function getHorarioFuncSemanaTermino()
    {
        return $this->horario_func_semana_termino;
    }

    /**
     * @param mixed $horario_func_semana_termino
     */
    public function setHorarioFuncSemanaTermino($horario_func_semana_termino)
    {
        $this->horario_func_semana_termino = $horario_func_semana_termino;
    }

    /**
     * @return mixed
     */
    public function getHorarioFuncAnuncioRef()
    {
        return $this->horario_func_anuncio_ref;
    }

    /**
     * @param mixed $horario_func_anuncio_ref
     */
    public function setHorarioFuncAnuncioRef($horario_func_anuncio_ref)
    {
        $this->horario_func_anuncio_ref = $horario_func_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getHorarioFuncSabadoInicio()
    {
        return $this->horario_func_sabado_inicio;
    }

    /**
     * @param mixed $horario_func_sabado_inicio
     */
    public function setHorarioFuncSabadoInicio($horario_func_sabado_inicio)
    {
        $this->horario_func_sabado_inicio = $horario_func_sabado_inicio;
    }

    /**
     * @return mixed
     */
    public function getHorarioFuncSabadoTermino()
    {
        return $this->horario_func_sabado_termino;
    }

    /**
     * @param mixed $horario_func_sabado_termino
     */
    public function setHorarioFuncSabadoTermino($horario_func_sabado_termino)
    {
        $this->horario_func_sabado_termino = $horario_func_sabado_termino;
    }

    /**
     * @return mixed
     */
    public function getHorarioFuncDomingoInicio()
    {
        return $this->horario_func_domingo_inicio;
    }

    /**
     * @param mixed $horario_func_domingo_inicio
     */
    public function setHorarioFuncDomingoInicio($horario_func_domingo_inicio)
    {
        $this->horario_func_domingo_inicio = $horario_func_domingo_inicio;
    }

    /**
     * @return mixed
     */
    public function getHorarioFuncDomingoTermino()
    {
        return $this->horario_func_domingo_termino;
    }

    /**
     * @param mixed $horario_func_domingo_termino
     */
    public function setHorarioFuncDomingoTermino($horario_func_domingo_termino)
    {
        $this->horario_func_domingo_termino = $horario_func_domingo_termino;
    }




}