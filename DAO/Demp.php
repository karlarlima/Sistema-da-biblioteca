<?php
class Demp
{
    public static function salvarEmp($emp_turma, $emp_alu, $emp_usu, $emp_livro, $emp_data)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "INSERT INTO emprestimo (emp_id, emp_turma, emp_alu,	emp_usu, emp_livro,	emp_data) VALUES (NULL, ?, ?, ?, ?, ?)";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($emp_turma, $emp_alu, $emp_usu, $emp_livro, $emp_data));
            header("location: ../View/emp.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function excluirEmp($emp_id)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "DELETE FROM emprestimo where emp_id=?";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($emp_id));
            header("location: ../View/emp.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function editarEmp($emp_id, $emp_turma, $emp_alu,	$emp_usu, $emp_livro, $emp_data)
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "UPDATE alunos set emp_turma = ?, emp_alu = ?, emp_usu = ?, emp_livro = ?, emp_data = ?  where emp_id= ?";
        $stmt = $conexaoBD->prepare($sql);

        try {
            $stmt->execute(array($emp_turma, $emp_alu,	$emp_usu, $emp_livro, $emp_data, $emp_id));
            header("location: ../View/emp.php");
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function carregarTb()
    {
        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "SELECT emprestimo.emp_id, turmas.tur_turmas, alunos.alu_nome, emprestimo.emp_livro, emprestimo.emp_data FROM emprestimo INNER JOIN turmas ON emprestimo.emp_turma = turmas.tur_id INNER JOIN alunos ON emprestimo.emp_alu = alunos.alu_id";

        try {
            $stmt = $conexaoBD->query($sql);
            return $stmt->fetchall();
        } catch (Exception $ex) {

            echo $ex;
            return 0;
        }
    }

}
