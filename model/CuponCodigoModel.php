<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 26/02/16
 * Time: 09:30
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class CuponCodigoModel extends ConnectionFactory{

    private $cc_id,
            $cc_codigo,
            $cc_cupon_ref,
            $cc_cli_impresso;

    /**
     * @return mixed
     */
    public function getCcId()
    {
        return $this->cc_id;
    }

    /**
     * @param mixed $cc_id
     */
    public function setCcId($cc_id)
    {
        $this->cc_id = $cc_id;
    }

    /**
     * @return mixed
     */
    public function getCcCodigo()
    {
        return $this->cc_codigo;
    }

    /**
     * @param mixed $cc_codigo
     */
    public function setCcCodigo($cc_codigo)
    {
        $this->cc_codigo = $cc_codigo;
    }

    /**
     * @return mixed
     */
    public function getCcCuponRef()
    {
        return $this->cc_cupon_ref;
    }

    /**
     * @param mixed $cc_cupon_ref
     */
    public function setCcCuponRef($cc_cupon_ref)
    {
        $this->cc_cupon_ref = $cc_cupon_ref;
    }

    /**
     * @return mixed
     */
    public function getCcCliImpresso()
    {
        return $this->cc_cli_impresso;
    }

    /**
     * @param mixed $cc_cli_impresso
     */
    public function setCcCliImpresso($cc_cli_impresso)
    {
        $this->cc_cli_impresso = $cc_cli_impresso;
    }




}