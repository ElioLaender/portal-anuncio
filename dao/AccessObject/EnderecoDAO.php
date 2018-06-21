<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:24
 */

include_once 'model/EnderecoModel.php';
include_once 'dao/AccessObject/AnuncioDAO.php';

class EnderecoDAO extends EnderecoModel{

    protected $_insert = "INSERT INTO Endereco (endereco_cep, endereco_rua,endereco_bairro,endereco_numero,endereco_complemento,endereco_cidade,endereco_estado,endereco_numero_complemento)
                           VALUES  ('%s','%s','%s','%s','%s','%s','%s','%s');",
        $_select = "",
        $_update = "UPDATE Endereco SET endereco_cep = '%s', endereco_rua = '%s', endereco_bairro = '%s', endereco_numero = '%s', endereco_complemento = '%s', endereco_numero_complemento = '%s', endereco_cidade = '%s', endereco_estado = '%s' WHERE endereco_id = %s";


    public function enderecoPersist($cep, $rua, $bairro, $numero, $complemento,$cidade, $estado,$numeroComplemento){



        $this->setEnderecoCep($cep);
        $this->setEnderecoRua($rua);
        $this->setEnderecoBairro($bairro);
        $this->setEnderecoNumero($numero);
        $this->setEnderecoComplemento($complemento);
        $this->setEnderecoCidade($cidade);
        $this->setEnderecoEstado($estado);
        $this->setEnderecoNumeroComplemento($numeroComplemento);


        #retorna a string contendo a consulta completa.
        $sql = sprintf($this->_insert, $this->getEnderecoCep(),$this->getEnderecoRua(),$this->getEnderecoBairro(),$this->getEnderecoNumero(),$this->getEnderecoComplemento(),$this->getEnderecoCidade(),$this->getEnderecoEstado(),$this->getEnderecoNumeroComplemento());




        #caso persistir os dados sem problemas, será retornado o id atual onde os dados foram persistidos.
       if ($this->runQuery($sql)) {

           #consulta para retornar o id do endereço que acaba de ser cadastrado. Lembrando que falta registrar o tempo em milisegundos do cadastro, para garantir unicidade.
           $sql = "SELECT * FROM Endereco WHERE endereco_cep = '{$this->getEnderecoCep()}' AND endereco_numero = '{$this->getEnderecoNumero()}' ORDER BY endereco_id DESC LIMIT 1";


           $row = $this->runSelect($sql);

           $this->setEnderecoId($row[0]['endereco_id']);

           return $this->getEnderecoId();


       } else {
           echo "não foi possível persistir os dados do endereço, favor verificar.";
       }

    }

    #Realiza update na base de dados
    public function enderecoUpdate($cep, $rua, $bairro, $numero, $complemento,$cidade, $estado,$numeroComplemento,$idEnd){

        $this->setEnderecoCep($cep);
        $this->setEnderecoRua($rua);
        $this->setEnderecoBairro($bairro);
        $this->setEnderecoNumero($numero);
        $this->setEnderecoComplemento($complemento);
        $this->setEnderecoCidade($cidade);
        $this->setEnderecoEstado($estado);
        $this->setEnderecoNumeroComplemento($numeroComplemento);

          #lógica para realizar o update
        $sql = sprintf($this->_update,$this->getEnderecoCep(),$this->getEnderecoRua(),$this->getEnderecoBairro(),$this->getEnderecoNumero(),$this->getEnderecoComplemento(),$this->getEnderecoNumeroComplemento(),$this->getEnderecoCidade(),$this->getEnderecoEstado(),$idEnd);

        if($this->runQuery($sql)){

        } else {

            echo "Não foi possível atualizar endereço do anuncio: " . $sql;
        }

    }

    #retorna a quantidade de anuncios vinculados ao bairro passado como argumento
    public function qtdAnunBai($bairro,$pesquisa){

        $objAnun = new AnuncioDAO();

        $sql = "SELECT COUNT(*)
                FROM Endereco
                INNER JOIN Anuncio ON Endereco.endereco_id = Anuncio.anuncio_endereco
                INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                WHERE Endereco.endereco_bairro LIKE  '%{$bairro}%'
                AND ";
        $sql .= $objAnun->likeGeneretor($objAnun->BuscPrep($pesquisa));
        $row = $this->runSelect($sql);//echo "Quantidade de anuncios retornados no bairro $bairro: " . $row[0]['COUNT(*)'] . "<br/>";
        return $row[0]['COUNT(*)'];
    }




}
