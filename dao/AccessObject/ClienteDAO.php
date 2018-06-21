<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:20
 */

//https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting

include_once 'model/ClienteModel.php';
include_once 'libraries/PHPMailer/class.phpmailer.php';
include_once 'libraries/FunctionsPass.php';
include_once 'libraries/EmailTemplates.php';
include_once 'config/LoadClass.php';
require_once 'config/AutenticadorConfig.php';
require_once 'config/AutenticadorFaceConfig.php';

class ClienteDAO extends ClienteModel
{

    protected $_insert = "INSERT INTO Cliente (cli_nome, cli_email,cli_senha,cli_data_ts,cli_uid, cli_foto) VALUES ('%s','%s','%s','%s','%s','%s');", //Insere os dados necessários para o pré-cadástro.
              $_select = "",
              $_update = "";
    #Essas variáveis foram declaradas pois nelas serão armazenado dados referentes ao envio de email mais abaixo.
    private   $assunto,
              $mensagem,
              $email,
              $nome,
              $newPass,
              $url,
	      $mensagemText,
	      $buttonText;




    # Método responsável por inserir os dados do pré-cadastro na base de dados.
    public function cadastroCliente($nome, $email, $senha,$cadCart = ""){


        #inclusão da classe responsável por verificar ocorrência no banco de dados.
        LoadClass::loadLibraries("VerificaOcorrenciaDB");
        $objOcorrencia = new VerificaOcorrenciaDB();

        #Alimenta informações através dos métodos acessadores herdados de ClienteModel.
        $this->setCliFoto("upload/user-images/user-default.png");
        $this->setCliNome($nome);
        $this->setCliEmail($email);
        $this->setCliSenha(md5($senha)); #Será salvo apenas a criptografia no banco. Depois será comparado criptografia com criptografia.
        #Está sendo gerado um identificador unico prefixado baseado no tempo atual em milionésimos de segundo.
        $this->setCliUid(uniqid(rand(), true));
        #Está sendo passado o horário atual do cadastro.
        $this->setCliDataTs(time());

        #retorna a string contendo a consulta completa.
        $sql = sprintf($this->_insert, $this->getCliNome(), $this->getCliEmail(), $this->getCliSenha(),$this->getCliDataTs(),$this->getCliUid(), $this->getCliFoto());

     
#caso o cadastro for oriundo do carrinho de compras.
if($cadCart == "on"){

 require_once 'config/AutenticadorConfig.php';

//////////////////////////
    #verifica se o email já existe na base de dados, de acordo com a resposta executa ou não o cadastro.
        if ($objOcorrencia->verificaOcorrenciaSimples("Cliente", "cli_email", $this->getCliEmail(),"cli_excluido")) {


        #caso a consulta seja realizada com sucesso, será executado a instrução responsável por enviar o email de validação.
        if ($this->runQuery($sql)) {

            //Retorna o registro do email e dataTs passado como argumento. (Verificar a questão da execução simuntânea e tentar meter um where dataTs nessa merda..)
            $sql = "SELECT * FROM Cliente WHERE cli_email = '{$this->getCliEmail()}' AND cli_data_ts = " . $this->getCliDataTs();



            $row = $this->runSelect($sql);
            #seta o id do ultimo registro que entrou no sistema.
            $this->setCliId($row[0]['cli_id']);
	    $objEmailTemplate = new EmailTemplates();
		
   	      


            #Alimentando variáveis para o envio de email.
            $this->assunto = "Validação de Conta SempreNegócio.";
            $this->url = $this->geraUrlValidacao($this->getCliId(), $this->getCliEmail(), $this->getCliUid(), $this->getCliDataTs());
            $this->mensagemText = "Olá ".$this->getCliNome()." seja bem-vindo! Entre em contato, ficaremos felizes em ajudá-lo.";
            $this->buttonText = "Clique aqui para validar sua conta";
	    $this->mensagem = $objEmailTemplate->returnTemplateOne($this->assunto,$this->mensagemText,$this->buttonText,$this->url);
        
            $this->email = $this->getCliEmail();
            $this->nome = $this->getCliNome();
            //$this->hostEmail =  "smtp.gmail.com";

            #Trecho responsável pelo envio da mensagem de validação no email do usuário.
            LoadClass::loadLibraries("EnvioEmail");
            $objEnvioEmail = new EnvioEmail();


            #faz verificação se o email foi enviado com sucesso
           if ($objEnvioEmail->EnvioSMTP($this->assunto, $this->mensagem, $this->email, $this->nome)){
               echo "ok";
            } else {
               
            }
            

        } else {

          
        }
    } else {

               echo "<p>Email já se encontra cadastrado no sistema,</p>
                  <button type='button' class='butR'>Deseja recuperar sua senha?</button>".
                "<button type='button' class='fec'></button>";
            
        }

//////////////////////////

  $aut = AutenticadorConfig::instanciar();
  $aut->login($email,md5($senha));
   
    

} else {

       #verifica se o email já existe na base de dados, de acordo com a resposta executa ou não o cadastro.
        if ($objOcorrencia->verificaOcorrenciaSimples("Cliente", "cli_email", $this->getCliEmail(),"cli_excluido")) {


        #caso a consulta seja realizada com sucesso, será executado a instrução responsável por enviar o email de validação.
        if ($this->runQuery($sql)) {

            //Retorna o registro do email e dataTs passado como argumento. (Verificar a questão da execução simuntânea e tentar meter um where dataTs nessa merda..)
            $sql = "SELECT * FROM Cliente WHERE cli_email = '{$this->getCliEmail()}' AND cli_data_ts = " . $this->getCliDataTs();



            $row = $this->runSelect($sql);
            #seta o id do ultimo registro que entrou no sistema.
            $this->setCliId($row[0]['cli_id']);



             $objEmailTemplate = new EmailTemplates();
		
   	      


            #Alimentando variáveis para o envio de email.
            $this->assunto = "Validação de Conta SempreNegócio.";
            $this->url = $this->geraUrlValidacao($this->getCliId(), $this->getCliEmail(), $this->getCliUid(), $this->getCliDataTs());
            $this->mensagemText = "Olá ".$this->getCliNome().", seja bem-vindo! Qualquer dúvida entre em contato, ficaremos felizes em ajudá-lo.";
            $this->buttonText = "Clique aqui para validar sua conta";
	    $this->mensagem = $objEmailTemplate->returnTemplateOne($this->assunto,$this->mensagemText,$this->buttonText,$this->url);
            $this->email = $this->getCliEmail();
            $this->nome = $this->getCliNome();
            //$this->hostEmail =  "smtp.gmail.com";

            #Trecho responsável pelo envio da mensagem de validação no email do usuário.
            LoadClass::loadLibraries("EnvioEmail");
            $objEnvioEmail = new EnvioEmail();


            #faz verificação se o email foi enviado com sucesso
            if ($objEnvioEmail->EnvioSMTP($this->assunto, $this->mensagem, $this->email, $this->nome)){
                echo "<p>Cadastro efetuado com sucesso! Acesse seu email para validar sua conta. =)</p>".
                    "<button type='button' class='fec'></button>";
            } else {
                echo "<p class='textErr'>Não foi possível enviar email de validação, tente mais tarde... =/</p>".
                     "<button type='button' class='fec'></button>";  // . $objMailer->ErrorInfo;
            }
            //echo "Email de validação" . $url; //imprime url a ser enviada por email.

        } else {

            echo "Ops, erro interno. Cadastro não pode ser realizado no momento. =/";
        }
    } else {

            #Caso o email já exista, gerar um link aqui para redirecionar o usuário para o campo de lembrar senha.
            echo "<p>Email já se encontra cadastrado no sistema.</p>";

        }

    
}



}

