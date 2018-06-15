<html lang="pt-br">

	<head>
	
		<meta charset="utf-8" />
		<title>Remover Componente</title>
		
	</head>
	
	<body class="corpo">
	
		<?php 

			include "conexao.php";
			include "funcao.php";

			$id = $_GET["id"];
			
			
			$delete = "DELETE FROM view_componentes WHERE id_componentes = '$id'";
			
			echo $delete;
			menu();
			
			if(mysqli_query($link, $delete)){
				
				header("Location: lista_componentes.php");
				
			}else {
				
				die(mysqli_error($link));
				
			}
			
		?>

	</body>
	
</html>