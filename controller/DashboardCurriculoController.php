<?php
/**
 * Realizar uma verificação para saber se o usuário logado já possui curriculo cadastrado, caso positivo, ele será redirecionado para a página de cadastro de currículo, cado já possua currículo, será
 * direcionado para a página painel de controle.
 */

//Implementar código para o usuário poder imprimir/baixar curriculo dele ou de terceiros.
//Terá como pesquisar currículo por categoria.

include_once 'libraries/AutoLoad.php';




class DashboardCurriculoController extends ControllerConfig
{

    private $route,
            $rowCategoria,
            $rowSubCategoria,
            $rowHorario,
            $dadosRetorno,
            $nomeAtributo,
            $htmlHorario,
            $Ini,
            $Fin,
            $categorias;



    #responsável pelo upload de imagem.
    public function upLoadImag($diretorio, $nomeAdicional = "")
    {


          
         
            $objRoute = new RouteConfig();
            $route = $objRoute->rotas();
            // Associamos a classe à variável $upload
            $upload = new UploadImagem();
            $aut = AutenticadorConfig::instanciar();
            // Determinamos nossa largura máxima permitida para a imagem
            $upload->width = 250;
            // Determinamos nossa altura máxima permitida para a imagem
            $upload->height = 250;

            //echo "Usuário" . $aut->pegar_usuario() ."</br>". "Nome do arquivo " . $_FILES['img']['name'] . "</br>";

            #verifica se foi realizado o upload da foto, caso contrário, não salva a referencia da imagem na base de dados.
            if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){

                $newName = $upload->renameUpLoad($aut->pegar_usuario()) . $nomeAdicional;
                #foi passado o array contento a imagem e o usuário logado como argumento,
                $_FILES['img']['name'] = $newName;

                // Exibimos a mensagem com sucesso ou erro retornada pela função salvar.
                // Se for sucesso, a mensagem também é um link para a imagem enviada.

               $upload->salvar($diretorio, $_FILES['img']); //PS ANTES ESTAVA ASSIM 29/12/2015

                return $_FILES['img']['name'] = $diretorio.$newName;

                //ENCONTRAR UMA FORMA DE MANTER O ARQUIVO QUE ESTAVA CASO A ATUALIZAÇÃO NÃO SUBIR IMAGEM.

            } else {
              // return  0;
             //   echo "não foi possivel persistir imagem" . $diretorio . $nomeAdicional;
            }



