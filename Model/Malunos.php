<?php
class Malunos{
    private $alu_id;
    private $alu_nome;
    private $alu_serie;
    private $alu_turmas;
    

    public function __construct($alu_id, $alu_nome,	$alu_serie,	$alu_turmas){
       $this->alu_id = $alu_id;
       $this->alu_nome = $alu_nome;
       $this->alu_serie = $alu_serie;
       $this->alu_turmas = $alu_turmas;
    } 

    public function setAluId($alu_id) {
        $this->alu_id = $alu_id;
    }
    
    public function setAluNome($alu_nome) {
        $this->alu_nome = $alu_nome;
    }

    public function setAluSerie($alu_serie) {
        $this->alu_serie = $alu_serie;
    }
    
    public function setAluTurma($alu_turmas) {
        $this->alu_turmas = $alu_turmas;
    }

    public function getAluId(){
        return $this->alu_id;
    }
    
    public function getAluNome(){
        return $this->alu_nome;
    }

    public function getAluSerie(){
        return $this->alu_serie;
    }

    public function getAluTurmas(){
        return $this->alu_turmas;
    }

}


?>