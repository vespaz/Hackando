<html lang="pt-br">

	<head>
	
		<meta charset="utf-8" />
		<title>Remover Componente</title>
		
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	
	<body class="corpo">
	
		<?php 

			include "conexao.php";
			include "funcao.php";

			$id = $_GET["id_invasoes"];
			
			
			$delete = "DELETE FROM invasoes WHERE id_invasoes = '$id'";
			
			echo $delete;
			menu();
			
			if(mysqli_query($link, $delete)){
				
				header("Location: lista_invasoes.php");
				
			}else {
				
				die(mysqli_error($link));
				
			}
			
		?>

	</body>
	
</html>