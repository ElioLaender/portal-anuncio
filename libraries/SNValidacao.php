<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 26/10/15
 * Time: 11:39
 */

#classe que contém todos os métodos de validação mais genéricos
class SNValidacao {

    private $dataConvertida;


    #converte a data recebina no formato para ser armazenado no tipo de dado DATE do MySQL, e se chamada novamente converte para data pt br, pois o método joga o inverso.
    public function dateConvert($data){


        //verificar se existe -, se existir é porque está vindo do banco de dados.
        if(strripos($data,"-")){
            #transforma em array, e inverte o mesmo substituindo "-" por "/".
            $this->dataConvertida = implode("/", array_reverse(explode("-", $data)));
        } else {

            #Caso cair no else é porque o dado está vindo do formulário e precisa ser modificado para o formato americano.
            $this->dataConvertida = implode("-", array_reverse(explode("/", $data)));
        }


        #retorna a data de expiração já no formato para ser armazenado no banco de dados.
        return $this->dataConvertida;

    }




}