<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/12/15
 * Time: 02:09
 */

include_once 'libraries/AutoLoad.php';

class FuncionarioController extends  ControllerConfig {

    private $route;

    #renderiza a view de trabalhe conosco.
    public function viewTrabalheConosco(){



            $this->route = RouteConfig::rotas();
            $aut = AutenticadorConfig::instanciar();
            $objCliDAO = new ClienteDAO();
            $objFace = new AutenticadorFaceConfig();

        if ($aut->esta_logado() || $aut->login_cookie()) {
            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        }

            $this->view->set('faceAut', $objFace->loginUrl());
            $objFace->faceAutenticador();
            $this->view->set('arrayFace', $objFace->faceUserData());
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->render($this->route['CAD_TRABALHE_CONOSCO']);


    }

    #método responsável persistir informações do candidato a vaga na base de dados
    public function candidatoPersist(){

    }

}
