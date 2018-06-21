<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:22
 */

include_once 'model/CurriculumModel.php';
include_once 'config/RouteConfig.php';
include_once 'libraries/SNValidacao.php';
include_once 'libraries/UploadImagem.php';

class CurriculumDAO extends CurriculumModel{

    protected $_insert = "INSERT INTO Curriculum (curriculum_cliente_ref,
                                                  curriculum_nome,
                                                  curriculum_sexo,
                                                  curriculum_idade,
                                                  curriculum_endereco_ref,
                                                  curriculum_area_atuacao,
                                                  curriculum_descricao,
                                                  curriculum_escolaridade,
                                                  curriculum_habilitacao,
                                                  curriculum_foto,
                                                  curriculum_tel_cel,
                                                  curriculum_tel_fixo,
                                                  curriculum_email,
                                                  curriculum_nacionalidade,
                                                  curriculum_estado_civil,
                                                  curriculum_cargo,
                                                  curriculum_nome_empresa,
                                                  curriculum_atividades_realizadas,
                                                  curriculum_data_admissao,
                                                  curriculum_data_demissao,
                                                  curriculum_observacoes,
                                                  curriculum_facebook,
                                                  curriculum_lattes,
                                                  curriculum_linkedin

                                                  )
                           VALUES  ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
        $_select = "",
        $_update = "";

    private $route,
            $objEndDAO,
            $objDataConvert,
            $maior,
            $menor;


    #Método responsável por armazenar no banco de dados as informações submetidas do formulário de cadastro de currículo
    public function CurriculumPersist($clienteRef,$nome, $sexo, $idade, $enderecoRef, $areaAtuacao, $descricao, $escolaridade, $habilitacao, $foto, $telCel, $telFixo, $email,$nacionalidade,$estadoCivil,$cargo,$nomeEmpresa,$atividadesRealizadas,$admissao,$demissao,$observacoes,$facebook,$lattes,$linkedin){


            #método para converter data de acordo com a necessidade.
            $this->objDataConvert = new SNValidacao();

            $this->setCurriculumClienteRef($clienteRef);
            $this->setCurriculumNome($nome);
            $this->setCurriculumSexo($sexo);
            $this->setCurriculumIdade($idade);
            $this->setCurriculumEnderecoRef($enderecoRef);//Teremos que antes cadastrar um email.
            $this->setCurriculumAreaAtuacao($areaAtuacao);
            $this->setCurriculumDescricao($descricao);
            $this->setCurriculumEscolaridade($escolaridade);
            $this->setCurriculumHabilitacao($this->concatHabilitacao($habilitacao));
            $this->setCurriculumFoto($foto);
            $this->setCurriculumTelCel($telCel);
            $this->setCurriculumTelFixo($telFixo);
            $this->setCurriculumEmail($email);
            $this->setCurriculumNacionalidade($nacionalidade);
            $this->setCurriculumEstadoCivil($estadoCivil);
            $this->setCurriculumCargo($cargo);
            $this->setCurriculumNomeEmpresa($nomeEmpresa);
            $this->setCurriculumAtividadesRealizadas($atividadesRealizadas);
            $this->setCurriculumDataAdmissao($this->objDataConvert->dateConvert($admissao));
            $this->setCurriculumDataDemissao($this->objDataConvert->dateConvert($demissao));
            $this->setCurriculumObservacoes($observacoes);
            $this->setCurriculumFacebook($facebook);
            $this->setCurriculumLattes($lattes);
            $this->setCurriculumLinkedin($linkedin);

            $sql = sprintf($this->_insert, $this->getCurriculumClienteRef(),
                                           $this->getCurriculumNome(),
                                           $this->getCurriculumSexo(),
                                           $this->getCurriculumIdade(),
                                           $this->getCurriculumEnderecoRef(),
                                           $this->getCurriculumAreaAtuacao(),
                                           $this->getCurriculumDescricao(),
                                           $this->getCurriculumEscolaridade(),
                                           $this->getCurriculumHabilitacao(),
                                           $this->getCurriculumFoto(),
                                           $this->getCurriculumTelCel(),
                                           $this->getCurriculumTelFixo(),
                                           $this->getCurriculumEmail(),
                                           $this->getCurriculumNacionalidade(),
                                           $this->getCurriculumEstadoCivil(),
                                           $this->getCurriculumCargo(),
                                           $this->getCurriculumNomeEmpresa(),
                                           $this->getCurriculumAtividadesRealizadas(),
                                           $this->getCurriculumDataAdmissao(),
                                           $this->getCurriculumDataDemissao(),
                                           $this->getCurriculumObservacoes(),
                                           $this->getCurriculumFacebook(),
                                           $this->getCurriculumLattes(),
                                           $this->getCurriculumLinkedin()
                );



        #caso a inserção for realizada com sucesso, o usuário será redirecionado para o painel de gerência do currículo.
        if($this->runQuery($sql)){

            $this->route = RouteConfig::rotas();

            header('location:'.$this->route['URL_INI'].'?controller=Dashboard&action=ViewDashboard');

        } else {

            echo "Não foi possível cadastrar o currículo, já estamos resolvendo este problema. =/..";
        }


    }

    #concatena os inputs checkBox selecionados na habilitação
    public function concatHabilitacao($arrayCheckBox){

        #verifica se foi selecionado algum checkBox no input
        if(!empty($arrayCheckBox)) {

            #retorna o maior valor do vetor, nesse caso a maior letra.
            $this->maior = max($arrayCheckBox);
            $this->menor = min($arrayCheckBox);


            #caso a primeira posição for A, contatena.
            if($this->menor == "A"){
                return "A".$this->maior;
            } else {
                #caso contrário retorna apenas o valor da carteira.
                return $this->maior;
            }

        }



    }


    #método responsável por verificar se existe um curriculo cadastrado que faz referencia ao usuário logado no momento.
    public function verificaCadastroCurriculo($idClienteLogado){

        #Seleciona o curriculo do cliente que não tenha sido setado como excluido.
        $sql = "SELECT curriculum_cliente_ref FROM Curriculum WHERE curriculum_cliente_ref = ". $idClienteLogado. " AND curriculum_excluido = 0";

        $row = $this->runSelect($sql);

        #caso o array associativo possua uma posição, quer dizer que o cliente já possui email cadastrado
        if(!empty($row[0]['curriculum_cliente_ref'])){

            $status = 1;

        } else {

            $status = 0;
        }

        echo $status;

    }

    #método que realiza innerJoin entre curriculum e endereco e retorna o array associativo gerado. Sendo este passado como argumento para o gerador de PDF.
    public function retornaCurriculo($idUsuario){

        $sql = "SELECT * FROM Curriculum
                INNER JOIN Endereco ON Curriculum.curriculum_endereco_ref = Endereco.endereco_id
                INNER JOIN Cliente  ON Curriculum.curriculum_cliente_ref  = Cliente.cli_id
                WHERE Cliente.cli_id = {$idUsuario} AND Curriculum.Curriculum_excluido = 0";

        $row = $this->runSelect($sql);

        if(!empty($row[0]['cli_id'])) {

            #método para converter data de acordo com a necessidade.
            $this->objDataConvert = new SNValidacao();
            #converte as datas contidas para o formato pt-br
            $row[0]['curriculum_data_admissao'] = $this->objDataConvert->dateConvert($row[0]['curriculum_data_admissao']);
            $row[0]['curriculum_data_demissao'] = $this->objDataConvert->dateConvert($row[0]['curriculum_data_demissao']);

           return  $row;

        } else {

           // echo "Não foi encontrado curriculo cadastrado para o usuário logado";
        }


    }

    #VERIFICAR ONDE ESTÀ SENDO UTILIZADO
    #retorna json da tabela de currículo
    public function retornaRegCur($idUser){

        $sql = "SELECT * FROM Curriculum
                INNER JOIN Cliente  ON Curriculum.curriculum_cliente_ref  = Cliente.cli_id
                WHERE Cliente.cli_id = {$idUser} AND Curriculum.Curriculum_excluido = 0";

        echo json_encode($row = $this->runSelect($sql));

    }


    #responsável por atualizar curriculo do usuário
    public function updateCurriculo($idUsuario,$nome,$idade,$sexo,$atuacao,$descricao,$escolaridade,$habilitacao,$foto,$cel,$fixo,$email,$nacionalidade,$estadoCivil,$cargo,$nomeEmpresa,$atividades,$admissao,$demissao,$observacoes,$facebook,$lattes,$linkedin,$cep,$rua,$bairro,$numero,$complemento,$cidade,$estado){

        #método para converter data de acordo com a necessidade.
        $this->objDataConvert = new SNValidacao();
        #para a chamada dos métodos acessadores de endereco
        $objEndDAO = new EnderecoDAO();

        $this->setCurriculumClienteRef($idUsuario);
        $this->setCurriculumNome($nome);
        $this->setCurriculumSexo($sexo);
        $this->setCurriculumIdade($idade);
        $this->setCurriculumAreaAtuacao($atuacao);
        $this->setCurriculumDescricao($descricao);
        $this->setCurriculumEscolaridade($escolaridade);
        $this->setCurriculumHabilitacao($this->concatHabilitacao($habilitacao));
        $this->setCurriculumFoto($foto);
        $this->setCurriculumTelCel($cel);
        $this->setCurriculumTelFixo($fixo);
        $this->setCurriculumEmail($email);
        $this->setCurriculumNacionalidade($nacionalidade);
        $this->setCurriculumEstadoCivil($estadoCivil);
        $this->setCurriculumCargo($cargo);
        $this->setCurriculumNomeEmpresa($nomeEmpresa);
        $this->setCurriculumAtividadesRealizadas($atividades);
        $this->setCurriculumDataAdmissao($this->objDataConvert->dateConvert($admissao));
        $this->setCurriculumDataDemissao($this->objDataConvert->dateConvert($demissao));
        $this->setCurriculumObservacoes($observacoes);
        $this->setCurriculumFacebook($facebook);
        $this->setCurriculumLattes($lattes);
        $this->setCurriculumLinkedin($linkedin);
        $objEndDAO->setEnderecoCep($cep);
        $objEndDAO->setEnderecoRua($rua);
        $objEndDAO->setEnderecoBairro($bairro);
        $objEndDAO->setEnderecoNumero($numero);
        $objEndDAO->setEnderecoComplemento($complemento);
        $objEndDAO->setEnderecoCidade($cidade);
        $objEndDAO->setEnderecoEstado($estado);

        #com upload de foto (nome de referência)
        if(!empty($foto)) {
            #consulta para realizar UPDATE com INNER JOIN para atualizar os dados de cadastro do curriculum do usuário.
            $sql = "UPDATE Curriculum INNER JOIN Endereco ON Curriculum.curriculum_endereco_ref = Endereco.endereco_id
                INNER JOIN Cliente  ON Curriculum.curriculum_cliente_ref  = Cliente.cli_id

                SET

                        Curriculum.curriculum_nome = '%s',
                        Curriculum.curriculum_sexo = '%s',
                        Curriculum.curriculum_idade = %s,
                        Curriculum.curriculum_area_atuacao = '%s',
                        Curriculum.curriculum_descricao = '%s',
                        Curriculum.curriculum_escolaridade = '%s',
                        Curriculum.curriculum_habilitacao = '%s',
                        Curriculum.curriculum_foto = '%s',
                        Curriculum.curriculum_tel_cel = '%s',
                        Curriculum.curriculum_tel_fixo = '%s',
                        Curriculum.curriculum_email = '%s',
                        Curriculum.curriculum_nacionalidade = '%s',
                        Curriculum.curriculum_estado_civil = '%s',
                        Curriculum.curriculum_cargo = '%s',
                        Curriculum.curriculum_nome_empresa = '%s',
                        Curriculum.curriculum_atividades_realizadas = '%s',
                        Curriculum.curriculum_data_admissao = '%s',
                        Curriculum.curriculum_data_demissao = '%s',
                        Curriculum.curriculum_observacoes = '%s',
                        Curriculum.curriculum_facebook = '%s',
                        Curriculum.curriculum_lattes = '%s',
                        Curriculum.curriculum_linkedin = '%s',
                        Endereco.endereco_cep = '%s',
                        Endereco.endereco_rua = '%s',
                        Endereco.endereco_bairro = '%s',
                        Endereco.endereco_numero = %s,
                        Endereco.endereco_complemento = '%s',
                        Endereco.endereco_cidade = '%s',
                        Endereco.endereco_estado = '%s'

                WHERE Cliente.cli_id = '%s' AND Curriculum.Curriculum_excluido = 0;";


            $sql = sprintf($sql, $this->getCurriculumNome(),
                $this->getCurriculumSexo(),
                $this->getCurriculumIdade(),
                $this->getCurriculumAreaAtuacao(),
                $this->getCurriculumDescricao(),
                $this->getCurriculumEscolaridade(),
                $this->getCurriculumHabilitacao(),
                $this->getCurriculumFoto(),
                $this->getCurriculumTelCel(),
                $this->getCurriculumTelFixo(),
                $this->getCurriculumEmail(),
                $this->getCurriculumNacionalidade(),
                $this->getCurriculumEstadoCivil(),
                $this->getCurriculumCargo(),
                $this->getCurriculumNomeEmpresa(),
                $this->getCurriculumAtividadesRealizadas(),
                $this->getCurriculumDataAdmissao(),
                $this->getCurriculumDataDemissao(),
                $this->getCurriculumObservacoes(),
                $this->getCurriculumFacebook(),
                $this->getCurriculumLattes(),
                $this->getCurriculumLinkedin(),
                $objEndDAO->getEnderecoCep(),
                $objEndDAO->getEnderecoRua(),
                $objEndDAO->getEnderecoBairro(),
                $objEndDAO->getEnderecoNumero(),
                $objEndDAO->getEnderecoComplemento(),
                $objEndDAO->getEnderecoCidade(),
                $objEndDAO->getEnderecoEstado(),
                $this->getCurriculumClienteRef()
            );

        #sem upload de foto
        }else{
            $sql = "UPDATE Curriculum INNER JOIN Endereco ON Curriculum.curriculum_endereco_ref = Endereco.endereco_id
                INNER JOIN Cliente  ON Curriculum.curriculum_cliente_ref  = Cliente.cli_id

                SET

                        Curriculum.curriculum_nome = '%s',
                        Curriculum.curriculum_sexo = '%s',
                        Curriculum.curriculum_idade = %s,
                        Curriculum.curriculum_area_atuacao = '%s',
                        Curriculum.curriculum_descricao = '%s',
                        Curriculum.curriculum_escolaridade = '%s',
                        Curriculum.curriculum_habilitacao = '%s',
                        Curriculum.curriculum_tel_cel = '%s',
                        Curriculum.curriculum_tel_fixo = '%s',
                        Curriculum.curriculum_email = '%s',
                        Curriculum.curriculum_nacionalidade = '%s',
                        Curriculum.curriculum_estado_civil = '%s',
                        Curriculum.curriculum_cargo = '%s',
                        Curriculum.curriculum_nome_empresa = '%s',
                        Curriculum.curriculum_atividades_realizadas = '%s',
                        Curriculum.curriculum_data_admissao = '%s',
                        Curriculum.curriculum_data_demissao = '%s',
                        Curriculum.curriculum_observacoes = '%s',
                        Curriculum.curriculum_facebook = '%s',
                        Curriculum.curriculum_lattes = '%s',
                        Curriculum.curriculum_linkedin = '%s',
                        Endereco.endereco_cep = '%s',
                        Endereco.endereco_rua = '%s',
                        Endereco.endereco_bairro = '%s',
                        Endereco.endereco_numero = %s,
                        Endereco.endereco_complemento = '%s',
                        Endereco.endereco_cidade = '%s',
                        Endereco.endereco_estado = '%s'

                WHERE Cliente.cli_id = '%s' AND Curriculum.Curriculum_excluido = 0;";


            $sql = sprintf($sql, $this->getCurriculumNome(),
                $this->getCurriculumSexo(),
                $this->getCurriculumIdade(),
                $this->getCurriculumAreaAtuacao(),
                $this->getCurriculumDescricao(),
                $this->getCurriculumEscolaridade(),
                $this->getCurriculumHabilitacao(),
                $this->getCurriculumTelCel(),
                $this->getCurriculumTelFixo(),
                $this->getCurriculumEmail(),
                $this->getCurriculumNacionalidade(),
                $this->getCurriculumEstadoCivil(),
                $this->getCurriculumCargo(),
                $this->getCurriculumNomeEmpresa(),
                $this->getCurriculumAtividadesRealizadas(),
                $this->getCurriculumDataAdmissao(),
                $this->getCurriculumDataDemissao(),
                $this->getCurriculumObservacoes(),
                $this->getCurriculumFacebook(),
                $this->getCurriculumLattes(),
                $this->getCurriculumLinkedin(),
                $objEndDAO->getEnderecoCep(),
                $objEndDAO->getEnderecoRua(),
                $objEndDAO->getEnderecoBairro(),
                $objEndDAO->getEnderecoNumero(),
                $objEndDAO->getEnderecoComplemento(),
                $objEndDAO->getEnderecoCidade(),
                $objEndDAO->getEnderecoEstado(),
                $this->getCurriculumClienteRef()
            );
        }


        if($this->runQuery($sql)){

            $this->route = RouteConfig::rotas();
            header('location:'.$this->route['URL_INI'].'?controller=Dashboard&action=ViewDashboard');

        } else {
            echo $sql;
        }
    }



    #metódo responsável por setar o curriculo como ativo ou inativo.
    public function modificaStatus($status, $idUsuario){

        #altera o status do usuário logado de acordo com o que foi passado como argumento.
        $sql = "UPDATE Curriculum SET curriculum_status = {$status} WHERE curriculum_cliente_ref = {$idUsuario}";

        if($this->runQuery($sql)){
            echo "Alterado";
        }

    }


    #método para setar o curriculo como excluído na base de dados. Será alterado o valor do campo, e não utilizado delete.
    public function setExcluiCurriculo($idUsuario){

        #altera o status para 1, que torna a exclusão verdadeira.
        $sql = "UPDATE Curriculum SET curriculum_excluido = 1 WHERE curriculum_cliente_ref = {$idUsuario}";

        if($this->runQuery($sql)){

            $this->route = RouteConfig::rotas();

            echo "Curriculum excluido com sucesso!";
            #direciona usuário para o painel de controle principal.
            //header('location:'.$this->route['URL_INI'].'?controller=Dashboard&action=ViewDashboard');

        } else {

            echo "Não foi possível realizar a exclusão do curículo =/...";
            //header('location:'.$this->route['URL_INI'].'?controller=Dashboard&action=ViewLogin');

        }

    }

    #responsável por verificar se o curriculo se encontra ativado ou não, retornando true para ativado e false para caso não estiver ativado.
    public function verificaStatusCurriculo($idUsuario){

        $sql = "SELECT curriculum_status FROM Curriculum WHERE curriculum_cliente_ref = {$idUsuario}";

        $row = $this->runSelect($sql);

        #verifica o status, caso um é porque está ativado, caso 0 é porque está desativado.
        if(isset($row) && !empty($row) && $row[0]['curriculum_status'] == 1){
            echo 1;
        } else {
            echo 0;
        }

    }

    //método responsável por deletar a imagem do currículo no painel de editar currículo
    public function excluiImg($idUsuario){



        $select = "SELECT curriculum_foto FROM Curriculum WHERE curriculum_cliente_ref = {$idUsuario} AND curriculum_excluido = 0";
        $update = "UPDATE Curriculum SET curriculum_foto = null WHERE curriculum_cliente_ref = {$idUsuario} AND curriculum_excluido = 0";

        #caso retornar alguma informação realiza a exclusão de dados.
        if($row = $this->runSelect($select)){

            #seta a referência da imagem como nula no banco de dados.
            $this->runQuery($update);

            return $row[0]['curriculum_foto'];

        } else {
            return "Não foi possível excluir foto, tente mais tarde.";
        }
    }



}