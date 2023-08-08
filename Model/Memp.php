<?php
class Memp{

    private $emp_id;
    private $emp_turma;
    private $emp_alu;
    private $emp_usu;
    private $emp_livro;
    private $emp_data;
    

    public function __construct($emp_id, $emp_turma, $emp_alu, $emp_usu, $emp_livro, $emp_data){
       $this->emp_id = $emp_id;
       $this->emp_turma = $emp_turma;
       $this->emp_alu = $emp_alu;
       $this->emp_usu = $emp_usu;
       $this->emp_livro = $emp_livro;
       $this->emp_data = $emp_data;
    } 

    public function setId($emp_id) {
        $this->emp_id = $emp_id;
    }
    
    public function setTurma($emp_turma) {
        $this->emp_turma = $emp_turma;
    }

    public function setAlu($emp_alu) {
        $this->emp_alu = $emp_alu;
    }

    public function setUsu($emp_usu) {
        $this->emp_usu = $emp_usu;
    }

    public function setLivro($emp_livro) {
        $this->emp_livro = $emp_livro;
    }

    public function setData($emp_data) {
        $this->emp_data = $emp_data;
    }

    public function getId(){
        return $this->emp_id;
    }
    
    public function getTurma(){
        return $this->emp_turma;
    }

    public function getAlu(){
        return $this->emp_alu;
    }

    public function getUsu(){
        return $this->emp_usu;
    }

    public function getLivro(){
        return $this->emp_livro;
    }

    public function getData(){
        return $this->emp_data;
    }

}


?>