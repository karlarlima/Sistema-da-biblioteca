<?php
include"../Controller/Calunos.php";

if(filter_input(INPUT_GET, "acao")=="salvarAlu" & filter_input(INPUT_GET, "tipo")=="Alunos"){
    if(filter_input(INPUT_POST, "alu_id") !=""){
     Calunos::editarAlunos($_POST);
 }  else{
     Calunos::salvarAlunos($_POST);
 }
 
 }
 
 else if (filter_input(INPUT_GET, "acao")=="excluir" & filter_input(INPUT_GET, "tipo")=="clientes" & filter_input(INPUT_GET, "alu_id") !=0){
     Calunos::excluirAlunos (filter_input(INPUT_GET, "alu_id"));
 }



?>