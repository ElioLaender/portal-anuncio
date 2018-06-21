<?php



include_once "libraries/AutoLoad.php";


class clienteController extends  ControllerConfig {

    private $route;


    public function verifiDadosCli($arrayDadosCli){
        #verifica também se o usuário possui foto cadastrada, caso não possuir será adicionado uma foto default. (será adicionado a logo do sempreNegocio )
        if($arrayDadosCli[0]['cli_foto'] == ""){
            $arrayDadosCli[0]['cli_foto'] = "/view/assets/imagens/flor.png";
        }
        #verifica se o cliente possui nome cadastrado, se não possuir será utilizado o email fornecido como nome.(caso não estiver vazio não faz nada)
        if($arrayDadosCli[0]['cli_nome'] == ""){
            $arrayDadosCli[0]['cli_nome'] = $arrayDadosCli[0]['cli_email'];
        }
    }


    #renderiza a página que possui o formulário do faleConosco.
    public function viewFaleConosco(){
        $this->route = RouteConfig::rotas();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        $objFace = new AutenticadorFaceConfig();

        $objFace->faceAutenticador();
        if($aut->esta_logado() || $aut->login_cookie()){
            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_FALE_CONOSCO']);
    }

    #persiste a mensagem do faleConosco na base de dados
    public function FCPersist(){
        $objFCDAO = new FaleConoscoDAO();
        $objFCDAO->mensagemPersist(RequestConfig::getPost('nome'),RequestConfig::getPost('email'),RequestConfig::getPost('assunto'),RequestConfig::getPost('telefone'),RequestConfig::getPost('mensagem'));
    }

    #solicita verificação da senha informada.
    public function checkPassSolic(){

        $obj = new ClienteDAO();

        $obj->checkPass(RequestConfig::getRequest('idUser'), RequestConfig::getRequest('senha'));

    }

    #solicita método que enviará email de resposta da mensagem deixada para o anunciante.
    public function enviaMensagem(){

        $obj = new ClienteDAO();
        $objMR = new MensagemRespostasDAO();

        $objMR->respostPersist(RequestConfig::getPost('idMens'),RequestConfig::getPost('assunto'),RequestConfig::getPost('mensagem'));
        $obj->respostCli(RequestConfig::getPost('titulo'),RequestConfig::getPost('assunto'), RequestConfig::getPost('mensagem'), RequestConfig::getPost('emailDesti'));

        //echo "-- " .RequestConfig::getPost('titulo')."--".RequestConfig::getPost('assunto')."--". RequestConfig::getPost('mensagem')."-- ".RequestConfig::getPost('emailDesti');

    }

    #solicita exclusão da mensagem na base de dados.
    public function excluMensa(){

        $objMens = new MensagemDAO();
        $objMens->setMenExclu(RequestConfig::getPost('idMens'));

    }

    #retorna os dados do cliente logado
    public function returnDadosCli(){
        $obj = new ClienteDAO();

        $retorno =  $obj->retornaDadosLogin(RequestConfig::getRequest('idUser'));

        echo json_encode($retorno);
    }


    #persiste opinião do usuário sobre o sistema na base de dados.
    public function cliOpiPersist(){

        $ObjMelhorDAO = new MelhoriasDAO();

        $ObjMelhorDAO->MelhoriPersist(RequestConfig::getPost('cliRef'),RequestConfig::getPost('assunt'),RequestConfig::getPost('opini'));

    }



}

