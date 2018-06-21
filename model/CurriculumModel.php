<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 09:30
 */

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class CurriculumModel extends ConnectionFactory{

    private $curriculum_id,
            $curriculum_cliente_ref,
            $curriculum_nome,
            $curriculum_sexo,
            $curriculum_idade,
            $curriculum_endereco_ref,
            $curriculum_area_atuacao,
            $curriculum_descricao,
            $curriculum_escolaridade,
            $curriculum_habilitacao,
            $curriculum_foto,
            $curriculum_tel_cel,
            $curriculum_tel_fixo,
            $curriculum_email,
            $curriculum_nacionalidade,
            $curriculum_estado_civil,
            $curriculum_cargo,
            $curriculum_nome_empresa,
            $curriculum_atividades_realizadas,
            $curriculum_data_admissao,
            $curriculum_data_demissao,
            $curriculum_observacoes,
            $curriculum_facebook,
            $curriculum_lattes,
            $curriculum_linkedin;

    /**
     * @return mixed
     */
    public function getCurriculumNacionalidade()
    {
        return $this->curriculum_nacionalidade;
    }

    /**
     * @param mixed $curriculum_nacionalidade
     */
    public function setCurriculumNacionalidade($curriculum_nacionalidade)
    {
        $this->curriculum_nacionalidade = $curriculum_nacionalidade;
    }

    /**
     * @return mixed
     */
    public function getCurriculumEstadoCivil()
    {
        return $this->curriculum_estado_civil;
    }

    /**
     * @param mixed $curriculum_estado_civil
     */
    public function setCurriculumEstadoCivil($curriculum_estado_civil)
    {
        $this->curriculum_estado_civil = $curriculum_estado_civil;
    }

    /**
     * @return mixed
     */
    public function getCurriculumNomeEmpresa()
    {
        return $this->curriculum_nome_empresa;
    }

    /**
     * @param mixed $curriculum_nome_empresa
     */
    public function setCurriculumNomeEmpresa($curriculum_nome_empresa)
    {
        $this->curriculum_nome_empresa = $curriculum_nome_empresa;
    }



    /**
     * @return mixed
     */
    public function getCurriculumCargo()
    {
        return $this->curriculum_cargo;
    }

    /**
     * @param mixed $curriculum_cargo
     */
    public function setCurriculumCargo($curriculum_cargo)
    {
        $this->curriculum_cargo = $curriculum_cargo;
    }

    /**
     * @return mixed
     */
    public function getCurriculumAtividadesRealizadas()
    {
        return $this->curriculum_atividades_realizadas;
    }

    /**
     * @param mixed $curriculum_atividades_realizadas
     */
    public function setCurriculumAtividadesRealizadas($curriculum_atividades_realizadas)
    {
        $this->curriculum_atividades_realizadas = $curriculum_atividades_realizadas;
    }

    /**
     * @return mixed
     */
    public function getCurriculumDataAdmissao()
    {
        return $this->curriculum_data_admissao;
    }

    /**
     * @param mixed $curriculum_data_admissao
     */
    public function setCurriculumDataAdmissao($curriculum_data_admissao)
    {
        $this->curriculum_data_admissao = $curriculum_data_admissao;
    }

    /**
     * @return mixed
     */
    public function getCurriculumDataDemissao()
    {
        return $this->curriculum_data_demissao;
    }

    /**
     * @param mixed $curriculum_data_demissao
     */
    public function setCurriculumDataDemissao($curriculum_data_demissao)
    {
        $this->curriculum_data_demissao = $curriculum_data_demissao;
    }

    /**
     * @return mixed
     */
    public function getCurriculumFacebook()
    {
        return $this->curriculum_facebook;
    }

    /**
     * @param mixed $curriculum_facebook
     */
    public function setCurriculumFacebook($curriculum_facebook)
    {
        $this->curriculum_facebook = $curriculum_facebook;
    }

    /**
     * @return mixed
     */
    public function getCurriculumObservacoes()
    {
        return $this->curriculum_observacoes;
    }

    /**
     * @param mixed $curriculum_observacoes
     */
    public function setCurriculumObservacoes($curriculum_observacoes)
    {
        $this->curriculum_observacoes = $curriculum_observacoes;
    }

    /**
     * @return mixed
     */
    public function getCurriculumLattes()
    {
        return $this->curriculum_lattes;
    }

    /**
     * @param mixed $curriculum_lattes
     */
    public function setCurriculumLattes($curriculum_lattes)
    {
        $this->curriculum_lattes = $curriculum_lattes;
    }

    /**
     * @return mixed
     */
    public function getCurriculumLinkedin()
    {
        return $this->curriculum_linkedin;
    }

    /**
     * @param mixed $curriculum_linkedin
     */
    public function setCurriculumLinkedin($curriculum_linkedin)
    {
        $this->curriculum_linkedin = $curriculum_linkedin;
    }

    /**
     * @return mixed
     */
    public function getCurriculumClienteRef()
    {
        return $this->curriculum_cliente_ref;
    }

    /**
     * @param mixed $curriculum_cliente_ref
     */
    public function setCurriculumClienteRef($curriculum_cliente_ref)
    {
        $this->curriculum_cliente_ref = $curriculum_cliente_ref;
    }


    /**
     * @return mixed
     */
    public function getCurriculumId()
    {
        return $this->curriculum_id;
    }

    /**
     * @param mixed $curriculum_id
     */
    public function setCurriculumId($curriculum_id)
    {
        $this->curriculum_id = $curriculum_id;
    }

    /**
     * @return mixed
     */
    public function getCurriculumNome()
    {
        return $this->curriculum_nome;
    }

    /**
     * @param mixed $curriculum_nome
     */
    public function setCurriculumNome($curriculum_nome)
    {
        $this->curriculum_nome = $curriculum_nome;
    }

    /**
     * @return mixed
     */
    public function getCurriculumSexo()
    {
        return $this->curriculum_sexo;
    }

    /**
     * @param mixed $curriculum_sexo
     */
    public function setCurriculumSexo($curriculum_sexo)
    {
        $this->curriculum_sexo = $curriculum_sexo;
    }

    /**
     * @return mixed
     */
    public function getCurriculumIdade()
    {
        return $this->curriculum_idade;
    }

    /**
     * @param mixed $curriculum_idade
     */
    public function setCurriculumIdade($curriculum_idade)
    {
        $this->curriculum_idade = $curriculum_idade;
    }

    /**
     * @return mixed
     */
    public function getCurriculumEnderecoRef()
    {
        return $this->curriculum_endereco_ref;
    }

    /**
     * @param mixed $curriculum_endereco_ref
     */
    public function setCurriculumEnderecoRef($curriculum_endereco_ref)
    {
        $this->curriculum_endereco_ref = $curriculum_endereco_ref;
    }

    /**
     * @return mixed
     */
    public function getCurriculumAreaAtuacao()
    {
        return $this->curriculum_area_atuacao;
    }

    /**
     * @param mixed $curriculum_area_atuacao
     */
    public function setCurriculumAreaAtuacao($curriculum_area_atuacao)
    {
        $this->curriculum_area_atuacao = $curriculum_area_atuacao;
    }

    /**
     * @return mixed
     */
    public function getCurriculumDescricao()
    {
        return $this->curriculum_descricao;
    }

    /**
     * @param mixed $curriculum_descricao
     */
    public function setCurriculumDescricao($curriculum_descricao)
    {
        $this->curriculum_descricao = $curriculum_descricao;
    }

    /**
     * @return mixed
     */
    public function getCurriculumEscolaridade()
    {
        return $this->curriculum_escolaridade;
    }

    /**
     * @param mixed $curriculum_escolaridade
     */
    public function setCurriculumEscolaridade($curriculum_escolaridade)
    {
        $this->curriculum_escolaridade = $curriculum_escolaridade;
    }

    /**
     * @return mixed
     */
    public function getCurriculumHabilitacao()
    {
        return $this->curriculum_habilitacao;
    }

    /**
     * @param mixed $curriculum_habilitacao
     */
    public function setCurriculumHabilitacao($curriculum_habilitacao)
    {
        $this->curriculum_habilitacao = $curriculum_habilitacao;
    }

    /**
     * @return mixed
     */
    public function getCurriculumFoto()
    {
        return $this->curriculum_foto;
    }

    /**
     * @param mixed $curriculum_foto
     */
    public function setCurriculumFoto($curriculum_foto)
    {
        $this->curriculum_foto = $curriculum_foto;
    }

    /**
     * @return mixed
     */
    public function getCurriculumTelCel()
    {
        return $this->curriculum_tel_cel;
    }

    /**
     * @param mixed $curriculum_tel_cel
     */
    public function setCurriculumTelCel($curriculum_tel_cel)
    {
        $this->curriculum_tel_cel = $curriculum_tel_cel;
    }

    /**
     * @return mixed
     */
    public function getCurriculumTelFixo()
    {
        return $this->curriculum_tel_fixo;
    }

    /**
     * @param mixed $curriculum_tel_fixo
     */
    public function setCurriculumTelFixo($curriculum_tel_fixo)
    {
        $this->curriculum_tel_fixo = $curriculum_tel_fixo;
    }

    /**
     * @return mixed
     */
    public function getCurriculumEmail()
    {
        return $this->curriculum_email;
    }

    /**
     * @param mixed $curriculum_email
     */
    public function setCurriculumEmail($curriculum_email)
    {
        $this->curriculum_email = $curriculum_email;
    }



}