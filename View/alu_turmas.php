<?php
include '../DAO/conexao.php';


$aluno = $_GET['alu_turmas'];

$pdo = Conexao::criarInstancia();
$sql = "SELECT * FROM alunos WHERE alu_turmas=:alu_turmas";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('alu_turmas', $aluno);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($row as $alunos) {?> 
          <option value="<?php echo $alunos['alu_id'];?>">
          <?php echo $alunos['alu_nome'];?>
          </option> <?php }  ?>