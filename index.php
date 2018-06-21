<?php

/**
 * Instancia a classe e faz chamada ao método que inicia a aplicação.
 */



include_once 'config/RequestConfig.php';
include_once 'config/RouteConfig.php';

//session_start();
//$_SESSION['ContadorVisitas'] = date("m.d.y");
functionDispatcher();

function functionDispatcher(){

    $controller = RequestConfig::getRequest('controller');
    $action = RequestConfig::getRequest('action');
    $route = RouteConfig::rotas();


#Define um controle padrão caso nenhum seja especificado na url.
    if($controller == ''){
#caso for vazio, vamos definir o controle padrão.
        $controller = "Home";

    }

    /*Vamos verificar se determinado controller existe na estrtura de pastas. */

    /*File_exists verifica se um determinado arquivo existe em um diretório, já o method_exists verifica se um método existe em um */

    if (file_exists($route['ACCESS_CONTROLLER'].$controller."Controller.php")) {


        # inclui o controle na página

        include_once $route['ACCESS_CONTROLLER'].$controller."Controller.php";

    }
    else {
        die("O controle <strong>{$controller}</strong> não existe na pasta controle do MVC");
    }

# adiciona a terminação Controle
# ao nome do controle
    $controller .= 'Controller';

# instancia o controle
    $controller = new $controller();

#vamos definir um método padrão, caso nenhum seja passado.
    if( $action == ''){
#caso não seja passada nenhuma action via url, vamos chamar a index, que será a padrao.

        $action = "index";
    }

#realiza a verificação da existência de um método.
    if(method_exists($controller,  $action)){

#caso exista executa o mesmo.
        $controller->$action();

    } else {
        die("Página não encontrada. ");
    }

}