    #método responsável por retornar o id de acordo com a sessão de usuário logado
    public function returnIdUserSession($session){

        #chmada ao cookie
        $aut = AutenticadorConfig::instanciar();
        //$row = $aut->retornaCookieValues();

        $sql = "SELECT cli_id FROM Cliente WHERE cli_email = '{$session}' AND cli_excluido = 0";//como tem emails iguais, o where retorna o que aparece primeiro, ou seja, o mais antigo.

        #caso nenhuma sessão tenha sido passada, desconsidera a exxecução da função.
        if(!empty($session)){


            #caso ocorra tudo bem retorna o valor da id
            if($row = $this->runSelect($sql)){


                return $row[0]['cli_id'];

            } else {

                //echo "Não foi possivel localizar o ID do usuário logado nesta Sessão =/" . $sql;
                return 0;
            }


        }
        #Caso não for passado uma sessão, verifica se possui email setado no cookie
        else if(!empty($row['login'])){


            $sql = "SELECT cli_id FROM Cliente WHERE cli_email = '{$row['login']}'";

            if($this->runSelect($sql)){

                $row = $this->runSelect($sql);

                return $row[0]['cli_id'];


            } else {

                return 0;//"Id não encontrado!";

            }

        }

    }


    # Envia um email contendo o link para ativação dos registros realizados.
    public function geraUrlValidacao($id, $email, $uid, $data_ts){

        LoadClass::loadConfig('RouteConfig');
        $route = RouteConfig::rotas();

        $variaveis = sprintf('&id=%s&email=%s&uid=%s&key=%s',$id, md5($email), md5($uid), md5($data_ts));
        return $url = sprintf("http://www.semprenegocio.com.br/" .'?controller=CadastroCliente&action=validaCadastro%s', $variaveis);

    }


