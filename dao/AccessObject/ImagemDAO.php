<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:28
 */

include_once 'model/ImagemModel.php';

class ImagemDAO extends ImagemModel{

    private $_insert = "INSERT INTO Imagem (imagem_anuncio_ref, imagem_localizacao) VALUES ('%s','%s')",
            $_update = "UPDATE Imagem SET imagem_anuncio_ref = '%s', imagem_localizacao = '%s' WHERE ",
            $_delete = "DELETE FROM Imagem WHERE imagem_id = '%s' ";

    #insere referencia da imagem na base de dados. Trabalharemos com multiplas imagens, assim sendo será realizado um insert para cada posição do array passado como argumento.
    public function insertAnuncioImagem($arrayImages, $anuncio_ref){

        $this->setImagemAnuncioRef($anuncio_ref);

      //  for($i = 0; $i < count($arrayImages); $i++){

            #substitui o "-" por "/", pois com "/" o upload não aceita.
            //$arrayImages[$i] = str_replace("-", "/", $arrayImages[$i]);

            $sql = sprintf($this->_insert,$this->getImagemAnuncioRef(),$arrayImages);

            $this->runQuery($sql);

      //  }

    }

    #insere imagem de capa no anuncio
    public function insertImgCapa($imagem, $anuncioRef){


	if($imagem == ""){
	    $imagem = "upload/anuncio-images/default/anuncio-default.jpg";
	} 

        $sql = "UPDATE Anuncio SET anuncio_imagem_capa = '%s' WHERE anuncio_id = %s";

        $this->setImagemAnuncioRef($anuncioRef);

        $sql = sprintf($sql,$imagem,$this->getImagemAnuncioRef());

        $this->runQuery($sql);


    }

    #atualiza imagem de capa
    public function ImgCapaUpdate($imagem, $anuncioRef){

    }


    public function imgDel($idImg){

    $this->_delete = sprintf($this->_delete,$idImg);

    if($this->runQuery($this->_delete)){

    } else {

        echo "Não foi possível excluir arquivo, favor, tente mais tarde.";

    }
    

    }



    #Retorna as imagens do Id passado como argumento
    public function retornaImagem($anuncioRef){

        $sql = "SELECT * FROM Imagem WHERE imagem_anuncio_ref = '{$anuncioRef}'";

        if($row = $this->runSelect($sql)){

            return $row;

        } else {

            return "Não possível retornar as imagens do anuncio";
        }


    }




}
