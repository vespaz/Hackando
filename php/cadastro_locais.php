<!DOCTYPE html>

<?php

	include "conexao.php";

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro de Locais</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
	</head>
	
	<body>
	
		<?php
			
			if( isset( $_POST["cod"] ) ){
				
				$cod = $_POST["cod"];
				
				if( $cod == "1" ){
					
					$pais = $_POST["pais"];
					
					$insert = "INSERT INTO pais (nome_pais) VALUES ('$pais')";
					
					if( mysqli_query( $link, $insert ) ){
					
						header("Location: locais.php?cod=2");
						
					}else{
						
						die( mysqli_error($link) );
						
					}
					
				}else if( $cod == "2" ){
					
					$pais = $_POST["pais"];
					$estado = $_POST["estado"];
					
					$insert = "INSERT INTO estado (cod_pais, nome_estado) VALUES ('$pais', '$estado')";
					
					if( mysqli_query( $link, $insert ) ){
					
						header("Location: locais.php?cod=3");
						
					}else{
						
						die( mysqli_error($link) );
						
					}
					
				}else if( $cod == "3" ){
					
					$estado = $_POST["estado"];
					$cidade = $_POST["cidade"];
					
					$insert = "INSERT INTO cidade (cod_estado, nome_cidade) VALUES ('$estado', '$cidade')";
					
					if( mysqli_query( $link, $insert ) ){
					
						header("Location: lista_locais.php");
						
					}else{
						
						die( mysqli_error($link) );
						
					}
					
				}
				
			}
		
		?>
	
	</body>

</html>