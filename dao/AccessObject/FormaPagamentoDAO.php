<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:26
 */

include_once 'model/FormaPagamentoModel.php';
include_once 'dao/AccessObject/AnuncioDAO.php';

class FormaPagamentoDAO extends FormaPagamentoModel{


    private $_insert = "INSERT INTO Forma_pagamento (forma_pag_visa,
                                                     forma_pag_master_card,
                                                     forma_pag_boleto,
                                                     forma_pag_cheque,
                                                     forma_pag_vale_alimentacao,
                                                     forma_pag_dinheiro,
                                                     forma_pag_credito,
                                                     forma_pag_debito,
                                                     forma_pag_american_express,
                                                     forma_pag_diner_club,
                                                     forma_pag_elo,
                                                     forma_pag_pagseguro,
                                                     forma_pag_paypal,
                                                     forma_pag_mercado_pago,
                                                     forma_pag_sodexo,
                                                     forma_pag_ticket_restaurant,
                                                     forma_pag_anuncio_ref,
                                                     forma_pag_outros_formPag,
                                                     forma_pag_outros_band
                                                      )
                        VALUE ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",

            $update = "UPDATE Forma_pagamento  SET forma_pag_boleto = %s,
                                                    forma_pag_credito = %s,
                                                    forma_pag_debito = %s,
                                                    forma_pag_vale_alimentacao = %s,
                                                    forma_pag_cheque = %s,
                                                    forma_pag_dinheiro = %s,
                                                    forma_pag_master_card = %s,
                                                    forma_pag_visa = %s,
                                                    forma_pag_american_express = %s,
                                                    forma_pag_diner_club = %s,
                                                    forma_pag_elo = %s,
                                                    forma_pag_pagseguro = %s,
                                                    forma_pag_paypal = %s,
                                                    forma_pag_mercado_pago =  %s,
                                                    forma_pag_sodexo = %s,
                                                    forma_pag_ticket_restaurant = %s,
                                                    forma_pag_outros_formPag = %s,
                                                    forma_pag_outros_band = %s
                                                    WHERE forma_pag_id = %s ";




    #persiste os dados da forma de pagamento
    public function formaPgPersist($arrayFormPagamento, $idRef){



        for($i=0 ; $i < count($arrayFormPagamento); $i++){

            switch($arrayFormPagamento[$i]){
                case "boleto"                   : $this->setFormaPagBoleto(1);break;
                case "credito"                  : $this->setFormaPagCredito(1);break;
                case "débito"                   : $this->setFormaPagDebito(1);break;
                case "vale alimentação"         : $this->setFormaPagValeAlimentacao(1);break;
                case "cheque"                   : $this->setFormaPagCheque(1);break;
                case "dinheiro"                 : $this->setFormaPagDinheiro(1);break;
                case "master"                   : $this->setFormaPagMasterCard(1);break;
                case "visa"                     : $this->setFormaPagVisa(1);break;
                case "american express"         : $this->setFormaPagAmericanExpress(1);break;
                case "diner club internacional" : $this->setFormaPagDinerClub(1);break;
                case "elo"                      : $this->setFormaPagElo(1);break;
                case "pagseguro"                : $this->setFormaPagPagseguro(1);break;
                case "pay pal"                  : $this->setFormaPagPaypal(1);break;
                case "mercado pago"             : $this->setFormaPagMercadoPago(1);break;
                case "sodexo"                   : $this->setFormaPagSodexo(1);break;
                case "ticket restaurant"        : $this->setFormaPagTicketRestaurant(1);break;
                case "outrosFormPag"            : $this->setFormaPagOutrosFormPag(1);break;
                case "outrosBand"               : $this->setFormaPagOutrosBand(1);break;
                default:  ;//return "Valor não correspondente.";


            }

        }

        $this->setFormaPagAnuncioRef($idRef);

        $sql = sprintf($this->_insert,  $this->getFormaPagVisa(),
                                        $this->getFormaPagMasterCard(),
                                        $this->getFormaPagBoleto(),
                                        $this->getFormaPagCheque(),
                                        $this->getFormaPagValeAlimentacao(),
                                        $this->getFormaPagDinheiro(),
                                        $this->getFormaPagCredito(),
                                        $this->getFormaPagDebito(),
                                        $this->getFormaPagAmericanExpress(),
                                        $this->getFormaPagDinerClub(),
                                        $this->getFormaPagElo(),
                                        $this->getFormaPagPagseguro(),
                                        $this->getFormaPagPaypal(),
                                        $this->getFormaPagMercadoPago(),
                                        $this->getFormaPagSodexo(),
                                        $this->getFormaPagTicketRestaurant(),
                                        $this->getFormaPagAnuncioRef(),
                                        $this->getFormaPagOutrosFormPag(),
                                        $this->getFormaPagOutrosBand());
        if($this->runQuery($sql)){
          //  echo "forma de pagamento persistida com sucesso.";
        } else {
            echo "Houve um erro ao persistir a forma de pagamento.";
        }

    }

    #atualiza a forma de pagamento
    public function formaPgUpdate($arrayFormPagamento, $pagRef){

            $check = array("boleto"=> 0,"credito"=>0,"débito"=>0,"vale alimentação"=>0,"cheque"=>0,"dinheiro"=>0,"master"=>0,"visa"=>0,"american express"=>0,"diner"=>0,"elo"=>0,
                           "pagseguro"=>0,"pay"=>0,"mercado"=>0,"sodexo"=>0,"ticket"=>0,"outPag"=>0,"outBan"=>0);


        for($i=0 ; $i < count($arrayFormPagamento); $i++){

            switch($arrayFormPagamento[$i]){
                case "boleto"                   : $check['boleto'] = 1;break;
                case "credito"                  : $check['credito'] = 1;break;
                case "débito"                   : $check['débito'] = 1;break;
                case "vale alimentação"         : $check['vale alimentação'] = 1;break;
                case "cheque"                   : $check['cheque'] = 1;break;
                case "dinheiro"                 : $check['dinheiro'] = 1;break;
                case "master"                   : $check['master'] = 1;break;
                case "visa"                     : $check['visa'] = 1;break;
                case "american express"         : $check['american express'] = 1;break;
                case "diner club internacional" : $check['diner'] = 1;break;
                case "elo"                      : $check['elo'] = 1;break;
                case "pagseguro"                : $check['pagseguro'] = 1;break;
                case "pay pal"                  : $check['pay'] = 1;break;
                case "mercado pago"             : $check['mercado'] = 1;break;
                case "sodexo"                   : $check['sodexo'] = 1;break;
                case "ticket restaurant"        : $check['ticket'] = 1;break;
                case "outrosFormPag"            : $check['outPag'] = 1;break;
                case "outrosBand"               : $check['outBan'] = 1;break;
                default:  ;//return "Valor não correspondente.";


            }

        }


        $sql = sprintf($this->update,
            $check['boleto'],
            $check['credito'],
            $check['débito'],
            $check['vale alimentação'],
            $check['cheque'],
            $check['dinheiro'],
            $check['master'],
            $check['visa'],
            $check['american express'],
            $check['diner'],
            $check['elo'],
            $check['pagseguro'],
            $check['pay'],
            $check['mercado'],
            $check['sodexo'],
            $check['ticket'],
            $check['outPag'],
            $check['outBan'],
            $pagRef);


        if($this->runQuery($sql)){

           //echo $sql;

        } else {

            echo "Não foi possível atualizar as formas de pagamento." . $sql;

        }


    }

    #retorna a quantidade de anuncios vinculados as formas de pagamentos aceitas
    public function qtdAnunPag($pesquisa,$bairro = "", $formPag = "", $facilidades = "", $plano = ""){



        $arrayPag = array ("forma_pag_boleto","forma_pag_credito","forma_pag_debito","forma_pag_vale_alimentacao","forma_pag_cheque","forma_pag_dinheiro","forma_pag_outros_formPag");

        $arrayRetorno = array(  "forma_pag_boleto" => '',
                                "forma_pag_credito" => '',
                                "forma_pag_debito" => '',
                                "forma_pag_vale_alimentacao" => '',
                                "forma_pag_cheque" => '',
                                "forma_pag_dinheiro" => '',
                                "forma_pag_outros_formPag" => '');

        $objAnun = new AnuncioDAO();
        $pesquisa = $objAnun->BuscPrep($pesquisa);

        for($i = 0; $i < count($arrayPag); $i++){

            $sql = "SELECT COUNT(*) FROM Forma_pagamento
                    INNER JOIN Anuncio ON Forma_pagamento.forma_pag_anuncio_ref = Anuncio.anuncio_id
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                    INNER JOIN Endereco ON Anuncio.anuncio_endereco = Endereco.endereco_id
                    INNER JOIN Facilidades ON Facilidades.facilidades_anuncio_ref = Anuncio.anuncio_id
                    INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
            WHERE {$arrayPag[$i]} = 1 AND ";

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

            //echo $sql . "<br/><br/><br/><br/><br/>";

            $qtd = $this->runSelect($sql);

            $arrayRetorno[$arrayPag[$i]] = $qtd[0]['COUNT(*)'];

        }

        echo json_encode($arrayRetorno);



    }




}