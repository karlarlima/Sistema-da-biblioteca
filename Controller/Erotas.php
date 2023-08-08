<?php
include"../Controller/Cemp.php";

if(filter_input(INPUT_GET, "acao")=="salvar" & filter_input(INPUT_GET, "tipo")=="clientes"){
    if(filter_input(INPUT_POST, "emp_id") !=""){
     Cemp::editarEmp($_POST);
 }  else{
     Cemp::salvarEmp($_POST);
 }
 
 }
 
 else if (filter_input(INPUT_GET, "acao")=="excluir" & filter_input(INPUT_GET, "tipo")=="clientes" & filter_input(INPUT_GET, "emp_id") !=0){
     Cemp::excluirEmp (filter_input(INPUT_GET, "emp_id"));
 }



?>