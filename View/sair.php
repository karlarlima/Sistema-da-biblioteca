<?php
session_start();
ob_start();

unset($_SESSION['usu_codigo'], $_SESSION['usu_usuario']);
$_SESSION['msg'] = "<p style='color:green'>"."Deslogado com sucesso!"."<p>";

header('location: index.php');
?>