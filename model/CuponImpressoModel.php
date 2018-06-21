<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 25/02/16
 * Time: 22:31
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class CuponImpressoModel extends ConnectionFactory {

    private $cupon_impresso_id,
            $cupon_impresso_data,
            $cupon_impresso_ref,
            $cupon_impresso_cli_ref;

    /**
     * @return mixed
     */
    public function getCuponImpressoId()
    {
        return $this->cupon_impresso_id;
    }

    /**
     * @param mixed $cupon_impresso_id
     */
    public function setCuponImpressoId($cupon_impresso_id)
    {
        $this->cupon_impresso_id = $cupon_impresso_id;
    }

    /**
     * @return mixed
     */
    public function getCuponImpressoData()
    {
        return $this->cupon_impresso_data;
    }

    /**
     * @param mixed $cupon_impresso_data
     */
    public function setCuponImpressoData($cupon_impresso_data)
    {
        $this->cupon_impresso_data = $cupon_impresso_data;
    }

    /**
     * @return mixed
     */
    public function getCuponImpressoRef()
    {
        return $this->cupon_impresso_ref;
    }

    /**
     * @param mixed $cupon_impresso_ref
     */
    public function setCuponImpressoRef($cupon_impresso_ref)
    {
        $this->cupon_impresso_ref = $cupon_impresso_ref;
    }

    /**
     * @return mixed
     */
    public function getCuponImpressoCliRef()
    {
        return $this->cupon_impresso_cli_ref;
    }

    /**
     * @param mixed $cupon_impresso_cli_ref
     */
    public function setCuponImpressoCliRef($cupon_impresso_cli_ref)
    {
        $this->cupon_impresso_cli_ref = $cupon_impresso_cli_ref;
    }




}