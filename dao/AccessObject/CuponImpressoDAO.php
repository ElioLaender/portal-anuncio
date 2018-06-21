<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 25/02/16
 * Time: 22:35
 */

require_once 'model/CuponImpressoModel.php';
require_once 'dao/AccessObject/CuponCodigoDAO.php';
require_once 'dao/AccessObject/CuponDescontoDAO.php';
require_once 'libraries/GeraPDF.php';
class CuponImpressoDAO extends CuponImpressoModel {


    private $insert = "INSERT INTO Cupon_impresso (cupon_impresso_cli_ref, cupon_impresso_ref) VALUES ('%s','%s');",
            $select,
            $update,
            $delete =  "DELETE FROM Cupon_impresso WHERE cupon_impresso_ref = '%s'";

    #insere na base de dados imformações importantes sobre o ato de impressão do cupon de desconto.
    public function persistImpressCupon($idCli,$idCupon){

        $this->setCuponImpressoCliRef($idCli);
        $this->setCuponImpressoRef($idCupon);
        $sql = sprintf($this->insert,$this->getCuponImpressoCliRef(),$this->getCuponImpressoRef());



        if($this->runQuery($sql)){

            $objCuponCode = new CuponCodigoDAO();
            #vincula o cliente ao código de cupon disponível
            $objCuponCode->setCliForCode($this->getCuponImpressoCliRef(),$this->getCuponImpressoRef());

            #atualiza contagem de quantos foram impressos e restantes na base de dados
            $objCuponDes = new CuponDescontoDAO();
            $objCuponDes->atualiConImpress($this->getCuponImpressoRef());

            // echo "salvo com sucesso";

        } else {

            echo "Não foi possível persistir impressão, entre em contado com o suporte.";

        }

    }

    #retorna 1 se já foi impresso e 0 caso negativo
    public function veriImpressCupon($cli,$cupon){

        $sql = "SELECT COUNT(*) FROM Cupon_impresso WHERE cupon_impresso_cli_ref = %s AND cupon_impresso_ref = %s ";

        $this->setCuponImpressoCliRef($cli);
        $this->setCuponImpressoRef($cupon);

        $sql = sprintf($sql, $this->getCuponImpressoCliRef(), $this->getCuponImpressoRef());
        $row = $this->runSelect($sql);

        if ($row[0]['COUNT(*)'] == 1) {

            echo 1;

        } else {

            echo 0;

        }

    }


    #retorna todos os dados necessários a geração do pdf do cupon a ser impresso.
    public function returnCuponForPdf($idCupon,$idCli,$infinit = ""){

        //evitar rack, verificar se o IdCli bate com do usuário logado.

        if($infinit == "off"){

            $sql = "SELECT * FROM Cupon_desconto
                    INNER JOIN Anuncio ON Cupon_desconto.cupon_desconto_anun_ref = Anuncio.anuncio_id
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    INNER JOIN Endereco ON Anuncio.anuncio_endereco = Endereco.endereco_id
		    INNER JOIN Cupon_impresso ON Cupon_desconto.cupon_desconto_id = Cupon_impresso.cupon_impresso_ref
                    INNER JOIN Cupon_codigo ON Cupon_impresso.cupon_impresso_ref = Cupon_codigo.cc_cupon_ref
                    WHERE Cupon_desconto.cupon_desconto_id = '%s' AND Cupon_desconto.cupon_desconto_excluido = 0 AND Cupon_codigo.cc_cli_impresso = '%s' ";

        } else {

            $sql = "SELECT Cupon_desconto.*,Anuncio.anuncio_id,Anuncio.anuncio_titulo,Anuncio.anuncio_email,Anuncio.anuncio_tel_cel,Anuncio.anuncio_tel_fixo,Sub_categoria.sub_categoria_descricao,Endereco.* FROM Cupon_desconto
                    INNER JOIN Anuncio ON Cupon_desconto.cupon_desconto_anun_ref = Anuncio.anuncio_id
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    INNER JOIN Endereco ON Anuncio.anuncio_endereco = Endereco.endereco_id
		    INNER JOIN Cupon_impresso ON Cupon_desconto.cupon_desconto_id = Cupon_impresso.cupon_impresso_ref
                    WHERE Cupon_desconto.cupon_desconto_id = '%s' AND Cupon_desconto.cupon_desconto_excluido = 0";

        }


        $this->setCuponImpressoRef($idCupon);
        $this->setCuponImpressoCliRef($idCli);

        $sql = sprintf($sql,$this->getCuponImpressoRef(),$this->getCuponImpressoCliRef());



        if($row = $this->runSelect($sql)){

            #seta o cupon como excluido caso já tenha sido impresso o conteúdo total.
            if($row[0]['cupon_desconto_restantes'] < 1 && $row[0]['cupon_desconto_qtd_impress'] != null) {

                $objCupDesDAO = new CuponDescontoDAO();
                $objCupDesDAO->setExcluCupon($idCupon);

            }

            return $row;

        } else {

            echo "não foi possível retornar os dados do cupon para impressão." . $sql;

        }

    }

    #gera pdf do cupon gerado
    public function cuponPdfGeneretor($idCupon,$idCli,$infinit){

        $objPdf = new GeraPDF();
        $objPdf->CuponPdf($this->returnCuponForPdf($idCupon,$idCli,$infinit));

      //  $this->returnCuponForPdf($idCupon,$idCli);

    }

    #deleta os registros de cupons impressos de acordo com o argumento
    public function excluImpreReg($idCupon){


        $this->delete = sprintf($this->delete, $idCupon);

        if($this->runQuery($this->delete)){



        } else {

            echo "Não foi possível realizar a exclusão dos arquivos." . $this->delete;

        }

    }

}
