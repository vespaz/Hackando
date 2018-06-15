<?php

	include "conexao.php";
	
	$nome = $_POST["nome"];
	$senha = $_POST["senha"];
	
	$select = "SELECT * FROM hackers WHERE nome_hacker LIKE '$nome' AND senha LIKE '$senha' ";
	
	$resultado = mysqli_query( $link, $select );
	
	$quantidade = mysqli_num_rows( $resultado );
	
	echo $nome;
	echo "<br />";
	echo $senha;
	echo "<br />";
	echo $quantidade;
	
	if( mysqli_query($link, $select) && $quantidade == '1' ){
		
		session_start();
		
		$_SESSION["codinome"] = $nome;
		$_SESSION["senha"] = $senha;
		
		header("Location: index.php");
		
	}else{
		
		header("Location: login.php?erro=1");
		
	}

?>