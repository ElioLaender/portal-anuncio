<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:28
 */

include_once 'model/LinkModel.php';

class LinkDAO extends LinkModel{

private $_insert = "INSERT INTO Link (link_facebook,link_youtube, link_linkedin, link_twitter, link_lattes, link_site, link_anuncio_ref) VALUES ('%s','%s','%s','%s','%s','%s','%s')",
        $_update = "UPDATE Link SET link_facebook = '%s',link_youtube = '%s', link_linkedin = '%s', link_twitter = '%s', link_lattes = '%s', link_site = '%s' WHERE link_id = %s";


    #método deve persistir e retornar qual o numero do id em que foi registrado o anuncio.
    public function linksPersist($facebook, $twitter, $site, $linkedin, $youtube, $lattes, $anuncioId){

            $this->setLinkAnuncioRef($anuncioId);
            $this->setLinkFacebook($facebook);
            $this->setLinkTwitter($twitter);
            $this->setLinkSite($site);
            $this->setLinkLinkedin($linkedin);
            $this->setLinkLatter($lattes);

        //retira o inicio do link
        $youtube = str_replace("https://","",$youtube);

        //https://www.youtube.com/watch?v=hsCGnLX2O7c
        //com o argumento true, pega do caracter para trás
        $tras = strstr($youtube, '/',true);

        if($tras == "www.youtube.com"){

            //recebe os valores do igual para frente
            $youtube = strstr($youtube, '=');

            $youtube = "https://www.youtube.com/embed/".substr($youtube,1,11);

        } else if($tras == "youtu.be"){

            $youtube = strstr($youtube, 'e');

            $youtube = "https://www.youtube.com/embed/".substr($youtube,2,13);

        } else if($tras == '<iframe width="560" height="315" src="www.youtube.com'){

            $youtube = strstr($youtube, 'embed/');
            $youtube = "https://www.youtube.com/embed/".substr($youtube,6,11);

        }

        $this->setLinkYoutube($youtube);

        $sql = sprintf($this->_insert, $this->getLinkFacebook(), $this->getLinkYoutube(), $this->getLinkLinkedin(), $this->getLinkTwitter(), $this->getLinkLatter(), $this->getLinkSite(), $this->getLinkAnuncioRef());

        if($this->runQuery($sql)){
             //echo "Link persistido com sucesso";
        } else {
            echo "Não foi possível persistir link! =/";
        }


    }

    #Por default, caso um valor não for passado, ele será vazio.
    public function linksUpdate($facebook = "0", $twitter = "0", $site = "0", $linkedin = "0", $youtube = "0", $lattes = "0", $linkId){

       // $this->setLinkYoutube($youtube);
        $this->setLinkFacebook($facebook);
        $this->setLinkTwitter($twitter);
        $this->setLinkSite($site);
        $this->setLinkLinkedin($linkedin);
        $this->setLinkLatter($lattes);


        //retira o inicio do link
        $youtube = str_replace("https://","",$youtube);

        //https://www.youtube.com/watch?v=hsCGnLX2O7c
        //com o argumento true, pega do caracter para trás
        $tras = strstr($youtube, '/',true);

        if($tras == "www.youtube.com"){

            //recebe os valores do igual para frente
            $youtube = strstr($youtube, '=');

            $youtube = "https://www.youtube.com/embed/".substr($youtube,1,11);

        } else if($tras == "youtu.be"){

            $youtube = strstr($youtube, 'e');

            $youtube = "https://www.youtube.com/embed/".substr($youtube,2,13);

        } else if($tras == '<iframe width="560" height="315" src="www.youtube.com'){

            $youtube = strstr($youtube, 'embed/');
            $youtube = "https://www.youtube.com/embed/".substr($youtube,6,11);

        }

        $this->setLinkYoutube($youtube);

       // $this->setLinkYoutube(str_replace("watch?v=","embed/",$youtube));

        $sql = sprintf($this->_update, $this->getLinkFacebook(),$this->getLinkYoutube(), $this->getLinkLinkedin(), $this->getLinkTwitter(), $this->getLinkLatter(), $this->getLinkSite(), $linkId);

       // echo $sql;

        if($this->runQuery($sql)){

         //   echo $sql;

        } else {
            echo "Não foi possível atualizar os links" . $sql;
        }




    }

}
