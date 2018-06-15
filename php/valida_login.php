<?php

	include "conexao.php";
	
	$nome = $_POST["nome"];
	$senha = $_POST["senha"];
	
	$select = "SELECT * FROM hackers WHERE nome_hacker LIKE '$nome' AND senha LIKE '$senha' ";
	
	$resultado->num_rows;
	
	if( mysqli_query($link, $select) && $resultado == 1 ){
		
		session_start();
		
		$_SESSION["codinome"] = $nome;
		$_SESSION["senha"] = $senha;
		
		header("Location:index.php");
		
	}else{
		
		die (mysqli_error($link));
		
		header("Location:login?erro=1.php");
		
	}

?>