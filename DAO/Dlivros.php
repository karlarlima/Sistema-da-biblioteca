<?php
class Dlivros
{
    public static function salvarLivros($it_nome, $it_autor, $it_genero)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "INSERT INTO livros (it_id, it_nome, it_autor, it_genero) VALUES (NULL, ?, ?, ?)";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($it_nome, $it_autor, $it_genero));
            header("location: ../View/livros.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function carregarLivros()
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "SELECT * FROM livros;";

        try {
            $stmt = $conexaoBD->query($sql);
            return $stmt->fetchall();
        } catch (Exception $ex) {

            echo $ex;
            return 0;
        }
    }

    public static function excluirLivros($it_id)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "DELETE FROM livros where it_id=?";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($it_id));
            header("location: ../View/livros.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function editarLivros($it_id, $it_nome, $it_autor, $it_genero)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "UPDATE livros set it_nome = ?, it_autor = ?, it_genero = ? where it_id= ?";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($it_nome, $it_autor, $it_genero, $it_id));
            header("location: ../View/livros.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }
}
