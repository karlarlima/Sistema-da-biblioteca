<?php 
session_start();
ob_start();

if((!isset($_SESSION['usu_codigo'])) and (!isset($_SESSION['usu_usuario']))){
   $_SESSION['msg'] = "<p style = 'color: red'>"."Erro: Faça Login para ter acesso a essa página"."<p>";
   header('location: index.php');
}
?>

<?php 
include '../Controller/Calunos.php';
$listaAluno = Calunos::retornarAlunos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Alunos</title>
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

   <form action="../Controller/Arotas.php?acao=salvarAlu&tipo=Alunos" method="POST">
   <h3>Cadastro de alunos</h3>
         <input type="text" name="alu_id" placeholder="ID" class="clFormulario" readonly autocomplete="off"
         value = "<?php echo filter_input(INPUT_GET, 'alu_id');?>"><br>
         <input type="text" name="alu_nome" placeholder="Nome do Aluno" class="clFormulario" autocomplete="off"
         value = "<?php echo filter_input(INPUT_GET, 'alu_nome');?>"><br>

         <select name="alu_serie" class="clFormulario" value = "Série">
         <option>Série do Aluno</option>
         <option>1°</option>
         <option>2°</option>
         <option>3°</option>
         </select>

         <select name="alu_turmas" class="clFormulario" value ="Turma"> 
         <option>Selecione a Turma</option>
         <?php 
         require_once('../DAO/conexao.php');
         $pdo = Conexao::criarInstancia(); 
         $sql = "SELECT * FROM turmas";
         $stmt = $pdo->prepare($sql);
         $stmt->execute(); 

         if($stmt->rowCount() !=0){
            foreach ($stmt as $turmas) {?> 
               <option value="<?php echo $turmas['tur_id'];?>"><?php echo $turmas['tur_turmas'];?></option> <?php } } ?> 
               </select>
         <input type="submit" value="Enviar" class="btn" name="submit">
         </tr>";
      </form>

   </div>
   </div>

</section>

<div class="divfor" style="margin-inline: 15%;">
        <!-- Tabelinha -->
                <table id="Alunos" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">Alunos</th>
                            <th class="th-sm">Série</th>
                            <th class="th-sm">Turma</th>
                            <th class="th-sm">Editar</th>
                            <th class="th-sm">Excluir</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <div class="divfor2">
                        <?php
                        foreach ($listaAluno as $Alunos) {
                            echo "<tr>
                                            <td>" . $Alunos['alu_id'] . "</td>
                                            <td>" . $Alunos['alu_nome'] . "</td>
                                            <td>" . $Alunos['alu_serie'] . "</td>
                                            <td>" . $Alunos['tur_turmas'] . "</td>
                                            <td> <a href= 'alunos.php?alu_id=".$Alunos['alu_id']."&alu_nome=".$Alunos['alu_nome']."&alu_serie=".$Alunos['alu_serie']."&tur_turmas=".$Alunos['tur_turmas']."'><button type='submit'>Editar</button></a></td>
                                            <td> <a href= '../Controller/Arotas.php?acao=excluir&tipo=clientes&alu_id=".$Alunos['alu_id']."'><button type='submit'>Excluir</button></a></td>
                                            </tr>";
                        }
                        ?>
                        </div>
                    </tbody>
                </table>

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" language="javascript">
                    $(document).ready(function() {
                        $('#Alunos').DataTable({
                            language: {
                                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                            }
                        });
                    });
                </script>
                <div class="divfor"><a href="../pdf/relatorioA.php"><button>Relatório</button></a></div>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </div>
    <script src="../JS/script.js"></script>
    

 
</body>
</html>