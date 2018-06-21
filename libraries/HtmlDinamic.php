<?php


class HtmlDinamic {



    #método responsável por chamar o método que gera os options dinâmicos. (Colocar ele em uma classe mais específica, pois ele não é utilizado apenas no curriculo)
    public function geraOption()
    {

        $objSubCategoria = new SubCategoriaDAO();
        $objCategoria = new CategoriaDAO();
        $objClienteDAO = new ClienteDAO();
        $aut = AutenticadorConfig::instanciar();
        $objCurriDAO = new CurriculumDAO();

        #retorna os dados do curriculo do usuário logado na sessão, para poder ocorre a comparação de qual permanecerá checado dinamicamente.
        $dadosCurriculo  = $objCurriDAO->retornaCurriculo($objClienteDAO->returnIdUserSession($aut->pegar_usuario()));

        # recebendo todos os ddos das tabelas.
        $this->rowSubCategoria = $objSubCategoria->selectAllSubCategoria();
        $this->rowCategoria = $objCategoria->selectAllCategoria();

        $this->categorias = "
                     <fieldset class='selec'>
                     <legend class='leg'>Categoria</legend>
                    <select name='cCategoria'>";

        for ($i = 0; $i < count($this->rowCategoria); $i++) {

            $this->categorias .= "<optgroup label='{$this->rowCategoria[$i]['tipo_categoria_descricao']}'>" . $this->rowCategoria[$i]['tipo_categoria_descricao'] . " </optgroup>";

            for ($j = 0; $j < count($this->rowSubCategoria); $j++) {


                if ($this->rowCategoria[$i]['tipo_categoria_id'] == $this->rowSubCategoria[$j]['sub_categoria_cat_ref']) {

                    #Se o usuário possuir curriculo, e o valor que possui no curriculo for igual ao value do option, seta o option como selected.
                    if($dadosCurriculo[0]["curriculum_area_atuacao"] == $this->rowSubCategoria[$j]['sub_categoria_descricao']){

                        $this->categorias .= "<option value='{$this->rowSubCategoria[$j]['sub_categoria_descricao']}' selected>" . $this->rowSubCategoria[$j]['sub_categoria_descricao'] . "</option>";

                    } else {
                        #caso contrário gera o option sem a opção select.
                        $this->categorias .= "<option value='{$this->rowSubCategoria[$j]['sub_categoria_descricao']}'>" . $this->rowSubCategoria[$j]['sub_categoria_descricao'] . "</option>";
                    }



                }

            }//encerra segundo for

        }//encerra primeiro for


        $this->categorias .= "</select></fieldset>";

        return $this->categorias;

    }//encerra geraOption


    #Gera options de horários dinâmicamente, transferir este metodo para uma classe mais específica, pois esse imput irá atender não somente o currículo.
    public function geraOptionHorario(){

        $objHorarioFunc = new HorarioFuncionamentoDAO();
        #recebe array associativo contendo os horários cadastrado na tabela específica.
        $this->rowHorario = $objHorarioFunc->retornaHorarios();


        $this->htmlHorario = "<fieldset class='selec'>
                     <legend class='leg'>Categoria</legend>
                    <select name='cCategoria'>
                    <optgroup label='Horário'> Horário </optgroup>
                    ";
        for($cont = 0; $cont < count($this->rowHorario); $cont++){


            $this->htmlHorario .= "<option value='{$this->rowHorario[$cont]['sub_categoria_descricao']}' selected>" . $this->rowHorario[$cont]['sub_categoria_descricao'] . "</option>";


        }

        $this->htmlHorario .= "</select> </fieldset>";

    }



}