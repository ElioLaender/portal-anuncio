<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 28/09/15
 * Time: 16:41
 *
 */

include_once "config/LoadClass.php";

#Esta classe implementa o conceito de objeto único(verificar o nome).

class SessaoConfig {

    private static $instancia = array();

    /**
     *
     * @return Session
     */
    public static function instanciar() {

        if (self::$instancia =! null) {
            self::$instancia = new SessaoConfig();
        }

        return self::$instancia;
    }

    #Seta um usuário na sessão
    public function set($chave, $valor) {
        @session_start();
        $_SESSION[$chave] = $valor;
        session_write_close();
    }

    #obtem qual usuário está logado na sessão.
    public function get($chave){
         session_start(); //comentei para teste, pois estou iniciando a mesma no inicio do documento
        $value = $_SESSION[$chave];
        session_write_close();
        return $value;
    }

    #verifica se a sessão foi inicializada.
    public function existe($chave) {

       @session_start();//comentei para teste, pois estou iniciando a mesma no inicio do documento ----- Motivo do erro, pois está sendo chamado depois do envio dos headers. Porém se tirar o usuário não consegue ser encontrado.
        if (isset($_SESSION[$chave]) && !empty($_SESSION[$chave])) {

            session_write_close();
            return true;
        }

        else {

            session_write_close();
            return false;
        }
    }

    public function logout(){

        #carregando a classe RouteConfig.
        LoadClass::loadConfig('RouteConfig');
        //$route = RouteConfig::rotas();
        session_start();
        session_destroy();

       // header('location:' .$route['URL_INI']. '?controller=Dashboard&action=ViewLogin');
    }

    #método responsável por reiniciar a sessão
    public function reiniciaSession(){

        #instancia o método, lembrando que essa classe trabalha com objeto global.
        $this->instanciar();

    }

    #cria sessão para armazenar ultimo filtro feito pelo usuário na pesquisa.
    public function filterStoreh($filter){

        session_start();
        $_SESSION['consulta'] = $filter;
        session_write_close();


    }

    #destroi a sessão passsada como argumento
    public function sessionDestruction($sessionName){
        session_start();
        session_destroy($_SESSION[$sessionName]);

    }


}
