<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:17
 */

include_once 'model/AvaliacaoModel.php';
include_once 'libraries/DateTimeFunctions.php';

class AvaliacaoDAO extends AvaliacaoModel{

    private $insert = "INSERT INTO Avaliacao (avaliacao_nota,avaliacao_comentario,avaliacao_anuncio_ref, avaliacao_cli_ref, avaliacao_titulo) VALUES ('%s','%s','%s','%s','%s');",
            $select = "SELECT * FROM Avaliacao WHERE avaliacao_anuncio_ref = %s",
            $update,
            $delete,
            $incrementCurtida = "UPDATE Avaliacao SET avaliacao_curtidas = (avaliacao_curtidas+1) WHERE avaliacao_id = %s",
            $AvaliaCli = "SELECT * FROM  Avaliacao
                          INNER JOIN  Cliente ON  Avaliacao.avaliacao_cli_ref = Cliente.cli_id
                          WHERE Avaliacao.avaliacao_anuncio_ref = '%s'  ORDER BY Avaliacao.avaliacao_id DESC;",
            $returnHome = "SELECT * FROM  Avaliacao
                           INNER JOIN  Cliente ON  Avaliacao.avaliacao_cli_ref = Cliente.cli_id
                           INNER JOIN  Anuncio ON  Avaliacao.avaliacao_anuncio_ref = Anuncio.anuncio_id ORDER BY Avaliacao.avaliacao_id DESC LIMIT 6;",
            $returnContCurtidas = "SELECT avaliacao_curtidas FROM Avaliacao WHERE avaliacao_id = %s";

    /*
     *
     * SELECT * FROM  Avaliacao
     *   INNER JOIN  Cliente ON  Avaliacao.avaliacao_cli_ref = Cliente.cli_id WHERE Avaliacao.avaliacao_anuncio_ref = 135  ORDER BY Avaliacao.avaliacao_id DESC;
     *
     * ps: fazer uma consulta para cada
     */
    #retorna as avaliações dos anuncios de acordo com o referencoa do anuncio passado como argumento
    public function retornaAvaliacao($anuncioRef){

        $objDateTime = new DateTimeFunctions();

       $this->setAvaliacaoAnuncioRef($anuncioRef);

            $sql = sprintf($this->AvaliaCli, $this->getAvaliacaoAnuncioRef());

        if($row = $this->runSelect($sql)){


            for($cont = 0; $cont < count($row); $cont++){

                $row[$cont]['avaliacao_data_horario'] = $objDateTime->dateTimeBr($row[$cont]['avaliacao_data_horario']);

            }


            return $row;
        } else {
            return "Não possível retornar as mensagens do anuncio";
        }

    }

    #persiste revew  na base de dados, sendo que cada revew está vinculado a um anuncio.
    public function persistRevew($nota, $comentario, $anuncioRef, $cli_ref, $titulo){

            $this->setAvaliacaoNota($nota);
            $this->setAvaliacaoComentario($comentario);
            $this->setAvaliacaoAnuncioRef($anuncioRef);
            $this->setAvaliacaoCliRef($cli_ref);
            $this->setAvaliacaoTitulo($titulo);

            $sql = sprintf($this->insert,    $this->getAvaliacaoNota(),
                                             $this->getAvaliacaoComentario(),
                                             $this->getAvaliacaoAnuncioRef(),
                                             $this->getAvaliacaoCliRef(),
                                             $this->getAvaliacaoTitulo());

		


        if($this->runQuery($sql)){

            echo "Sua avaliação foi realizada com sucesso!";

		#calcula nova média e realiza update
		$this->revewMedia($this->getAvaliacaoAnuncioRef());

		
        } else {

            echo "Ops, não foi possível enviar avaliação, tente mais tarde. <br/> ". $sql;


        }


    }

    #atualiza a média dos revews de acordo com o anuncio
    public function revewMedia($anuncioRef){

	$sqlMedia = "SELECT AVG(avaliacao_nota) FROM Avaliacao WHERE avaliacao_anuncio_ref = '".$anuncioRef."'";
	
	
	if($avg = $this->runSelect($sqlMedia)){

		#média arredondada. 
		$media = round($avg[0]['AVG(avaliacao_nota)']);

		$sqlUpdateMedia = "UPDATE Anuncio SET anuncio_media = '".$media."' WHERE Anuncio_id = '".$anuncioRef."'";

		if($this->runQuery($sqlUpdateMedia)){
		
		} else {
		  echo "Não foi possível persistir a atualização da média.";
		}

		

	} else {

		echo "Não foi possível retornar o valor da média.";
	}


    }

     #retorna o json das ultimas avaliações que será exibido na página home. Será enviado informações do cliente, anuncio e revew.
    public function revewForHome(){

        $objDateTime = new DateTimeFunctions();


        if($row = $this->runSelect($this->returnHome)){


            for($cont = 0; $cont < count($row); $cont++){

                $row[$cont]['avaliacao_data_horario'] = $objDateTime->dateTimeBr($row[$cont]['avaliacao_data_horario']);

            }


            return $row;


        } else {
            return "Não possível retornar as ultimas avaliações.";
        }

    }

    #incrementa o gostei do revew passado como argumento
    public function incrementGostei($idRevew){

        $this->setAvaliacaoId($idRevew);
        $aut = AutenticadorConfig::instanciar();


        #verificar se existe cookie com o id do anuncio
        if(@in_array($idRevew, $aut->returnCookieLike())){ //$aut->cookieExists() &&


            #caso existir retorna 0
            echo 0;
           // echo "Você só pode curtir apenas uma vez essa avaliação.";

        } else {

            $this->incrementCurtida = sprintf($this->incrementCurtida, $this->getAvaliacaoId());
            $this->returnContCurtidas = sprintf($this->returnContCurtidas, $this->getAvaliacaoId());

            $aut->setCookieLike($idRevew);

         //   $teste = $aut->returnCookieLike();

         //   foreach($teste as $atual){

         //       echo $atual;

        //    }

            #cria um cookie e seta o id do revew e incrementa a contagem de gostei do mesmo.
            $this->runQuery($this->incrementCurtida);
            #seleciona a quantidade de curtidas atual do dado revew.
            $row = $this->runSelect($this->returnContCurtidas);
            #retorna a quantidade atual de curtidas do revew wm questão.
            echo "(".$row[0]['avaliacao_curtidas'].")";



        }
    }


}
