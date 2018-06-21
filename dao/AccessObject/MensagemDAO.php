<?php

include_once 'model/MensagemModel.php';

class MensagemDAO extends MensagemModel{


    private $insert = "INSERT INTO Mensagem (mensagem_nome, mensagem_texto, mensagem_anuncio_ref, mensagem_email, mensagem_tel) VALUES ('%s','%s','%s','%s','%s');",
            $select = "SELECT * FROM Mensagem WHERE mensagem_anuncio_ref = %s AND mensagem_exclu = 0",
            $update = "UPDATE Mensagem SET mensagem_exclu = 1 WHERE mensagem_id = %s",
            $delete;


    #persiste mensagem enviada para anunciante na base de dados.
    public function messagePersist($nome, $texto, $anunRef, $email, $tel){

        $this->setMensagemNome($nome);
        $this->setMensagemTexto($texto);
        $this->setMensagemAnuncioRef($anunRef);
        $this->setMensagemEmail($email);
        $this->setMensagemTel($tel);

         $sql = sprintf($this->insert,  $this->getMensagemNome(),
                                        $this->getMensagemTexto(),
                                        $this->getMensagemAnuncioRef(),
                                        $this->getMensagemEmail(),
                                        $this->getMensagemTel());

        if($this->runQuery($sql)){

            echo "Sua mensagem foi enviada com sucesso!";

        } else {

            echo "Ops, não foi possível enviar sua mensagem, tente mais tarde. =/";
        }

    }



    #retorna as mensagem dos anuncios de acordo com o referencoa do anuncio passado como argumento
    public function retornaMensagem($anuncioRef){

        //$this->select = "SELECT * FROM Mensagem WHERE mensagem_anuncio_ref = %s";
#refazer para ficar de acordo com o select lá em cima

        $this->setMensagemAnuncioRef($anuncioRef);

        $sql = sprintf($this->select, $this->getMensagemAnuncioRef());

        if($row = $this->runSelect($sql)){
            return $row;
        } else {
            return "Não possível retornar as mensagens do anuncio";
        }

    }

    #seta a mesagem como excluida na base de dados.
    public function setMenExclu($idMens){

        $this->setMensagemId($idMens);
        $sql = sprintf($this->update, $this->getMensagemId());

        if($this->runQuery($sql)){
            echo "Mensagem excluída com sucesso.";
        } else {
            echo "Desculpe, não foi possível excluir a mensagem no momento, tente mais tarde." . $sql;
        }

    }


}
