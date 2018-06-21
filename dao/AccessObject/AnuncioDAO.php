<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 09/09/15
 * Time: 19:25
 */

/*
 *
 * FOI CRIADO UM CAMPO DATA_ATIVACAO, DEVERÁ SER INPLEMENTADO NESTA CLASSE UM MÉTODO DE UPDATE ESPECIFICO PARA SETAR A DATA ATUAL QUANDO FOR TROCADO O ANUNCIO PARA ATIVO, ESSE UPDATE ESPECIFICO SERÁ REQUISITADO POR VÁRIOS MÉTODOS DE CRON DA CLASSE CONTROLESTATUSANUNCIO.
 */


include_once 'model/AnuncioModel.php';
include_once 'dao/AccessObject/StatusAnuncioDAO.php';


class AnuncioDAO extends AnuncioModel {

    private $insert = "INSERT INTO Anuncio (anuncio_cliente_ref,
                                            anuncio_titulo,
                                            anuncio_descricao,
                                            anuncio_endereco,
                                            anuncio_categoria,
                                            anuncio_tel_fixo,
                                            anuncio_tel_cel,
                                            anuncio_email,
                                            anuncio_status,
                                            anuncio_data_ativacao,
                                            anuncio_breve_descricao,
                                            anuncio_whats,
                        anuncio_pacote)
                        VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",
        $update ="UPDATE Anuncio SET anuncio_titulo = '%s', anuncio_descricao = '%s', anuncio_categoria = '%s', anuncio_tel_fixo = '%s', anuncio_tel_cel = '%s', anuncio_email = '%s', anuncio_breve_descricao = '%s', anuncio_whats = '%s' WHERE   anuncio_cliente_ref = '%s' AND anuncio_id = '%s'",
        $result,
        $arrayStatusId,
        $arrayConvert,
        $pontArtPrep,
        $artPrepText = "",
        $artPrepArray,
        $keyWords;


    #método para persistir anuncio na base de dados.
    public function anuncioPersist($cliente_ref, $titulo, $descricao, $endereco_ref, $categoria, $telFixo, $telCel, $email, $descricaoBreve,$whats,$status = 1, $plano){

        $this->setAnuncioWhats($whats);
        $this->setAnuncioClienteRef($cliente_ref);
        $this->setAnuncioTitulo($titulo);
        $this->setAnuncioDescricao($descricao);
        $this->setAnuncioEndereco($endereco_ref);
        $this->setAnuncioCategoria($categoria);
        $this->setAnuncioTelFixo($telFixo);
        $this->setAnuncioTelCel($telCel);
        $this->setAnuncioEmail($email);
        $this->setAnuncioBreveDescricao($descricaoBreve);
        #por se tratar da primeira vez que o anuncio está sendo inserido na base de dados, este terá o prazo de pagamento.
        $this->setAnuncioStatus($status);
        #será setado a data e hora atual da ativação, pois o anuncio está recebendo o tipo de ativação default 6
        $this->setAnuncioDataAtivacao(date('Y-m-d'));


        $sql = sprintf($this->insert, $this->getAnuncioClienteRef(),
                      $this->getAnuncioTitulo(),
                      $this->getAnuncioDescricao(),
                      $this->getAnuncioEndereco(),
                      $this->getAnuncioCategoria(),
                      $this->getAnuncioTelFixo(),
                      $this->getAnuncioTelCel(),
                          $this->getAnuncioEmail(), 
                      $this->getAnuncioStatus(),
                      $this->getAnuncioDataAtivacao(),
                      $this->getAnuncioBreveDescricao(),
                          $this->getAnuncioWhats(),
                      $plano);

        if($this->runQuery($sql)){

            //echo "gravou";
        }

        else {
            echo "não gravou";
        }



    }

    #realiza update do anuncio
    public function anuncioUpdate($cliente_ref, $titulo, $descricao,$categoria, $telFixo, $telCel, $email, $descricaoBreve,$anunId,$whats){

        $this->setAnuncioWhats($whats);
        $this->setAnuncioClienteRef($cliente_ref);
        $this->setAnuncioTitulo($titulo);
        $this->setAnuncioDescricao($descricao);
        $this->setAnuncioCategoria($categoria);
        $this->setAnuncioTelFixo($telFixo);
        $this->setAnuncioTelCel($telCel);
        $this->setAnuncioEmail($email);
        $this->setAnuncioBreveDescricao($descricaoBreve);


        $sql = sprintf($this->update,$this->getAnuncioTitulo(), $this->getAnuncioDescricao(), $this->getAnuncioCategoria(), $this->getAnuncioTelFixo(), $this->getAnuncioTelCel(), $this->getAnuncioEmail(), $this->getAnuncioBreveDescricao(),$this->getAnuncioWhats(), $this->getAnuncioClienteRef(), $anunId);

        if($this->runQuery($sql)){

        } else {

            echo "Não foi possível realizar a atualização do Anuncio." . $sql;
        }



    }

    #realiza update no status do anuncio
    public function updateStatus($statusPag, $anunId){


        $this->setAnuncioId($anunId);
        $this->setAnuncioStatus($statusPag);

	//Realiza update do campo anuncio_pacote na tabela anuncios caso ocorra alguma alteração de status que não faça parte de alteraçoes gratuitas.
	//O pacote está sendo usado para auxiliar no controle de permissão.
	if($statusPag != '11' && $statusPag != '12' && $statusPag != '8' && $statusPag != '9'){

		$sql = "UPDATE Anuncio SET anuncio_status = '%s', anuncio_pacote = 'Premium' WHERE anuncio_id = '%s'";

	} else {

        	$sql = "UPDATE Anuncio SET anuncio_status = '%s' WHERE anuncio_id = '%s'";
	}

        $sql = sprintf($sql, $this->getAnuncioStatus(), $this->getAnuncioId());



        if($this->runQuery($sql)){

        } else {
            echo "Não foi possível atualizar o status.";
        }

    }


    #retorna o id do anuncio que atenda o where
    public function anuncioRef($usuario, $titulo, $categoria){

        #seleciona o maior registro que atenda os requisitos do where.
        $sql = "SELECT anuncio_id FROM Anuncio WHERE anuncio_cliente_ref = '{$usuario}' AND anuncio_titulo = '{$titulo}' AND anuncio_categoria = '{$categoria}'";

        $row = $this->runSelect($sql);

        if($row[0]['anuncio_id'] != ""){

            return $row[0]['anuncio_id'];

        } else {
            echo "Consulta não retornou nenhum ID para o Anuncio. <br/><br/>".$sql;
        }
    }




    #consulta o banco para verificar quantos anuncios o usuário logado na sessão possui.
    public function countAnuncio($idUser) {

        $sql = "SELECT anuncio_id FROM Anuncio WHERE anuncio_cliente_ref = {$idUser}";

        $row = $this->runSelect($sql);

        if(!empty($row[0]['anuncio_id'])){

            return count($row);

        } else {

            return 0;

        }

    }




    #metódo responsável por alterar o status juntamente setar a data atual deste update ESTE MÉTODO SERÁ BASTANTE CHAMADO PELA CLASSE CONTROLESTATUSANUNCIO
    public function statusUpdate($newStatus, $anuncioId){

        $sql = ""; //update na status_data_ativacao = date('Y-m-d') e anuncio_status =  $new Status

    }

    #método com polimorfismo
    /*
     * $tipoConsulta = Pode ser passado os valores "todos"(Retorna todos os registros que atendam) ou "especifico"(retorna apenas os especificos PS: por padrão retorna todos
     * $status consulta = pode receber os valores inativos ou busca ativos Ps: será verificado quais os valores tidos como ativo ou inativos na tabela de status, e só será consultado os valores que "batem" no array de valores passados como argumetno, sendo desconsiderado os demais. Por default consulta todos os ativos, caso não for passado nenhum valor.
     * $IdStatusConsulta = recebe um array contendo os valores de tipos de status que deseja o retorno, Ps: Este array deve ser passado somente se for setado o $tipoCOnsulta como específico.
     */
    public function retornaStatusAnuncio($tipoConsulta = "todos", $statusCosulta = "online",  $arrayIdStatusArgumento) {


        #consulta com like buscando por indices ativos
        #CRIAR METODO NO STATUS_ANUNCIO PARA RETORNAR O ID CONFORME ATIVO OU INATIVO

        $objAnuncio = new StatusAnuncioDAO();


        #recebe os valores de acordo com o que foi passado como argumento, podendo ser positivo ou negativo.
        if ($statusCosulta === "online" || $statusCosulta === "inativo") {
            #caso acessar é porque foi passado um dos dois valores aceitos como argumento.
            $this->arrayStatusId = $objAnuncio->retornaRegStatus($statusCosulta);


        } else {

            echo "Valor passado como argumento não corresponde a ativo ou inativo, favos informar 0 ou 1";
        }


        #verifica qual o tipo de consulta será realizado. A opção todos, não terá a comparação para encontrar os valores iquais entres os arrays.
        if ($tipoConsulta == "todos") {

            //lógica para consultar todos os elementos
            $sql = "SELECT * FROM Anuncio WHERE ";

            for ($i = 0; $i < count($this->arrayStatusId); $i++) {

                $sql .= "anuncio_status = " . $this->arrayStatusId[$i]['status_anuncio_id'];//estamos trabalhando com arrays associativos.

                #se $i + 1 for iqual ao tamanho total do array, significa que a proxima iteração será a ultima.
                if (($i + 1) != count($this->arrayStatusId)) {

                    $sql .= " OR ";

                } else {

                    #Na ultima iteração recebe o ';'
                    $sql .= ";";
                }

            }

            #no específico ocorre a comparação entre vetores.
        } else if ($tipoConsulta === "especifico") {


            #verifica se o array está setado e não está vazio
            // if(isset($arrayIdStatusArgumento) && !empty($arrayIdStatusArgumento)){


            #converter array de associativo para comum
            for ($i = 0; $i < count($this->arrayStatusId); $i++) {

                //$this->arrayConvert =
                //  echo "Valores:" . $this->arrayStatusId[$i]['status_anuncio_id'] . "<br/>";

                $this->arrayConvert[$i] = $this->arrayStatusId[$i]['status_anuncio_id'];

            }


            #retorna um array contendo os valores em comum entre o array retornado de arrayStatusId e o array passado como argumento para o método.
            $this->result = array_intersect($arrayIdStatusArgumento, $this->arrayConvert);

            foreach($this->result as $valor){
                echo "Valores em comum entre os dois vetores: " . $valor . "<br/>";
            }



            #consulta os anuncios especificos ativos
            $sql = "SELECT * FROM Anuncio WHERE ";

            for ($i = 0; $i < count($this->result); $i++) {

                $sql .= "anuncio_status = " . $this->result[$i];

                #se $i + 1 for iqual ao tamanho total do array, significa que a proxima iteração será a ultima.
                if (($i + 1) != count($this->result)) {
                    $sql .= " OR ";
                } else {
                    #Na ultima iteração recebe o ';'
                    $sql .= ";";
                }

            }

            //}

        }

        else {
            echo "valor passado não corresponde a nenhum tipo de consulta, favor informar (todos) ou (especifico)";
        }

        $row = $this->runSelect($sql);

        return $row;


    }

    #retorna todos os anuncios que estão com estado inativo
    #método que retorna o cálculo de dias restantes para expiração de acordo com o status
    public function calcDataExpiracao($anuncioId){


        $sql = ""; //select no status atual e data_ativacao

        /*
         * switch($row['anuncio_status']){
         *
         *      LEMBRANDO QUE SERÁ CHAMADO ESTE MÉTODO APENAS PARA STATUS ATIVOS
         *      case: 1  data_ativacao + dataAutal == 365?
         *      case: 2  data_ativacao + dataAutal == 6 meses?
         *      case: 3 data_ativacao + dataAutal == 8 dias?
         * }
         */
    }


    #retorna os anuncios ativos para serem exibidos para o administrador.
    public function returnAnunForDash($idUsuario, $status = "online"){#deverá ser passado o valor de status que desejado.

        $objAnuncio = new StatusAnuncioDAO();
        #retorna o id dos registros que representam o estado online ou inativo, sendo o valor default sempre online.
        $this->arrayStatusId = $objAnuncio->retornaRegStatus($status);


        #faz a junção das tabelas relacionadas ao anuncio, verificando usuário e se vai retornar os anuncios ativos ou inativos.
        $sql = "SELECT * FROM Anuncio
                INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
                INNER JOIN Link  ON Anuncio.anuncio_id  = Link.link_anuncio_ref
                INNER JOIN Endereco  ON Anuncio.anuncio_endereco  = Endereco.endereco_id
                INNER JOIN Horario_funcionamento  ON Anuncio.anuncio_id  = Horario_funcionamento.horario_func_anuncio_ref
                INNER JOIN Cont_views ON Anuncio.anuncio_id = Cont_views.cont_views_anuncio_ref
                INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
                INNER JOIN Facilidades ON Anuncio.anuncio_id = Facilidades.facilidades_anuncio_ref
                WHERE Anuncio.anuncio_cliente_ref = {$idUsuario} AND Anuncio.anuncio_excluido = 0 AND (";


        #verifica se os argumentos foram passados com sucesso. Somemte se os argumentos estiverem corretos que será executado a consulta.
        if(!empty($idUsuario) && ($status === "online" || $status === "inativo")){

            for ($i = 0; $i < count($this->arrayStatusId); $i++) {

                $sql .= " Anuncio.anuncio_status = " . $this->arrayStatusId[$i]['status_anuncio_id']; //estamos trabalhando com arrays associativos.

                #se $i + 1 for iqual ao tamanho total do array, significa que a proxima iteração será a ultima.
                if (($i + 1) != count($this->arrayStatusId)) {
                    $sql .= " OR ";
                } else {
                    #Na ultima iteração recebe o ';'
                    $sql .= ") ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC;";
                }

            }



            #caso ocorrer tudo certo retorna a visualização da tabela.
            if($row = $this->runSelect($sql)){


                return $row;

            } else {

                // echo "A consulta não retonou dados para o inner join curriculo " . $sql;
            }

        } else {

            //    echo "Favor verificar os agumentos passados";

        }

    } #encerra returnAnunForDash

    #retorna todos os anuncios online
    public function returnAnuncioAll($status = "online"){

        $objAnuncio = new StatusAnuncioDAO();
        #retorna o id dos registros que representam o estado online ou inativo, sendo o valor default sempre online.
        $this->arrayStatusId = $objAnuncio->retornaRegStatus($status);


        #faz a junção das tabelas relacionadas ao anuncio, verificando usuário e se vai retornar os anuncios ativos ou inativos.
        $sql = "SELECT * FROM Anuncio
                INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
                INNER JOIN Link  ON Anuncio.anuncio_id  = Link.link_anuncio_ref
                INNER JOIN Endereco  ON Anuncio.anuncio_endereco  = Endereco.endereco_id
                INNER JOIN Horario_funcionamento ON Anuncio.anuncio_id  = Horario_funcionamento.horario_func_anuncio_ref
                INNER JOIN Cont_views ON Anuncio.anuncio_id = Cont_views.cont_views_anuncio_ref
                INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
                INNER JOIN Facilidades ON Anuncio.anuncio_id = Facilidades.facilidades_anuncio_ref
                INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                WHERE Anuncio.anuncio_excluido = 0 AND (";


        #verifica se os argumentos foram passados com sucesso. Somemte se os argumentos estiverem corretos que será executado a consulta.
        if($status === "online" || $status === "inativo"){

            for ($i = 0; $i < count($this->arrayStatusId); $i++) {

                $sql .= " Anuncio.anuncio_status = " . $this->arrayStatusId[$i]['status_anuncio_id'];//estamos trabalhando com arrays associativos.

                #se $i + 1 for iqual ao tamanho total do array, significa que a proxima iteração será a ultima.
                if (($i + 1) != count($this->arrayStatusId)) {
                    $sql .= " OR ";
                } else {
                    #Na ultima iteração recebe o ';'
                    $sql .= ") ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC;";
                }

            }

            #caso ocorrer tudo certo retorna a visualização da tabela.
            if($row = $this->runSelect($sql)){


                return $row;

            } else {

                // echo "A consulta não retonou dados para o inner join curriculo " . $sql;
            }

        } else {

            //    echo "Favor verificar os agumentos passados";

        }


    } //encerra returnAnuncioAll


    #retorna pesquisa user
    #laboratório - pesquisa sistema. PS: $arrayFilter recebera as palavras chaves para realizar a pesquisa.
    public function returnSearch($arrayFilter,$bai,$limit,$consulta){
        # Se a consulta tiver vazia executa a consulta SQL.
        if($consulta === ""){

            $sql = "SELECT * FROM Anuncio
                    INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
                    INNER JOIN Link  ON Anuncio.anuncio_id  = Link.link_anuncio_ref
                    INNER JOIN Endereco  ON Anuncio.anuncio_endereco  = Endereco.endereco_id
                    INNER JOIN Horario_funcionamento  ON Anuncio.anuncio_id  = Horario_funcionamento.horario_func_anuncio_ref
                    INNER JOIN Cont_views ON Anuncio.anuncio_id = Cont_views.cont_views_anuncio_ref
                    INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
                    INNER JOIN Facilidades ON Anuncio.anuncio_id = Facilidades.facilidades_anuncio_ref
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                    WHERE (Anuncio.anuncio_titulo LIKE '%{$arrayFilter}%' OR Anuncio.anuncio_descricao LIKE '%$arrayFilter}%' OR Anuncio.anuncio_breve_descricao LIKE '%{$arrayFilter}%' OR Sub_categoria.sub_categoria_descricao LIKE '%{$arrayFilter}%' OR Categoria.tipo_categoria_descricao LIKE '%{$arrayFilter}%') ";
            #no inner acima, o registro do id da subcategoria na tabela anuncio igualou com a tabela subcategoria, por isso quando referenciamos 'sub_categoria_descricao' dá certinho

            //$sql .= $this->likeGeneretor($arrayFilter);

            #realiza verificação, caso o bairro seja setado, será adicionado um where na consulta, filtrando a pesquisa por bairros.
            if(!empty($bai) && $bai != "todos"){

                $sql .= " AND Endereco.endereco_bairro = '{$bai}' AND Anuncio.anuncio_excluido = 0 AND (Anuncio.anuncio_status = 4 OR Anuncio.anuncio_status = 11 OR Anuncio.anuncio_status = 3) ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC LIMIT {$limit};";


            } else {

                $sql .= " AND Anuncio.anuncio_excluido = 0 AND (Anuncio.anuncio_status = 4 OR Anuncio.anuncio_status = 11 OR Anuncio.anuncio_status = 3)  ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC LIMIT {$limit};";

            }

        } else {

            $sql = $consulta;
        }


        if($row = $this->runSelect($sql)){

            return $row;

        } else {

            echo $sql;
        }


    }


    #retorna a quantidade de elementos retornados na consulta de acordo com a pesquisa.
    public function returnSearchCount($arrayFilter,$bai,$consulta = ""){
        # Se a consulta tiver vazia executa a consulta SQL.
        if($consulta == ""){

            $sql = "SELECT * FROM Anuncio
                    INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
                    INNER JOIN Link  ON Anuncio.anuncio_id  = Link.link_anuncio_ref
                    INNER JOIN Endereco  ON Anuncio.anuncio_endereco  = Endereco.endereco_id
                    INNER JOIN Horario_funcionamento  ON Anuncio.anuncio_id  = Horario_funcionamento.horario_func_anuncio_ref
                    INNER JOIN Cont_views ON Anuncio.anuncio_id = Cont_views.cont_views_anuncio_ref
                    INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
                    INNER JOIN Facilidades ON Anuncio.anuncio_id = Facilidades.facilidades_anuncio_ref
                    INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                    INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                    WHERE (Anuncio.anuncio_titulo LIKE '%{$arrayFilter}%' OR Anuncio.anuncio_descricao LIKE '%{$arrayFilter}%' OR Anuncio.anuncio_breve_descricao LIKE '%{$arrayFilter}%' OR Sub_categoria.sub_categoria_descricao LIKE '%{$arrayFilter}%' OR Categoria.tipo_categoria_descricao LIKE '%{$arrayFilter}%') ";
            #no inner acima, o registro do id da subcategoria na tabela anuncio igualou com a tabela subcategoria, por isso quando referenciamos 'sub_categoria_descricao' dá certinho

            //$sql .= $this->likeGeneretor($arrayFilter);

            #realiza verificação, caso o bairro seja setado, será adicionado um where na consulta, filtrando a pesquisa por bairros.
            if(!empty($bai) && $bai != "todos"){

                $sql .= " AND Endereco.endereco_bairro = '{$bai}' AND Anuncio.anuncio_excluido = 0 AND (Anuncio.anuncio_status = 4 OR Anuncio.anuncio_status = 11 OR Anuncio.anuncio_status = 3) ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC";


            } else {

                $sql .= " AND Anuncio.anuncio_excluido = 0 AND (Anuncio.anuncio_status = 4 OR Anuncio.anuncio_status = 11 OR Anuncio.anuncio_status = 3) ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC";

            }

        } else {

            $sql = $consulta;
        }

        if($row = $this->runSelect($sql)){
            echo count($row);
        } else {

        }


    }
    //////////////////////


    #prepara string da pesquisa antes de realizar qualquer consulta
    public function BuscPrep($busca){

        #Passa as palavras da string de pesquisa para caixa baixa, pois deve se adequar as palavras do arquivo.txt
        $this->keyWords  = strtolower($busca);

        $this->keyWords  = explode(' ',$this->keyWords);


        $this->artPrepText = "a,à,adeus,agora,aí,ainda,além,algo,algumas,alguns,ali,ano,anos,antes,ao,aos,apenas,apoio,após,aquela,aquelas,aquele,aqueles,aqui,aquilo,área,as,às,assim,até,atrás,através,baixo,bastante,bem,boa,boas,bom,bons,breve,cá,cada,catorze,cedo,cento,certamente,certeza,cima,cinco,coisa,com,como,conselho,contra,custa,da,dá,dão,daquela,daquelas,daquele,daqueles,dar,das,de,debaixo,demais,dentro,depois,desde,dessa,dessas,desse,desses,desta,destas,deste,destes,deve,deverá,dez,dezanove,dezasseis,dezassete,dezoito,dia,diante,diz,dizem,dizer,do,dois,dos,doze,duas,dúvida,e,é,ela,elas,ele,eles,em,embora,entre,era,és,essa,essas,esse,esses,esta,está,estão,estar,estas,estás,estava,este,estes,esteve,estive,estivemos,estiveram,estiveste,estivestes,estou,eu,exemplo,farão,falta,favor,faz,fazeis,fazem,fazemos,fazer,fazes,fez,fim,final,foi,fomos,for,foram,forma,foste,fostes,fui,geral,grande,grandes,grupo,há,hoje,hora,horas,isso,isto,já,lá,lado,local,logo,longe,lugar,maior,maioria,mais,mal,mas,máximo,me,meio,menor,menos,mês,meses,meu,meus,mil,minha,minhas,momento,muito,muitos,na,nada,não,naquela,naquelas,naquele,naqueles,nas,nem,nenhuma,nessa,nessas,nesse,nesses,nesta,nestas,neste,nestes,nível,no,noite,nome,nos,nós,nossa,nossas,nosso,nossos,nova,novas,nove,novo,novos,num,numa,número,nunca,o,obra,obrigada,obrigado,oitava,oitavo,oito,onde,ontem,onze,os,ou,outra,outras,outro,outros,para,parece,parte,partir,paucas,pela,pelas,pelo,pelos,perto,pode,pôde,podem,poder,põe,põem,ponto,pontos,por,porque,porquê,posição,possível,possivelmente,posso,pouca,pouco,poucos,primeira,primeiras,primeiro,primeiros,própria,próprias,próprio,próprios,próxima,próximas,próximo,próximos,puderam,quais,qual,quando,quanto,quarta,quarto,quatro,que,quê,quem,quer,quereis,querem,queremas,queres,quero,questâo,quinta,quinto,quinze,relação,sabe,sabem,são,se,segunda,segundo,sei,seis,sem,sempre,ser,seria,sete,sétima,sétimo,seu,seus,sexta,sexto,sim,sistema,sob,sobre,sois,somos,sou,sua,suas,tal,talvez,também,tanta,tantas,tanto,tão,tarde,te,tem,têm,temos,tendes,tenho,tens,ter,terceira,terceiro,teu,teus,teve,tive,tivemos,tiveram,tiveste,tivestes,toda,todas,todo,todos,trabalho,trás,treze,tu,tua,tuas,tudo,um,uma,umas,uns,vai,vais,vão,vários,vem,vêm,vens,ver,vez,vezes,viagem,vindo,vinte,você,vocês,vos,vós,vossa,vossas,vosso,vossos,zero";

        #transforma a string recolhida do texto em array
        $this->artPrepArray = explode(',',$this->artPrepText);

        #retira as palavras de artigo e preposição da string de pesquisa do usuário.
        #PS: Para cada posição do array de pesquisa, sera executado outro laço no array de preposições
        for($i=0; $i < count($this->keyWords); $i++){

            for($j = 0; $j < count($this->artPrepArray); $j++){

                #compara se alguma palavra da "string de pesquiva" equivale a alguma palavra da lista de preposições.
                if( $this->keyWords[$i] == $this->artPrepArray[$j] ){

                    #caso verdadeiro exclui a posição em que a palavra se encontra no array de pesquisa feita pelo usuário.
                    unset($this->keyWords[$i]);

                    #atualiza quantidades de posição do array de pesquisa
                    $this->keyWords = array_values($this->keyWords);
                    #Decrementa a posição após a exclusão de uma posição.
                    //if($i>0){$i--;}
                }

            }

        }

        return $this->keyWords;

    }#encerra método buscPrep

    #gera os likes de acordo com as keywords
    public function likeGeneretor($keyWords){

        $sql = "";

        for($i = 0; $i < count($keyWords); $i++){

            $sql .= " (Anuncio.anuncio_titulo LIKE '%{$keyWords[$i]}%' OR Anuncio.anuncio_descricao LIKE '%{$keyWords[$i]}%' OR Anuncio.anuncio_breve_descricao LIKE '%{$keyWords[$i]}%' OR Sub_categoria.sub_categoria_descricao LIKE '%{$keyWords[$i]}%' OR Categoria.tipo_categoria_descricao LIKE '%{$keyWords[$i]}%') ";

            if (($i + 1) != count($keyWords)) {
                $sql .= " AND ";
            }

        }


        return $sql;
    }

    #retorna apenas a tabela anuncio sem o innerJoin
    public function selectAnuncio($anuncioId){

        $this->setAnuncioId($anuncioId);

        $sql = "SELECT * FROM Anuncio WHERE anuncio_id = %s";

        $sql = sprintf($sql, $this->getAnuncioId());

        // echo $sql;
        return $row = $this->runSelect($sql);

    }
    #retorna o anuncio de acordo com o Id passado como argumento.
    public function retornaAnuncioPorId($idAnuncio){

        #deu certinho com a adição da subcategoria e categoria no innerJoin
        $sql = "SELECT Anuncio.anuncio_id,Anuncio.anuncio_descricao,Anuncio.anuncio_media,Anuncio.anuncio_pacote,Anuncio.anuncio_status,Anuncio.anuncio_titulo,Anuncio.anuncio_email,Anuncio.anuncio_tel_fixo,Anuncio.anuncio_tel_cel,Anuncio.anuncio_whats,Anuncio.anuncio_categoria,Anuncio.anuncio_breve_descricao,Anuncio.anuncio_imagem_capa,Forma_pagamento.*,Link.*,Endereco.*,Horario_funcionamento.*,Cont_views.cont_views_anuncio_ref,Cont_views.cont_views_qtd_total,Plano_saude.*,Facilidades.*,Sub_categoria.sub_categoria_descricao,Sub_categoria.sub_categoria_cat_ref,Status_anuncio.*,Categoria.tipo_categoria_descricao FROM Anuncio
                INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
                INNER JOIN Link  ON Anuncio.anuncio_id  = Link.link_anuncio_ref
                INNER JOIN Endereco  ON Anuncio.anuncio_endereco  = Endereco.endereco_id
                INNER JOIN Horario_funcionamento  ON Anuncio.anuncio_id  = Horario_funcionamento.horario_func_anuncio_ref
                INNER JOIN Cont_views ON Anuncio.anuncio_id = Cont_views.cont_views_anuncio_ref
                INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
                INNER JOIN Facilidades ON Anuncio.anuncio_id = Facilidades.facilidades_anuncio_ref
                INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                INNER JOIN Status_anuncio ON Anuncio.anuncio_status = Status_anuncio.status_anuncio_id
                INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                WHERE Anuncio.anuncio_id = {$idAnuncio} AND Anuncio.anuncio_excluido = 0 ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC;";

		
        if($row = $this->runSelect($sql)){
            return $row;
        } else {
            return "não foi possível retornar a consulta de anuncio por id";
        }

    }

    #exclui o anuncio solicitado pelo usuário ()
    public function setExcluAnuncio($idAnuncio){

        # O valor 1 representa o TRUE, que no caso afirma que anuncio está excluído, sendo 0 para ativo.
        $sql = "UPDATE Anuncio SET anuncio_excluido = 1 WHERE anuncio_id = {$idAnuncio}";

        if($this->runQuery($sql)){
            return "excluído com sucesso.";
        }

    }


    #retorna as informaçoes de metaTags para o anuncio
    public function metaFace($anunRef){
	
	$sql = "SELECT Anuncio.anuncio_titulo,Anuncio.anuncio_breve_descricao,Anuncio.anuncio_descricao FROM Anuncio
		WHERE Anuncio.anuncio_id = '{$anunRef}'";
	if($row = $this->runSelect($sql)){
		return $row;
	} else {
	   // echo "Não foi possível retornar dados meta do face.".$sql;
	}
	
   }

   #retorna imagem de capa
   public function returnImgCapa($anunRef){

	$sql = "SELECT anuncio_imagem_capa FROM Anuncio WHERE anuncio_id = '{$anunRef}'";

	if($row = $this->runSelect($sql)){

	    	return $row[0]['anuncio_imagem_capa'];

	} else {

	}
   }

    #retorna json contendo os registro da tabela anuncio de acordo com o id
    public function retornaRegAnunId($idAnuncio){


        # O valor 1 representa o TRUE, que no caso afirma que anuncio está excluído, sendo 0 para ativo.
        $sql = "SELECT * FROM Anuncio WHERE anuncio_id = {$idAnuncio}";


        echo json_encode($row = $this->runSelect($sql));

    }

    #realiza select no bano de acordo com os requisitos recebidos pelo filtro.
    public function selectFilter($categoria, $arrayBairros, $arrayFormPag, $arrayFacilidades, $arrayPlano, $limit, $count = "not")
    {

        $sql = "SELECT * FROM Anuncio
                INNER JOIN Forma_pagamento ON Anuncio.anuncio_id = Forma_pagamento.forma_pag_anuncio_ref
                INNER JOIN Link  ON Anuncio.anuncio_id  = Link.link_anuncio_ref
                INNER JOIN Endereco  ON Anuncio.anuncio_endereco  = Endereco.endereco_id
                INNER JOIN Horario_funcionamento  ON Anuncio.anuncio_id  = Horario_funcionamento.horario_func_anuncio_ref
                INNER JOIN Cont_views ON Anuncio.anuncio_id = Cont_views.cont_views_anuncio_ref
                INNER JOIN Plano_saude ON Anuncio.anuncio_id = Plano_saude.plano_saude_anuncio_ref
                INNER JOIN Facilidades ON Anuncio.anuncio_id = Facilidades.facilidades_anuncio_ref
                INNER JOIN Sub_categoria ON Anuncio.anuncio_categoria = Sub_categoria.sub_categoria_id
                INNER JOIN Categoria ON Sub_categoria.sub_categoria_cat_ref = Categoria.tipo_categoria_id
                WHERE ";


        #se os valores foram setados e não estão vazios, adiciona os mesmos na cláusula WHERE
        if (isset($categoria) && !empty($categoria)) {

            #retorna somente registros que atendam a categoria marcada juntamente com as outras cláusulas concatenadas mais abaixo.
            $sql .= " (Anuncio.anuncio_titulo LIKE '{$categoria}%' OR Anuncio.anuncio_descricao LIKE '{$categoria}%' OR Anuncio.anuncio_breve_descricao LIKE '{$categoria}%' OR Sub_categoria.sub_categoria_descricao LIKE '{$categoria}%' OR Categoria.tipo_categoria_descricao LIKE '{$categoria}%') "; //verificar a necessidade de emendar com AND

        }

        #adiciona os bairros no where caso estes sejam selecionados.
        if (isset($arrayBairros) && !empty($arrayBairros)) {

            $sql .= " AND (";

            for ($i = 0; $i < count($arrayBairros); $i++) {

                $sql .= " Endereco.endereco_bairro = '{$arrayBairros[$i]}' ";

                #verificar penultima posição para não acrescentar o OR
                if ($i != count($arrayBairros) - 1) {
                    $sql .= " OR ";
                }

            }

            $sql .= " ) ";

        }

        #adiciona as formar de pagamento como obrigatórias no retorno, se tiver sido setada.
        if (isset($arrayFormPag) && !empty($arrayFormPag)) {

            $sql .= " AND ";

            for ($i = 0; $i < count($arrayFormPag); $i++) {

                switch ($arrayFormPag[$i]) {

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
                    case "outrosFormPag"    :
                        $sql .= " Forma_pagamento.forma_pag_outros_formPag = 1 ";
                        break;
                    default:
                        ;

                }

                #adiciona o AND até antes da penultima iteração
                if ($i < count($arrayFormPag) - 1) {

                    $sql .= " AND ";

                }

            }
        }

        #adiciona as facilidades no where
        if (isset($arrayFacilidades) && !empty($arrayFacilidades)) {

            $sql .= " AND ";

            for ($i = 0; $i < count($arrayFacilidades); $i++) {

                switch ($arrayFacilidades[$i]) {

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
                if ($i < count($arrayFacilidades) - 1) {

                    $sql .= " AND ";

                }

            }

        }

        #adiciona os planos de saude caso se tratar de uma pesquisa na área da saúde.
        if (isset($arrayPlano) && !empty($arrayPlano)) {

            $sql .= " AND ";

            for ($i = 0; $i < count($arrayPlano); $i++) {

                switch ($arrayPlano[$i]) {

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
                if ($i < count($arrayPlano) - 1) {

                    $sql .= " AND ";

                }

            }


        }
	
	   //Limita a exibição de anuncios online
	   $sql .= " AND Anuncio.anuncio_excluido = 0 AND (Anuncio.anuncio_status = 4 OR Anuncio.anuncio_status = 11 OR Anuncio.anuncio_status = 3) ORDER BY Anuncio.anuncio_titulo ASC, Anuncio.anuncio_id ASC ";


        #caso não for realizar a contagem, retornar apenas o sql
        if($count == "not"){

            #adiciona o limite de quantidade de exibição.
            $sql .= " LIMIT {$limit}";

            echo $sql;

        } else {


            #realiza select no banco de dados
            if($row = $this->runSelect($sql)){

                echo count($row);

            } else {

                echo "A pesquisa não retornou nenhum resiltado.";

            }

        }


    }

    #retorna o cliente do anuncio passado como argumento
    public function returnCliForAnun($idAnun){

        $sql = "SELECT anuncio_cliente_ref FROM Anuncio WHERE anuncio_id = {$idAnun}";

        $row = $this->runSelect($sql);

        echo json_encode($row);
    }

    #retornar status de pagamento de acordo com o id, o atributo tipo define se o retorno será em json ou valor sem codificação do json.
    public function returnStatusPg($id,$tipe = 'json'){

        $sql = "SELECT anuncio_status FROM Anuncio WHERE anuncio_id = '{$id}'";

        if($row = $this->runSelect($sql)){

            if($tipe == 'json'){

                echo json_encode($row);

            } else {

                return $row[0]['anuncio_status'];
            }



        } else{

            echo "erro ao retornar statusPG";
        }

    }

	
       #retorna qual o pacote está vinculado ao anuncio.
       public function returnPackage($id,$tipe = 'json'){

        $sql = "SELECT anuncio_pacote FROM Anuncio WHERE anuncio_id = '{$id}'";

        if($row = $this->runSelect($sql)){

            if($tipe == 'json'){

                echo json_encode($row);

            } else {

                return $row[0]['anuncio_pacote'];
            }



        } else{

            echo "erro ao retornar statusPG";
        }

    }

    #verifica se já existe um nome na base de dados
    public function titleVerify($title){

	$sql = "SELECT * FROM Anuncio WHERE anuncio_titulo = '{$title}'";

	if($title == ""){

		echo 3;

	} else {

		 
	$row = $this->runSelect($sql);
        

            if(count($row) > 0){

		echo 0;
                
		
            } else {
		
		echo 1;
		
                
            }

	}

       

      

    }


}#encerra classe anuncio


