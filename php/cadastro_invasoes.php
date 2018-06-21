<!DOCTYPE html>

<?php

	include "conexao.php";

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro de Invasões</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
	</head>
	
	<body>
	
		<?php
		
			$hack = $_POST["cod_hacker"];
			$comp = $_POST["cod_comp"];
			$status = $_POST["status"];
			
			$insert = "INSERT INTO invasoes (cod_hacker, cod_componente, status) VALUES ('$hack', '$comp', '$status') ";
			
			if( mysqli_query( $link, $insert ) ){
				
				header("Location:lista_invasoes.php");
				
			}else{
				
				die( mysqli_error($link) );
				
			}
		
		?>
	
	</body>

</html>