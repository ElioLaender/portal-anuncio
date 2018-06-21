<?php

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class CliExcluModel extends ConnectionFactory{

        private $cli_exclu_id,
                $cli_exclu_cli_ref,
                $cli_exclu_motivo,
                $cli_exclu_descricao;

    /**
     * @return mixed
     */
    public function getCliExcluId()
    {
        return $this->cli_exclu_id;
    }

    /**
     * @param mixed $cli_exclu_id
     */
    public function setCliExcluId($cli_exclu_id)
    {
        $this->cli_exclu_id = $cli_exclu_id;
    }

    /**
     * @return mixed
     */
    public function getCliExcluCliRef()
    {
        return $this->cli_exclu_cli_ref;
    }

    /**
     * @param mixed $cli_exclu_cli_ref
     */
    public function setCliExcluCliRef($cli_exclu_cli_ref)
    {
        $this->cli_exclu_cli_ref = $cli_exclu_cli_ref;
    }

    /**
     * @return mixed
     */
    public function getCliExcluMotivo()
    {
        return $this->cli_exclu_motivo;
    }

    /**
     * @param mixed $cli_exclu_motivo
     */
    public function setCliExcluMotivo($cli_exclu_motivo)
    {
        $this->cli_exclu_motivo = $cli_exclu_motivo;
    }

    /**
     * @return mixed
     */
    public function getCliExcluDescricao()
    {
        return $this->cli_exclu_descricao;
    }

    /**
     * @param mixed $cli_exclu_descricao
     */
    public function setCliExcluDescricao($cli_exclu_descricao)
    {
        $this->cli_exclu_descricao = $cli_exclu_descricao;
    }

}