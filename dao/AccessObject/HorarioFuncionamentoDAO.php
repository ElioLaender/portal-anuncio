<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 16/09/15
 * Time: 11:27
 */

include_once 'model/HorarioFuncionamentoModel.php';

class HorarioFuncionamentoDAO extends HorarioFuncionamentoModel{

    private $_insert = "INSERT INTO Horario_funcionamento (horario_func_semana_inicio,
                                                           horario_func_semana_termino,
                                                           horario_func_sabado_inicio,
                                                           horario_func_sabado_termino,
                                                           horario_func_domingo_inicio,
                                                           horario_func_domingo_termino,
                                                           horario_func_anuncio_ref

                                                           	) VALUES ('%s','%s','%s','%s','%s','%s','%s')",

            $_update = "UPDATE Horario_funcionamento SET horario_func_semana_inicio =   '%s',
                                                 horario_func_semana_termino =  '%s',
                                                 horario_func_sabado_inicio =   '%s',
                                                 horario_func_sabado_termino =  '%s',
                                                 horario_func_domingo_inicio =  '%s',
                                                 horario_func_domingo_termino = '%s' WHERE horario_func_id = %s";


    #persiste os dados de horário
    public function horarioPersist($semIni,$semTer,$sabIni,$sabTer,$domIni,$domTer,$anunRef){

        if($semIni == "06:00" && $semTer == "06:00"){
            $semIni = 0;
            $semTer = 0;
        }

        if($sabIni == "06:00" && $sabTer == "06:00"){
            $sabIni = 0;
            $sabTer = 0;
        }

        if($domIni == "06:00" && $domTer == "06:00"){
            $domIni = 0;
            $domTer = 0;
        }

        $this->setHorarioFuncSemanaInicio($semIni);
        $this->setHorarioFuncSemanaTermino($semTer);
        $this->setHorarioFuncSabadoInicio($sabIni);
        $this->setHorarioFuncSabadoTermino($sabTer);
        $this->setHorarioFuncDomingoInicio($domIni);
        $this->setHorarioFuncDomingoTermino($domTer);
        $this->setHorarioFuncAnuncioRef($anunRef);

        $sql = sprintf($this->_insert, $this->getHorarioFuncSemanaInicio(),
                                       $this->getHorarioFuncSemanaTermino(),
                                       $this->getHorarioFuncSabadoInicio(),
                                       $this->getHorarioFuncSabadoTermino(),
                                       $this->getHorarioFuncDomingoInicio(),
                                       $this->getHorarioFuncDomingoTermino(),
                                       $this->getHorarioFuncAnuncioRef());


        if($this->runQuery($sql)){

         //   echo "Eitanois: " . $sql;

        } else{

            echo "Não foi possível persistir o horário". $sql;
        }

    }

    #atualiza horário
    public function horarioUpdate($semIni,$semTer,$sabIni,$sabTer,$domIni,$domTer,$hourId){


        if($semIni == "06:00" && $semTer == "06:00"){
            $semIni = 0;
            $semTer = 0;
        }

        if($sabIni == "06:00" && $sabTer == "06:00"){
            $sabIni = 0;
            $sabTer = 0;
        }

        if($domIni == "06:00" && $domTer == "06:00"){
            $domIni = 0;
            $domTer = 0;
        }

        $this->setHorarioFuncSemanaInicio($semIni);
        $this->setHorarioFuncSemanaTermino($semTer);
        $this->setHorarioFuncSabadoInicio($sabIni);
        $this->setHorarioFuncSabadoTermino($sabTer);
        $this->setHorarioFuncDomingoInicio($domIni);
        $this->setHorarioFuncDomingoTermino($domTer);

        $sql = sprintf($this->_update,$this->getHorarioFuncSemanaInicio(),
                                      $this->getHorarioFuncSemanaTermino(),
                                      $this->getHorarioFuncSabadoInicio(),
                                      $this->getHorarioFuncSabadoTermino(),
                                      $this->getHorarioFuncDomingoInicio(),
                                      $this->getHorarioFuncDomingoTermino(),
                                      $hourId);

        if($this->runQuery($sql)){

        } else {

            echo "Não foi possível atualizar o horário de funcionamento" . $sql;
        }

    }


    #retorna retorna os horários cadastrados na tabela horário_list
    public function retornaHorarios(){

        $sql = "SELECT * FROM Horario_list";

        $row = $this->runSelect($sql);

        echo json_encode($row);

    }

    #retorna registro do horário de funcionamento de acordo com o id passado como argumento
    public function horarioFunc($id){


        $sql = "SELECT * FROM Horario_funcionamento WHERE horario_func_anuncio_ref = %s";

        $sql = sprintf($sql,$id);


        $row = $this->runSelect($sql);


        echo json_encode($row);
    }

}