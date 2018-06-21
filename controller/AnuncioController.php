<?php
/**
 * Esta classe tem por finalidade gerenciar tudo o que diz respeito ao anúncio, tal como chamar operações de insert, delete, update, chamar As View para tela de cadastro e edições.
 */
include_once 'libraries/AutoLoad.php';
include_once 'libraries/Sanitize.php';
include_once 'dao/AccessObject/CuponDescontoDAO.php';




class AnuncioController extends ControllerConfig {

    private $route,
            $diretorio;



    #parte dois do cadastro, inserir imagens no anuncio.
    public function viewInsertAnuncioPt2(){

       

        $aut = AutenticadorConfig::instanciar();
        $this->route = RouteConfig::rotas();
        $objCliDAO = new ClienteDAO();
	
        // $objOption = new DashboardCurriculoController();
        $usuario = null;
        $objFace = new AutenticadorFaceConfig();

        #caso estiver logado carrega a view.
        if ($aut->esta_logado() || $aut->login_cookie() || $objFace->faceAutenticador()) {

            $this->view->set('ID', $_GET['id']);
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->set('arrayFace', $objFace->faceUserData());
	   
            #url para login com facebook
            $this->view->render($this->route['CAD_ANUNCIO_PT2']);

        } else {


            #Caso o usuário tente acessar a página sem estiver logado, ele será redirecionado para o form de login.
            header('location: '.$this->route['URL_INI'].'?controller=Dashboard&action=ViewLogin');
        }

    }


    //////////////////////////////////////////
    #método responsável por chamar a tela contendo o formulário para insrir um novo anúncio.
    public function viewGerenciaImgId(){

       
        $objCliDAO = new ClienteDAO();
    $objAnunDAO = new AnuncioDAO();

        $aut = AutenticadorConfig::instanciar();
        $objContDAO = new ContViewsDAO();
        $this->route = RouteConfig::rotas();
        $usuario = null;
        $objFace = new AutenticadorFaceConfig();
	$objImg = new ImagemDAO();

        #caso estiver logado carrega a view.
        if ($aut->esta_logado() || $aut->login_cookie() || $objFace->faceAutenticador()) {

        

    
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->set('arrayFace', $objFace->faceUserData());
            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
            $this->view->set('ID', $_GET['id']);
	    $this->view->set('arrayImg', $objImg->retornaImagem($_GET['id']));
            $this->view->set('pacote', $objAnunDAO->returnPackage($_GET['id'],'val'));
            $this->view->render($this->route['VIEW_GERENCIA_IMG']);

        } else {

            #Caso o usuário tente acessar a página sem estiver logado, ele será redirecionado para o form de login.
            header('location: '.$this->route['URL_INI'].'?controller=Dashboard&action=ViewLogin');
        }

    }
    /////////////////////////////////////////

