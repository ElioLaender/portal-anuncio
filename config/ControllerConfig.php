<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 11/09/15
 * Time: 12:03
 */

/*Esta classe serve de base para todos os controles do MVC em PHP. Ela serve para compartilhar código entre todos os controles. */

include_once 'config/ViewConfig.php';
include_once 'config/RouteConfig.php';

class ControllerConfig {

    /*
     * Variável usada como mecanismo de renderização de visões.
     * O objeto visão do arquivo Visao.php
     */

    protected $view = null;

    public $nome;

    private $route;




    /*
     * Construtor da classe, inicializando o mecanismo e de visão dos controles.
     */

    public function __construct(){
        $this->view = new ViewConfig();


    }

    /**
     * método para incluir e carregar um modelo dinâmicamente dentro de um controle.
     */

    public function modelo($nome){

        #instancia a classe de rotas
        $this->route = RouteConfig::rotas();

        /**
         * Procura o arquivo modelo dentro da pasta modelos
         */
        if(file_exists($this->route['MODEL_DIR'].$nome.".php")){
            include_once "Model/{$nome}.php";
        } else{
            die("Modelo {$nome} não encontrado na pasta modelos.");
        }

        /**
         * Caso o arquivo exista, instancia o objeto e utiliza o mesmo como propriedade do controle
         */
        return $this->nome = new $nome();
    }



    /*
     * Método index padrão usado em todos os controles.
     */
    public function index(){
        die("Comando index do controle base");
    }

}
