<?php

include_once 'model/SubCategoriaModel.php';
include_once 'dao/AccessObject/AnuncioDAO.php';

class SubCategoriaDAO extends SubCategoriaModel
{

    protected $_insert = "",
        $_select = "SELECT * FROM Sub_categoria ORDER BY sub_categoria_descricao",
        $_update = "";


    #Método responsável por retornar todos os elementos da tabela
    public function selectAllSubCategoria()
    {

        echo json_encode($this->runSelect($this->_select));

    }


    #retorna todos os irmãos da subCategoria que é afim da pesquisa de texto
    public function returnSubOnSubSearch($pesquisa)
    {

        $sql = "SELECT * FROM Sub_categoria INNER JOIN Anuncio
                ON Sub_categoria.sub_categoria_id = Anuncio.anuncio_categoria WHERE Anuncio.anuncio_titulo LIKE '%{$pesquisa}%' OR ";

        include_once 'dao/AccessObject/AnuncioDAO.php';
        $objAnun = new AnuncioDAO();
        $search = $objAnun->BuscPrep($pesquisa);

        for($i = 0; $i < count($search); $i++ ){

            $sql .= " sub_categoria_descricao LIKE '%{$search[$i]}%' ";

            if($i+1 != count($search)){

                $sql .= " OR ";

            }

        }


        $selectManos = "SELECT * FROM Sub_categoria WHERE ";


        #caso retorne algum registro, realiza outra consulta solicitando as sub_categorias "irmãs" da categoria afim.
        if ($row = $this->runSelect($sql)) {

            #caso retornar algum regostro, será realizado uma busca por todos os irmãos de cada categoria retornada.
            for ($cont = 0; $cont < count($row); $cont++) {

                #fazer where retornando as subcategorias
                $selectManos .= "sub_categoria_cat_ref = " . $row[$cont]['sub_categoria_cat_ref'];

                #enquanto valor de $cont for menor que a penultima iteração do laço, a consulta recebe um "OR" ao final da nova cláusula do WHERE.
                if ($cont != count($row) - 1) {

                    #adiciona OR ao final da iteração atá o penultimo laço.
                    $selectManos .= " OR ";
                }

            }

            $arrayRetornoManos = $this->runSelect($selectManos);

            if (count($arrayRetornoManos) > 0) {
               // include_once 'dao/AccessObject/AnuncioDAO.php';
              //  $objAnun = new AnuncioDAO();
              //  $search = $objAnun->BuscPrep($search);

                for($i = 0; $i < count($arrayRetornoManos); $i++){
                    $arrayRetornoManos[$i]['qtdAnun'] = $this->qtdAnunCat($arrayRetornoManos[$i]['sub_categoria_descricao'],$pesquisa);
                }

                return $arrayRetornoManos;

            } else {

                return false;
            }


        } else {

            return false;
        }


    }

    #retorna quantidade de anuncio vinculado a cada categoria passsada como argumento
    public function qtdAnunCat($categoria,$pesquisa){

        $objAnun = new AnuncioDAO();

            $sql = "SELECT COUNT(*) FROM Sub_categoria
                    INNER JOIN Anuncio ON Sub_categoria.sub_categoria_id = Anuncio.anuncio_categoria
                    INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                    WHERE Sub_categoria.sub_categoria_descricao = '{$categoria}'  AND ";
        $sql .= $objAnun->likeGeneretor($pesquisa);

      //  echo $sql;

        $row = $this->runSelect($sql);//echo "Quantidade de anuncios retornados no bairro $bairro: " . $row[0]['COUNT(*)'] . "<br/>";
        return $row[0]['COUNT(*)'];

    }

    #retorna uma categoria que esteja vinculada ao titulo do anuncio passado como argumento
    public function returnCatForAnunSearch($pesquisa){

        $sql = "SELECT Sub_categoria.sub_categoria_descricao FROM Sub_categoria
                INNER JOIN Anuncio ON Sub_categoria.sub_categoria_id = Anuncio.anuncio_categoria
                WHERE Anuncio.Anuncio_titulo LIKE '%{$pesquisa}%'";

        if($row = $this->runSelect($sql)){

            for($i = 0; $i < count($row); $i++){
                $row[$i]['qtdAnun'] = $this->qtdAnunCat($row[$i]['sub_categoria_descricao'],$row[$i]['sub_categoria_descricao']);
            }

            return $row;

        } else {

            //echo "Não foi possível retornar categoria vinculada ao titulo do anuncio";
        }



    }



}
