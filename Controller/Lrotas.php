<?php
include"../Controller/Clivros.php";

if(filter_input(INPUT_GET, "acao")=="salvar" & filter_input(INPUT_GET, "tipo")=="clientes"){
    if(filter_input(INPUT_POST, "it_id") !=""){
     Clivros::editarLivros($_POST);
 }  else{
     Clivros::salvarLivros($_POST);
 }
 
 }
 
 else if (filter_input(INPUT_GET, "acao")=="excluir" & filter_input(INPUT_GET, "tipo")=="clientes" & filter_input(INPUT_GET, "it_id") !=0){
     Clivros::excluirLivros (filter_input(INPUT_GET, "it_id"));
 }
?>