<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 15/01/16
 * Time: 22:02
 */

include_once 'model/PlanoSaudeModel.php';
include_once 'dao/AccessObject/AnuncioDAO.php';


class PlanoSaudeDAO extends PlanoSaudeModel{



    private $insert = "INSERT INTO Plano_saude (
                                                plano_saude_anuncio_ref,
                                                plano_saude_unimed,
                                                plano_saude_prontomed,
                                                plano_saude_saudevida,
                                                plano_saude_promed,
                                                plano_saude_outros) VALUES ('%s','%s','%s','%s','%s','%s')",

        $update = "UPDATE Plano_saude SET plano_saude_unimed = '%s',
                                       plano_saude_prontomed = '%s',
                                       plano_saude_saudevida = '%s',
                                       plano_saude_promed = '%s',
                                       plano_saude_outros = '%s'
                                       WHERE plano_saude_id = %s";

        public function insertPlanos($arrayPlanos, $anunRef){

        $this->setPlanoSaudeAnuncioRef($anunRef);


        for($i=0 ; $i < count($arrayPlanos); $i++){

            switch($arrayPlanos[$i]){

                case "unimed"        : $this->setPlanoSaudeUnimed(1);break;
                case "saudeVida"     : $this->setPlanoSaudeSaudevida(1);break;
                case "prontomed"     : $this->setPlanoSaudeProntomed(1);break;
                case "promed"        : $this->setPlanoSaudePromed(1);break;
                case "outros"        : $this->setPlanoSaudeOutros(1);break;


                default:  ;//return "Valor não correspondente.";


            }

        }



        $sql = sprintf($this->insert,   $this->getPlanoSaudeAnuncioRef(),
                                        $this->getPlanoSaudeUnimed(),
                                        $this->getPlanoSaudeProntomed(),
                                        $this->getPlanoSaudeSaudevida(),
                                        $this->getPlanoSaudePromed(),
                                        $this->getPlanoSaudeOutros()
                                        );

        if($this->runQuery($sql)){

           // echo "Grvou o plano.";

        } else {
            echo "Não foi possível retornar dados.";
        }


    }

    #atualiza planos
    public function planosUpdate($arrayPlanos, $anunRef){

        $plan = array("unimed"=>0,"saudeVida"=>0,"prontomed"=>0,"promed"=>0,"outros"=>0);

        for($i=0 ; $i < count($arrayPlanos); $i++){

            switch($arrayPlanos[$i]){

                case "unimed"        : $plan['unimed'] = 1;break;
                case "saudeVida"     : $plan['saudeVida'] = 1;break;
                case "prontomed"     : $plan['prontomed'] = 1;break;
                case "promed"        : $plan['promed'] = 1;break;
                case "outros"        : $plan['outros'] = 1;break;


                default:  ;//return "Valor não correspondente.";


            }

        }

         $sql = sprintf($this->update,  $plan['unimed'],
                                        $plan['prontomed'],
                                        $plan['saudeVida'],
                                        $plan['promed'],
                                        $plan['outros'],
                                        $anunRef);

        if($this->runQuery($sql)){

        } else {
            echo "Não foi possível atualizar os dados do plano de saúde.";
        }

    }

    #retorna quantidade de anuncio por plano aceito
    public function qtdAnunPla($pesquisa,$bairro = "", $formPag = "", $facilidades = "", $plano = ""){


         $arrayPla = array ("plano_saude_unimed","plano_saude_prontomed","plano_saude_saudevida","plano_saude_promed","plano_saude_outros");
         $arrayRetorno = array( "plano_saude_unimed"=>'',
                                "plano_saude_prontomed"=>'',
                                "plano_saude_saudevida"=>'',
                                "plano_saude_promed"=>'',
                                "plano_saude_outros"=>'');


        $objAnun = new AnuncioDAO();
        $pesquisa = $objAnun->BuscPrep($pesquisa);

        for($i = 0; $i < count($arrayPla); $i++){

            $sql = "SELECT COUNT(*) FROM Plano_saude
            INNER JOIN Anuncio ON Plano_saude.plano_saude_anuncio_ref = Anuncio.anuncio_id
            INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
            INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
            INNER JOIN Endereco ON Anuncio.anuncio_endereco = Endereco.endereco_id
            INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
            INNER JOIN Facilidades ON Facilidades.facilidades_anuncio_ref = Anuncio.anuncio_id
            WHERE {$arrayPla[$i]} = 1 AND ";

            $sql .= $objAnun->likeGeneretor($pesquisa);

            if (isset($bairro) && !empty($bairro) && $bairro != 'null'){

                #realiza consulta filtrando a contagem também por bairros, realizando a contagem de facilidades de acordo com o bairro selecionado.
                $arrayBairros = explode(',',$bairro);

                $sql .= "AND ( ";

                for($cont = 0; $cont < count($arrayBairros); $cont++){

                    $sql .= " Endereco.endereco_bairro = '{$arrayBairros[$cont]}' ";

                    if (($cont + 1) != count($arrayBairros)) {
                        $sql .= " OR ";
                    }

                }

                $sql .= " ) ";


            }




            #adiciona as formar de pagamento como obrigatórias no retorno, se tiver sido setada.
            if (isset($formPag) && !empty($formPag) &&  $formPag != 'null') {

                $arrayFpag = explode(',',$formPag);

                $sql .= " AND ( ";

                for ($b = 0; $b < count($arrayFpag); $b++) {

                    switch ($arrayFpag[$b]) {

                        case "boleto"           :
                            $sql .= " Forma_pagamento.forma_pag_boleto = 1 ";
                            break;
                        case "credito"          :
                            $sql .= " Forma_pagamento.forma_pag_credito = 1 ";
                            break;
                        case "debito"           :
                            $sql .= " Forma_pagamento.forma_pag_debito = 1 ";
                            break;
                        case "vale alimentação" :
                            $sql .= " Forma_pagamento.forma_pag_vale_alimentacao = 1 ";
                            break;
                        case "cheque"           :
                            $sql .= " Forma_pagamento.forma_pag_cheque = 1 ";
                            break;
                        case "dinheiro"         :
                            $sql .= " Forma_pagamento.forma_pag_dinheiro = 1 ";
                            break;
                        case "outrosFormPag"           :
                            $sql .= " Forma_pagamento.forma_pag_outros_formPag = 1 ";
                            break;
                        default:
                            ;

                    }

                    #adiciona o AND até antes da penultima iteração
                    if ($b < count($arrayFpag) - 1) {

                        $sql .= " AND ";

                    }

                }

                $sql .= " ) ";
            }



            #adiciona as facilidades no where
            if (isset($facilidades) && !empty($facilidades) && $facilidades != 'null') {

                $arrayfac = explode(',',$facilidades);

                $sql .= " AND ( ";

                for ($a = 0; $a < count($arrayfac); $a++) {

                    switch ($arrayfac[$a]) {

                        case "wifi":
                            $sql .= " Facilidades.facilidades_wifii = 1 ";
                            break;
                        case "reserva":
                            $sql .= " Facilidades.facilidades_reservar = 1 ";
                            break;
                        case "animais":
                            $sql .= " Facilidades.facilidades_permite_animais  = 1 ";
                            break;
                        case "cupons":
                            $sql .= " Facilidades.facilidades_cupons_desconto = 1 ";
                            break;
                        case "estacionamento":
                            $sql .= " Facilidades.facilidades_estacionamento = 1 ";
                            break;
                        case "seguranca":
                            $sql .= " Facilidades.facilidades_seguranca = 1 ";
                            break;
                        case "acessibilidades":
                            $sql .= " Facilidades.facilidades_acessibilidade = 1 ";
                            break;
                        case "arCondicionado":
                            $sql .= " Facilidades.facilidades_ar_condicionado = 1 ";
                            break;
                        case "delivery":
                            $sql .= " Facilidades.facilidades_delivery = 1 ";
                            break;
                        case "criancas":
                            $sql .= " Facilidades.facilidades_criancas = 1 ";
                            break;
                        default:
                            ;

                    }

                    #adiciona o AND até antes da penultima iteração
                    if ($a < count($arrayfac) - 1) {

                        $sql .= " AND ";

                    }

                }

                $sql .= " ) ";

            }


            #adiciona os planos de saude caso se tratar de uma pesquisa na área da saúde.
            if (isset($plano) && !empty($plano) && $plano != 'null') {


                $arrayPlan = explode(',',$plano);

                $sql .= " AND ";

                for ($c = 0; $c < count($arrayPlan); $c++) {

                    switch ($arrayPlan[$c]) {

                        case "unimed":
                            $sql .= " Plano_saude.plano_saude_unimed = 1 ";
                            break;
                        case "saudeVida":
                            $sql .= " Plano_saude.plano_saude_saudevida = 1 ";
                            break;
                        case "prontomed":
                            $sql .= " Plano_saude.plano_saude_prontomed = 1 ";
                            break;
                        case "promed":
                            $sql .= " Plano_saude.plano_saude_promed  = 1 ";
                            break;
                        case "outros":
                            $sql .= " Plano_saude.plano_saude_outros = 1 ";
                            break;

                        default:
                            ;

                    }

                    #adiciona o AND até antes da penultima iteração
                    if ($c < count($arrayPlan) - 1) {

                        $sql .= " AND ";

                    }

                }


            }





            $qtd = $this->runSelect($sql);


            $arrayRetorno[$arrayPla[$i]] = $qtd[0]['COUNT(*)'];
        }


        echo json_encode($arrayRetorno);

    }

}