    #Compara se as variáveis recebidas via url são compatíveis com algum registro existente na base de dados. Os dados do argumentos serão recebidos via $_REQUEST.
    public function verificaUrlValidacao($id, $emailMd5, $uidMd5, $data_tsMd5){

        # buscando os dados para validação no banco
        $sql = "SELECT * FROM Cliente WHERE cli_id ='$id'";
        #chama o método próprio para executar consultas de select. Retorna um array multidimensional contendo os valores da tabela por chave/valor.
        $row = $this->runSelect($sql);

        /**
         * Será comparado os dados retornados do banco com os dados recebidos via request.
         * Os dados passados para url de validação são os dados reais do banco criptografados em MD5, assim sendo, está sendo comparado a criptografia recebida com os dados originais criptografados
         * no momento da comparação, caso as hashs forem iguais, é porque realmente o a requisição partiu do email do usuário em questão.
         */
        if( ($emailMd5    !== md5($row[0]['cli_email']))  &&
            ($uidMd5      !== md5($row[0]['cli_uid']))    &&
            ($data_tsMd5  !== md5($row[0]['cli_data_ts']))){


        } else {

            $this->setCliAtivo(true);
            $sql = "UPDATE Cliente SET cli_ativo = " . $this->getCliAtivo() . " WHERE cli_id = " . $id;

            header('Location: http://www.semprenegocio.com.br/?controller=Dashboard&action=ViewDashboard&menValid=true');

            //echo "Sua validação foi realizada com sucesso.";

            $this->runQuery($sql);

        }

    }

    #DESENVOLVER ESSE MÉTODO EM UMA CLASSE DE INSTÂNCIA ÚNICA ATUALIZANDO APENAS QUANDO SOFRER ATUALIZAÇÕES.
    #retorna nome e hash de senha do usuário
    public function retornaDadosLogin($id){

        $this->setCliId($id);

        $sql = "SELECT * FROM Cliente WHERE cli_id = {$this->getCliId()}";

        if($row = $this->runSelect($sql)){

            #verifica também se o usuário possui foto cadastrada, caso não possuir será adicionado uma foto default. (será adicionado a logo do sempreNegocio )
            if($row[0]['cli_foto'] == ""){

                $row[0]['cli_foto'] = "flor.png";

            }

            #verifica se o cliente possui nome cadastrado, se não possuir será utilizado o email fornecido como nome.(caso não estiver vazio não faz nada)
            if($row[0]['cli_nome'] == ""){

                $row[0]['cli_nome'] = $row[0]['cli_email'];

            }

            return $row;

        } else {
          //  echo $sql;
        }


    }