    #persiste o anuncio na base de dados
    public function insertAnuncio(){

        #verificar se o usuario esta logado com o face e modificar alguma coisa.


        $objCurriculumDAO = new CurriculumDAO();
        #Chamada ao método clienteDAO para poder setar o ID do cliente logado na sessão atual.
        $objClienteDAO = new ClienteDAO();
        #instancia para poder chamar o método que irá persistir os dados e retornar o id em que foi armazenado para o argumento.
        $objCadEndereco = new EnderecoDAO();
        #para pegar usuário da sessão
        $aut = AutenticadorConfig::instanciar();

        $objLinkDAO = new LinkDAO();
        $objImgDAO = new ImagemDAO();
        $objAnuncioDAO = new AnuncioDAO();
        $objFormaPg = new FormaPagamentoDAO();
        $objContDAO = new ContViewsDAO();
        $objHoraFunc = new HorarioFuncionamentoDAO();
        $objRoute = new RouteConfig();
        $objfacilidades = new FacilidadesDAO();
        $objPlano = new PlanoSaudeDAO();
        $route = $objRoute->rotas();
    $objFace = new AutenticadorFaceConfig();

    if(RequestConfig::getPost('plano') == "Grátis"){
        $status = 11;//Gratuito
        
    } else {
        $status = 12;//Aguardando pagamento
        
    }

    #verifica se o processo está sendo realizado
    if($objFace->faceAutenticador()){

        $usuario = $objFace->getUserFaceSession();  

    } else {

        $usuario = $aut->pegar_usuario();

    } 


        #salva os dados do anuncio no banco de dados. PS ainda não foi criado o método anuncioPersist na AnuncioDAO.
        $objAnuncioDAO->anuncioPersist($objClienteDAO->returnIdUserSession($usuario),//Aqui deverá ser passado o ID do cliente.
            RequestConfig::getPost('titulo'),
            RequestConfig::getPost('descricao'),
            //Esse método deve persistir o dado e retornar o id pois tudo isso é o argumento de uma function.
            $objCadEndereco->enderecoPersist(RequestConfig::getPost('cep'),RequestConfig::getPost('rua'),RequestConfig::getPost('bairro'), RequestConfig::getPost('numero'),RequestConfig::getPost('cComplemento'),RequestConfig::getPost('cidade'),RequestConfig::getPost('uf'),RequestConfig::getPost('numCom')), //esse método deve persistir e retornar o ID do do cadastro de endereco.
            RequestConfig::getPost('cCategoria'),
            RequestConfig::getPost('tel-fixo'),
            RequestConfig::getPost('tel-cel'),
            RequestConfig::getPost('email'),
            RequestConfig::getPost('brevDes'),
            RequestConfig::getPost('tel-whats'),
        $status,
        RequestConfig::getPost('plano')

        );

        #armazena horário
        $objHoraFunc->horarioPersist(RequestConfig::getPost('semIni'),RequestConfig::getPost('semTer'),RequestConfig::getPost('sabIni'),RequestConfig::getPost('sabTer'),RequestConfig::getPost('domIni'),RequestConfig::getPost('domTer'),$objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));
        #armazena a forma de pagamento
        $objFormaPg->formaPgPersist($_POST['forma-pag'], $objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));//método para persistir a forma de pagamento. Teremos de criar um método para retornar o ID de um anuncio cadastrado
        #armazenas as facilidades oferecidas
        $objfacilidades->insertFacilidades($_POST['facilidades'],$objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));
        #armazena os planos de saúde aceitos
        $objPlano->insertPlanos($_POST['planos'],$objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));
        #armazena os links
        $objLinkDAO->linksPersist(RequestConfig::getPost('facebook'),RequestConfig::getPost('twitter'),RequestConfig::getPost('site'), RequestConfig::getPost('linkedin'), RequestConfig::getPost('youtube'), RequestConfig::getPost('lattes'), $objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));
        #armazena multiplas imagens criando diretórios especificos para cada cliente.
        $objImgDAO->insertImgCapa($this->insertImgCapa($usuario, $objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria'))), $objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));//recebe como argumento um array contendo o nome e diretório de todas as imagens do upload, o outro argumento é o id do usuário.
        //$objImgDAO->insertImgCapa($this->insertImgCapa($aut->pegar_usuario(), $objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria'))));
        $objContDAO->insertContViews($objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($usuario), RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));

       // header('location: '. $route['URL_INI'] .'?controller=Anuncio&action=viewInsertAnuncioPt2&id='.$objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));
      
    
    if(RequestConfig::getPost('plano') == "Grátis"){
        
        header("location: /painel-de-controle/");
    } else {
        
        header('location: /carrinho-parte-quatro/'.RequestConfig::getPost('plano').'/'.RequestConfig::getPost('pacote').'/'.$objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')));
    }

    
      

    

    }

    #responsável por realizar o update do anuncio.
    public function atualiAnun(){

        //echo "teste: ". RequestConfig::getPost('endId') . RequestConfig::getPost('hourId') . RequestConfig::getPost('pgId') . RequestConfig::getPost('faciId') . RequestConfig::getPost('plaId') . RequestConfig::getPost('linkId') . RequestConfig::getPost('anunId');
        $objPlano = new PlanoSaudeDAO();
        $objAnuncioDAO = new AnuncioDAO();
        $objClienteDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        $objCadEndereco = new EnderecoDAO();
        $objFormaPg = new FormaPagamentoDAO();
        $objHoraFunc = new HorarioFuncionamentoDAO();
        $objfacilidades = new FacilidadesDAO();
        $objImgDAO = new ImagemDAO();
        $objLinkDAO = new LinkDAO();
        $objRoute = new RouteConfig();
        $route = $objRoute->rotas();

            $objAnuncioDAO->anuncioUpdate($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),//Aqui deverá ser passado o ID do cliente.
                RequestConfig::getPost('titulo'),
                RequestConfig::getPost('descricao'),
                RequestConfig::getPost('cCategoria'),
                RequestConfig::getPost('tel-fixo'),
                RequestConfig::getPost('tel-cel'),
                RequestConfig::getPost('email'),
                RequestConfig::getPost('brevDes'),
                RequestConfig::getPost('anunId'),
                RequestConfig::getPost('tel-whats'));

        #atualiza endereco Falta retornnar o id do endereco
        $objCadEndereco->enderecoUpdate(RequestConfig::getPost('cep'),RequestConfig::getPost('rua'),RequestConfig::getPost('bairro'), RequestConfig::getPost('numero'),RequestConfig::getPost('cComplemento'),RequestConfig::getPost('cidade'),RequestConfig::getPost('uf'),RequestConfig::getPost('numCom'),RequestConfig::getPost('endId'));
        #atualiza horário
        $objHoraFunc->horarioUpdate(RequestConfig::getPost('semIni'),RequestConfig::getPost('semTer'),RequestConfig::getPost('sabIni'),RequestConfig::getPost('sabTer'),RequestConfig::getPost('domIni'),RequestConfig::getPost('domTer'),RequestConfig::getPost('hourId'));
        #atualiza forma de pagamento
        $objFormaPg->formaPgUpdate($_POST['forma-pag'], RequestConfig::getPost('pgId'));
        #armazenas as facilidades oferecidas
        $objfacilidades->facilidadesUpdate($_POST['facilidades'],RequestConfig::getPost('faciId'));
        #atualiza os planos
        $objPlano->planosUpdate($_POST['planos'],RequestConfig::getPost('plaId'));
        #atualiza os links externos
        $objLinkDAO->linksUpdate(RequestConfig::getPost('facebook'),RequestConfig::getPost('twitter'),RequestConfig::getPost('site'), RequestConfig::getPost('linkedin'), RequestConfig::getPost('youtube'), RequestConfig::getPost('lattes'), RequestConfig::getPost('linkId'));
        #passar id do anuncio
        if(!empty($_FILES['img']['name'])) {
            $objImgDAO->insertImgCapa($this->updateImgCapa($aut->pegar_usuario(), RequestConfig::getPost('anunId')), RequestConfig::getPost('anunId'));//recebe como argumento um array contendo o nome e diretório de todas as imagens do upload, o outro argumento é o id do usuário.
        }

        header('location: '. $route['URL_INI'] .'?controller=Dashboard&action=ViewDashboard');
    }

    ///////////////////////////INSERT ANUNCIO AUTO ////////////////////////////////////////////////////////
