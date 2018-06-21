<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 11/09/15
 * Time: 12:11
 */

/**
 * A classe visão é responsável por armazenar dados para apresentação num
 * determinado arquivo de visão php
 */

include_once 'config/RouteConfig.php';

class ViewConfig {
    /**
     * Lista de dados para serem recuperados e impressos dentro de uma view
     */

    public $dados = array();



    /**
     * Adiciona valores no vetor, que na view será transformado em variáveis.
     *
     * @param string $nome
     * @param mixed $valor
     * @return void
     */

    public function set($nome, $valor){
        $this->dados[$nome] = $valor;
    }

    /**
     * Faz a mesma coisa que o método set. mas usandp referências, permitindp qua as
     * alterações na variável fora da classe sejam realizadas também no valor armazenado na
     * lista de dados.
     *
     * @param string $nome
     * @param mixed $valor
     * @return void
     */

    public function bind($nome, $valor){

        #armazena valor da variável como referido.
        $this->dados[$nome] = &$valor;

    }

    /**
     * recupera o valor armazenado na lista de dados através de seu nome.@global
     *
     * @param string $nome
     * @return mixed
     */

    public function get($nome='')
    {

        /*
         * Se não existir nenhuma variável com o nome indicado como parâmetro,
         * o método retorna uma string vazia.
         */

        if ($nome == '') {
            return $this->dados;

        } else {
            if (isset($this->dados[$nome]) && ($this->dados[$nome] != '')) {
                return $this->dados[$nome];
            } else {
                return '';
            }

        }

    } # encerra function get.


    /**
     * renderiza um arquivo de visão específico com as variáveis armazenadas internamente.
     * Como resultado, envia conteúdo html para o navegador do usuário.
     *
     * @param string $arquivo
     * @return void
     */

    public function render($arquivo){



        $route = RouteConfig::rotas();


        /*
         * Transforma cada item armazenado na lista de dados em variáveis locais.
         */

        foreach($this->get() as $chave => $item){ //Dá um foreach no get() da ViewController.
            $$chave = $item; //$$ referencia ao valor do nome, não o valor em si.
        }


        /*
         * Procura o arquivo php dentro da pasta visões.
         * Se o arquivo existir, inclui o mesmo dentro da função, rederizando e executando o conteúdo dentro dele.
         */

        if(file_exists($route['VIEW_DIR'] . $arquivo)){

            include_once $route['VIEW_DIR'] . $arquivo;
        }

    }


}
