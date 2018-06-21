<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 15/01/16
 * Time: 22:20
 */

include_once 'model/FacilidadesModel.php';
include_once 'dao/AccessObject/AnuncioDAO.php';

class FacilidadesDAO extends FacilidadesModel {

    private $insert = "INSERT INTO  Facilidades (
                                    facilidades_anuncio_ref,
                                    facilidades_estacionamento,
                                    facilidades_seguranca,
                                    facilidades_acessibilidade,
                                    facilidades_ar_condicionado,
                                    facilidades_wifii,
                                    facilidades_reservar,
                                    facilidades_permite_animais,
                                    facilidades_cupons_desconto,
                                    facilidades_criancas,
                                    facilidades_delivery) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",


            $update = "UPDATE Facilidades SET   facilidades_estacionamento = '%s',
                                         facilidades_seguranca = '%s',
                                         facilidades_acessibilidade = '%s',
                                         facilidades_ar_condicionado = '%s',
                                         facilidades_wifii = '%s',
                                         facilidades_reservar = '%s',
                                         facilidades_permite_animais = '%s',
                                         facilidades_cupons_desconto = '%s',
                                         facilidades_criancas = '%s',
                                         facilidades_delivery = '%s'
                                         WHERE facilidades_id = %s";

    #insere os dados de facilidades oferecidas na base de dados de acordo com id do anuncio passado como argumento.
    public function insertFacilidades($arrayFacilidades, $anunRef){

        $this->setFacilidadesAnuncioRef($anunRef);


        for($i=0 ; $i < count($arrayFacilidades); $i++){

            switch($arrayFacilidades[$i]){

                case "estacionamento"        : $this->setFacilidadesEstacionamento(1);break;
                case "seguranca"             : $this->setFacilidadesSeguranca(1);break;
                case "acessibilidades"       : $this->setFacilidadesAcessibilidade(1);break;
                case "arCondicionado"        : $this->setFacilidadesArCondicionado(1);break;
                case "wifi"                  : $this->setFacilidadesWifii(1);break;
                case "reserva"               : $this->setFacilidadesReservar(1);break;
                case "animais"               : $this->setFacilidadesPermiteAnimais(1);break;
                case "cupons"                : $this->setFacilidadesCuponsDesconto(1);break;
                case "criancas"              : $this->setFacilidadesCriancas(1);break;
                case "delivery"              : $this->setFacilidadesDelivery(1);break;

                default:  ;//return "Valor não correspondente.";


            }

        }



        $sql = sprintf($this->insert,   $this->getFacilidadesAnuncioRef(),
                                        $this->getFacilidadesEstacionamento(),
                                        $this->getFacilidadesSeguranca(),
                                        $this->getFacilidadesAcessibilidade(),
                                        $this->getFacilidadesArCondicionado(),
                                        $this->getFacilidadesWifii(),
                                        $this->getFacilidadesReservar(),
                                        $this->getFacilidadesPermiteAnimais(),
                                        $this->getFacilidadesCuponsDesconto(),
                                        $this->getFacilidadesCriancas(),
                                        $this->getFacilidadesDelivery());

        if($this->runQuery($sql)){

          //  echo "gravou as facilidades!";

        } else {
            echo "Não foi possível retornar dados.";
        }


    }

    #atualiza as facilidades
    public function facilidadesUpdate($arrayFacilidades, $faciRef){

        $facili = array("esta"=>0,"segu"=>0,"acess"=>0,"ar"=>0,"wifi"=>0,"reserva"=>0,"animais"=>0,"cupons"=>0,"criancas"=>0,"delivery"=>0);

        for($i=0 ; $i < count($arrayFacilidades); $i++){

            switch($arrayFacilidades[$i]){

                case "estacionamento"        : $facili['esta'] = 1;break;
                case "seguranca"             : $facili['segu'] = 1;break;
                case "acessibilidades"       : $facili['acess'] = 1;break;
                case "arCondicionado"        : $facili['ar'] = 1;break;
                case "wifi"                  : $facili['wifi'] = 1;break;
                case "reserva"               : $facili['reserva'] = 1;break;
                case "animais"               : $facili['animais'] = 1;break;
                case "cupons"                : $facili['cupons'] = 1;break;
                case "criancas"              : $facili['criancas'] = 1;break;
                case "delivery"              : $facili['delivery'] = 1;break;

                default:  ;//return "Valor não correspondente.";


            }

        }

        $sql = sprintf($this->update, $facili['esta'],
                                      $facili['segu'],
                                      $facili['acess'],
                                      $facili['ar'],
                                      $facili['wifi'],
                                      $facili['reserva'],
                                      $facili['animais'],
                                      $facili['cupons'],
                                      $facili['criancas'],
                                      $facili['delivery'],
                                      $faciRef);

        if($this->runQuery($sql)){

          //  echo $sql;

        } else {
            echo "Não foi possível atualizar as facilidades";
        }


    }

    #retorna a quantidade de anuncio vinculado a cada facilidade
    public function anunQtdFaci($pesquisa,$bairro = "", $formPag = "", $facilidades = "", $plano = ""){


       // echo "kkk(". $formPag.")--".$facilidades."--".$plano."--".$bairro."kkkk";



         $arrayFacili = array ( 'facilidades_estacionamento',
                                'facilidades_seguranca',
                                'facilidades_acessibilidade',
                                'facilidades_ar_condicionado',
                                'facilidades_wifii',
                                'facilidades_reservar',
                                'facilidades_permite_animais',
                                'facilidades_cupons_desconto',
                                'facilidades_criancas',
                                'facilidades_delivery');

        $arrayRetorno = array ( 'facilidades_estacionamento'=>'',
            'facilidades_seguranca'=>'',
            'facilidades_acessibilidade'=>'',
            'facilidades_ar_condicionado'=>'',
            'facilidades_wifii'=>'',
            'facilidades_reservar'=>'',
            'facilidades_permite_animais'=>'',
            'facilidades_cupons_desconto'=>'',
            'facilidades_criancas'=>'',
            'facilidades_delivery'=>'');

        $objAnun = new AnuncioDAO();
        $pesquisa = $objAnun->BuscPrep($pesquisa);
        for($i = 0; $i < count($arrayFacili); $i++){

            $sql = "SELECT COUNT(*) FROM Facilidades
                    INNER JOIN Anuncio ON Facilidades.facilidades_anuncio_ref = Anuncio.anuncio_id
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                    INNER JOIN Endereco ON Anuncio.anuncio_endereco = Endereco.endereco_id
                    INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
                    INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
                    WHERE {$arrayFacili[$i]} = 1 AND ";

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

              //  echo $sql . "<br/><br/><br/><br/><br/><br/>";

           $arrayRetorno[$arrayFacili[$i]] = $qtd[0]['COUNT(*)'];

        }


        echo json_encode($arrayRetorno);

    }



}