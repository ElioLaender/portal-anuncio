<?php

/**
 * Created by PhpStorm.
 * User: laender
 * Date: 10/09/15
 * Time: 11:32
 */



class RouteConfig {


    /**
     * @return array
     */
    public static function rotas(){

        return array(

            'ACCESS_OBJECT_DIR'         =>  'dao/AccessObject/',
            'URL_INI'                   =>  '',//'http://localhost:8080/',
            'ACCESS_CONTROLLER'         =>  'controller/',
            'ACCESS_LIBRARIES'          =>  'libraries/',
            'CONNECTION_FACTORY_DIR'    =>  'dao/ConnectionFactory/',
            'CONFIG_DIR'                =>  'config/',
            'UPLOAD_CURRICULO_DIR'      =>  'upload/curriculo-images/',
            'UPLOAD_USER_DIR'           =>  'upload/user-images/',
            'UPLOAD_IMG_ANUNCIO_DIR'    =>  'upload/anuncio-images/',
            'MODEL_DIR'                 =>  'model/',
            'VIEW_ANUNCIO_DASH_POR_ID'  =>  'visualizacoes/viewAnuncioId.php',
            'VIEW_ANUNCIO_PESQUISA'     =>  'visualizacoes/viewAnuncioPesquisa.php',
            'VIEW_DUVIDAS'              =>  'visualizacoes/duvidasFren.php',
            'VIEW_DESCONTOS'            =>  'visualizacoes/descontos.php',
            'VIEW_DICAS'                =>  'visualizacoes/dicas.php',
            'VIEW_INVISTA_NEGOCIO'      =>  'visualizacoes/invistaEmSua.php',
            'VIEW_POLITICA_PRIVACIDADE' =>  'visualizacoes/politicaPri.php',
            'VIEW_TERMOS_USO'           =>  'visualizacoes/termosDeUso.php',
            'TERMOS_GERAIS'             =>  'visualizacoes/termosGerais.php',
            'VIEW_CUPON_ID'             =>  'visualizacoes/cuponPorId.php',
            'VIEW_CAR_DASH'             =>  'cadastros/viewCarDash.php',
	    'VIEW_CAR_PT2'              =>  'cadastros/viewCarPt2.php',
            'VIEW_CAR_PT2'              =>  'cadastros/viewCarPt2.php',
            'VIEW_CAR_PT1'              =>  'cadastros/viewCarPt1.php',
	    'VIEW_CAR_PT3'              =>  'cadastros/viewCarPt3.php',	
            'VIEW_CAR_PT4'              =>  'cadastros/viewCarPt4.php',
            'VIEW_CAR_PT5'              =>  'cadastros/viewCarPt5.php',
            'VIEW_DIR'                  =>  'view/pages/',
	    'VIEW_MAIS_VANTAGENS'       =>  'visualizacoes/viewMaisInfo.php',
            'VIEW_GERENCIA_IMG'         =>  'atualizacao/viewGerenciaImgId.php',
            'VIEW_ANUNCIO_ID_ALL'       =>  'visualizacoes/viewAnuncioIdAll.php',
            'VIEW_FALE_CONOSCO'         =>  'visualizacoes/viewFaleConosco.php',
            'VIEW_DICAS_FRAUDE'         =>  'visualizacoes/viewDicasFraude.php',
            'VIEW_ALL'                  =>  'visualizacoes/verTodos.php',
            'CAD_TRABALHE_CONOSCO'      =>  'cadastros/viewInsertCandidato.php',
            'ACCESS_DAO'                =>  'dao/AccessObject/',
            'HOME_PAGE_DIR'             =>  'home/home.php',
            'CAD_ANUNCIO_PT2'           =>  'cadastros/viewInsertAnuncioPt2.php',
            'ERROR_PAGE_DIR'            =>  'error.php',
            'LOGIN_DIR'                 =>  'dashboard/login.php',
            'DASHBOARD_DIR'             =>  'dashboard/dashboard.php',
            'PRE_CADASTRO_CLIENTE_DIR'  =>  'cadastros/CadastroCliente.php'


        );
    }

}

