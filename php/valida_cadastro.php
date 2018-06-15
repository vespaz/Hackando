<?php

	include "conexao.php";
	
	$nome = $_POST["nome"];
	$paradeiro = $_POST["paradeiro"];
	$senha = $_POST["senha"];
	$senha1 = $_POST["senha1"];
	
	$select = "SELECT * FROM hackers WHERE nome_hacker LIKE '$nome'";
	
	$resultado->num_rows;
	
	if( (mysqli_query($link, $select)) && ($resultado == 0) {
		
		if( $nome != '' && $senha != '' && $paradeiro != '' && ( $senha == $senha1 )){
			
			session_start();
			
			$_SESSION["codinome"] = $nome;
			$_SESSION["senha"] = $senha;
			
			$insert = "INSERT INTO hackers ";
			
			header("Location:index.php");
			
		}else{
			
			die (mysqli_error($link));
		
		header("Location:login?erro=2.php");
			
		}
		
	}else{
		
		die (mysqli_error($link));
		
		header("Location:login?erro=1.php");
		
	}

?>