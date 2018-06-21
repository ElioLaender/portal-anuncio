<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/12/15
 * Time: 18:15
 */

include_once 'model/FaleConoscoModel.php';

class FaleConoscoDAO extends FaleConoscoModel{


    private $_insert = "INSERT INTO Fale_conosco (fale_conosco_nome,
                                                  fale_conosco_email,
                                                  fale_conosco_assunto,
                                                  fale_conosco_telefone,
                                                  fale_conosco_mensagem) VALUES ('%s','%s','%s','%s','%s');";


    #persiste mensagem na base de dados
    public function mensagemPersist($nome,$email,$assunto,$telefone,$mensagem){

        $this->setFaleConoscoNome($nome);
        $this->setFaleConoscoEmail($email);
        $this->setFaleConoscoAssunto($assunto);
        $this->setFaleConoscoTelefone($telefone);
        $this->setFaleConoscoMensagem($mensagem);



        $sql = sprintf($this->_insert, $this->getFaleConoscoNome(),
                                        $this->getFaleConoscoEmail(),
                                        $this->getFaleConoscoAssunto(),
                                        $this->getFaleConoscoTelefone(),
                                        $this->getFaleConoscoMensagem());

     if($row = $this->runQuery($sql)){

         echo "Sua mensagem foi enviada com sucesso, obrigado por entrar em contato! =)";

       }else{

           echo "Ops, não foi possível enviar a mensagem, tente mais tarde. =/";
      }

    }

}