        //redirecionar para a tela de gerencia de currículo.
       // header('location:'. $this->route['URL_INI'].'?controller=DashboardCurriculo&action=viewDashboardCurriculo'); //O método que vai redirecionar
    }





    #método responsável por setar na base de dados o cadastro do currículum do usuário.
    public function insertCadastroCurriculo(){

        $objCurriculumDAO = new CurriculumDAO();
        #Chamada ao método clienteDAO para poder setar o ID do cliente logado na sessão atual.
        $objClienteDAO = new ClienteDAO();
        #instancia para poder chamar o método que irá persistir os dados e retornar o id em que foi armazenado para o argumento.
        $objCadEndereco = new EnderecoDAO();
        #para pegar usuário da sessão
        $aut = AutenticadorConfig::instanciar();

        $objRoute = new RouteConfig();
        $route = $objRoute->rotas();

        #curriculum persist é um método de CurriculumDAO que tem como objetivo gravar os dados do formulário na tabela curricul, lembrando que o curriculum é vinculado ao ID do cliente.
        $objCurriculumDAO->curriculumPersist($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),//Aqui deverá ser passado o ID do cliente.
                                             RequestConfig::getPost('cNome'),
                                             RequestConfig::getPost('sexo'),
                                             RequestConfig::getPost('cIdade'),
                                             //Esse método deve persistir o dado e retornar o id pois tudo isso é o argumento de uma function.
                                             $objCadEndereco->enderecoPersist(RequestConfig::getPost('cep'),RequestConfig::getPost('rua'),RequestConfig::getPost('bairro'), RequestConfig::getPost('numero'),RequestConfig::getPost('cComplemento'),RequestConfig::getPost('cidade'),RequestConfig::getPost('uf'),RequestConfig::getPost('numCom')), //esse método deve persistir e retornar o ID do do cadastro de endereco..
                                             RequestConfig::getPost('cCategoria'),
                                             RequestConfig::getPost('cDescricao'),
                                             RequestConfig::getPost('cEscolaridade'),
                                             $_POST['cHabilitacao'],//Verificar como receber os valores de checkBox através de um único array.
                                             $this->upLoadImag($route['UPLOAD_CURRICULO_DIR']),//Inserir aqui o nome dado ao arquivo de foto no upload de arquivos.
                                             RequestConfig::getPost('tel-cel'),
                                             RequestConfig::getPost('tel-fixo'),
                                             RequestConfig::getPost('cEmail'),
                                             RequestConfig::getPost('cNacio'),
                                             RequestConfig::getPost('cEstado'),
                                             RequestConfig::getPost('cExp'),
                                             RequestConfig::getPost('cEmp'),
                                             RequestConfig::getPost('cAtiv'),
                                             RequestConfig::getPost('cAdm'),
                                             RequestConfig::getPost('cDem'),
                                             RequestConfig::getPost('cObs'),
                                             RequestConfig::getPost('cFace'),
                                             RequestConfig::getPost('cCur'),
                                             RequestConfig::getPost('cLink')

                                             );


    }

    #método que recebe os argumentos e chama a função responsável por realizar o update do currículo na base de dados.
    public function curUpdate(){
        $objCurriculumDAO = new CurriculumDAO();
        $objClienteDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();

        $objRoute = new RouteConfig();
        $route = $objRoute->rotas();


        $objCurriculumDAO->updateCurriculo($objClienteDAO->returnIdUserSession($aut->pegar_usuario()),//Aqui deverá ser passado o ID do cliente.
                                            RequestConfig::getPost('cNome'),
                                            RequestConfig::getPost('cIdade'),
                                            RequestConfig::getPost('sexo'),
                                            RequestConfig::getPost('cCategoria'),
                                            RequestConfig::getPost('cDescricao'),
                                            RequestConfig::getPost('cEscolaridade'),
                                            $_POST['cHabilitacao'],//Verificar como receber os valores de checkBox através de um único array.
                                            $this->upLoadImag($route['UPLOAD_CURRICULO_DIR']),//Inserir aqui o nome dado ao arquivo de foto no upload de arquivos.
                                            RequestConfig::getPost('tel-cel'),
                                            RequestConfig::getPost('tel-fixo'),
                                            RequestConfig::getPost('cMail'),
                                            RequestConfig::getPost('cNacio'),
                                            RequestConfig::getPost('cEstado'),
                                            RequestConfig::getPost('cExp'),
                                            RequestConfig::getPost('cEmp'),
                                            RequestConfig::getPost('cAtiv'),
                                            RequestConfig::getPost('cAdm'),
                                            RequestConfig::getPost('cDem'),
                                            RequestConfig::getPost('cObs'),
                                            RequestConfig::getPost('cFace'),
                                            RequestConfig::getPost('cCur'),
                                            RequestConfig::getPost('cLink'),
                                            RequestConfig::getPost('cep'),
                                            RequestConfig::getPost('rua'),
                                            RequestConfig::getPost('bairro'),
                                            RequestConfig::getPost('numero'),
                                            RequestConfig::getPost('cComplemento'),
                                            RequestConfig::getPost('cidade'),
                                            RequestConfig::getPost('uf')

                                            );

    }


    #método responsável por gerar o PDF do curriculo
    public function exibePDF(){

        $objGeraPDF = new GeraPDF();
        $objCurriDAO = new CurriculumDAO();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();

        $objGeraPDF->geraPdfCurriculo($objCurriDAO->retornaCurriculo($objCliDAO->returnIdUserSession($aut->pegar_usuario())));
    }

    #método responsável por excluir curriculo do sistema. Nada será excluído, apenas não estará mais visivel nas buscas e nem para o usuário.
    public function excluirCurriculo(){

        $objCurriDAO = new CurriculumDAO();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();

        #recebe como argumento o nome da sessão e o id do usuário logado na sessão.
        $objCurriDAO->setExcluiCurriculo($objCliDAO->returnIdUserSession($aut->pegar_usuario()));

    }

    #método para passar o status do curriculo para ativo ou inativo, de acordo com o argumento recebido.
    public function modificaStatusCurriculo(){

        $objCurriDAO = new CurriculumDAO();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        #recebe como argumento o status e id do usuário para verificação.
        $objCurriDAO->modificaStatus(RequestConfig::getPost('status'),$objCliDAO->returnIdUserSession($aut->pegar_usuario()));

    }


    #chama o método de excluir imagem no banco de dados e deleta a mesma no diretório.
    public function deleteCurImg(){

        $objCurriDAO = new CurriculumDAO();
        $objCliDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        $objRoute = new RouteConfig();

        $route = $objRoute->rotas();

        #após excluir retorna o nome da imagem.
        $file = $objCurriDAO->excluiImg($objCliDAO->returnIdUserSession($aut->pegar_usuario()));

        #Se ecluir a referência no banco com sucesso, deleta o arquivo na pasta curriculo-images
        if(!empty($file)){

            #método responsável por deletar arquivos file.
            unlink($route['UPLOAD_CURRICULO_DIR'] ."/". $file);
        } else {

            print_r($file);

        }

    }


    #retorna dados do currículo via json
    public function retornaDadosCur(){


        $objCurriDAO = new CurriculumDAO();
        $objClienteDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        $retorno = $objCurriDAO->retornaCurriculo($objClienteDAO->returnIdUserSession($aut->pegar_usuario()));
        echo json_encode($retorno);

    }

    #solicita verificação para saber se curriculo existe ou não na base de dados.
    public function curVeri(){

        $objCurriDAO = new CurriculumDAO();

        $objCurriDAO->verificaCadastroCurriculo(RequestConfig::getPost('cli'));

    }

























    /////////////////////////teste/////////////////////////////

    #responsável pelo upload de imagem.
    public function rr($diretorio = "/upload/anuncio-images/ww_66/", $nomeAdicional = "")
    {


  
        $objRoute = new RouteConfig();
        $route = $objRoute->rotas();
        // Associamos a classe à variável $upload
        $upload = new UploadImagem();
        $aut = AutenticadorConfig::instanciar();
        // Determinamos nossa largura máxima permitida para a imagem
        $upload->width = 250;
        // Determinamos nossa altura máxima permitida para a imagem
        $upload->height = 250;

        //echo "Usuário" . $aut->pegar_usuario() ."</br>". "Nome do arquivo " . $_FILES['img']['name'] . "</br>";

        #verifica se foi realizado o upload da foto, caso contrário, não salva a referencia da imagem na base de dados.
        if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){

            #foi passado o array contento a imagem e o usuário logado como argumento,
            $_FILES['img']['name'] = $upload->renameUpLoad($aut->pegar_usuario()) . $nomeAdicional;

            // Exibimos a mensagem com sucesso ou erro retornada pela função salvar.
            // Se for sucesso, a mensagem também é um link para a imagem enviada.

            $upload->salvar($diretorio, $_FILES['img']); //PS ANTES ESTAVA ASSIM 29/12/2015


            return $_FILES['img']['name'];

            //ENCONTRAR UMA FORMA DE MANTER O ARQUIVO QUE ESTAVA CASO A ATUALIZAÇÃO NÃO SUBIR IMAGEM.



        } else {
            // return  "Não entrou no if" . $_FILES['img']['name'];
        }



        //redirecionar para a tela de gerencia de currículo.
        // header('location:'. $this->route['URL_INI'].'?controller=DashboardCurriculo&action=viewDashboardCurriculo'); //O método que vai redirecionar
    }


}#encerra class
