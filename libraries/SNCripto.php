<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 22/09/15
 * Time: 20:24
 */

#Classe responsável pela criptografia personalizada do sistema. SNC(Sempre Negócio Criptografia).

class SNCripto {

    #criptografia personalizada para o sistema.
    public static function SNC($valor){

       return md5("*%!}ReViEw{" . $valor . "+)@_!=!-0*%$");
}


}