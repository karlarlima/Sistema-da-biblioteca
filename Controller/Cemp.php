<?php
include "../Model/Memp.php";
include "../DAO/Demp.php";

class Cemp{
        public static function salvarEmp($dadosEmp){
            $Emp = new Memp($dadosEmp['emp_id'], $dadosEmp['emp_turma'], $dadosEmp['emp_alu'], 
            $dadosEmp['emp_usu'], $dadosEmp['emp_livro'], $dadosEmp['emp_data']);
            Demp::salvarEmp($Emp->getTurma(), $Emp->getAlu(), $Emp->getUsu(), $Emp->getLivro(), $Emp->getData());
            $Emp = null;
        }

    public static function excluirEmp($emp_id){
        Demp::excluirEmp($emp_id);
    }
  
    public static function editarEmp($dadosEmp){
      $Emp = new Memp($dadosEmp['emp_id'], $dadosEmp['emp_turma'], $dadosEmp['emp_alu'], 
      $dadosEmp['emp_usu'], $dadosEmp['emp_livro'], $dadosEmp['emp_data']);
      Demp::editarEmp($Emp->getId(), $Emp->getTurma(), $Emp->getAlu(), $Emp->getUsu(), $Emp->getLivro(), $Emp->getData(),);
      $Emp = null;
      header("location: ../View/emp.php");
  }

  public static function retornarTb(){
    $Emp = Demp::carregarTb();
    return $Emp;
}

}
?>