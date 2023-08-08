<?php 
session_start();
ob_start();

if((!isset($_SESSION['usu_codigo'])) and (!isset($_SESSION['usu_usuario']))){
   $_SESSION['msg'] = "<p style = 'color: red'>"."Erro: Faça Login para ter acesso a essa página"."<p>";
   header('location: index.php');
}
?>

<?php 
include "../Controller/Clivros.php";
$listaLivros = Clivros::retornarlivros();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Livros</title>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="../CSS/style.css">
   <script src="https://cdn.rawgit.com/naptha/tesseract.js/1.0.10/dist/tesseract.min.js" defer></script>
   <link rel="icon" type="image/png" href="../Imagens/eeep.png"/>
   
   <style>
      #btnc {
         font-size: 18px;
         font-weight: bold;
         border-radius: 16px;
         color:white;
         cursor: pointer;
         padding:1rem 3rem;
         text-align: center;
         margin-top: 1rem;
         display: block;
         display: inline-block;
         margin-left: 20%;
         background-color: var(--azulPrincipal);
      }
   </style>

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
                  <div class="cam">
                              <video autoplay style="height: 180px; border-radius: 5px;"></video> <br>
                              <canvas style="height: 180px; border-radius: 5px;"></canvas> <br>
                              <button id="btnc">Tirar Foto</button>
                  </div>

   <form action="../Controller/Lrotas.php?acao=salvar&tipo=clientes" method="POST">
         <h3>Cadastro de livros</h3>
         <input type="text" name="it_id" placeholder="ID" class="clFormulario" readonly autocomplete="off"
         value = "<?php echo filter_input(INPUT_GET, 'it_id');?>"><br>
         
      <input type="text" name="it_nome" placeholder="Título" class="clFormulario" autocomplete="off"
      value = "<?php echo filter_input(INPUT_GET, 'it_nome');?>" id="converted-text"> <br>

      <input type="text" name="it_autor" placeholder="Autor" class="clFormulario" autocomplete="off"
      value = "<?php echo filter_input(INPUT_GET, 'it_autor');?>"><br>
      
      <input type="text" name="it_genero" placeholder="Gênero" class="clFormulario" autocomplete="off"
      value = "<?php echo filter_input(INPUT_GET, 'it_genero');?>"><br>
         <div class="divfor"><input type="submit" value="Enviar" class="btn" name="submit">
      </form>

   </div>
   </div>

</section>
<div class="divfor" style="margin-inline: 15%;">
        <!-- Tabelinha -->
                <table id="livros" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">Livro</th>
                            <th class="th-sm">Autor</th>
                            <th class="th-sm">Gênero</th>
                            <th class="th-sm">Editar</th>
                            <th class="th-sm">Excluir</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listaLivros as $livros) {
                            echo "<tr>
                                            <td>" . $livros['it_id'] . "</td>
                                            <td>" . $livros['it_nome'] . "</td>
                                            <td>" . $livros['it_autor'] . "</td>
                                            <td>" . $livros['it_genero'] . "</td>
                                            <td> <a href= 'livros.php?it_id=".$livros['it_id']."&it_nome=".$livros['it_nome']."&it_autor=".$livros['it_autor']."&it_genero=".$livros['it_genero']."'><input type='button' value='Editar'></a></td>
                                            <td> <a style='red'href= '../Controller/Lrotas.php?acao=excluir&tipo=clientes&it_id=".$livros['it_id']."'><button type='submit'>Excluir</button></a></td>
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
                <div class="divfor"><a href="../pdf/relatorioL.php"><button>Relatório</button></a></div>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </div>

<script src="../JS/script.js"></script>
<script src="../JS/cam.js"></script>

   
</body>
</html>