// http://localhost/SempreNegocio/?controller=Anuncio&action=insertAnuncioAuto
    public function insertAnuncioAuto(){

        for($i = 0; $i<10; $i++){

            ///////////////////////////////alterar
            $objCurriculumDAO = new CurriculumDAO();
            #Chamada ao método clienteDAO para poder setar o ID do cliente logado na sessão atual.
            $objClienteDAO = new ClienteDAO();
            #instancia para poder chamar o método que irá persistir os dados e retornar o id em que foi armazenado para o argumento.
            $objCadEndereco = new EnderecoDAO();
            #para pegar usuário da sessão
            $aut = AutenticadorConfig::instanciar();

            $objLinkDAO = new LinkDAO();
            $objImgDAO = new ImagemDAO();
            $objAnuncioDAO = new AnuncioDAO();
            $objFormaPg = new FormaPagamentoDAO();
            $objContDAO = new ContViewsDAO();
            $objHoraFunc = new HorarioFuncionamentoDAO();
            $objfacilidades = new FacilidadesDAO();
            $objPlano = new PlanoSaudeDAO();
            $objRoute = new RouteConfig();
            $route = $objRoute->rotas();

            #salva os dados do anuncio no banco de dados. PS ainda não foi criado o método anuncioPersist na AnuncioDAO.
            $cliii = 10;
            $titulo = "ZéLpo". $i;
            $categoria = "11";
            $objAnuncioDAO->anuncioPersist($cliii,
                $titulo,
                "Ao contrário do que seômico. Com mais de 2000 anos, suas raízes podem ser encon datada de 45 AC.".$i,
                //Esse método deve persistir o dado e retornar o id pois tudo isso é o argumento de uma function.
                $objCadEndereco->enderecoPersist("35500-178","Av primeiro de junho","Centro", 2001,"casa","Divinópolis","MG","200"), //esse método deve persistir e retornar o ID do do cadastro de endereco.
                $categoria,
                "(37) 9987-7848",
                "(37) 2222-7515",
                "laenderquadros@gmail.com",
                "Lorem Ipsum de texto da indústria tipográfica e de impressos,",
                "(37) 2222-7515"

            );

            #armazena horário
            $objHoraFunc->horarioPersist("06:00","22:00","06:00","15:00","06:00","12:00",$objAnuncioDAO->anuncioRef($cliii, $titulo,$categoria));
            #armazena a forma de pagamento
            $objFormaPg->formaPgPersist(array("boleto","credito","débito","vale alimentação","cheque","dinheiro","master","visa","american express","diner club internacional","elo","pagseguro","pay pal","mercado pago","sodexo","ticket restaurant","outrosFormPag","outrosBand"), $objAnuncioDAO->anuncioRef($cliii, $titulo,$categoria));//método para persistir a forma de pagamento. Teremos de criar um método para retornar o ID de um anuncio cadastrado
            #armazenas as facilidades oferecidas
            $objfacilidades->insertFacilidades(array("estacionamento","seguranca","acessibilidades","arCondicionado","wifi","reserva","animais","cupons"),$objAnuncioDAO->anuncioRef($cliii, $titulo,$categoria));
            #armazena os planos de saúde aceitos
            $objPlano->insertPlanos(array("unimed","prontomed","saudeVida","promed","outros"),$objAnuncioDAO->anuncioRef($cliii, $titulo,$categoria));
            #armazena os links
            $objLinkDAO->linksPersist("https://www.facebook.com/","https://www.facebook.com/","https://www.facebook.com/", "https://www.facebook.com/", "https://www.youtube.com/embed/YrAoTDttMNc", "https://www.facebook.com/", $objAnuncioDAO->anuncioRef($cliii, $titulo,$categoria));
            #armazena multiplas imagens criando diretórios especificos para cada cliente.
            $objImgDAO->insertImgCapa("upload/cupon-images/45c48cce2e2d7fbdea1afc51c7c6ad265", $objAnuncioDAO->anuncioRef($cliii, $titulo,$categoria));//recebe como argumento um array contendo o nome e diretório de todas as imagens do upload, o outro argumento é o id do usuário.
            //$objImgDAO->insertImgCapa($this->insertImgCapa($aut->pegar_usuario(), $objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria'))));
            $objContDAO->insertContViews($objAnuncioDAO->anuncioRef($cliii, $titulo,$categoria));

            ///////////////////////////////alterar

            echo "tegistrado <br/>";

        }





    }


    /////////////////////////// ENCERRA INSERT ANUNCIO AUTO ///////////////////////////////////////////////


    #insere imagens no anuncio de acordo com id
    public function inserImagensId(){

        $objRoute = new RouteConfig();
        $route = $objRoute->rotas();
        $objImgDAO = new ImagemDAO();
        $aut = AutenticadorConfig::instanciar();

        $objImgDAO->insertAnuncioImagem($this->uploadAnuncioImagem($aut->pegar_usuario(),$_GET['id']),$_GET['id']);

        header('location: '.$route['URL_INI'].'?controller=Dashboard&action=ViewDashboard');

    }

   #chama método para excluir imagem
   public function imgEx(){
	
	$objImgDAO = new ImagemDAO();
	$objImgDAO->imgDel($_GET['ref']);
	header("location: ?controller=Anuncio&action=viewGerenciaImgId&id=".$_GET['id']);
	

    }

    #upload de multiplas imagens para o anuncio
    public function uploadAnuncioImagem(){

        // Incluímos o arquivo com a classe
        include_once "libraries/UploadImagem.php";
        include_once "config/RouteConfig.php";

        $objImgDAO = new ImagemDAO();
        $objRoute = new RouteConfig();
        $route = $objRoute->rotas();
        // Associamos a classe à variável $upload
        $upload = new UploadImagem();
        $aut = AutenticadorConfig::instanciar();


// Make sure file is not cached (as it happens for example on iOS devices)
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        /*
        // Support CORS
        header("Access-Control-Allow-Origin: *");
        // other CORS headers if any...
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }
        */

// 5 minutes execution time
        @set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Settings
//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload"; //seta um diretório para a imagem

        #criar o diretório dinâmicamente, esse diretório será concatenado com o endereco de hospedagem da imagem.
        $targetDir = $route['UPLOAD_IMG_ANUNCIO_DIR'] . $aut->pegar_usuario() ."_". $_GET['id'] . "/"; // devemos verificar se já existe anuncio, caso exista, modificar.. ou criar subdiretório.

//$targetDir = 'uploads';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir); //criar um diretório na hospedagem
        }

// Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"]; //verificar porque request, está vindo como GET??
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"]; // recebe o nome do arquivo (vetor de arquivos ok?)

        } else {
            $fileName = uniqid("file_"); // Caso estiver vazio, criar um código?
        }



        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName; //Diretório completo, com nome contatenado no final. (Esta url, diferente da outra, é para salvar o arquivo no diretório criado, anteriormente.)
        $objImgDAO->insertAnuncioImagem($aut->pegar_usuario() ."_". $_GET['id'] . "/".$fileName,$_GET['id']);
