<?php

include_once 'model/PagamentoModel.php';
include_once 'dao/AccessObject/AnuncioDAO.php';

class PagamentoDAO extends PagamentoModel {


    private $insert = "INSERT INTO Pagamentos ( Pag_date,
                                                Pag_code_transation,
                                                Pag_reference,
                                                Pag_transaction_type,
                                                Pag_status,
                                                Pag_cancelation_source,
                                                Pag_ultimo_evento,
                                                Pag_tipo_pagamento,
                                                Pag_meio_cod,
                                                Pag_valor_bruto,
                                                Pag_valor_desconto,
                                                Pag_valor_taxas,
                                                Pag_data_credito,
                                                Pag_valor_extra,
                                                Pag_parcelas_cartao,
                                                Pag_qtd_itens,
                                                Pag_item_identificacao,
                                                Pag_item_descricao,
                                                Pag_valor_unitario,
                                                Pag_qtd_item_unitario,
                                                Pag_email_comprador,
                                                Pag_nome_comprador,
                                                Pag_ddd_tel,
                                                Pag_tel_comprador,
                                                Pag_tipo_frete,
                                                Pag_custo_frete,
                                                Pag_pais_frete,
                                                Pag_estado_frete,
                                                Pag_cidade_frete,
                                                Pag_cep_frete,
                                                Pag_bairro_frete,
                                                Pag_rua_frete,
                                                Pag_numero_frete,
                                                Pag_complemento_frete)
                                                VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
            $select,
            $update = "UPDATE Pagamentos SET    Pag_date = '%s',
						Pag_code_transation = '%s',
                                                Pag_reference = '%s',
                                                Pag_transaction_type = '%s',
                                                Pag_status = '%s',
                                                Pag_cancelation_source = '%s',
                                                Pag_ultimo_evento = '%s',
                                                Pag_tipo_pagamento = '%s',
                                                Pag_meio_cod = '%s',
                                                Pag_valor_bruto = '%s',
                                                Pag_valor_desconto = '%s',
                                                Pag_valor_taxas = '%s',
                                                Pag_data_credito = '%s',
                                                Pag_valor_extra = '%s',
                                                Pag_parcelas_cartao = '%s',
                                                Pag_qtd_itens = '%s',
                                                Pag_item_identificacao = '%s',
                                                Pag_item_descricao = '%s',
                                                Pag_valor_unitario = '%s',
                                                Pag_qtd_item_unitario = '%s',
                                                Pag_email_comprador = '%s',
                                                Pag_nome_comprador = '%s',
                                                Pag_ddd_tel = '%s',
                                                Pag_tel_comprador = '%s',
                                                Pag_tipo_frete = '%s',
                                                Pag_custo_frete = '%s',
                                                Pag_pais_frete = '%s',
                                                Pag_estado_frete = '%s',
                                                Pag_cidade_frete = '%s',
                                                Pag_cep_frete = '%s',
                                                Pag_bairro_frete = '%s',
                                                Pag_rua_frete = '%s',
                                                Pag_numero_frete = '%s',
                                                Pag_complemento_frete = '%s' WHERE Pag_code_transation = '%s'",
            $delete;


    #persiste o pagamento na base de dados
    public function pagPersist($Pag_date,
                               $Pag_code_transation,
                               $Pag_reference,
                               $Pag_transaction_type,
                               $Pag_status,
                               $Pag_cancelation_source,
                               $Pag_ultimo_evento,
                               $Pag_tipo_pagamento,
                               $Pag_meio_cod,
                               $Pag_valor_bruto,
                               $Pag_valor_desconto,
                               $Pag_valor_taxas,
                               $Pag_data_credito,
                               $Pag_valor_extra,
                               $Pag_parcelas_cartao,
                               $Pag_qtd_itens,
                               $Pag_item_identificacao,
                               $Pag_item_descricao,
                               $Pag_valor_unitario,
                               $Pag_qtd_item_unitario,
                               $Pag_email_comprador,
                               $Pag_nome_comprador,
                               $Pag_ddd_tel,
                               $Pag_tel_comprador,
                               $Pag_tipo_frete,
                               $Pag_custo_frete,
                               $Pag_pais_frete,
                               $Pag_estado_frete,
                               $Pag_cidade_frete,
                               $Pag_cep_frete,
                               $Pag_bairro_frete,
                               $Pag_rua_frete,
                               $Pag_numero_frete,
                               $Pag_complemento_frete,
                               $Pag_anuncio_ref){

        $this->setPagDate($Pag_date);
        $this->setPagCodeTransation($Pag_code_transation);
        $this->setPagReference($Pag_reference);
        $this->setPagTransactionType($Pag_transaction_type);
        $this->setPagStatus($Pag_status);
        $this->setPagCancelationSource($Pag_cancelation_source);
        $this->setPagUltimoEvento($Pag_ultimo_evento);
        $this->setPagTipoPagamento($Pag_tipo_pagamento);
        $this->setPagMeioCod($Pag_meio_cod);
        $this->setPagValorBruto($Pag_valor_bruto);
        $this->setPagValorDesconto($Pag_valor_desconto);
        $this->setPagValorTaxas($Pag_valor_taxas);
        $this->setPagDataCredito($Pag_data_credito);
        $this->setPagValorExtra($Pag_valor_extra);
        $this->setPagParcelasCartao($Pag_parcelas_cartao);
        $this->setPagQtdItens($Pag_qtd_itens);
        $this->setPagItemIdentificacao($Pag_item_identificacao);
        $this->setPagItemDescricao($Pag_item_descricao);
        $this->setPagValorUnitario($Pag_valor_unitario);
        $this->setPagQtdItemUnitario($Pag_qtd_item_unitario);
        $this->setPagEmailComprador($Pag_email_comprador);
        $this->setPagNomeComprador($Pag_nome_comprador);
        $this->setPagDddTel($Pag_ddd_tel);
        $this->setPagTelComprador($Pag_tel_comprador);
        $this->setPagTipoFrete($Pag_tipo_frete);
        $this->setPagCustoFrete($Pag_custo_frete);
        $this->setPagPaisFrete($Pag_pais_frete);
        $this->setPagEstadoFrete($Pag_estado_frete);
        $this->setPagCidadeFrete($Pag_cidade_frete);
        $this->setPagCepFrete($Pag_cep_frete);
        $this->setPagBairroFrete($Pag_bairro_frete);
        $this->setPagRuaFrete($Pag_rua_frete);
        $this->setPagNumeroFrete($Pag_numero_frete);
        $this->setPagComplementoFrete($Pag_complemento_frete);
        $this->setPagAnuncioRef($Pag_anuncio_ref);


        $sql = sprintf($this->insert,$this->getPagDate(),
                        $this->getPagCodeTransation(),
                        $this->getPagReference(),
                        $this->getPagTransactionType(),
                        $this->getPagStatus(),
                        $this->getPagCancelationSource(),
                        $this->getPagUltimoEvento(),
                        $this->getPagTipoPagamento(),
                        $this->getPagMeioCod(),
                        $this->getPagValorBruto(),
                        $this->getPagValorDesconto(),
                        $this->getPagValorTaxas(),
                        $this->getPagDataCredito(),
                        $this->getPagValorExtra(),
                        $this->getPagParcelasCartao(),
                        $this->getPagQtdItens(),
                        $this->getPagItemIdentificacao(),
                        $this->getPagItemDescricao(),
                        $this->getPagValorUnitario(),
                        $this->getPagQtdItemUnitario(),
                        $this->getPagEmailComprador(),
                        $this->getPagNomeComprador(),
                        $this->getPagDddTel(),
                        $this->getPagTelComprador(),
                        $this->getPagTipoFrete(),
                        $this->getPagCustoFrete(),
                        $this->getPagPaisFrete(),
                        $this->getPagEstadoFrete(),
                        $this->getPagCidadeFrete(),
                        $this->getPagCepFrete(),
                        $this->getPagBairroFrete(),
                        $this->getPagRuaFrete(),
                        $this->getPagNumeroFrete(),
                        $this->getPagComplementoFrete(),
                        $this->getPagAnuncioRef());

        try {

            $this->runQuery($sql);


        } catch (Exception $e) {

            echo 'Exceção capturada: ',  $e->getMessage(), "\n";

        }


    }#encerra pagamentoPersist


    #verifica se o registro da compra já existe na base de dados. Retorna true caso positivo e false caso negativo.
    public function registerVerify($codeTransation){

        $sql = "SELECT COUNT(Pag_code_transation) FROM Pagamentos WHERE Pag_code_transation = '%s'";

        $sql = sprintf($sql, $codeTransation);

        try {

            $row = $this->runSelect($sql);

	

            if($row[0]['COUNT(Pag_code_transation)'] == 1){
                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {

            echo 'Exceção capturada: ',  $e->getMessage(), "\n";

        }


    }


    #verificar se realmente existe a necessidade de realizar updae em todos os atributos do registro.
    public function pagUpdate($Pag_date,
                              $Pag_code_transation,
                              $Pag_reference,
                              $Pag_transaction_type,
                              $Pag_status,
                              $Pag_cancelation_source,
                              $Pag_ultimo_evento,
                              $Pag_tipo_pagamento,
                              $Pag_meio_cod,
                              $Pag_valor_bruto,
                              $Pag_valor_desconto,
                              $Pag_valor_taxas,
                              $Pag_data_credito,
                              $Pag_valor_extra,
                              $Pag_parcelas_cartao,
                              $Pag_qtd_itens,
                              $Pag_item_identificacao,
                              $Pag_item_descricao,
                              $Pag_valor_unitario,
                              $Pag_qtd_item_unitario,
                              $Pag_email_comprador,
                              $Pag_nome_comprador,
                              $Pag_ddd_tel,
                              $Pag_tel_comprador,
                              $Pag_tipo_frete,
                              $Pag_custo_frete,
                              $Pag_pais_frete,
                              $Pag_estado_frete,
                              $Pag_cidade_frete,
                              $Pag_cep_frete,
                              $Pag_bairro_frete,
                              $Pag_rua_frete,
                              $Pag_numero_frete,
                              $Pag_complemento_frete,
                              $Pag_anuncio_ref){

        $this->setPagDate($Pag_date);
        $this->setPagCodeTransation($Pag_code_transation);
        $this->setPagReference($Pag_reference);
        $this->setPagTransactionType($Pag_transaction_type);
        $this->setPagStatus($Pag_status);
        $this->setPagCancelationSource($Pag_cancelation_source);
        $this->setPagUltimoEvento($Pag_ultimo_evento);
        $this->setPagTipoPagamento($Pag_tipo_pagamento);
        $this->setPagMeioCod($Pag_meio_cod);
        $this->setPagValorBruto($Pag_valor_bruto);
        $this->setPagValorDesconto($Pag_valor_desconto);
        $this->setPagValorTaxas($Pag_valor_taxas);
        $this->setPagDataCredito($Pag_data_credito);
        $this->setPagValorExtra($Pag_valor_extra);
        $this->setPagParcelasCartao($Pag_parcelas_cartao);
        $this->setPagQtdItens($Pag_qtd_itens);
        $this->setPagItemIdentificacao($Pag_item_identificacao);
        $this->setPagItemDescricao($Pag_item_descricao);
        $this->setPagValorUnitario($Pag_valor_unitario);
        $this->setPagQtdItemUnitario($Pag_qtd_item_unitario);
        $this->setPagEmailComprador($Pag_email_comprador);
        $this->setPagNomeComprador($Pag_nome_comprador);
        $this->setPagDddTel($Pag_ddd_tel);
        $this->setPagTelComprador($Pag_tel_comprador);
        $this->setPagTipoFrete($Pag_tipo_frete);
        $this->setPagCustoFrete($Pag_custo_frete);
        $this->setPagPaisFrete($Pag_pais_frete);
        $this->setPagEstadoFrete($Pag_estado_frete);
        $this->setPagCidadeFrete($Pag_cidade_frete);
        $this->setPagCepFrete($Pag_cep_frete);
        $this->setPagBairroFrete($Pag_bairro_frete);
        $this->setPagRuaFrete($Pag_rua_frete);
        $this->setPagNumeroFrete($Pag_numero_frete);
        $this->setPagComplementoFrete($Pag_complemento_frete);
        $this->setPagAnuncioRef($Pag_anuncio_ref);



        $sql = sprintf($this->update,$this->getPagDate(),
	    $this->getPagCodeTransation(),
            $this->getPagReference(),
            $this->getPagTransactionType(),
            $this->getPagStatus(),
            $this->getPagCancelationSource(),
            $this->getPagUltimoEvento(),
            $this->getPagTipoPagamento(),
            $this->getPagMeioCod(),
            $this->getPagValorBruto(),
            $this->getPagValorDesconto(),
            $this->getPagValorTaxas(),
            $this->getPagDataCredito(),
            $this->getPagValorExtra(),
            $this->getPagParcelasCartao(),
            $this->getPagQtdItens(),
            $this->getPagItemIdentificacao(),
            $this->getPagItemDescricao(),
            $this->getPagValorUnitario(),
            $this->getPagQtdItemUnitario(),
            $this->getPagEmailComprador(),
            $this->getPagNomeComprador(),
            $this->getPagDddTel(),
            $this->getPagTelComprador(),
            $this->getPagTipoFrete(),
            $this->getPagCustoFrete(),
            $this->getPagPaisFrete(),
            $this->getPagEstadoFrete(),
            $this->getPagCidadeFrete(),
            $this->getPagCepFrete(),
            $this->getPagBairroFrete(),
            $this->getPagRuaFrete(),
            $this->getPagNumeroFrete(),
            $this->getPagComplementoFrete(),
	    $this->getPagCodeTransation());

	// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo é aberto para ser escrito
$fp = fopen("logs/testeStatus.txt", "a");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, "Teste".$sql); 

// Fecha o arquivo
fclose($fp);


        try {

            $this->runQuery($sql);


        } catch (Exception $e) {

            echo 'Exceção capturada: ',  $e->getMessage(), "\n";

        }



    }#encerra update

}

















































