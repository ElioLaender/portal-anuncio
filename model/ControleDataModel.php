<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 00:19
 */


include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class ControleDataModel extends ConnectionFactory{

    private $controle_data_id,
            $controle_data_ref,
            $controle_data_cadastro,
            $controle_data_venc_gratis,
            $controle_data_venc_ano,
            $controle_data_efetivo,
            $controle_data_cancelamento;

        /**
         * @return mixed
         */
        public function getControleDataId()
        {
                return $this->controle_data_id;
        }

        /**
         * @param mixed $controle_data_id
         */
        public function setControleDataId($controle_data_id)
        {
                $this->controle_data_id = $controle_data_id;
        }

        /**
         * @return mixed
         */
        public function getControleDataRef()
        {
                return $this->controle_data_ref;
        }

        /**
         * @param mixed $controle_data_ref
         */
        public function setControleDataRef($controle_data_ref)
        {
                $this->controle_data_ref = $controle_data_ref;
        }

        /**
         * @return mixed
         */
        public function getControleDataCadastro()
        {
                return $this->controle_data_cadastro;
        }

        /**
         * @param mixed $controle_data_cadastro
         */
        public function setControleDataCadastro($controle_data_cadastro)
        {
                $this->controle_data_cadastro = $controle_data_cadastro;
        }

        /**
         * @return mixed
         */
        public function getControleDataVencGratis()
        {
                return $this->controle_data_venc_gratis;
        }

        /**
         * @param mixed $controle_data_venc_gratis
         */
        public function setControleDataVencGratis($controle_data_venc_gratis)
        {
                $this->controle_data_venc_gratis = $controle_data_venc_gratis;
        }

        /**
         * @return mixed
         */
        public function getControleDataVencAno()
        {
                return $this->controle_data_venc_ano;
        }

        /**
         * @param mixed $controle_data_venc_ano
         */
        public function setControleDataVencAno($controle_data_venc_ano)
        {
                $this->controle_data_venc_ano = $controle_data_venc_ano;
        }

        /**
         * @return mixed
         */
        public function getControleDataEfetivo()
        {
                return $this->controle_data_efetivo;
        }

        /**
         * @param mixed $controle_data_efetivo
         */
        public function setControleDataEfetivo($controle_data_efetivo)
        {
                $this->controle_data_efetivo = $controle_data_efetivo;
        }

        /**
         * @return mixed
         */
        public function getControleDataCancelamento()
        {
                return $this->controle_data_cancelamento;
        }

        /**
         * @param mixed $controle_data_cancelamento
         */
        public function setControleDataCancelamento($controle_data_cancelamento)
        {
                $this->controle_data_cancelamento = $controle_data_cancelamento;
        }







}