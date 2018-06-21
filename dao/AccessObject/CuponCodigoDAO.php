<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 26/02/16
 * Time: 09:36
 */

include_once "model/CuponCodigoModel.php";
include_once "libraries/FunctionsPass.php";

class CuponCodigoDAO extends CuponCodigoModel {

    private $insert = "INSERT INTO Cupon_codigo (cc_cupon_ref,cc_codigo) VALUES (%s,'%s')",
            $select,
            $update = "UPDATE Cupon_codigo SET cc_cli_impresso = %s WHERE cc_cupon_ref = %s AND cc_cli_impresso = 0 LIMIT 1",
            $delete;

    //cc_cli_impresso será setado através de update quando cliente imprimir o curriculo

    #persiste códigos do cupon na base de dados
    public function codePersist($cuponId,$qtdCupon){

        $objPass = new FunctionPass();
        $this->setCcCuponRef($cuponId);

        for($i = 0; $i < $qtdCupon; $i++){

            $sql = sprintf($this->insert,$this->getCcCuponRef(),strtoupper($objPass->codeBarGene(10)));
            $this->runQuery($sql);

        }

    }

    #realiza update vinculando o cliente a um código disponível do cupon selecionado por ele.
    public function setCliForCode($idCli,$idCupon){

        $this->setCcCuponRef($idCupon);
        $this->setCcCliImpresso($idCli);

        $sql = sprintf($this->update, $this->getCcCliImpresso(),$this->getCcCuponRef());

        if($this->runQuery($sql)){

        } else {
          //  echo "Não foi possível vincular o cliente a um código de cupon.";
            echo $sql;
        }

    }


    #Apaga registros do idAnuncio passado como argumento que não tenha cliente vinculado.
    public function regCodDel($idCupon){

       $this->delete = " DELETE FROM Cupon_codigo
        WHERE cc_cupon_ref = '%s' ";   //para manter ps que já foram imprimidos AND cc_cli_impresso = 0";

        $this->setCcCuponRef($idCupon);

        $sql = sprintf($this->delete, $this->getCcCuponRef());

        if($this->runQuery($sql)){



        } else {

            echo "Não foi possível deletar registros";

        }



    }




}