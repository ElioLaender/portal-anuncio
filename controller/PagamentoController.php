<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 06/05/16
 * Time: 03:42
 */

include_once 'config/ControllerConfig.php';
include_once 'config/RouteConfig.php';
include_once 'dao/AccessObject/PagamentoDAO.php';
include_once 'dao/AccessObject/AnuncioDAO.php';
require_once "libraries/PagSeguroLibrary/PagSeguroLibrary.php";

class PagamentoController extends ControllerConfig {

    private $email = "laenderquadros@gmail.com",
        $token = "48B0BEBE4D0B4310B661A8CAB925F47F",
        $page  = "https://ws.pagseguro.uol.com.br";



 #seta o status do anuncio de acordo com a situação no pague seguro
    public function updatePayStatus($statusPag, $anunId){

        $objAnunDAO = new AnuncioDAO();

        $objAnunDAO->updateStatus($statusPag, $anunId);

    }


    #depois fazer uma varificação para enviar email para nós se houver algum status fora de aguardando e de aprovado!.. Para podermos resolver.
    #realiza o controle das notificações do PagSeguro
    public function payNotifications(){



        if (isset($_POST['notificationType']) && $_POST['notificationType'] == "transaction") {

            $url = $this->page."/v2/transactions/notifications/".$_POST['notificationCode']."?email=".$this->email."&token=".$this->token;


            #realiza consulta no site do pagSeguro via biblioteca curl
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $transationCurl = curl_exec($curl);
            curl_close($curl);
            $objPag = new PagamentoDAO();
            $transaction = simplexml_load_string($transationCurl);





            #antes de persistir, verificar se o codigo já existe, se existeir realiza apenas update. (ver se vai ser o caso)

            //retorna verdadeiro se existir e falso caso contrário.
            if($objPag->registerVerify($transaction->code)){
                #realiza update no registro
                $objPag->pagUpdate($transaction->date,
                    $transaction->code,
                    $transaction->reference,
                    $transaction->type,
                    $transaction->status,
                    $transaction->cancellationSource,
                    $transaction->lastEventDate,
                    $transaction->paymentMethod,
                    $transaction->paymentMethod->type,
                    $transaction->paymentMethod->code,
                    $transaction->grossAmount,
                    $transaction->discountAmount,
                    $transaction->netAmount,
                    $transaction->escrowEndDate,
                    $transaction->extraAmount,
                    $transaction->installmentCount,
                    $transaction->itemCount,
                    $transaction->items->item->id,
                    $transaction->items->item->description,
                    $transaction->items->item->amount,
                    $transaction->items->item->quantity,
                    $transaction->sender->email,
                    $transaction->sender->name,
                    $transaction->sender->phone->areaCode,
                    $transaction->sender->phone->number,
                    $transaction->shipping->type,
                    $transaction->shipping->cost,
                    $transaction->shipping->address->country,
                    $transaction->shipping->address->state,
                    $transaction->shipping->address->city,
                    $transaction->shipping->address->postalCode,
                    $transaction->shipping->address->district,
                    $transaction->shipping->address->street,
                    $transaction->shipping->address->number,
                    $transaction->shipping->address->complement);



            } else {
                #persiste novo pagamento
                $objPag->pagPersist($transaction->date,
                    $transaction->code,
                    $transaction->reference,
                    $transaction->type,
                    $transaction->status,
                    $transaction->cancellationSource,
                    $transaction->lastEventDate,
                    $transaction->paymentMethod,
                    $transaction->paymentMethod->type,
                    $transaction->paymentMethod->code,
                    $transaction->grossAmount,
                    $transaction->discountAmount,
                    $transaction->netAmount,
                    $transaction->escrowEndDate,
                    $transaction->extraAmount,
                    $transaction->installmentCount,
                    $transaction->itemCount,
                    $transaction->items->item->id,
                    $transaction->items->item->description,
                    $transaction->items->item->amount,
                    $transaction->items->item->quantity,
                    $transaction->sender->email,
                    $transaction->sender->name,
                    $transaction->sender->phone->areaCode,
                    $transaction->sender->phone->number,
                    $transaction->shipping->type,
                    $transaction->shipping->cost,
                    $transaction->shipping->address->country,
                    $transaction->shipping->address->state,
                    $transaction->shipping->address->city,
                    $transaction->shipping->address->postalCode,
                    $transaction->shipping->address->district,
                    $transaction->shipping->address->street,
                    $transaction->shipping->address->number,
                    $transaction->shipping->address->complement);

            }

		#atualiza na base de dados o status do anuncio
		$this->updatePayStatus($transaction->status, $transaction->reference);

        }


    } #encerra payNotifications


  


    #responsável por enviar o checkout para o pague seguro
    public function checkOutPay(){

        $paymentRequest = new PagSeguroPaymentRequest();

        switch($_POST['pacote']){
            case "Mensal":
                if($_POST['plano'] == "Premium"){
                    $pacote = "Mensal";
                    $valor = "19,70";
                } else {
                    $pacote = "Mensal";
                    $valor = "52,70";
                }
                ;break;
            case "Semestral":
                if($_POST['plano'] == "Premium"){
                    $pacote = "Semestral";
                    $valor = "112,80";
                } else {
                    $pacote = "Semestral";
                    $valor = "302,50";
                };break;
            case "Anual":
                if($_POST['plano'] == "Premium"){
                    $pacote = "Anual";
                    $valor = "60,00";
                } else if($_POST['plano'] == "Premium Plus"){
                    $pacote = "Anual";
                    $valor = "550,00";
                }else {
                    $pacote = "Anual";
                    $valor = "60,00";
                };break;
        }


        #seta qual o cod do item
        if($_POST['plano'] == "Premium"){
            $codItem = "1";
        } else if($_POST['plano'] == "Premium Plus") {
            $codItem = "2";
        } else {
            $codItem = "3";
        }

        $paymentRequest->addItem($codItem,$_POST['plano']."-".$pacote, 1,$valor);

	
	


        $paymentRequest->setShippingType(3);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $ddd = $_POST['ddd'];
        $cpf = $_POST['cpf'];
        $tel = str_replace("-", "", $_POST['tel']);


        $paymentRequest->setSender(
            $name,
            $email,
            $ddd,
            $tel,
            "CPF",
            $cpf
        );
        $paymentRequest->setCurrency("BRL");
        // Referenciando a transação do PagSeguro em seu sistema
        $paymentRequest->setReference($_POST['anunRef']);



        // URL para onde o comprador será redirecionado (GET) após o fluxo de pagamento
        $paymentRequest->setRedirectUrl("http://www.semprenegocio.com.br/carrinho-parte-final/");

        // URL para onde serão enviadas notificações (POST) indicando alterações no status da transação
        $paymentRequest->addParameter('notificationURL', 'http://www.semprenegocio.com.br/?controller=Pagamento&action=payNotifications');

        try {

            $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()
            $checkoutUrl = $paymentRequest->register($credentials);

            header("Location: $checkoutUrl");

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }

    }#encerra checkOutPay


}
