<html lang="pt-br">

	<head>
	
		<meta charset="utf-8" />
		<title>Remover Componente</title>
		
	</head>
	
	<body class="corpo">
	
		<?php 

			include "conexao.php";
			include "funcao.php";
			menu();
			
			$id = $_GET["id_componente"];
			
			
			$delete = "DELETE FROM componentes WHERE id_componente = '$id'";
			
			// echo $delete;
			
			
			if(mysqli_query($link, $delete)){
				
				header("Location: lista_componentes.php");
				
			}else {
				
				die(mysqli_error($link));
				
			}
			
		?>

	</body>
	
</html>