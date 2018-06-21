<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 17/01/16
 * Time: 02:05
 */

#classe que possui as lógicas para trabalhar com senha. Gerar senhas por exemplo.
class FunctionPass {


    #método que retorna senhas aleatórias.
    public function passGeneretor($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){

        // Caracteres de cada tipo
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        // Variaveis internas
        $retorno = '';
        $caracteres = '';

        // Agrupamos todos os caracteres que poderão ser utilizados
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;


        // Calculamos o total de caracteres possíveis
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
        // Criamos um número aleatório de 1 até $len para pegar um dos caracteres
            $rand = mt_rand(1, $len);
        // Concatenamos um dos caracteres na variável $retorno
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }


    #método que retorna senhas aleatórias.
    public function codeBarGene($tamanho = 10){



        // Agrupamos todos os caracteres que poderão ser utilizados
        $caracteres = '1234567890';
        $retorno = "";


        // Calculamos o total de caracteres possíveis
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            // Criamos um número aleatório de 1 até $len para pegar um dos caracteres
            $rand = mt_rand(1, $len);
            // Concatenamos um dos caracteres na variável $retorno
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }







}