    #retorna o nome do usuário de acordo com o id.
    public function alterCadUser($id,$nome,$email,$novaSenha,$foto,$cli_complemento,$cli_endereco,$cli_cidade,$cli_estado,$cli_pais,$cli_twitter,$cli_facebook,$cli_descricao,$cli_estado_civil,$cli_sexo,$cli_data_nasc,$cli_sobrenome){

        $this->setCliId($id);
        $this->setCliNome($nome);
        $this->setCliFoto($foto);//referencia da foto
        $this->setCliSenha(md5($novaSenha));# foi usado MD5, PORÉM VAMOS USAR CRIPTOGRAFIA PRÓPRIA, VAI TER QUE MUDAR AQUI TAMBÉM!
        $this->setCliEmail($email);
        $this->setCliComplemento($cli_complemento);
        $this->setCliEndereco($cli_endereco);
        $this->setCliCidade($cli_cidade);
        $this->setCliEstado($cli_estado);
        $this->setCliPais($cli_pais);
        $this->setCliTwitter($cli_twitter);
        $this->setCliFacebook($cli_facebook);
        $this->setCliDescricao($cli_descricao);
        $this->setCliEstadoCivil($cli_estado_civil);
        $this->setCliSexo($cli_sexo);
        $this->setCliDataNasc($cli_data_nasc);
        $this->setCliSobrenome($cli_sobrenome);



        #caso os dois campos forem preenchidos
        if(!empty($novaSenha) && !empty($foto)){
            $sql = "UPDATE Cliente SET cli_nome = '%s', cli_email = '%s', cli_senha = '%s', cli_foto = '%s', cli_complemento = '%s',cli_endereco = '%s',cli_cidade = '%s',cli_estado = '%s',cli_pais = '%s',cli_twitter = '%s',cli_facebook = '%s',cli_descricao = '%s',cli_estado_civil = '%s',cli_sexo = '%s',cli_data_nasc = '%s',cli_sobrenome = '%s'  WHERE cli_id = '%s'";
            $sql = sprintf($sql,$this->getCliNome(),$this->getCliEmail(),$this->getCliSenha(),$this->getCliFoto(), $this->getCliComplemento(), $this->getCliEndereco(), $this->getCliCidade(), $this->getCliEstado(), $this->getCliPais(), $this->getCliTwitter(), $this->getCliFacebook(), $this->getCliDescricao(), $this->getCliEstadoCivil(), $this->getCliSexo(), $this->getCliDataNasc(), $this->getCliSobrenome(),$this->getCliId());

        #caso os dois campos não forem preenchidos
        } else if(empty($novaSenha) && empty($foto)){
            $sql = "UPDATE Cliente SET cli_nome = '%s', cli_email = '%s', cli_complemento = '%s',cli_endereco = '%s',cli_cidade = '%s',cli_estado = '%s',cli_pais = '%s',cli_twitter = '%s',cli_facebook = '%s',cli_descricao = '%s',cli_estado_civil = '%s',cli_sexo = '%s',cli_data_nasc = '%s',cli_sobrenome = '%s' WHERE cli_id = '%s' ";
            $sql = sprintf($sql,$this->getCliNome(),$this->getCliEmail(),$this->getCliComplemento(), $this->getCliEndereco(), $this->getCliCidade(), $this->getCliEstado(), $this->getCliPais(), $this->getCliTwitter(), $this->getCliFacebook(), $this->getCliDescricao(), $this->getCliEstadoCivil(), $this->getCliSexo(), $this->getCliDataNasc(), $this->getCliSobrenome(),$this->getCliId());

        #caso senha preenchida e foto não
        } else if(!empty($novaSenha) && empty($foto)){

            $sql = "UPDATE Cliente SET cli_nome = '%s', cli_email = '%s', cli_senha = '%s', cli_complemento = '%s',cli_endereco = '%s',cli_cidade = '%s',cli_estado = '%s',cli_pais = '%s',cli_twitter = '%s',cli_facebook = '%s',cli_descricao = '%s',cli_estado_civil = '%s',cli_sexo = '%s',cli_data_nasc = '%s',cli_sobrenome = '%s' WHERE cli_id = '%s'";
            $sql = sprintf($sql,$this->getCliNome(),$this->getCliEmail(),$this->getCliSenha(),$this->getCliComplemento(), $this->getCliEndereco(), $this->getCliCidade(), $this->getCliEstado(), $this->getCliPais(), $this->getCliTwitter(), $this->getCliFacebook(), $this->getCliDescricao(), $this->getCliEstadoCivil(), $this->getCliSexo(), $this->getCliDataNasc(), $this->getCliSobrenome(),$this->getCliId());

        } else if(empty($novaSenha) && !empty($foto)){
            $sql = "UPDATE Cliente SET cli_nome = '%s', cli_email = '%s',cli_foto = '%s', cli_complemento = '%s',cli_endereco = '%s',cli_cidade = '%s',cli_estado = '%s',cli_pais = '%s',cli_twitter = '%s',cli_facebook = '%s',cli_descricao = '%s',cli_estado_civil = '%s',cli_sexo = '%s',cli_data_nasc = '%s',cli_sobrenome = '%s' WHERE cli_id = '%s'";
            $sql = sprintf($sql,$this->getCliNome(),$this->getCliEmail(),$this->getCliFoto(),$this->getCliComplemento(), $this->getCliEndereco(), $this->getCliCidade(), $this->getCliEstado(), $this->getCliPais(), $this->getCliTwitter(), $this->getCliFacebook(), $this->getCliDescricao(), $this->getCliEstadoCivil(), $this->getCliSexo(), $this->getCliDataNasc(), $this->getCliSobrenome(),$this->getCliId());
        }

        if($this->runQuery($sql)){

            $route = RouteConfig::rotas();
            $aut = AutenticadorConfig::instanciar();
           // echo "Alteração realizada com sucesso!" . $sql;

            #caso der certo, devemos destruir a sessão com os dados anteriores
            $aut->reiniciaLogin($this->getCliEmail());

            header("location: ".$route['URL_INI']."?controller=Dashboard&action=ViewDashboard");

        } else {

            echo "Senha informada não corresponde com a atual." . $sql;

        }

    }

