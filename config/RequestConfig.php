<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 11/09/15
 * Time: 11:31
 */



class RequestConfig {


    /*Obtém requisições via $_REQUEST */
    public static function getRequest($key)
    {
        /*Verifica a chave, caso ela exista retorna o valor.*/
        if (isset($_REQUEST[$key]) && ($_REQUEST[$key]) != '') {
            return $_REQUEST[$key];
            /*Caso contrário retorna vazio*/
        } else {
            return '';
        }
    }

    /*Seta o valor em uma chave.*/
    public static function setRequest($key, $val){
        $_REQUEST[$key] = $val;
    }


    /*

    /*Obtém as requisições via $_POST*/
    public static function getPost($key)
    {
        /*Verifica a chave, caso ela exista retorna o valor.*/
        if (isset($_POST[$key]) && ($_POST[$key]) != '') {

            return filter_input(INPUT_POST, $key);
            /*Caso contrário retorna vazio*/
        } else {
            return '';
        }
    }

    /*Seta o valor em uma chave.*/
    public static function setPost($key, $val){
        $_POST[$key] = $val;
    }




}
