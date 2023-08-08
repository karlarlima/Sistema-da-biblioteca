<?php 
session_start();
ob_start();
include'../DAO/conexao.php';

if((!isset($_SESSION['usu_codigo'])) and (!isset($_SESSION['usu_usuario']))){
   $_SESSION['msg'] = "<p style = 'color: red'>"."Erro: Faça Login para ter acesso a essa página"."<p>";
   header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Início</title>
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

<section class="inicio" id="inicio">

   <div class="divInicio">

      <div class="tituloDivInicio">
         <h3>Bem-vindo(a), <span><?php echo $_SESSION['usu_usuario']; ?></span></h3>
      </div>

      <div class="image">
         <img src="../Imagens/principal.png">
      </div>

   </div>

</section>



<script src="../JS/script.js"></script>
</body>
</html>