    #deleta a conta do usuário
    public function userDel($id,$senha,$motivo,$descricao){

        include_once "dao/AccessObject/CliExcluDAO.php";


        $objCliExlu = new CliExcluDAO();

        $sql = "UPDATE Cliente SET cli_excluido = 1 WHERE cli_id = %s AND cli_senha = '%s'";
        $select = "SELECT cli_senha, cli_userface FROM Cliente WHERE cli_id = '%s'";


        $select = sprintf($select,$id);
        $row = $this->runSelect($select);

        #Verifica se a senha infromada confere com a senha de usuário, caso ok executa o update, caso negativo retorna mensagem avisando do erro.
        if($row[0]['cli_senha'] == md5($senha)){

            $sql = sprintf($sql,$id,md5($senha));

              if($this->runQuery($sql)){

                $aut = AutenticadorConfig::instanciar();
                #seta na base de dados o histórico do cliente excluido
                $objCliExlu->setExcluUser($id,$motivo,$descricao);

                //echo "Sua conta foi deletada com sucesso. Esperamos telo de volta. =)";

                #desloga usuário e destroi sua session
                $aut->sair();

          }

            } else if($row[0]['cli_userface'] == '1'){

             $sql = "UPDATE Cliente SET cli_excluido = 1 WHERE cli_id = %s";

            $sql = sprintf($sql,$id);

            if($this->runQuery($sql)){

                $autFace = new AutenticadorFaceConfig();
                #seta na base de dados o histórico do cliente excluido
                $objCliExlu->setExcluUser($id,$motivo,$descricao);

                //echo "Sua conta foi deletada com sucesso. Esperamos telo de volta. =)";

                #desloga usuário e destroi sua session
                $autFace->faceLogout();
        
        }else {

                echo "Desculpe o transtorno, não foi possível realizar exclusão do usuário. Tente mais tarde.";
            }

        } else{

            echo "Senha informada não confere com sua senha atual. " . $select . "senha retornada: " . $row[0]['cli_senha'] . "Senha informada pelo uauário: " . md5($senha);
        }
    }

