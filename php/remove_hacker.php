<html lang="pt-br">

	<head>
	
		<meta charset="utf-8" />
		<title>Remover Hacker</title>
		
	</head>
	
	<body class="corpo">
	
		<?php 

			include "conexao.php";
			include "funcao.php";

			$id = $_GET["id"];
			
			
			$delete = "DELETE FROM hackers WHERE id_hacker = '$id'";
			
			echo $delete;
			menu();
			
			if(mysqli_query($link, $delete)){
				
				header("Location: lista_hackers.php");
				
			}else {
				
				die(mysqli_error($link));
				
			}
			
		?>

	</body>
	
</html>