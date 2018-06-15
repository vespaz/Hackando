<!DOCTYPE html>

<?php

	include "conexao.php";
	include "funcao.php";
	
	valida_session();

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página inicial</title>
	
	</head>
	
	<body>
	
		<?php
		
			menu();
		
		?>
	
		<h1>Olá, <?=$codinome?> :)</h1>
	
	</body>

</html>