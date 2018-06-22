<!DOCTYPE html>

<?php

	include "conexao.php";
	include "funcao.php";
	
	valida_session();

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Alteração de Locais</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
	</head>
	
	<body>
		<?php 
			menu();
			
			$sql = "SELECT * FROM view_locais where id_pais=" . $_GET["id_pais"];
			
			$resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
			
			$linha= mysqli_fetch_array($resultado);
		?>
		
		<fieldset class="cadastro">
		
			<legend>Alteração de dados</legend>
		
			<form action="alterar_locais.php" method="post" >
			
				<label>Nome do País</label>
				<input type="text" name="pais" value="<?= $linha["nome_pais"]?>" />
				<br />
				<br />
				
				<label>Nome do Estado</label>
				<input type="text" name="estado" value="<?=$linha["nome_estado"]?>" />
				<br />
				<br />
				
				<label>Nome da Cidade</label>
				<input type="text" name="cidade" value="<?=$linha["nome_cidade"]?>" />
				<br />
				<br />
				
				<input type="hidden" name="id_pais" value="<?=$linha["id_pais"]?>" />
				
				<input type="hidden" name="id_estado" value="<?=$linha["id_estado"]?>" />
				
				<input type="hidden" name="id_cidade" value="<?=$linha["id_cidade"]?>" />
				<input type="submit" value="Enviar"/>
			</form>
			
		</fieldset>
	
	</body>

</html>