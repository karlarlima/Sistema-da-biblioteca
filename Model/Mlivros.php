<?php
class Mlivros{

    private $it_id;
    private $it_nome;
    private $it_autor;
    private $it_gênero;
    

    public function __construct($it_id, $it_nome, $it_autor, $it_gênero){
       $this->it_id = $it_id;
       $this->it_nome = $it_nome;
       $this->it_autor = $it_autor;
       $this->it_gênero = $it_gênero;
    } 

    public function setId($it_id) {
        $this->it_id = $it_id;
    }
    
    public function setNome($it_nome) {
        $this->it_nome = $it_nome;
    }

    public function setAutor($it_autor) {
        $this->it_autor = $it_autor;
    }

    public function setGenero($it_gênero) {
        $this->it_gênero = $it_gênero;
    }

    public function getId(){
        return $this->it_id;
    }
    
    public function getNome(){
        return $this->it_nome;
    }

    public function getAutor(){
        return $this->it_autor;
    }

    public function getGenero(){
        return $this->it_gênero;
    }

}


?>