// Chunking might be enabled
//$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
//$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


// Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {



                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}.part") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }

            closedir($dir);
        }


// Open temp file
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {

            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

// Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);
        }


// Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');



    }

    #método para verificar quantos anuncios um usuário possui
   /* public function qtdAnuncio(){
        $objAnuncioDAO = new AnuncioDAO();
        $objClienteDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();

        #retorna a quantidade de anuncio que o usuário possui.
        return $objAnuncioDAO->countAnuncio($objClienteDAO->returnIdUserSession($aut->pegar_usuario()));
    }
   */


    #exibe todos os anuncios ativos do usuário. PASSAR STATUR POR GET
    public function exibeAnuncios($status, $valores = "", $bairro = "", $limit = "",$sql = "", $count = ""){

        $objAnuncioDAO = new AnuncioDAO();
        $aut = AutenticadorConfig::instanciar();
        $objClienteDAO = new ClienteDAO();

        if($status == "onlineTodos"){

            return $objAnuncioDAO->returnAnuncioAll("online");

       } else if($status == "pesquisa"){

            return $objAnuncioDAO->returnSearch($valores,$bairro,$limit,$sql);

        } else {
            #retorna o conteúdo de todas as tabelas vinculadas a um unico cliente.
            return $objAnuncioDAO->returnAnunForDash($objClienteDAO->returnIdUserSession($aut->pegar_usuario()), $status);
            }

        #chamar outra função que não dê conflito com o id do usuário

    }

    #retorna contagem de quantos registros retornarão da consulta.
    public function countSearch(){

        $objAnuncioDAO = new AnuncioDAO();

        $valores = RequestConfig::getRequest('valores');
        $bairro = RequestConfig::getRequest('bairro');
        $sql = RequestConfig::getRequest('con');

         $objAnuncioDAO->returnSearchCount($valores,$bairro,$sql);

    }

    #retorna a quantidade de facilidades por anuncio
    public function qtdAnunFaci(){
        $objfacilidades = new FacilidadesDAO();
        #array chave=>valor
        $row =  $objfacilidades->anunQtdFaci(RequestConfig::getRequest('search'),RequestConfig::getRequest('tef'),RequestConfig::getRequest('fpag'),RequestConfig::getRequest('faci'),RequestConfig::getRequest('plan'));
        return $row;
    }

    #retorna a quantidade de anuncio por forma de pagamento
    public function qtdAnunformPag(){
        $objFormaPg = new FormaPagamentoDAO();
        $row = $objFormaPg->qtdAnunPag(RequestConfig::getRequest('search'),RequestConfig::getRequest('tef'),RequestConfig::getRequest('fpag'),RequestConfig::getRequest('faci'),RequestConfig::getRequest('plan'));
        return $row;
    }


    #retorna quantidade de anuncios vinculado a cada plano de saude
    public function qtdAnunPlan(){
        $objPlano = new PlanoSaudeDAO();
        $row = $objPlano->qtdAnunPla(RequestConfig::getRequest('search'),RequestConfig::getRequest('tef'),RequestConfig::getRequest('fpag'),RequestConfig::getRequest('faci'),RequestConfig::getRequest('plan'));
        return $row;
    }

    #exibe anuncio exclusivo na página de acordo com o id.
    public function viewAnuncioID(){

       
        $objCliDAO = new ClienteDAO();

        $aut = AutenticadorConfig::instanciar();
        $objContDAO = new ContViewsDAO();
        $this->route = RouteConfig::rotas();

        #contabilização do anuncio a ser renderizado.
        $objContDAO->incrementViews($_GET['id']);
        $objFace = new AutenticadorFaceConfig();


        $usuario = null;

        #caso estiver logado carrega a view.
        if ($aut->esta_logado() || $aut->login_cookie() || $objFace->faceAutenticador()) {


            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
            $this->view->set('ID', $_GET['id']);
            $this->view->set('arrayFace', $objFace->faceUserData());
            #retorna quantidade de visualizações do anuncio
            $this->view->set('idCli', $objCliDAO->returnIdUserSession($aut->pegar_usuario()));
            $this->view->set('viewsQtd', $objContDAO->returnQtdAnuncio($_GET['id']));
            $this->view->render($this->route['VIEW_ANUNCIO_DASH_POR_ID']);

        } else {


            #Caso o usuário tente acessar a página sem estiver logado, ele será redirecionado para o form de login.
            header('location: '.$this->route['URL_INI'].'?controller=Dashboard&action=ViewLogin');
        }

    }


    #exibe anuncio para todos os usuários, seja logado ou não.
    public function viewAnuncioIdAll(){

       

        $objCliDAO = new ClienteDAO();
	$objAnunDAO = new AnuncioDAO();
	$objImg = new ImagemDAO();
        $aut = AutenticadorConfig::instanciar();
        $objContDAO = new ContViewsDAO();
        $this->route = RouteConfig::rotas();

        #contabilização do anuncio a ser renderizado.
        $objContDAO->incrementViews($_GET['id']);

        $usuario = null;
        $objFace = new AutenticadorFaceConfig();

        if ($aut->esta_logado() || $aut->login_cookie()) {

            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));

        } else {

            $this->view->set('arrayUser',0);

        }

        if($objCliDAO->returnIdUserSession($aut->pegar_usuario()) == 0){

            $this->view->set('idCli', 0);

        } else {

            $this->view->set('idCli', $objCliDAO->returnIdUserSession($aut->pegar_usuario()));
        }

        $dadosFace = $objFace->faceUserData();
            #url para login com facebook
           if($objFace->faceAutenticador()){

               $this->view->set('idCli', $objCliDAO->returnIdUserSession($dadosFace['email']));

           }



            $this->view->set('faceAut', $objFace->loginUrl());
            $this->view->set('arrayFace', $dadosFace);
	    $this->view->set('metas', $objAnunDAO->metaFace($_GET['id']));
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->set('idAnun', $_GET['id']);
            $this->view->set('imgCapa',$objAnunDAO->returnImgCapa($_GET['id']));
	   // $this->view->set('imgMeta', $objImg->retornaImagem($_GET['id']));

            #retorna quantidade de visualizações do anuncio
            $this->view->render($this->route['VIEW_ANUNCIO_ID_ALL']);

    }


    #renderiza página principal de anuncio.
    public function viewAnuncioPesquisa(){

        // $aut = AutenticadorConfig::instanciar();
        $this->route = RouteConfig::rotas();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        $objFace = new AutenticadorFaceConfig();
        $usuario = null;

        if ($aut->esta_logado() || $aut->login_cookie()) {
            $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        } else {
            $this->view->set('arrayUser',0);
        }

            $objFace->faceAutenticador();
            $this->view->set('faceAut', $objFace->loginUrl());
            $this->view->set('arrayFace', $objFace->faceUserData());
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->render($this->route['VIEW_ANUNCIO_PESQUISA']);

      //  } else{


            #Caso o usuário tente acessar a página sem estiver logado, ele será redirecionado para o form de login.
       //     header('location: '.$this->route['URL_INI'].'?controller=Dashboard&action=ViewLogin');
       // }


    }

    #FALTA ESTUDAR UMA FORMA DE RETORNAR APENAS A QUANTIDADE EXATA DE CURRICULO, EM VEZ DE TODOS OS ATRIBUTOS.
    #retorna a quantidade de anuncios ativos ou inativos
    public function returnQuantAnuncio($status){

        if($status == "online"){

            return count($this->exibeAnuncios("online"));

        } else if($status == "inativo"){

            return count($this->exibeAnuncios("inativo"));

        } else {

            return "Argumento indevido para returnQuantAnuncio";
        }

    }


    #método que retorna na forma de array multidimensional os anuncios do usuário.
    public function retornaAnuncio($status, $valores = "", $bairro = "" , $limit = "", $sql = "",$count = "not"){

        $anuncioCompleto = array();

        $objImagem = new ImagemDAO();
        $objAvaliacao =  new AvaliacaoDAO();
        $objMensagem = new MensagemDAO();
        $objAnuncioDAO = new AnuncioDAO();
       // $aut = AutenticadorConfig::instanciar();
       // $objClienteDAO = new ClienteDAO();

        #retorna os anuncios online para serem exibidos no dashboard
        $anuncio = $this->exibeAnuncios($status,$valores,$bairro,$limit,$sql,$count);

        if(count($anuncio) > 0){
            #O tamanho do array anuncio é a quantidade de anuncios que o usuário possui, sendo os anuncios online ou não, de acordo com o argumento passado.
            for($i = 0; $i < count($anuncio); $i++){

                    $anuncioCompleto[$i] = array( "anuncio"   => $anuncioArray = $objAnuncioDAO->retornaAnuncioPorId($anuncio[$i]['anuncio_id']),
                    "imagens"   => $anuncioImagens = $objImagem->retornaImagem($anuncio[$i]['anuncio_id']),
                    "avaliacao" => $anuncioAvaliacao = $objAvaliacao->retornaAvaliacao($anuncio[$i]['anuncio_id']),
                    "mensagem"  => $anuncioMensagem = $objMensagem->retornaMensagem($anuncio[$i]['anuncio_id']));


            }

            #retorna um array contendo todos os anuncios do usuário.
            echo json_encode($anuncioCompleto);

        } else {

            echo json_encode(0);
        }

    }

    #método que monta a visualização dos anuncios.
    public function anuncioImpressAtivo(){

        #caso estiver vazio redireciona para dashboard
       echo $this->retornaAnuncio("online");

    }

    #método que monta a visualização dos anuncios inativos.
    public function anuncioImpressInativo(){

        echo $this->retornaAnuncio("inativo");
    }

    #solicita json contendo todos os anuncios ativos no sistema
    public function anuncioImpressAll(){

        echo $this->retornaAnuncio("onlineTodos");
    }

    #solicita json contendo todos os anuncios que pertecem a pesquisa
    public function anuncioPesquisaImpressAll(){

        $valores = RequestConfig::getRequest('valores');
        $limit = RequestConfig::getRequest('limit');
        $bairro = RequestConfig::getRequest('bairro');
        $sql = RequestConfig::getRequest('sql');
        $count = RequestConfig::getRequest('count');

        $this->retornaAnuncio("pesquisa",$valores,$bairro,$limit,$sql,$count);

    }

    #retorna apenas um anuncio de acordo com o id passado como argumento
    public function anuncioID(){

        $id = RequestConfig::getRequest('id');

        $objImagem = new ImagemDAO();
        $objAvaliacao =  new AvaliacaoDAO();
        $objMensagem = new MensagemDAO();
        $objAnuncioDAO = new AnuncioDAO();

        $teste = array(         "anuncio"   => $anuncioArray = $objAnuncioDAO->retornaAnuncioPorId($id),
                                "imagens"   => $anuncioImagens = $objImagem->retornaImagem($id),
                                "avaliacao" => $anuncioAvaliacao = $objAvaliacao->retornaAvaliacao($id),
                                "mensagem"  => $anuncioMensagem = $objMensagem->retornaMensagem($id));
        #retorna o anuncio no formato Json
        echo json_encode($teste);

    }


    #retorna apenas um anuncio de acordo com o id passado como argumento
    public function anuncioIDProvi(){


        $id = RequestConfig::getRequest('id');
        $objImagem = new ImagemDAO();
        $objAvaliacao =  new AvaliacaoDAO();
        $objMensagem = new MensagemDAO();
        $objAnuncioDAO = new AnuncioDAO();

        $teste = array("anuncio"   => $anuncioArray = $objAnuncioDAO->retornaAnuncioPorId($id),
            "imagens"   => $anuncioImagens = $objImagem->retornaImagem($id),
            "avaliacao" => $anuncioAvaliacao = $objAvaliacao->retornaAvaliacao($id),
            "mensagem"  => $anuncioMensagem = $objMensagem->retornaMensagem($id));

        #retorna o anuncio no formato Json
        return $teste;

    }

    #modifica status do anuncio para online ou inativo, sendo este solicitado para o usuário.
    public function alterStatus(){

        $objAnuncioDAO = new AnuncioDAO();

        $objAnuncioDAO->updateStatus(RequestConfig::getRequest('status'),RequestConfig::getRequest('id'));
    }

    #chama o método que exclui o anuncio do usuário.
    public function excluAnun(){

        $objAnuncioDAO = new AnuncioDAO();
        $objAnuncioDAO->setExcluAnuncio($_GET['id']);

    }

    #chama o método que altera os dados do usuário
    public function alterInfoUser(){

        $objCurControl = new DashboardCurriculoController();

        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();

        $objCliDAO->alterCadUser($objCliDAO->returnIdUserSession($aut->pegar_usuario()),$_POST['nome'], $_POST['login'],$_POST['novaSenha'],$objCurControl->upLoadImag('upload/user-images/'),RequestConfig::getPost('comp'),RequestConfig::getPost('ender'),RequestConfig::getPost('coty'),RequestConfig::getPost('uf'),RequestConfig::getPost('pais'),RequestConfig::getPost('tw'),RequestConfig::getPost('fac'),RequestConfig::getPost('sobre'),RequestConfig::getPost('cEstado'),RequestConfig::getPost('sexo'),RequestConfig::getPost('data'),RequestConfig::getPost('sobNome'));//passando diretório seco, antes estava 'UPLOAD_USER_DIR'
    }

    #exclui o anuncio e seta a exclusão do mesmo na base de dados para futuros relatórios
    public function excluiUsuario(){

        $this->route = RouteConfig::rotas();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();

        $objCliDAO->userDel($objCliDAO->returnIdUserSession($aut->pegar_usuario()),RequestConfig::getRequest('senha01'),RequestConfig::getRequest('motiv'),RequestConfig::getRequest('motvDesc'));

        header('location: /login/');

    }

    #solicita registro de horário da tabela horários
    public function retDadosHor(){

        $objHorFunc = new HorarioFuncionamentoDAO();

        $objHorFunc->retornaHorarios();
    }

    #solicita registro de horario do anuncio por id
    public function regHoraId(){

        $objHorFunc = new HorarioFuncionamentoDAO();
        $objHorFunc->horarioFunc($_GET['id']);

    }

    #retorna json referente a tabela anuncio de acordo com o id do anuncio passado.
    public function retornaRegAnun(){
        $objAnuncio = new AnuncioDAO();
        $objAnuncio->retornaRegAnunId(RequestConfig::getRequest('id'));
    }


    //$aut->pegar_usuario(), $objAnuncioDAO->anuncioRef($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),RequestConfig::getPost('titulo'), RequestConfig::getPost('cCategoria')))
    #seta a imagem de capa para o anuncio que está sendo cadastrado.
    public function insertImgCapa($userSession, $idAnuncio){

        include_once 'controller/DashboardCurriculoController.php';

        $this->route = RouteConfig::rotas();
        $objDashCurControl = new DashboardCurriculoController();

        #fazer lógica que cria a pasta onde será salvo a ft de capa.
        #criar o diretório dinâmicamente, esse diretório será concatenado com o endereco de hospedagem da imagem.
        $path = $this->route['UPLOAD_IMG_ANUNCIO_DIR'] . $userSession ."_". $idAnuncio . "/"; // devemos verificar se já existe anuncio, caso exista, modificar.. ou criar subdiretório.
        @mkdir($path);
        chmod("upload/",0777);
        $img = $objDashCurControl->upLoadImag($path,"Capa");
        return $img;

    }

    #atualiza a imagem de capa na pasta
    public function updateImgCapa($userSession, $idAnuncio){

        $this->route = RouteConfig::rotas();
        $objDashCurControl = new DashboardCurriculoController();

        #fazer lógica que cria a pasta onde será salvo a ft de capa.
        #criar o diretório dinâmicamente, esse diretório será concatenado com o endereco de hospedagem da imagem.
        $path = $this->route['UPLOAD_IMG_ANUNCIO_DIR'] . $userSession ."_". $idAnuncio . "/"; // devemos verificar se já existe anuncio, caso exista, modificar.. ou criar subdiretório.
        @mkdir($path);
        chmod("upload/",0777);
        $img = $objDashCurControl->upLoadImag($path,"Capa");
        return $img;

    }

    #solicita método para persistir mensagem na base de dados.
    public function insertMensager(){

        include_once 'dao/AccessObject/MensagemDAO.php';
        $objMenDAO = new MensagemDAO();
        $objMenDAO->messagePersist(RequestConfig::getPost('nome'),RequestConfig::getPost('mensagem'),RequestConfig::getRequest('idAnun'),RequestConfig::getPost('email'),RequestConfig::getPost('telefone'));

    }

    #solicita método para persistir anuncio na base de dados
    public function insertRevew(){

        include_once 'dao/AccessObject/AvaliacaoDAO.php';
        $objAvaDAO = new AvaliacaoDAO();
        $objAvaDAO->persistRevew(RequestConfig::getPost('nota'),RequestConfig::getPost('opiniao'),RequestConfig::getPost('idAnun'),RequestConfig::getPost('cliRef'), RequestConfig::getPost('titulo'));

    }

    #chama método para persistir a resposta de um revew na base de dados
    public function insertRespostaRevew(){

        include_once 'dao/AccessObject/AvaliacaoRespostasDAO.php';
        $objAvaRes = new AvaliacaoRespostasDAO();
        #falta fazer formulário de resposta...
        $objAvaRes->respostaRevew(RequestConfig::getPost('cliRef'),RequestConfig::getPost('respText'),RequestConfig::getPost('revewRef'),RequestConfig::getPost('anunDon'));

    }

    #retorna as informações necessárias para gerar as respostas nos revews. PS: Os dados para gerar os revew foram passados na função returnIdProvi
    public function returnRespRevew(){

        include_once 'dao/AccessObject/AvaliacaoRespostasDAO.php';
        $objAvaRes = new AvaliacaoRespostasDAO();

        $teste = $objAvaRes->retornaRespostas(RequestConfig::getRequest('idAnun'));

        if($teste != 0){
            echo json_encode($teste);
        } else {
            echo 0;
        }



    }

    #solicita incremento de curtidas do revew passado como argumento.
    public function incrementCurtida(){

        include_once 'dao/AccessObject/AvaliacaoDAO.php';
        $objAvaDAO = new AvaliacaoDAO();
        $objAvaDAO->incrementGostei(RequestConfig::getPost('revewRef'));

    }

    #retorna todos os bairros cadastrados
    public function solicBairros(){

        include_once 'dao/AccessObject/BairrosDAO.php';
        $objCid = new BairrosDAO();
        $objCid->returnBairros(RequestConfig::getRequest('search'));

    }

    #retorna quantidade de anuncio vinculado a cada categoria retornada.
    public function ReturnQtdAnunCat($retorno){

    //    $objSubCat = new SubCategoriaDAO();

     //  return $objSubCat->qtdAnunCat($retorno);

    }


    #retorna os dados em json para ser montado o filtro checkBox de categorias dinamicamente de acordo com a pesquisa do usuário.
    public function returnFiltroCat(){

        $search = RequestConfig::getRequest('buscaCat');//verificar qual o nome dado e se é post mesmo.



        $objCat = new CategoriaDAO();
        $objSubCat = new SubCategoriaDAO();

        #se tiver uma categoria relacionada a pesquisa, retorna todos os filhos. Caso contrário verifica se alguma subcategoria se relaciona a pesquisa.
        if($retorno = $objCat->returnCatDinamic($search)){
            //   echo "if";
             #retorna quantidade de anuncio vinculado a cada categoria retornada.
         //   $retorno = $this->ReturnQtdAnunCat($retorno);


            echo json_encode($retorno);

            #verifica se alguma subcategoria se relaciona a pesquisa, caso verdadeiro, retorna todas as irmãs dessa categoria.
        } else if ($retorno = $objSubCat->returnSubOnSubSearch($search)) {

            echo json_encode($retorno);
            #caso nenhuma das anteriores retorne, envia zero, o que significa que não terá nenhum checkBos de categoria pra ser marcado.
        } else {

            #Quando não for nenhum, pega qual categoria está relacionada ao anuncio da pesquisa.
            $retorno = $objSubCat->returnCatForAnunSearch($search);
            echo json_encode($retorno);
        }

    }

    #monta uma consulta SQL de acordo com os dados recebidos do filtro de pesquisa. Caso count = yes, recebe a contagem total de elementos na consulta em vez do sql propriamente dito.
    public function filterMount(){

        $objAnuncioDAO = new AnuncioDAO();
        $objAnuncioDAO->selectFilter($_POST['categoria'],$_POST['bairro'],$_POST['formPag'],$_POST['facilidades'],$_POST['planos'],$_POST['limit'],$_POST['count']);

       // echo $_POST['categoria'].$_POST['bairro'].$_POST['formPag'].$_POST['facilidades'].$_POST['planos'].$_POST['limit'].$_POST['count'];

    }



    #solicita id do cliente do anuncio passado como argumento
    public function soliIdCli(){
        $objAnuncioDAO = new AnuncioDAO();
        $objAnuncioDAO->returnCliForAnun(RequestConfig::getRequest('idAnun'));

    }

    #solicita a persistência do cupon na base de dados
    public function insertCupon(){

        $objCupon = new CuponDescontoDAO();
        $objCupon->cuponPersist( RequestConfig::getPost('idAnun'),
                                 RequestConfig::getPost('tituCupon'),
                                 RequestConfig::getPost('dCupon'),
                                 RequestConfig::getPost('quanCupon'),
                                 RequestConfig::getPost('pInicio'),
                                 RequestConfig::getPost('termino'),
                                 RequestConfig::getPost('tipoDesc'),
                                 RequestConfig::getPost('percentVal'),
                                 RequestConfig::getPost('deVal'),
                                 RequestConfig::getPost('paraVal'));

        header('location: ?controller=Dashboard&action=ViewDashboard&option=selAnunDes');
    }

    #insere cupon de desconto na base de dados.
    public function insertCuponVirt(){

        $objCuponVirt = new DescontoVirtualDAO();
        $objCuponVirt->cuponVirtualPersist( RequestConfig::getPost('tituCupon'),
                                            RequestConfig::getPost('dCupon'),
                                            RequestConfig::getPost('pInicio'),
                                            RequestConfig::getPost('termino'),
                                            RequestConfig::getPost('tipoDesc'),
                                            RequestConfig::getPost('percentVal'),
                                            RequestConfig::getPost('deVal'),
                                            RequestConfig::getPost('paraVal'),
                                            RequestConfig::getPost('url'),
                                            RequestConfig::getPost('nomeLoja'));
    }


    public function atualiCupon(){

        $objCupon = new CuponDescontoDAO();
        $objCupon->cuponUpdate( RequestConfig::getPost('idCupon'),
                                RequestConfig::getPost('tituCupon'),
                                RequestConfig::getPost('dCupon'),
                                RequestConfig::getPost('quanCupon'),
                                RequestConfig::getPost('pInicio'),
                                RequestConfig::getPost('termino'),
                                RequestConfig::getPost('tipoDesc'),
                                RequestConfig::getPost('percentVal'),
                                RequestConfig::getPost('deVal'),
                                RequestConfig::getPost('paraVal'),
                                RequestConfig::getPost('paraVal'),
                                RequestConfig::getPost('idAnun'));

        header('location: ?controller=Dashboard&action=ViewDashboard&option=selAnunDes');

    }

    #solicida a exclusão do cupon passado como argumento
    public function deletCupon(){

        $objCupon = new CuponDescontoDAO();
        $objCupon->setExcluCupon(RequestConfig::getPost('idCupon'));

    }

    #solicita dados do cupon por id
    public function cuponForId(){

        $objCupon = new CuponDescontoDAO();
        $objCupon->returnCupon(RequestConfig::getRequest('idCupon'));

    }

    #solicita cupons vinculados id do anuncio passado como argumento
    public function soliCupons(){
        $objCupon = new CuponDescontoDAO();
        $objCupon->returnCuponsForId(RequestConfig::getRequest('idAnun'));
    }

    #solicita todos os cupons cadastrados no sistema.
    public function cuponsForView(){
        $objCupon = new CuponDescontoDAO();
        $objCupon->returnCuponsForAll(RequestConfig::getRequest('offset'),RequestConfig::getRequest('qtdResults'));
    }

    #retorna quantidade de páginas da paginação
    public function returnaginator(){

        $objCupon = new CuponDescontoDAO();
        $objCupon->cuponPaginator();

    }


    #exibe página exclusiva do cupon
    public function viewCuponPorId(){

  

        // $aut = AutenticadorConfig::instanciar();
        $objCuponDesc = new cuponDescontoDAO();
        $this->route = RouteConfig::rotas();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        $objFace = new AutenticadorFaceConfig();
        $usuario = null;
        $objFace->faceAutenticador();
        $this->view->set('arrayFace', $objFace->faceUserData());
        $this->view->set('faceAut', $objFace->loginUrl());
 	$this->view->set('description', $objCuponDesc->returnCupon($_GET['cupon'],'off'));
        $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['VIEW_CUPON_ID']);

    }

    #solicita dados do cupon e anuncio para montar a view
    public function solCupoCompleto(){

        $objCupon = new CuponDescontoDAO();
        $objCupon->returnCupAun(RequestConfig::getRequest('cupon'));

    }

    #solicita método para persistir dados da impressão de cupon
    public function solCuponImpress(){

        $objImpresso = new CuponImpressoDAO();
        $objImpresso->persistImpressCupon(RequestConfig::getPost('idCli'),RequestConfig::getPost('idCupon'));

    }

    #solicita verificação se usuário já imprimiu o cupon passado como argumento
    public function impressVerify(){

        $objImpresso = new CuponImpressoDAO();
        $objImpresso->veriImpressCupon(RequestConfig::getRequest('cli'),RequestConfig::getRequest('cupon'));

    }

    #solicita geração do pdf do cupon a ser impresso
    public function cuponPdfImpress(){

        $objCuponImpre = new CuponImpressoDAO();
        $objCuponImpre->cuponPdfGeneretor(RequestConfig::getRequest('idCupon'),RequestConfig::getRequest('cliId'),RequestConfig::getRequest('infinit'));

    }


    #solicita a geração do relatório de controle dos cupons gerados.
    public function relCupon(){

        $objCupDesDAO = new CuponDescontoDAO();

        $objCupDesDAO->relCupPdf(RequestConfig::getRequest('idCupon'),RequestConfig::getRequest('infinit'));

    }


    #solicita cupons cadastrados como online
    public function viewDesVirtual(){

        $objDescVirtu = new DescontoVirtualDAO();
        $objDescVirtu->returnDadosOnline();

    }

    #retorna desconto virtual por id
    public function viewDesVirId(){

        $objDescVirtu = new DescontoVirtualDAO();
        $objDescVirtu->returnOnlineId(RequestConfig::getRequest('idCupon'));

    }


    #chama a view de cadastro de desconto virtuaal
    public function viewCadVirt(){

            $objCliDAO = new ClienteDAO();

            $aut = AutenticadorConfig::instanciar();
            $objContDAO = new ContViewsDAO();
            $this->route = RouteConfig::rotas();
            $usuario = null;

            $arrayUser = $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario()));

            #caso estiver logado carrega a view.
            if (($aut->esta_logado() || $aut->login_cookie()) && ($arrayUser[0]['cli_senha'] == "d155c2f519e9e32e2714803ffc894ec0" && $arrayUser[0]['cli_email'] == "laenderquadros@gmail.com")) {

                $this->view->set('URL_INI', $this->route['URL_INI']);
                $this->view->set('arrayUser', $arrayUser);
                $this->view->set('ID', $_GET['id']);
                $this->view->render($this->route['CAD_CUPON_VIRTUAL']);

            } else {

                #Caso o usuário tente acessar a página sem estiver logado, ele será redirecionado para o form de login.
                header('location: '.$this->route['URL_INI'].'?controller=Dashboard&action=ViewLogin');

            }

    }

    #salva a consulta do filtro atual em uma variável de sessão
    public function filterUpdate(){
        //session_start();
        $sess = SessaoConfig::instanciar();

        $sess::set('filterUpdate', array('filter' => RequestConfig::getPost('filter'),
                                         'categoria' => RequestConfig::getPost('categoria')));

        //$categoria = RequestConfig::getPost('categoria');

        #setar a categoria a ser utilizada.
       // if(isset($categoria) && !empty($categoria)){

         //   $sess::set('filterCategoria', $categoria);
       // }


    }

    #retorna a consulta do filtro passado como argumento
        public function returnFilter(){
          //  session_start();
            $sess = SessaoConfig::instanciar();
            $retorno[0]['filtroR'] = $sess::get('filterUpdate');

          //  $retorno[0]['filtroCat'] = $sess::get('filterCategoria');

            echo json_encode($retorno);

           // $sess::set('filterUpdate', "");
           //$sess::set('filterCategoria', "");

    }

    #retorna caegoria
    public function returnCatAll(){

        $objCatDAO = new CategoriaDAO();
        $objCatDAO->selectAllCategoria();

    }

    #retorna todas as subcategorias
    public function returnSubCatAll(){

        $objSubDAO = new SubCategoriaDAO();
        $objSubDAO->selectAllSubCategoria();

    }

   #retorna o status de pagamento de acordo com o id
   public function returnStatusPG(){

        $objAnunDAO = new AnuncioDAO();
        $objAnunDAO->returnStatusPg($_GET['id']);
    }

   #solicita verificação de existência de titulo
   public function titleExists(){

	$objAnunDAO = new AnuncioDAO();	
	$objAnunDAO->titleVerify(Sanitize::filter($_POST['title']));

   }


}// Encerra class






