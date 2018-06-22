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
			menu();
			
			$id = $_GET["id_componente"];
			
			
			$delete = "DELETE FROM componentes WHERE id_componente = '$id'";
			
			//echo $delete;
			
			
			if(mysqli_query($link, $delete)){
				
				header("Location: lista_componentes.php");
				
			}else {
				echo "<h1 class='erro'>Não é possivel excluir esse componente pois ja existe uma invasão cadastrada utilizando-o</h1>";				
			}
			
		?>

	</body>
	
</html>