    #verifica se a senha e id se encontram no banco e são compatíveis
    public function checkPass($idCli, $senha){

        $this->setCliSenha($senha);
        $this->setCliId($idCli);

        $sql = "SELECT cli_id FROM Cliente WHERE cli_id = %s AND cli_senha = '%s'";

        $sql = sprintf($sql,  $this->getCliId(), md5($this->getCliSenha()));
        $row = $this->runSelect($sql);
        #verifica se retornou informação
        if(count($row) == 0){
            echo "<p>Ops, senha incorreta, verifique e tente novamente.</p>" ."Id".$idCli. "Senha" . md5($this->getCliSenha());
        } else {

        }


    }


    #subistitui a senha atual do usuário pela senha "provisória" enviada na recuperação da senha.
    public function subPassForNew($email, $senha){

        $sql = "UPDATE Cliente SET cli_senha = '%s' WHERE cli_email = '%s';";

        $sql = sprintf($sql, md5($senha), $email);

        if($this->runQuery($sql)){

          return true;

        }else {

          return false;

        }
    }


    #Envia email para restaurar a senha.
    public function emailPassRecover($email)
    {

        #instancia classe para gerar nova senha
        $objFuncPass = new FunctionPass();
        $this->newPass = $objFuncPass->passGeneretor();
        #referente ao envio de email auenticado.
        LoadClass::loadLibraries("EnvioEmail");
        $objEnvioEmail = new EnvioEmail();

        $this->setCliEmail($email);
        $sql = "SELECT cli_nome FROM Cliente WHERE cli_email = '{$this->getCliEmail()}'";

        if($row = $this->runSelect($sql)){

            $this->setCliNome($row[0]['cli_nome']);

            $this->assunto = "Recuperação de senha Sempre Negócio";

            $this->email = $email;


            $this->mensagem = "   <html>
                                    <body>
                                        <table cellpadding='10' style='background-color: rgb(250,250,250); border: 1px solid #4E69B2; font-family: arial, helvetica, sans-serif; padding: 20px; width: 100%;'>
                                           <tr>
                                             <td>
                                               <h1> <strong style='color:  #333333; font-size: 25px;'>Olá " . $this->getCliNome() . ", segue abaixo sua nova senha de acesso. Recomendandos a troca desta no campo \"Editar minha conta\", localizada no
                                                    painel gerenciável.</strong></h1>
                                                   <p style='color:  #333333; font-size: 20px;'>Email: " . $this->getCliEmail() . " </p>
                                                   <p style='color:  #333333; font-size: 20px;'>Nova senha: " . $this->newPass . "</p>
                                                   <p style='color:  #333333; font-size: 20px;'><a href='http://www.semprenegocio.com.br/?controller=Dashboard&action=ViewLogin'>Acesse sua conta</a></p>
                                                   <p></br><strong style='color:  #333333; font-size: 20px;'>Agradecemos a utilização. Equipe SempreNegocio.</strong></p>
                                               <center><a href='www.semprenegocio.com.br'><img alt='SempreNegocio' height='50' width='50' src='http://www.semprenegocio.com.br/view/assets/imagens/logo@1x.png'></a></center>
                                             </td>
                                            </tr>
                                         </table>
                                     </body>
                                     </html>";

            #caso ocorrer tudo bem o alter no banco, envia email.
            if($this->subPassForNew($email,$this->newPass)){

                #faz verificação se o email foi enviado com sucesso
                if ($objEnvioEmail->EnvioSMTP($this->assunto, $this->mensagem, $this->email)) {
                    echo "<p>Foi enviado um email contendo os dados de recuperação da sua conta.</p>" .
                        "<button type='button' class='fec'></button>";
                } else {
                    echo "<p class='textErr'>Não foi possível processar recuperação da conta, verifique seu email ou entre em contato com o suporte.</p>" .
                        "<button type='button' class='fec'></button>";


                }
                #fim if insert
            } else {
                echo "Não foi possível persistir alteração da senha na base de dados.";
            }


        } else {

            echo "Email não se encontra cadastrado na base de dados, verifique o email.";
        }


    }

