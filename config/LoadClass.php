<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 15/09/15
 * Time: 22:04
 */

# classe responsável por realizar a inclusão das classes utilizadas na aplicação.

include_once 'config/RouteConfig.php';

class LoadClass
{


    # incluir classe para conexão com a base de dados.
    public static function loadConnectionFactory()
    {

        $route = RouteConfig::rotas();

        if (file_exists($route['CONNECTION_FACTORY_DIR'] . "ConnectionFactory.php")) {

            require_once $route['CONNECTION_FACTORY_DIR'] . "ConnectionFactory.php";
        } else {
            exit('Método de conexão não existe no diretório ' . $route['CONNECTION_FACTORY_DIR']);
        }

    }

    # método responsável por incluir no documento qualquer classe que pertença ao model, sendo passado o nome da classe como argumento.
    public static function loadModel($class)
    {


        $route = RouteConfig::rotas();

        if (file_exists($route['MODEL_DIR'] . $class . ".php")) {
            include_once $route['MODEL_DIR'] . $class . ".php";
        } else {
            exit("A classe " . $class . "não existe no diretório " . $route['MODEL_DIR']);
        }

    }

    # método para incluir no documento clsses inerentes ao diretório DAO.
    public static function loadDAO($class)
    {


        $route = RouteConfig::rotas();

        if (file_exists($route['ACCESS_DAO'] . $class . ".php")) {
            include_once $route['ACCESS_DAO'] . $class . ".php";
        } else {
            exit("A classe " . $class . "não existe no diretório " . $route['ACCESS_DAO']);
        }

    }

    public static function loadConfig($class){

        $route = RouteConfig::rotas();

        if (file_exists($route['CONFIG_DIR'] . $class . ".php")) {
            include_once $route['CONFIG_DIR'] . $class . ".php";
        } else {
            exit("A classe " . $class . "não existe no diretório " . $route['ACCESS_DAO']);
        }
    }

    public static function loadLibraries($class){

        $route = RouteConfig::rotas();

        if (file_exists($route['ACCESS_LIBRARIES'] . $class . ".php")) {
            include_once $route['ACCESS_LIBRARIES'] . $class . ".php";
        } else {
            exit("A classe " . $class . "não existe no diretório " . $route['ACCESS_DAO']);
        }
    }


}


