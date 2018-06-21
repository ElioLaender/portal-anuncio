<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 24/09/15
 * Time: 17:13
 */

include_once'libraries/PHPMailer/class.phpmailer.php';
include_once'libraries/PHPMailer/class.smtp.php';

class EnvioEmail {

 private $assunto,
         $mensagem,
         $email,
         $nome,
         $hostEmail,
         $headers,
         $envio,
         $sucess;

    /**
     * @return mixed
     */
    public function getSucess()
    {
        return $this->sucess;
    }

    /**
     * @param mixed $sucess
     */
    public function setSucess($sucess)
    {
        $this->sucess = $sucess;
    }

    /**
     * @return mixed
     */
    public function getAssunto()
    {
        return $this->assunto;
    }

    /**
     * @param mixed $assunto
     */
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    /**
     * @return mixed
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * @param mixed $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getHostEmail()
    {
        return $this->hostEmail;
    }

    /**
     * @param mixed $hostEmail
     */
    public function setHostEmail($hostEmail)
    {
        $this->hostEmail = $hostEmail;
    }



    public function  EnvioSMTP($assunto, $mensagem, $email, $nome = 'Cliente', $hostEmail = ''){

        $this->setAssunto($assunto);
        $this->setMensagem($mensagem);
        $this->setEmail($email);
        $this->setNome($nome);
        //$this->setHostEmail($hostEmail);


        $objMailer = new PHPMailer();
        #define endereço do destinatário.
        $objMailer->AddAddress($email, $nome);
        #seta conexão como SMTP
        $objMailer->IsSMTP();
        #seta endereço do servidor de envio.
        $objMailer->Host = "smtp.gmail.com";
        #Ativando conexão SMTP
        $objMailer->SMTPAuth = true;
        #setanto o protocolo de conexão
        $objMailer->SMTPSecure = "ssl";
        #setando a porta de conexão (Verificar se a locaweb utiliza esta porta.)
        $objMailer->Port = 465; //necessário alterar a porta smtp do php.ini também para 465(google)
        #setando email de autenticação
        $objMailer->Username = "laenderquadros@gmail.com";
        #password
        $objMailer->Password = "livia2008";//Colocar senha do meu email.
        #Configuração de dados do remetente.
        $objMailer->From = 'laenderquadros@gmail.com';
        #Nome
        $objMailer->FromName = "Sempre Negócio";
        #configura a mensagem como html
        $objMailer->IsHTML(true);
        #solucionar possíveis problemas de acentuação
        $objMailer->CharSet = 'UTF-8';

        #Configuração de texto e mensagem
        #assunto
        $objMailer->Subject  = $this->getAssunto();
        #mensagem
        $objMailer->Body = $this->getMensagem();
        #mensagem como texto puro
        $objMailer->AltBody = trim(strip_tags($this->getMensagem()));
        #recebe a resposta se o email foi enviado com sucesso na forma de true/false
        $this->setSucess($objMailer->Send());
        #zera as variáveis
        $objMailer->ClearAllRecipients();
        $objMailer->ClearAttachments();


        #faz verificação se o email foi enviado com sucesso
        if ($this->getSucess()){
           return true;
        } else {
           return false;
        }
        //echo "Email de validação" . $url; //imprime url a ser enviada por email.




    }

    #método que envia email através da função mail do php
    public function envioMail($email, $mensagem, $assunto){

        $this->headers = "MIME-Version: 1.1\n";
        $this->headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $this->headers .= "From: laenderquadros@gmail.com \n"; //email de quem envia
        //$headers .= "Cc:contato@com.br\n"; //email da pessoa
        $this->headers .= "Return-Path: laenderquadros@gmail.com \n";
        $this->headers .= "Reply-To: laenderquadros@gmail.com \n";

        $this->envio = mail($email, $assunto, $mensagem, $this->headers, "-f laenderquadros@gmail.com");

    }

}
