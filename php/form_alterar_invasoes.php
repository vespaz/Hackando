<?php 
	include "conexao.php";
	include "funcao.php";
	
	valida_session();
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Alteração de Invasões</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	
	<body>
		<?php 
			menu(); 
			
			$sql = "SELECT * FROM view_invasoes where id_invasoes=" . $_GET["id_invasoes"];
			
			$resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
			
			$linha = mysqli_fetch_array($resultado);
		?>
		<fieldset>
			<form action="alterar_invasoes.php" method="post">
				<label>Hacker que invadiu</label>
				<input type="text" name="cod_hacker" value="<?=$linha['nome_hacker']?>" readonly/>
				<br />
				<br />
				
				<label>Componente Hackado</label>
				<input type="text" name="cod_comp" value="<?=$linha['nome_componente']?>" readonly/>
				<br />
				<br />
				
				<label>Status de Hackamento</label>
				<select name="status" >
				
					<option value="Online" > Online (êxito) </option>
					<option value="Offline" > Offline (falha) </option>
				
				</select>
				<br />
				<br />
				
				<input type="hidden" name="id_invasoes" value="<?=$linha["id_invasoes"]?>" />
				
				<input type="submit" value="Enviar"/>
			
			</form>
		</fieldset>
	</body>
</html>