    #envia resposta que o anunciante dá para o cliente que lhe enviou email.
    #o título do anuncio será o nome informado na resposta que será enviada ao cliente.
    public function respostCli($titulo,$assunto, $mensagem, $emailDesti){

        LoadClass::loadLibraries("EnvioEmail");
        $objEnvioEmail = new EnvioEmail();

        #faz verificação se o email foi enviado com sucesso
        if ($objEnvioEmail->EnvioSMTP($assunto, $mensagem, $emailDesti, $titulo)){
            echo "<p>Sua resposta foi enviada com sucesso!</p>".
                "<button type='button' class='fec'></button>";
        } else {
            echo "<p class='textErr'>Desculpe, não foi possível enviar resposta, favor tente mais tarde.</p>".
                 "<button type='button' class='fec'></button>";  // . $objMailer->ErrorInfo;
        }

    }

    #verifica se existe algum usuário com o id do face especificado na base de dados.
    public function userFaceExists($idUser){

        $sql = "SELECT cli_senha FROM Cliente WHERE cli_senha = {$idUser} AND cli_excluido = 0";

        $row = $this->runSelect($sql);

        #Se não tiver o id, persiste o novo usuário na base de dados
        if(count($row) == 0){

            #chamar método que persiste novo usuário na base de dados
            $this->userFacePersist();

        }


    }

    public function userFacePersist(){

        $objFace = new AutenticadorFaceConfig();

        #recebe dados do face
       $dadosUser =  $objFace->faceUserData();

        $this->setCliDataTs(time());
        $this->setCliUid(uniqid(rand(), true));

        $sql = "INSERT INTO Cliente (cli_nome,cli_sobrenome,cli_email,cli_senha,cli_data_ts,cli_uid,cli_userface,cli_ativo,cli_foto) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')";

        $sql = sprintf($sql,$dadosUser['first_name'],$dadosUser['last_name'],$dadosUser['email'],$dadosUser['id'],$this->getCliDataTs(),$this->getCliUid(),1,1,"https://graph.facebook.com/".$dadosUser['id']."/picture");

        if($this->runQuery($sql)){

        } else {
            echo "Deu merda!";
        }



    }

    #retorna id do usuário cadastrado com o facebook
    public function returnIdUserFace($userId){

        $sql = "SELECT cli_id FROM Cliente WHERE cli_senha = '{$userId}'";

        if($row = $this->runSelect($sql)){
            return $row[0]['cli_id'];
        } else {
            echo "erro ao retornar id do usuário com facebook";
        }

    }



   /*
    #retorna o hash da senha do usuário passado como argumento.
    public function returnHashPass($user, $pass){

        $this->setCliUser($user);
        $this->setCliPass($pass);
        $row = array();


            #faz uma consulta e retorna o registro cujo id e senha for encontrado no banco de dados.
            $this->sql = "SELECT cli_email, cli_senha FROM Cliente WHERE cli_email = '%s' AND cli_senha = '%s'";

            $this->sql = sprintf($this->sql,$this->getCliUser(),$this->getCliPass());

            $row = $this->runSelect($this->sql, $this->getCliUser(), $this->getCliPass());


                #caso der tudo certo retorna o hash da senha para ser armazenada no cookie.
                if($row['cli_email'] == $this->getCliUser() && $row['cli_senha'] == $this->getCliPass()) {

                    return $row['cli_senha'];

            } else {

                    return false;
                }

        }
   */

}#encerra class cliente
