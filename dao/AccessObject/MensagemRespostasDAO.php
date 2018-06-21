<?php

include_once 'model/MensagemRespostasModel.php';

class MensagemRespostasDAO extends MensagemRespostasModel {

    private $insert = "INSERT INTO Mensagem_respostas (men_resp_mensagem_ref, men_resp_assunto, men_resp_mensagem) VALUES (%s,'%s','%s');",
            $select,
            $update,
            $delete;


    #persiste a resposta enviada para o cliente na base de dados.
    public function respostPersist($menRef,$assunto,$mensagem){

        $this->setMenRespMenRef($menRef);
        $this->setMenRespAssunto($assunto);
        $this->setMenRespMensagem($mensagem);

        $sql = sprintf($this->insert,$this->getMenRespMenRef(),$this->getMenRespAssunto(),$this->getMenRespMensagem());

        if($this->runQuery($sql)){

           // return true;

        } else {

           // echo "Não foi possível persistir mensagem na base de dados.";
        }

    }




}