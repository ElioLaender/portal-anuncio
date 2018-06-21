<?php


include_once 'model/ContViewsModel.php';

class ContViewsDAO extends ContViewsModel
{

    private $_insert =  "INSERT INTO Cont_views  (cont_views_anuncio_ref) VALUES ('%s')";



    #cria o registro que irá armazenar a quantidade de anuncios
    public function insertContViews($id){

        $this->setContViewsAnuncioRef($id);


        $sql = sprintf($this->_insert, $this->getContViewsAnuncioRef());

        if($this->runQuery($sql)){

           // return true;

        } else {
           // return "Não foi possível persistir registro de contabilização de visitas.";
        }

    }

    #contabiliza no banco de dados cada acesso ao anuncio, tendo como referencia o Id do anuncio. A ação pode ser de "contabilizar"(quando qualquer pessoa acessa) e "retornar"(para o usuário saber quantos acessos teve).
    public function incrementViews($id){

        // O registro do anuncio na tabela Cont_views será criado no ato do registro do anuncio para evitar uma comparação IF para verificar se o registro existe a cada click.


            $sql = "UPDATE Cont_views SET cont_views_qtd_total = (cont_views_qtd_total+1) WHERE cont_views_anuncio_ref = {$id}";

            $this->runQuery($sql);

    }

    #retorna a quantidade de visualizações de acordo com o id do anuncio
    public function returnQtdAnuncio($id){


        $sql = "SELECT * FROM Cont_views WHERE cont_views_anuncio_ref = {$id}";

        //O registro do anuncio na tabela Cont_views será criado no ato do registro do anuncio para evitar uma comparação IF para verificar se o registro existe a cada click.
        if($row = $this->runSelect($sql)){


            $atual = $row[0]['cont_views_qtd_total'];

            $atual++;

            return $atual;

        }


    }
}