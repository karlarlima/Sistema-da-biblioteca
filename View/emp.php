<?php 
session_start();
ob_start();

if((!isset($_SESSION['usu_codigo'])) and (!isset($_SESSION['usu_usuario']))){
   $_SESSION['msg'] = "<p style = 'color: red'>"."Erro: Faça Login para ter acesso a essa página"."<p>";
   header('location: index.php');
}
?>

<?php 
include "../Controller/Cemp.php";
$listEmp = Cemp::retornarTb();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Empréstimo de Livros</title>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="../CSS/style.css">
   <link rel="icon" type="image/png" href="../Imagens/eeep.png"/>

</head>
<body>

<header class="menu">
   
   <section class="clsection1">

   <a href="../View/comeco.php" class="logo">Biblioteca</a>

      <div class="icons">
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="clEeep">
         <img src="../Imagens/eeep.png" class="eeep">
         <h3 class="name">Administrador</h3>
      </div>
      </div>

   </section>

</header>   

<div class="clMenu">

   <div class="clEeep">
      <img src="../Imagens/eeep.png" class="eeep">
      <h3 class="titulo">Administrador</h3>
   </div>

   <nav class="navMenu">
      <a href="../View/comeco.php">Início</a>
      <a href="../View/emp.php">Empréstimo</a>
      <a href="../View/livros.php">Livros</a>
      <a href="../View/alunos.php">Alunos</a>
      <a href="../View/sobre.php">Sobre</a>
      <a href="../View/sair.php">Sair</a>
   </nav>

</div>

<section class="secFormulario">

   <div class="divFormulario">

   <form action="../Controller/Erotas.php?acao=salvar&tipo=clientes" method="POST">
         <h3>Emprestimo de Livro</h3>

      <input type="text" name="emp_id" placeholder="ID" class="clFormulario" readonly autocomplete="off"
      value = "<?php echo filter_input(INPUT_GET, 'emp_id');?>"><br>
         
      <select name="emp_turma" class="clFormulario" id = "turmas">
         <option>Selecione Turma</option>
         <?php 
         require_once('../DAO/conexao.php');
         $pdo = Conexao::criarInstancia(); 
         $sql = "SELECT * FROM turmas";
         $stmt = $pdo->prepare($sql);
         $stmt->execute(); 

         if($stmt->rowCount() !=0){
         foreach ($stmt as $turmas) {?> 
               <option value="<?php echo $turmas['tur_id'];?>">
               <?php echo $turmas['tur_turmas'];?>
               </option> <?php } } ?> 
               </select><br>

         <select name="emp_alu" class="clFormulario" id ="alu"> 
         <option>Selecione Aluno</option>
         </select>

         <select name="emp_livro" class="clFormulario" value ="Livros"> 
         <option>Selecione Livro</option>
         <?php 
         require_once('../DAO/conexao.php');
         $pdo = Conexao::criarInstancia(); 
         $sql = "SELECT * FROM livros";
         $stmt = $pdo->prepare($sql);
         $stmt->execute(); 

         if($stmt->rowCount() !=0){
         foreach ($stmt as $res) {?> 
               <option value="<?php echo $res['it_nome'];?>">
               <?php echo $res['it_nome'];?>
               </option> <?php } } ?> 
               </select>

         <select name="emp_usu" class="clFormulario" value ="Usuário"> 
         <option>Selecione Usuário</option>
         <?php 
         require_once('../DAO/conexao.php');
         $pdo = Conexao::criarInstancia(); 
         $sql = "SELECT * FROM usuario";
         $stmt = $pdo->prepare($sql);
         $stmt->execute(); 

         if($stmt->rowCount() !=0){
         foreach ($stmt as $res) {?> 
               <option value="<?php echo $res['usu_usuario'];?>">
               <?php echo $res['usu_usuario'];?>
               </option> <?php } } ?> 
               </select>

      <input type="date" name="emp_data" placeholder="Data" class="clFormulario"
      value = "<?php echo filter_input(INPUT_GET, 'emp_data');?>"><br>

      <input type="submit" value="Enviar" class="btn" name="submit">
      </form>

   </div>
   </div>

</section>
<div class="divfor" style="margin-inline: 15%;">
        <!-- Tabelinha -->
                <table id="livros" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">ID</th>
                            <th class="th-sm">Turmas</th>
                            <th class="th-sm">Aluno</th>
                            <th class="th-sm">Livro</th>
                            <th class="th-sm">Data</th>
                            <th class="th-sm">Editar</th>
                            <th class="th-sm">Excluir</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($listEmp as $emp) {
                            echo "<tr>
                                            <td>" . $emp['emp_id'] . "</td>
                                            <td>" . $emp['tur_turmas'] . "</td>
                                            <td>" . $emp['alu_nome'] . "</td>
                                            <td>" . $emp['emp_livro'] . "</td>
                                            <td>" . $emp['emp_data'] . "</td>
                                            <td> <a href= 'emp.php?emp_id=".$emp['emp_id']."&emp_turma=".$emp['tur_turmas']."&emp_alu=".$emp['alu_nome']."&emp_livro=".$emp['emp_livro']."&emp_data=".$emp['emp_data']."'><input type='button' value='Editar'></a></td>
                                            <td> <a style='red'href= '../Controller/Erotas.php?acao=excluir&tipo=clientes&emp_id=".$emp['emp_id']."'><button type='submit'>Excluir</button></a></td>
                                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" language="javascript">
                    $(document).ready(function() {
                        $('#livros').DataTable({
                            language: {
                                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                            }
                        });
                    });
                </script>
                <div class="divfor"><a href="../pdf/relatorioE.php"><button>Relatório</button></a></div>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </div>

<script src="../JS/script.js"></script>
<script src="../JS/funcoes.js"></script>
</body>
</html>