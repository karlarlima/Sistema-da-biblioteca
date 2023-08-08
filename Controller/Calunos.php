<?php
include "../Model/Malunos.php";
include "../DAO/Dalunos.php";

class Calunos{
        public static function salvarAlunos($dadosAlunos){
            $Alunos = new Malunos($dadosAlunos['alu_id'], $dadosAlunos['alu_nome'], $dadosAlunos['alu_serie'], $dadosAlunos['alu_turmas']);
            Dalunos::salvarAlunos($Alunos->getAluNome(), $Alunos->getAluSerie(), $Alunos->getAluTurmas());
            $Alunos = null;
        }

        public static function retornarAlunos(){
            $Alunos = Dalunos::carregarAlunos();
            return $Alunos;

    }

    public static function excluirAlunos($alu_id){
        Dalunos::excluirAlunos($alu_id);
    }
  
    public static function editarAlunos($dadosAlunos){
      $Alunos = new Malunos($dadosAlunos['alu_id'], $dadosAlunos['alu_nome'], $dadosAlunos['alu_serie'], $dadosAlunos['alu_turmas']);
      Dalunos::editarAlunos($Alunos->getAluId(), $Alunos->getAluNome(), $Alunos->getAluSerie(), $Alunos->getAluTurmas());
      $Alunos = null;
      header("location: ../View/alunos.php");
  }

}
?>