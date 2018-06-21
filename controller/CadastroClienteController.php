<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 21/09/15
 * Time: 15:09
 */

include_once 'libraries/AutoLoad.php';


class CadastroClienteController extends ControllerConfig {

    protected $view;
    private $route;

    /*chama a tela para o pré cadastro do cliente.*/
    public function telaCadastro(){

        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();
        $objFace = new AutenticadorFaceConfig();

        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        }

        $objFace->faceAutenticador();
        /*Cria uma variável chamada título, para ser utilizada dentro do arquivo de visão do MVC.*/
        $this->view->set('titulo', 'Cadastro de clientes');
        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        /* Diz ao nosso mecanismo de visão para renderizar os seus dados
        usando o arquivo de visão: View/home/index.php */

        $this->view->render($this->route['PRE_CADASTRO_CLIENTE_DIR']);

    }


    #realiza o pré-cadastro do cliente na base de dados.
    public function insertCadastro(){

        $obj = new ClienteDAO();
	$obj->cadastroCliente(RequestConfig::getPost('nome'),RequestConfig::getPost('email'),RequestConfig::getPost('senha'));
	 

    }

	public function insertCliCart(){

		$obj = new ClienteDAO();
		$obj->cadastroCliente(RequestConfig::getPost('nome'),RequestConfig::getPost('email'),RequestConfig::getPost('senha'),"on");
	}

    #insere clientes automaticamente na base de dados. http://localhost/SempreNegocio/?controller=CadastroCliente&action=insertCliAuto
    public function insertCliAuto(){

        $obj = new ClienteDAO();

        #gera os emails
        for($i=0; $i<250; $i++){

            $emails[$i] = rand(1,9999). "@gmail.com";
            $nomes[$i] = "cli".$i;	
            echo "emails: " . $emails[$i] . "<br/>";

            echo "Nomes: ".$nomes[$i] . "<br/>";

            $obj->cadastroCliente($nomes[$i],$emails[$i],"123");

        }


    }//encerra o auto

    #valida o cadastro do cliente, recebendo o link de validação para comparar se é valido de acordo com a base de dados. (Método é chamado no link enviado por email.)
    public function validaCadastro(){

        $obj = new ClienteDAO();
        $obj->verificaUrlValidacao(RequestConfig::getRequest('id'),RequestConfig::getRequest('email'),RequestConfig::getRequest('uid'),RequestConfig::getRequest('key'));
    }

    #solicita recuperação de senha do usuário vinculado ao email passado como argumento
    public function asksNewPass(){

        $obj = new ClienteDAO();
        $obj->emailPassRecover(RequestConfig::getPost('email'));

    }



}
