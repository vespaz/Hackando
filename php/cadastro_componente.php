<!DOCTYPE html>

<?php

	include "conexao.php";

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro de Componentes</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
	</head>
	
	<body>
	
		<?php
		
			$componente = $_POST["componente"];
			$ip = $_POST["ip"];
			$cidade = $_POST["cidade"];
			
			$insert = "INSERT INTO componentes (nome_componente, ip, cod_cidade) VALUES ('$componente', '$ip', '$cidade') ";
			
			if( mysqli_query( $link, $insert ) ){
				
				header("Location:lista_componentes.php");
				
			}else{
				
				die( mysqli_error($link) );
				
			}
		
		?>
	
	</body>

</html>





