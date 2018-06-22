<?php 
	include "conexao.php";
	include "funcao.php";
	
	valida_session();
	
?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Página de Alteração de Componentes</title>
		<link rel="stylesheet" type="text/css" href="css/css.css">
	</head>
	<body>
		<?php 
			menu();
			
			$nomeComponente = $_POST["componente"];
			$ip = $_POST["ip"];
			$cod_cidade = $_POST["EndIp"];
			
			$id_componente = $_POST["id_componente"];
			
			
			$update = "UPDATE componentes SET nome_componente = '$nomeComponente', 
			ip = '$ip', cod_cidade = '$cod_cidade' WHERE id_componente='$id_componente'";
				
			
			if (mysqli_query($link, $update)){
				
				header("Location: lista_componentes.php");
				
			}else{
					die(mysqli_error($link));
			}
			
		?>
	</body>
</html>