<?php
class Dalunos
{
    public static function salvarAlunos($alu_nome, $alu_serie, $alu_turmas)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "INSERT INTO alunos ( alu_id, alu_nome, alu_serie, alu_turmas) VALUES (NULL, ?, ?, ?)";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($alu_nome, $alu_serie, $alu_turmas));
            header("location: ../View/alunos.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function carregarAlunos()
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "SELECT alunos.alu_id, alunos.alu_nome, alunos.alu_serie, turmas.tur_turmas FROM turmas INNER JOIN alunos ON alunos.alu_turmas = turmas.tur_id;";

        try {
            $stmt = $conexaoBD->query($sql);
            return $stmt->fetchall();
        } catch (Exception $ex) {

            echo $ex;
            return 0;
        }
    }

    public static function excluirAlunos($alu_id)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "DELETE FROM alunos where alu_id=?";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($alu_id));
            header("location: ../View/alunos.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function editarAlunos($alu_id, $alu_nome, $alu_serie, $alu_turmas)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "UPDATE alunos set alu_nome = ?, alu_serie = ?, alu_turmas = ? where alu_id= ?";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($alu_nome, $alu_serie, $alu_turmas, $alu_id));
            header("location: ../View/alunos.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }
}
