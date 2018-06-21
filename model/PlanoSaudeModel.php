<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 15/01/16
 * Time: 21:57
 */


include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class PlanoSaudeModel extends ConnectionFactory{

    private $plano_saude_id,
            $plano_saude_anuncio_ref,
            $plano_saude_unimed,
            $plano_saude_prontomed,
            $plano_saude_saudevida,
            $plano_saude_promed,
            $plano_saude_outros;

    /**
     * @return mixed
     */
    public function getPlanoSaudeId()
    {
        return $this->plano_saude_id;
    }

    /**
     * @param mixed $plano_saude_id
     */
    public function setPlanoSaudeId($plano_saude_id)
    {
        $this->plano_saude_id = $plano_saude_id;
    }

    /**
     * @return mixed
     */
    public function getPlanoSaudeAnuncioRef()
    {
        return $this->plano_saude_anuncio_ref;
    }

    /**
     * @param mixed $plano_saude_anuncio_ref
     */
    public function setPlanoSaudeAnuncioRef($plano_saude_anuncio_ref)
    {
        $this->plano_saude_anuncio_ref = $plano_saude_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getPlanoSaudeUnimed()
    {
        return $this->plano_saude_unimed;
    }

    /**
     * @param mixed $plano_saude_unimed
     */
    public function setPlanoSaudeUnimed($plano_saude_unimed)
    {
        $this->plano_saude_unimed = $plano_saude_unimed;
    }

    /**
     * @return mixed
     */
    public function getPlanoSaudeProntomed()
    {
        return $this->plano_saude_prontomed;
    }

    /**
     * @param mixed $plano_saude_prontomed
     */
    public function setPlanoSaudeProntomed($plano_saude_prontomed)
    {
        $this->plano_saude_prontomed = $plano_saude_prontomed;
    }

    /**
     * @return mixed
     */
    public function getPlanoSaudeSaudevida()
    {
        return $this->plano_saude_saudevida;
    }

    /**
     * @param mixed $plano_saude_saudevida
     */
    public function setPlanoSaudeSaudevida($plano_saude_saudevida)
    {
        $this->plano_saude_saudevida = $plano_saude_saudevida;
    }

    /**
     * @return mixed
     */
    public function getPlanoSaudePromed()
    {
        return $this->plano_saude_promed;
    }

    /**
     * @param mixed $plano_saude_promed
     */
    public function setPlanoSaudePromed($plano_saude_promed)
    {
        $this->plano_saude_promed = $plano_saude_promed;
    }

    /**
     * @return mixed
     */
    public function getPlanoSaudeOutros()
    {
        return $this->plano_saude_outros;
    }

    /**
     * @param mixed $plano_saude_outros
     */
    public function setPlanoSaudeOutros($plano_saude_outros)
    {
        $this->plano_saude_outros = $plano_saude_outros;
    }




}