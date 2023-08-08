<?php
session_start();
ob_start();
include '../DAO/conexao.php';
?>
					
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema Biblioteca</title>
	<link rel="icon" type="image/png" href="../Imagens/eeep.png"/>
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>
<body> 
	
	<div class="principal">
		<div class="container">
			<div class="cont">
			
				<div class="fotinhaConf">
					<img src="../Imagens/eeep.png">
				</div>

				<form class="form" method="POST">
					<span class="spTitulo">Área administrativa</span>

					<?php
					$conn = Conexao::criarInstancia();

                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
					

							if(!empty($dados['enviar'])){
							$sql = "SELECT usu_codigo, usu_usuario, usu_pass FROM usuario WHERE usu_usuario = :usu_usuario LIMIT 1";
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(':usu_usuario', $dados['usu_usuario'], PDO::PARAM_STR);
							$stmt->execute();

							if(($stmt) and ($stmt->rowCount() !=0)){
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
								
							    if($row['usu_pass'] === $dados['usu_pass']){
									$_SESSION['usu_codigo'] = $row['usu_codigo'];
									$_SESSION['usu_usuario'] = $row['usu_usuario'];
                                    header('location: comeco.php');
									
								}else{
									$_SESSION['msg'] = "<p style = 'color: red'>"."Erro: Usuário ou senha inválida!"."</p>";
								}
								
							}else{
									$_SESSION['msg'] = "<p style = 'color: red'>"."Erro: Usuário ou senha inválida!"."<p>";

							}

						}

					if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);}
					
					?>
                   

						<input class="inInput" type="text" name="usu_usuario" placeholder="Usuário" autocomplete="off" value="<?php if(isset($dados['usu_usuario'])){echo $dados['usu_usuario'];}?>">
						<input class="inInput" type="password" name="usu_pass" placeholder="Senha" value = "<?php if(isset($dados['usu_pass'])){echo $dados['usu_pass'];}?>">
					
					<div class="containerBotao">
						<button class="btn" name="enviar" value="entrar">Entrar</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</body>
<script>
    const card = document.querySelector('.fotinhaConf');

    card.addEventListener("mousemove", cardEffect);
    card.addEventListener("mouseleave", cardBack);
    card.addEventListener("mouseenter", cardEnter);

    function cardEffect(event)
    {
        const cardWidth = card.offsetWidth;
        const cardHeight = card.offsetHeight;
        const centerX = card.offsetLeft + cardWidth/2;
        const centerY = card.offsetTop + cardHeight/2;
        const positionX = event.clientX - centerX;
        const positionY = event.clientY - centerY;
        
        const rotateX = ((+1)*25*positionY/(cardHeight/2)).toFixed(2);
        const rotateY = ((-1)*25*positionX/(cardWidth/2)).toFixed(2);

        console.log(rotateX,rotateY);

        card.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;

    }

    function cardBack(event)
    {
        card.style.transform = `perspective(500px) rotateX(0deg) rotateY(0deg)`;
        cardTransition();
    }

    function cardTransition()
    {
        clearInterval(card.transitionId);
        card.style.transition = 'transform 400ms';
        card.transitionId = setTimeout(() => {
            card.style.transition = '';
        },400);
    }

    function cardEnter(event)
    {
        cardTransition();
    }
</script>
</html>