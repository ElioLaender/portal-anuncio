<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 15/09/15
 * Time: 21:54
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class AnuncioModel extends ConnectionFactory{

    private
            $anuncio_id,
            $anuncio_cliente_ref,
            $anuncio_titulo,
            $anuncio_descricao,
            $anuncio_endereco,
            $anuncio_link_ref,
            $anuncio_categoria,
            $anuncio_tel_fixo,
            $anuncio_tel_cel,
            $anuncio_email,
            $anuncio_data_insert,
            $anuncio_status,
            $anuncio_data_ativacao,
            $anuncio_breve_descricao,
            $anuncio_whats;

    /**
     * @return mixed
     */
    public function getAnuncioWhats()
    {
        return $this->anuncio_whats;
    }

    /**
     * @param mixed $anuncio_whats
     */
    public function setAnuncioWhats($anuncio_whats)
    {
        $this->anuncio_whats = $anuncio_whats;
    }

    /**
     * @return mixed
     */
    public function getAnuncioId()
    {
        return $this->anuncio_id;
    }

    /**
     * @param mixed $anuncio_id
     */
    public function setAnuncioId($anuncio_id)
    {
        $this->anuncio_id = $anuncio_id;
    }

    /**
     * @return mixed
     */
    public function getAnuncioBreveDescricao()
    {
        return $this->anuncio_breve_descricao;
    }

    /**
     * @param mixed $anuncio_breve_descricao
     */
    public function setAnuncioBreveDescricao($anuncio_breve_descricao)
    {
        $this->anuncio_breve_descricao = $anuncio_breve_descricao;
    }

    /**
     * @return mixed
     */
    public function getAnuncioDataAtivacao()
    {
        return $this->anuncio_data_ativacao;
    }

    /**
     * @param mixed $anuncio_data_ativacao
     */
    public function setAnuncioDataAtivacao($anuncio_data_ativacao)
    {
        $this->anuncio_data_ativacao = $anuncio_data_ativacao;
    }

    /**
     * @return mixed
     */
    public function getAnuncioStatus()
    {
        return $this->anuncio_status;
    }

    /**
     * @param mixed $anuncio_status
     */
    public function setAnuncioStatus($anuncio_status)
    {
        $this->anuncio_status = $anuncio_status;
    }

    /**
     * @return mixed
     */
    public function getAnuncioClienteRef()
    {
        return $this->anuncio_cliente_ref;
    }

    /**
     * @param mixed $anuncio_cliente_ref
     */
    public function setAnuncioClienteRef($anuncio_cliente_ref)
    {
        $this->anuncio_cliente_ref = $anuncio_cliente_ref;
    }

    /**
     * @return mixed
     */
    public function getAnuncioDescricao()
    {
        return $this->anuncio_descricao;
    }

    /**
     * @param mixed $anuncio_descricao
     */
    public function setAnuncioDescricao($anuncio_descricao)
    {
        $this->anuncio_descricao = $anuncio_descricao;
    }

    /**
     * @return mixed
     */
    public function getAnuncioTitulo()
    {
        return $this->anuncio_titulo;
    }

    /**
     * @param mixed $anuncio_titulo
     */
    public function setAnuncioTitulo($anuncio_titulo)
    {
        $this->anuncio_titulo = $anuncio_titulo;
    }

    /**
     * @return mixed
     */
    public function getAnuncioEndereco()
    {
        return $this->anuncio_endereco;
    }

    /**
     * @param mixed $anuncio_endereco
     */
    public function setAnuncioEndereco($anuncio_endereco)
    {
        $this->anuncio_endereco = $anuncio_endereco;
    }

    /**
     * @return mixed
     */
    public function getAnuncioLinkRef()
    {
        return $this->anuncio_link_ref;
    }

    /**
     * @param mixed $anuncio_link_ref
     */
    public function setAnuncioLinkRef($anuncio_link_ref)
    {
        $this->anuncio_link_ref = $anuncio_link_ref;
    }

    /**
     * @return mixed
     */
    public function getAnuncioCategoria()
    {
        return $this->anuncio_categoria;
    }

    /**
     * @param mixed $anuncio_categoria
     */
    public function setAnuncioCategoria($anuncio_categoria)
    {
        $this->anuncio_categoria = $anuncio_categoria;
    }

    /**
     * @return mixed
     */
    public function getAnuncioTelFixo()
    {
        return $this->anuncio_tel_fixo;
    }

    /**
     * @param mixed $anuncio_tel_fixo
     */
    public function setAnuncioTelFixo($anuncio_tel_fixo)
    {
        $this->anuncio_tel_fixo = $anuncio_tel_fixo;
    }

    /**
     * @return mixed
     */
    public function getAnuncioTelCel()
    {
        return $this->anuncio_tel_cel;
    }

    /**
     * @param mixed $anuncio_tel_cel
     */
    public function setAnuncioTelCel($anuncio_tel_cel)
    {
        $this->anuncio_tel_cel = $anuncio_tel_cel;
    }

    /**
     * @return mixed
     */
    public function getAnuncioEmail()
    {
        return $this->anuncio_email;
    }

    /**
     * @param mixed $anuncio_email
     */
    public function setAnuncioEmail($anuncio_email)
    {
        $this->anuncio_email = $anuncio_email;
    }

    /**
     * @return mixed
     */
    public function getAnuncioDataInsert()
    {
        return $this->anuncio_data_insert;
    }

    /**
     * @param mixed $anuncio_data_insert
     */
    public function setAnuncioDataInsert($anuncio_data_insert)
    {
        $this->anuncio_data_insert = $anuncio_data_insert;
    }


}
