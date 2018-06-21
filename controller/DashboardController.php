<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 26/09/15
 * Time: 02:26
 */

include_once 'libraries/AutoLoad.php';


//Controlador responsável por gerenciar as requisições referentes ao painel de controle do cliente.
class DashboardController extends ControllerConfig {

    private $route,
            $sessao;

        #método responsável por chamar a tela do painel de gerência
        public function ViewDashboard(){

            $aut = AutenticadorConfig::instanciar();
            $this->sessao = SessaoConfig::instanciar();
            $this->route = RouteConfig::rotas();
            $objAnunController = new AnuncioController();
            $objCliDAO = new ClienteDAO();
            $objFace = new AutenticadorFaceConfig();

            $usuario = null;

            if ($aut->esta_logado() || $aut->login_cookie() || $objFace->faceAutenticador()) {

                $usuario = $aut->pegar_usuario();
               // $row = $aut->retornaCookieValues(); //Dá erro quando não existe cookie previamente setado, lembrando que esse método aqui está retornando valores de um cookie.

               // $objAnunDAO = new AnuncioDAO();


                $this->view->set('URL_INI', $this->route['URL_INI']);
              //  $this->view->set('testeUm', $row['login']);
              //  $this->view->set('testeDois', $row['senha']);
                $this->view->set('arrayUser', $objCliDAO->retornaDadosLogin($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
                #dados do face
                $this->view->set('arrayFace', $objFace->faceUserData());
                #recebe o valor especifico do menu a ser aberto via get
                $this->view->set('option', RequestConfig::getRequest('option'));
                $this->view->set('idAnun', RequestConfig::getRequest('anun'));
                $this->view->set('qtdAnuncioAtivo',$objAnunController->returnQuantAnuncio("online"));
                $this->view->set('qtdAnuncioInativo',$objAnunController->returnQuantAnuncio("inativo"));
              //  $this->view->set( 'anuncio',  $objAnunDAO->retornaStatusAnuncio('todos', 'online', '') );

                $this->view->render($this->route['DASHBOARD_DIR']);
            } else {

		if(isset($_GET['menValid']) && !empty($_GET['menValid']) && $_GET['menValid'] == "true"){
			header('location: /login/true');	
		}else{
			header('location: /login');// Url amigável /painel-de-controle/login
		}

                	
            }




        }

    #retorna o status do curriculo cadastrado
    public function curStat(){

        $objCurriDAO = new CurriculumDAO();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();

        #verifica se o status do curriculo está como ativado ou desativado e fornece o link e texto de acordo com a situação.
        $objCurriDAO->verificaStatusCurriculo($objCliDAO->returnIdUserSession($aut->pegar_usuario()));

    }

        #método responsável por chamar a tela de login
        public function ViewLogin(){

            $this->sessao = SessaoConfig::instanciar();
            $this->route = RouteConfig::rotas();
            $aut = AutenticadorConfig::instanciar();
            $objFace = new AutenticadorFaceConfig();

            $usuario = null;


            if ($aut->esta_logado() || $aut->login_cookie() || $objFace->faceAutenticador()) {
                #caso o usuário já esteja logado, direciona ele para o seu painel gerenciável.
                header('location: /painel-de-controle/');
            } else {

                #url para login com facebook
                $this->view->set('faceAut', $objFace->loginUrl());
                /*Cria uma variável chamada título, para ser utilizada dentro do arquivo de visão do MVC.*/
                $this->view->set('URL_INI', $this->route['URL_INI']);
                /*Diz ao nosso mecanismo de visão para renderizar os seus dados
                usando o arquivo de visão: View/home/index.php */
                $this->view->render($this->route['LOGIN_DIR']);

            }

        }


#método do model para realizar o login, caso tudo ocorra bem, o usuário será redirecionado para a tela do painel de controle.
          public function login()
          {




              //session_start(); PARA TESTE POIS DEI UM SESSION START NO INICIO

              # Uso do singleton para instanciar
              # apenas um objeto de autenticação
              # e esconder a classe real de autenticação
              $aut = AutenticadorConfig::instanciar();

              $objCliDAO = new ClienteDAO();

              $this->sessao = SessaoConfig::instanciar();

              # efetua o processo de autenticação. O argumento deve ser passado em MD5 devido a lógica para poder armazenar a hash no cookie e aproveitar a função de login para logar convencional ou logar pelos valores contidos no cookie.
              if ($aut->login(RequestConfig::getRequest('email'),md5(RequestConfig::getRequest('senha')))) {
                  # redireciona o usuário para dentro do sistema


                  /*
                   * if(metodoverofocavalidacao() == true){
                   *    redireciona
                   * }else{
                   *    cadastro não validado, clique aqui para receber um novo email de confirmação de cadastro. => colocar link que chama o gerador de validação.(ou melhor, guar
                   * dar a hash enviada na validação no bando, porque depois é só recuperar e enviar o email novamente.)
                   * }
                   */

                  #verifica se o usuário deseja se manter logado
                  if(RequestConfig::getRequest('manterConectado') == "logado"){


                      #caso passar pelo método login, é porque os dados batem com o que está no servidor. Nesse caso será armazenado a hash criptografada no cookie.
                     $aut->setPermanecerLogado(RequestConfig::getRequest('email'), md5(RequestConfig::getRequest('senha')));//Resolver problema de não poder salvar senha com criptografia no cookie.

                  }

               

                echo "UserOK";


                 //Manda para a página de gerência (Está exibindo o código fonte em vez de redirecionar...)
              } else {
                  # envia o usuário de volta para
                  # o form de login
                 // header('location: view/pages/home/home.php');
                  echo "<p>Ops, email e/ou senha invalidos, tente novamente.</p>".
                      "<button type='button' class='fec'></button>";


              }

          }

         #método para sair da página dashboard(Acredito que deve ser utilizado um session destroy)
         public function  sair(){

             $controller = RequestConfig::getRequest('dirControl') ? RequestConfig::getRequest('dirControl') : '?controller=Dashboard&action=ViewLogin';
             $action =  RequestConfig::getRequest('dirAction') ? RequestConfig::getRequest('dirAction') : '&action=ViewLogin';
             # envia o usuário para fora do sistema
             $route = RouteConfig::rotas();
             $aut = AutenticadorConfig::instanciar();
             $aut->sair();

             header('location:' .$route['URL_INI'].$controller."&".$action);
            }

         #retorna json contendo os dados da tabela categoria
         public function retornaDadosCat(){
             $objCategoria = new CategoriaDAO();
             $objCategoria->selectAllCategoria();
         }

        #retorna categoria e sub categoria para o autocomplete
        public function returnForAutocom(){
            $objCategoria = new CategoriaDAO();
            $objCategoria->returnCatAndSub();
        }

         #retorna json contendo os dados referentes a subcategoria
         public function retornaSubCat(){
             $objSubCat = new SubCategoriaDAO();
             $objSubCat->selectAllSubCategoria();
         }


        #solicita logout via facebook
        public function sairFace(){

            $objFace = new AutenticadorFaceConfig();
            $objFace->faceLogout();


        }

    #envia vaga de emprego para email -- Provisório
    public function submitVagaEmail(){
    
        $objMailer = new EnvioEmail();
	$habili = "";
	for($i=0; $i<count($_POST['cHabilitacao']); $i++){
		$habili.= $_POST['cHabilitacao'][$i];
	}

        $mensagem = "Nome da Empresa: ".$_POST['nEmp']."<br/>
            Sexo: ".$_POST['genero']."<br/>
            Estado Civil: ".$_POST['cEstado']."<br/>
            Formação acadêmica: ".$_POST['cEscolaridade']."<br/>
            Idiomas desejados: ".$_POST['Idiomas']."<br/>
            Cursos desejados: ".$_POST['curso']."<br/>
            Habilitação: ".$habili."<br/>
            Veículo próprio: ".$_POST['exigVec']."<br/>
            Expericia exigida: ".$_POST['exig']."<br/>
            Horário do cargo: ".$_POST['hora']."<br/>
            Dias Trabalhados: ".$_POST['folga']."<br/>
            Disponabilidade de horário: ".$_POST['disp']."<br/>
            Qualificações de Desejadas: ".$_POST['cObs']."<br/>
            Cargo: ".$_POST['nomeCar']."<br/>
            Salário: ".$_POST['salario']."<br/>
            Tarefas: ".$_POST['Tarefas']."<br/>
            Email: ".$_POST['cEmail']."<br/>
            Tel-fixo: ".$_POST['tel-fixo']."<br/>
            Tel-cel: ".$_POST['tel-cel']."<br/>";


                

        $objMailer->EnvioSMTP("Envio de vaga", $mensagem, "laenderquadros@gmail.com", $nome = 'Cliente', $hostEmail = '');

        header("location: /painel-de-controle/");

       
    }



}
