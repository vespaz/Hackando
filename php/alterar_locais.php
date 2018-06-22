<?php

	include "conexao.php";
	include "funcao.php";
	
	valida_session();

?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Página de Alteração de Locais</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	<body>
		<?php 
			menu();
			include "conexao.php";
			
			$nome_pais = $_POST["pais"];
			$nome_estado = $_POST["estado"];
			$nome_cidade = $_POST["cidade"];
			
			$id_pais = $_POST["id_pais"];
			$id_estado = $_POST["id_estado"];
			$id_cidade = $_POST["id_cidade"];
			
			$updatePais = "UPDATE pais SET nome_pais = '$nome_pais' WHERE id_pais = '$id_pais'";
			
			$updateEstado = "UPDATE estado SET nome_estado = '$nome_estado' WHERE id_estado = '$id_estado'";
			
			$updateCidade = "UPDATE cidade SET nome_cidade = '$nome_cidade' WHERE id_cidade = '$id_cidade'";
			
			
			if (mysqli_query($link, $updatePais)){
				header("Location: lista_locais.php");
			}else{
				die(mysqli_error($link));
			}
			
			if (mysqli_query($link, $updateEstado)){
				header("Location: lista_locais.php");
			}else{
				die(mysqli_error($link));
			}
			
			if (mysqli_query($link, $updateCidade)){
				header("Location: lista_locais.php");
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>