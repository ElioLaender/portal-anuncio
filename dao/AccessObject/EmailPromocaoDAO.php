<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:23
 */

include_once 'model/EmailPromocaoModel.php';

class EmailPromocaoDAO extends EmailPromocaoModel {

    protected $_insert = "INSERT INTO Email_promocao (email_promocao_descricao) VALUES ('%s');",
              $_select = "SELECT email_promocao_descricao FROM Email_promocao WHERE email_promocao_descricao = '%s'";


    # Função para inserir email informado no campo de promoções na página index do sistema.
        public function insertEmailPromocao($email){

            $this->setEmailPromocaoDescricao($email);

            $this->_select = sprintf($this->_select, $this->getEmailPromocaoDescricao());

            if(count($this->runSelect($this->_select)) > 0){

                echo "Ops, o email ".$email." já se encontra cadastrado.";

            } else {

                #retorna a string contendo a consulta completa.
                $sql = sprintf($this->_insert, $this->getEmailPromocaoDescricao());

                #chama método para execultar a consulta. Ps: Método extendido de EmailPromocaoModel->ConnectionFactory.

                if ($this->runQuery($sql)){

                    echo "Email Cadastrado com sucesso!";

                } else{

                    echo $sql;
                    echo "Ops, erro interno. Email não pode ser cadastrado no momento. =/";


                }

            }



        }



}