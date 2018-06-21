<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/01/16
 * Time: 18:33
 */

include_once 'model/AvaliacaoRespostasModel.php';
include_once 'libraries/DateTimeFunctions.php';

/*
 * SELECT * FROM Avaliacao_respostas INNER JOIN Cliente ON Avaliacao_respostas.avaliacao_respostas_cliente_ref = Cliente.cli_id
INNER JOIN Avaliacao ON Avaliacao_respostas.avaliacao_respostas_avaliacao_ref = Avaliacao.avaliacao_id
INNER JOIN Avalia_resp_anun ON Avaliacao_respostas.avaliacao_respostas_avaliacao_ref = Avalia_resp_anun.ar_anuncio_avaliacao_ref
INNER JOIN Anuncio ON Avalia_resp_anun.ar_anuncio_anun_ref = Anuncio.anuncio_id
WHERE Avaliacao.avaliacao_anuncio_ref = 49

-- ORDER BY  (vai ter que vim depois de mesclar as colunas com o UNION)

http://dba.stackexchange.com/questions/15399/how-to-combine-union-and-inner-join
 */

class AvaliacaoRespostasDAO extends AvaliacaoRespostasModel {

        private $insert = "INSERT INTO Avaliacao_respostas (avaliacao_respostas_cliente_ref, avaliacao_respostas_retorno, avaliacao_respostas_avaliacao_ref, avaliacao_respostas_dono) VALUES  ('%s','%s','%s','%s');",
                $select = "",
                $update = "",
                $delete = "",
                $returnResp = "SELECT * FROM Avaliacao_respostas INNER JOIN Cliente ON Avaliacao_respostas.avaliacao_respostas_cliente_ref = Cliente.cli_id
                               INNER JOIN Avaliacao ON Avaliacao_respostas.avaliacao_respostas_avaliacao_ref = Avaliacao.avaliacao_id
                               INNER JOIN Anuncio ON Avaliacao.avaliacao_anuncio_ref = Anuncio.anuncio_id
                               WHERE Avaliacao.avaliacao_anuncio_ref = %s ORDER BY Avaliacao_respostas.avaliacao_respostas_data_hora";

    /*
     *
     * PS: Esta consulta está funcionando corretamente de acordo com a necessidade, resta confimar se vai ordenar ASC ou DESC. Criar function JS para imprimir respostas quando existir respostas a uma dada avaliação.
     *   SELECT * FROM  Avaliacao_respostas
         INNER JOIN  Cliente   ON  Avaliacao_respostas.avaliacao_respostas_cliente_ref = Cliente.cli_id
         INNER JOIN  Avaliacao ON  Avaliacao_respostas.avaliacao_respostas_avaliacao_ref = Avaliacao.avaliacao_id WHERE  Avaliacao.avaliacao_anuncio_ref = '%s'  ORDER BY Avaliacao_respostas.avaliacao_respostas_id DESC;
     */

    /*
     * Não é tão indicada pois filtra a resposta por anuncio e resposta, nós precisamos trazer todas as respostas de uma dada avaliação de um dado anuncio.
     *
     * SELECT * FROM  Avaliacao_respostas
         INNER JOIN  Cliente   ON  Avaliacao_respostas.avaliacao_respostas_cliente_ref = Cliente.cli_id
         INNER JOIN  Avaliacao ON  Avaliacao_respostas.avaliacao_respostas_avaliacao_ref = Avaliacao.avaliacao_id WHERE  Avaliacao.avaliacao_anuncio_ref = 109 AND 			Avaliacao_respostas.avaliacao_respostas_avaliacao_ref = 49 ORDER BY Avaliacao_respostas.avaliacao_respostas_id DESC
     *
     *
     *
     */


    #Persiste resposta de um dado revew na base de dados.
    public function respostaRevew($cliRef, $retornoMensagem, $avaliaRef, $anuDon){

        $this->setAvaliacaoRespostasClienteRef($cliRef);
        $this->setAvaliacaoRespostasRetorno($retornoMensagem);
        $this->setAvaliacaoRespostasAvaliacaoRef($avaliaRef);
        $this->setAvaliacaoRespostasDono($anuDon);

        $sql = sprintf($this->insert, $this->getAvaliacaoRespostasClienteRef(),
                                      $this->getAvaliacaoRespostasRetorno(),
                                      $this->getAvaliacaoRespostasAvaliacaoRef(),
                                      $this->getAvaliacaoRespostasDono());



        if($this->runQuery($sql)){

            echo "Sua resposta foi enviada com sucesso.";

        } else {

            echo "Ops, não foi possível salvar sua resposta. Tente mais tarde =/";

        }


    }

    #realiza inner join contendo os dados necessários para exibir a resposta.
    public function retornaRespostas($idAnun){

        $objDateTime = new DateTimeFunctions();
        $this->returnResp = sprintf($this->returnResp, $idAnun);

        if($row = $this->runSelect($this->returnResp)){


            if(!empty($row) && isset($row)){

                for($cont = 0; $cont < count($row); $cont++){

                    $row[$cont]['avaliacao_respostas_data_hora'] = $objDateTime->dateTimeBr($row[$cont]['avaliacao_respostas_data_hora']);

                }


                return $row;


            } else {

                return 0;
            }


        } else {

            echo "Ops, não foi possível salvar sua resposta. Tente mais tarde =/";

        }

    }

}