<?php

	include "conexao.php";
	include "funcao.php";
	
	valida_session();

?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Página de Alteração de Invasões</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	<body>
		<?php 
			menu();
			
			$status = $_POST["status"];
			
			$id_invasoes = $_POST["id_invasoes"];
			
			$update = "UPDATE invasoes SET status = '$status' WHERE id_invasoes = '$id_invasoes'";
			
			
			if (mysqli_query($link, $update)){
				header("Location: lista_invasoes.php");
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>