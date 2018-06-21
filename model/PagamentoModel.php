<?php


include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class PagamentoModel extends ConnectionFactory {

private $Pag_id,
        $Pag_date,
        $Pag_code_transation,
        $Pag_reference, //referencia do produto setada por nós mesmos
        $Pag_transaction_type, //Será usado um (Transação por computador)
        $Pag_status, //Numeros referentes ao status 1 - Aguardando pagamento 2 - Em análise 3 - Paga 4 - Disponível 5- Em disputa 6 - Devolvida 7 - Cancelada
        $Pag_cancelation_source, //Origem do cancelamento, sendo INTERNAL - PagSeguro ou EXTERNAL - Banco ou operadora de cartão.
        $Pag_ultimo_evento, //Ultimo evento em que houve atualização no processo de um pagamento.
        $Pag_tipo_pagamento, //tipo do meio de pagamento usado. 1 - Cartão de crédito 2 - Boleto 3 - Débito online 4 - Saldo PagSeguro 5 - Oi paggo 7 - Depósito em conta
        $Pag_meio_cod, //Código que mostra o meio de pagamento, ex: 101	Cartão de crédito Visa. 102 Cartão de crédito MasterCard. 103 Cartão de crédito American Express.
        $Pag_valor_bruto, //valor bruto da transação
        $Pag_valor_desconto,
        $Pag_valor_taxas, // valor das taxas cobradas
        $Pag_data_credito, //Data que o crédito estará disponível para a empresa fornecedora. Presença: Presente apenas quando o status da transação for um dos seguintes valores: Paga (3), Disponível (4), Em disputa (5) ou Devolvida (6).
        $Pag_valor_extra, //Informa um valor extra que foi somado ou subtraído do valor pago pelo comprador. Este valor é especificado por você no pagamento e pode representar um valor que você quer cobrar separadamente do comprador ou um desconto que quer dar a ele
        $Pag_parcelas_cartao, //Quantidade de parcelas se parcelados com cartão.
        $Pag_qtd_itens,
        $Pag_item_identificacao, //Identifica o item da transação. Este identificador deve ser único por transação e é informado por você no fluxo de pagamento.
        $Pag_item_descricao,
        $Pag_valor_unitario,
        $Pag_qtd_item_unitario, //quantidade de cada item
        $Pag_email_comprador,
        $Pag_nome_comprador,
        $Pag_ddd_tel,
        $Pag_tel_comprador,
        $Pag_tipo_frete, //Ex: 1 - PAC 2 - SEDEX 3 - Não expecificado
        $Pag_custo_frete,
        $Pag_pais_frete,
        $Pag_estado_frete,
        $Pag_cidade_frete,
        $Pag_cep_frete,
        $Pag_bairro_frete,
        $Pag_rua_frete,
        $Pag_numero_frete,
        $Pag_complemento_frete,
        $Pag_anuncio_ref;

    /**
     * @return mixed
     */
    public function getPagAnuncioRef()
    {
        return $this->Pag_anuncio_ref;
    }

    /**
     * @param mixed $Pag_anuncio_ref
     */
    public function setPagAnuncioRef($Pag_anuncio_ref)
    {
        $this->Pag_anuncio_ref = $Pag_anuncio_ref;
    }

    /**
     * @return mixed
     */
    public function getPagId()
    {
        return $this->Pag_id;
    }

    /**
     * @param mixed $Pag_id
     */
    public function setPagId($Pag_id)
    {
        $this->Pag_id = $Pag_id;
    }

    /**
     * @return mixed
     */
    public function getPagDate()
    {
        return $this->Pag_date;
    }

    /**
     * @param mixed $Pag_date
     */
    public function setPagDate($Pag_date)
    {
        $this->Pag_date = $Pag_date;
    }

    /**
     * @return mixed
     */
    public function getPagCodeTransation()
    {
        return $this->Pag_code_transation;
    }

    /**
     * @param mixed $Pag_code_transation
     */
    public function setPagCodeTransation($Pag_code_transation)
    {
        $this->Pag_code_transation = $Pag_code_transation;
    }

    /**
     * @return mixed
     */
    public function getPagReference()
    {
        return $this->Pag_reference;
    }

    /**
     * @param mixed $Pag_reference
     */
    public function setPagReference($Pag_reference)
    {
        $this->Pag_reference = $Pag_reference;
    }

    /**
     * @return mixed
     */
    public function getPagTransactionType()
    {
        return $this->Pag_transaction_type;
    }

    /**
     * @param mixed $Pag_transaction_type
     */
    public function setPagTransactionType($Pag_transaction_type)
    {
        $this->Pag_transaction_type = $Pag_transaction_type;
    }

    /**
     * @return mixed
     */
    public function getPagStatus()
    {
        return $this->Pag_status;
    }

    /**
     * @param mixed $Pag_status
     */
    public function setPagStatus($Pag_status)
    {
        $this->Pag_status = $Pag_status;
    }

    /**
     * @return mixed
     */
    public function getPagCancelationSource()
    {
        return $this->Pag_cancelation_source;
    }

    /**
     * @param mixed $Pag_cancelation_source
     */
    public function setPagCancelationSource($Pag_cancelation_source)
    {
        $this->Pag_cancelation_source = $Pag_cancelation_source;
    }

    /**
     * @return mixed
     */
    public function getPagUltimoEvento()
    {
        return $this->Pag_ultimo_evento;
    }

    /**
     * @param mixed $Pag_ultimo_evento
     */
    public function setPagUltimoEvento($Pag_ultimo_evento)
    {
        $this->Pag_ultimo_evento = $Pag_ultimo_evento;
    }



    /**
     * @return mixed
     */
    public function getPagTipoPagamento()
    {
        return $this->Pag_tipo_pagamento;
    }

    /**
     * @param mixed $Pag_tipo_pagamento
     */
    public function setPagTipoPagamento($Pag_tipo_pagamento)
    {
        $this->Pag_tipo_pagamento = $Pag_tipo_pagamento;
    }

    /**
     * @return mixed
     */
    public function getPagMeioCod()
    {
        return $this->Pag_meio_cod;
    }

    /**
     * @param mixed $Pag_meio_cod
     */
    public function setPagMeioCod($Pag_meio_cod)
    {
        $this->Pag_meio_cod = $Pag_meio_cod;
    }

    /**
     * @return mixed
     */
    public function getPagValorBruto()
    {
        return $this->Pag_valor_bruto;
    }

    /**
     * @param mixed $Pag_valor_bruto
     */
    public function setPagValorBruto($Pag_valor_bruto)
    {
        $this->Pag_valor_bruto = $Pag_valor_bruto;
    }

    /**
     * @return mixed
     */
    public function getPagValorDesconto()
    {
        return $this->Pag_valor_desconto;
    }

    /**
     * @param mixed $Pag_valor_desconto
     */
    public function setPagValorDesconto($Pag_valor_desconto)
    {
        $this->Pag_valor_desconto = $Pag_valor_desconto;
    }

    /**
     * @return mixed
     */
    public function getPagValorTaxas()
    {
        return $this->Pag_valor_taxas;
    }

    /**
     * @param mixed $Pag_valor_taxas
     */
    public function setPagValorTaxas($Pag_valor_taxas)
    {
        $this->Pag_valor_taxas = $Pag_valor_taxas;
    }

    /**
     * @return mixed
     */
    public function getPagDataCredito()
    {
        return $this->Pag_data_credito;
    }

    /**
     * @param mixed $Pag_data_credito
     */
    public function setPagDataCredito($Pag_data_credito)
    {
        $this->Pag_data_credito = $Pag_data_credito;
    }

    /**
     * @return mixed
     */
    public function getPagValorExtra()
    {
        return $this->Pag_valor_extra;
    }

    /**
     * @param mixed $Pag_valor_extra
     */
    public function setPagValorExtra($Pag_valor_extra)
    {
        $this->Pag_valor_extra = $Pag_valor_extra;
    }

    /**
     * @return mixed
     */
    public function getPagParcelasCartao()
    {
        return $this->Pag_parcelas_cartao;
    }

    /**
     * @param mixed $Pag_parcelas_cartao
     */
    public function setPagParcelasCartao($Pag_parcelas_cartao)
    {
        $this->Pag_parcelas_cartao = $Pag_parcelas_cartao;
    }

    /**
     * @return mixed
     */
    public function getPagQtdItens()
    {
        return $this->Pag_qtd_itens;
    }

    /**
     * @param mixed $Pag_qtd_itens
     */
    public function setPagQtdItens($Pag_qtd_itens)
    {
        $this->Pag_qtd_itens = $Pag_qtd_itens;
    }

    /**
     * @return mixed
     */
    public function getPagItemIdentificacao()
    {
        return $this->Pag_item_identificacao;
    }

    /**
     * @param mixed $Pag_item_identificacao
     */
    public function setPagItemIdentificacao($Pag_item_identificacao)
    {
        $this->Pag_item_identificacao = $Pag_item_identificacao;
    }

    /**
     * @return mixed
     */
    public function getPagItemDescricao()
    {
        return $this->Pag_item_descricao;
    }

    /**
     * @param mixed $Pag_item_descricao
     */
    public function setPagItemDescricao($Pag_item_descricao)
    {
        $this->Pag_item_descricao = $Pag_item_descricao;
    }

    /**
     * @return mixed
     */
    public function getPagValorUnitario()
    {
        return $this->Pag_valor_unitario;
    }

    /**
     * @param mixed $Pag_valor_unitario
     */
    public function setPagValorUnitario($Pag_valor_unitario)
    {
        $this->Pag_valor_unitario = $Pag_valor_unitario;
    }

    /**
     * @return mixed
     */
    public function getPagQtdItemUnitario()
    {
        return $this->Pag_qtd_item_unitario;
    }

    /**
     * @param mixed $Pag_qtd_item_unitario
     */
    public function setPagQtdItemUnitario($Pag_qtd_item_unitario)
    {
        $this->Pag_qtd_item_unitario = $Pag_qtd_item_unitario;
    }

    /**
     * @return mixed
     */
    public function getPagEmailComprador()
    {
        return $this->Pag_email_comprador;
    }

    /**
     * @param mixed $Pag_email_comprador
     */
    public function setPagEmailComprador($Pag_email_comprador)
    {
        $this->Pag_email_comprador = $Pag_email_comprador;
    }

    /**
     * @return mixed
     */
    public function getPagNomeComprador()
    {
        return $this->Pag_nome_comprador;
    }

    /**
     * @param mixed $Pag_nome_comprador
     */
    public function setPagNomeComprador($Pag_nome_comprador)
    {
        $this->Pag_nome_comprador = $Pag_nome_comprador;
    }

    /**
     * @return mixed
     */
    public function getPagDddTel()
    {
        return $this->Pag_ddd_tel;
    }

    /**
     * @param mixed $Pag_ddd_tel
     */
    public function setPagDddTel($Pag_ddd_tel)
    {
        $this->Pag_ddd_tel = $Pag_ddd_tel;
    }

    /**
     * @return mixed
     */
    public function getPagTelComprador()
    {
        return $this->Pag_tel_comprador;
    }

    /**
     * @param mixed $Pag_tel_comprador
     */
    public function setPagTelComprador($Pag_tel_comprador)
    {
        $this->Pag_tel_comprador = $Pag_tel_comprador;
    }

    /**
     * @return mixed
     */
    public function getPagTipoFrete()
    {
        return $this->Pag_tipo_frete;
    }

    /**
     * @param mixed $Pag_tipo_frete
     */
    public function setPagTipoFrete($Pag_tipo_frete)
    {
        $this->Pag_tipo_frete = $Pag_tipo_frete;
    }

    /**
     * @return mixed
     */
    public function getPagCustoFrete()
    {
        return $this->Pag_custo_frete;
    }

    /**
     * @param mixed $Pag_custo_frete
     */
    public function setPagCustoFrete($Pag_custo_frete)
    {
        $this->Pag_custo_frete = $Pag_custo_frete;
    }

    /**
     * @return mixed
     */
    public function getPagPaisFrete()
    {
        return $this->Pag_pais_frete;
    }

    /**
     * @param mixed $Pag_pais_frete
     */
    public function setPagPaisFrete($Pag_pais_frete)
    {
        $this->Pag_pais_frete = $Pag_pais_frete;
    }

    /**
     * @return mixed
     */
    public function getPagEstadoFrete()
    {
        return $this->Pag_estado_frete;
    }

    /**
     * @param mixed $Pag_estado_frete
     */
    public function setPagEstadoFrete($Pag_estado_frete)
    {
        $this->Pag_estado_frete = $Pag_estado_frete;
    }

    /**
     * @return mixed
     */
    public function getPagCidadeFrete()
    {
        return $this->Pag_cidade_frete;
    }

    /**
     * @param mixed $Pag_cidade_frete
     */
    public function setPagCidadeFrete($Pag_cidade_frete)
    {
        $this->Pag_cidade_frete = $Pag_cidade_frete;
    }

    /**
     * @return mixed
     */
    public function getPagCepFrete()
    {
        return $this->Pag_cep_frete;
    }

    /**
     * @param mixed $Pag_cep_frete
     */
    public function setPagCepFrete($Pag_cep_frete)
    {
        $this->Pag_cep_frete = $Pag_cep_frete;
    }

    /**
     * @return mixed
     */
    public function getPagBairroFrete()
    {
        return $this->Pag_bairro_frete;
    }

    /**
     * @param mixed $Pag_bairro_frete
     */
    public function setPagBairroFrete($Pag_bairro_frete)
    {
        $this->Pag_bairro_frete = $Pag_bairro_frete;
    }

    /**
     * @return mixed
     */
    public function getPagRuaFrete()
    {
        return $this->Pag_rua_frete;
    }

    /**
     * @param mixed $Pag_rua_frete
     */
    public function setPagRuaFrete($Pag_rua_frete)
    {
        $this->Pag_rua_frete = $Pag_rua_frete;
    }

    /**
     * @return mixed
     */
    public function getPagNumeroFrete()
    {
        return $this->Pag_numero_frete;
    }

    /**
     * @param mixed $Pag_numero_frete
     */
    public function setPagNumeroFrete($Pag_numero_frete)
    {
        $this->Pag_numero_frete = $Pag_numero_frete;
    }

    /**
     * @return mixed
     */
    public function getPagComplementoFrete()
    {
        return $this->Pag_complemento_frete;
    }

    /**
     * @param mixed $Pag_complemento_frete
     */
    public function setPagComplementoFrete($Pag_complemento_frete)
    {
        $this->Pag_complemento_frete = $Pag_complemento_frete;
    }



}
