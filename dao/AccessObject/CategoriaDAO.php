<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:19
 */

include_once 'model/CategoriaModel.php';
include_once 'dao/AccessObject/SubCategoriaDAO.php';

class CategoriaDAO extends CategoriaModel
{


    protected $_insert = "",
        $_select = "SELECT * FROM Categoria;", //Possivelmente dará problema no gerar subcategoria automático, pois retirei o innerJoin  "SELECT * FROM Categoria INNER JOIN Sub_categoria ON Categoria.tipo_categoria_id = Sub_categoria.sub_categoria_cat_ref",
        $_update = "";


    #Método responsável por retornar todos os elementos da tabela
    public function selectAllCategoria()
    {

        echo json_encode($this->runSelect($this->_select));

    }

    #retorna categoria e subcategoria para pesquisa
    public function returnCatAndSub(){

        $sql = "SELECT * FROM Categoria INNER JOIN Sub_categoria ON Categoria.tipo_categoria_id = Sub_categoria.sub_categoria_cat_ref";

        echo json_encode($this->runSelect($sql));


    }


    /*faz uma consulta com like na tabela categoria e na tabela subCategoria. Se o like for encontrado em alguma(as) categorias, retorna todas as sub categorias dessa
   classe. Se for encontrada em alguma subCategoria, retorna também todas as sub_categorias irmãs. Caso tenha afinidade com mais de um tipo de categoria ou subCategoria
  trazer todas. Ps: como fazer isso? kkkkkkkk....

  OBS: O que retornar dessa consulta servirá de alimentação para gerar checkBox dinâmico no filtro do udsuário.
  */
    public function returnCatDinamic($stringSearch)
    {

        //Trata a pesquisa, retirando palavras desnecessária e separando a string em palavras chaves.
        include_once 'dao/AccessObject/AnuncioDAO.php';
        $objAnun = new AnuncioDAO();
        $search = $objAnun->BuscPrep($stringSearch);

        #retornar todos os registro cuja descrição esteja relacionada a pesquisa.
        $sql = "SELECT * FROM Categoria WHERE ";

        for($i = 0; $i < count($search); $i++ ){

            $sql .= " tipo_categoria_descricao LIKE '%{$search[$i]}%' ";

            if($i+1 != count($search)){

                $sql .= " OR ";

            }

        }


        $buscaFilhos = "SELECT * FROM Sub_categoria WHERE ";

        #realiza a consulta na base de dados.
        if ($row = $this->runSelect($sql)) {

            #caso retornar algum regostro, será realizado uma busca por todos os filhos de cada categoria retornada.
            for ($cont = 0; $cont < count($row); $cont++) {

                #fazer where retornando as subcategorias
                $buscaFilhos .= "sub_categoria_cat_ref = " . $row[$cont]['tipo_categoria_id'];

                #enquanto valor de $cont for menor que a penultima iteração do laço, a consulta recebe um "OR" ao final da nova cláusula do WHERE.
                if ($cont != count($row) - 1) {

                    #adiciona OR ao final da iteração atá o penultimo laço.
                    $buscaFilhos .= " OR ";
                }

            }

            #faz a consulta dentro do if de verificação, pois caso caia no else não retorna nada.
            #busca todos as subClasses da classe relacionada a pesquisa de texto.
            $arraySubCat = $this->runSelect($buscaFilhos);


            #se for maior que 0 retorna o array, caso contrário retorna zero, pois na função que gera o conteúdo para o checkBox dinâmico espera 0 quando não retorna nada.
            if (count($arraySubCat) > 0) {

                $ObjSubCat = new SubCategoriaDAO();


                for($i = 0; $i < count($arraySubCat); $i++){

                    $arraySubCat[$i]['qtdAnun'] = $ObjSubCat->qtdAnunCat($arraySubCat[$i]['sub_categoria_descricao'], $stringSearch);

                }

                return $arraySubCat;

            } else {
                return false;
            }


            /*
           * apenas para exibir o resultado
          echo "PESQUISA: ". $stringSearch. "<br/>";
          for($i = 0; $i < count($arraySubCat); $i++){

              echo $arraySubCat[$i]['sub_categoria_descricao'] . "<br/>";

          }
          */

        } else {

            return false;
        }


    }

}