<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 11/09/15
 * Time: 13:47
 */
require_once 'libraries/AutoLoad.php';


class HomeController extends ControllerConfig {

    protected $view;
    private $route;

    /*renderiza a página home */
    public function index(){


        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();
        $objFace = new AutenticadorFaceConfig();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }

        #precisa colocar em todas?
        $objFace->faceAutenticador();

        #url para login com facebook
        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['HOME_PAGE_DIR']);

    }

    public function cadastroEmailPromocao(){

       

        $obj = new EmailPromocaoDAO();
        $obj->insertEmailPromocao(RequestConfig::getPost('email'));

    }

    /*Este método utiliza o mecanismo de visão. */
    public function duvidasFrequentes(){

        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();
        $objFace = new AutenticadorFaceConfig();

        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        #está sendo passado a url inicial para a view.
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_DUVIDAS']);
    }


    #renderiza view que fala sobre descontos
    public function viewDescontos(){


        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();
        $objFace = new AutenticadorFaceConfig();

        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }
        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_DESCONTOS']);
    }

    #renderiza view de dicas
    public function viewDicas(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_DICAS']);
    }

    #rederiza página de invista em seu negocio
    public function viewInvistaNegocio(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_INVISTA_NEGOCIO']);
    }

    #rederiza página dos termos de uso
    public function viewTermosDeUso(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_TERMOS_USO']);
    }

    #rederiza a página de politicas de privacidade
    public function viewPoliticaPri(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }
        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_POLITICA_PRIVACIDADE']);
    }

    #solicita os 10 ultimos revews realizados no sistema
    public function retornaAnuncioHome(){

        $objAnun = new AvaliacaoDAO();
        echo json_encode($objAnun->revewForHome());

    }

    #página de dicas para evitar fraudes
    public function dicasFraude(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_DICAS_FRAUDE']);

    }



    #página que exibe todas as categorias e subCategorias
    public function seeAll(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();

        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }
        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_ALL']);

    }

    #exibe a página destinada aos termos gerais
    public function viewTermosGerais(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();

        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }
        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['TERMOS_GERAIS']);

    }


    #rederiza a página de mais informações
    public function viewMoreInfo(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_MAIS_VANTAGENS']);

    }



    #renderiza a página do carrinho de compra, que será um pouco diferente se partindo do carrinho de compra. 
    public function viewCarDash(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_CAR_DASH']);

    }

    #renderiza a página do carrinho de compra
    public function viewCarPt1(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();


        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_CAR_PT1']);

    }

    #renderiza primeira parte do contrato da ferramenta
    public function viewCarPt2(){

    $objFace = new AutenticadorFaceConfig();
    $this->route = RouteConfig::rotas();
    $aut = AutenticadorConfig::instanciar();
    $objCliDAO = new ClienteDAO();
	
    #caso ocorrer o login com o face redireciona para  a parte 3 do carrinho
    if($objFace->faceAutenticador()){

	 header("location: /carrinho-parte-tres/".$_GET['pacote']."/".$_GET['plano']);

	}

    if ($aut->esta_logado() || $aut->login_cookie()) {

        $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

    }

    $this->view->set('faceAut', $objFace->loginUrl());	
    $this->view->set('arrayFace', $objFace->faceUserData());
    $this->view->set('URL_INI', $this->route['URL_INI']);
    $this->view->render($this->route['VIEW_CAR_PT2']);

}


   #página onde será realizado o cadastro do anuncio a ser adquirido. 
      public function viewCarPt3(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();
	
	if ($aut->esta_logado() || $aut->login_cookie() || $objFace->faceAutenticador()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
            $this->view->set('faceAut', $objFace->loginUrl());
            $this->view->set('arrayFace', $objFace->faceUserData());
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->render($this->route['VIEW_CAR_PT3']);

     } else {

          header("location: /carrinho-parte-dois/".$_POST['pacote']."/".$_POST['plano']); // ?controller=Home&action=viewCarPt2&plano=".$_POST['plano']."&pacote=".$_POST['pacote']
	
	
        }



    }


    #página onde será disparado o formulário que chama o chekin
      public function viewCarPt4(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();

        if ($aut->esta_logado() || $aut->login_cookie() || $objFace->faceAutenticador()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
            $this->view->set('faceAut', $objFace->loginUrl());
            $this->view->set('arrayFace', $objFace->faceUserData());
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->render($this->route['VIEW_CAR_PT4']);

        } else {

            header("location: ?controller=Home&action=viewCarPt2&plano=".$_POST['plano']."&pacote=".$_POST['pacote']);

        }



    }



    #Página para confirmação do pagamento.
    public function viewCarPt5	(){

        $objFace = new AutenticadorFaceConfig();
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $objCliDAO = new ClienteDAO();

        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        }

        $this->view->set('faceAut', $objFace->loginUrl());
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_CAR_PT5']);

    }


}


