<?php
include "../Model/Mlivros.php";
include "../DAO/Dlivros.php";

class Clivros{
        public static function salvarLivros($dadosLivros){
            $livros = new Mlivros($dadosLivros['it_id'], $dadosLivros['it_nome'], $dadosLivros['it_autor'], $dadosLivros['it_genero']);
            Dlivros::salvarLivros($livros->getNome(), $livros->getAutor(), $livros->getGenero());
            $livros = null;
        }

        public static function retornarlivros(){
            $livros = Dlivros::carregarlivros();
            return $livros;

    }

    public static function excluirLivros($it_id){
        Dlivros::excluirLivros($it_id);
    }
  
    public static function editarLivros($dadosLivros){
      $livros = new Mlivros($dadosLivros['it_id'], $dadosLivros['it_nome'], $dadosLivros['it_autor'], $dadosLivros['it_genero']);
      Dlivros::editarLivros($livros->getId(), $livros->getNome(), $livros->getAutor(), $livros->getGenero());
      $livros = null;
      header("location: ../View/livros.php");
  }
}
?>