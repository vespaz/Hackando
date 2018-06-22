<?php 
	include "conexao.php";
	include "funcao.php";
	
	valida_session();
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Alteração de Componentes</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	
	<body>
		<?php 
			menu(); 
			
			$sql = "SELECT * FROM view_componentes where id_componente=" . $_GET["id_componente"];
			
			$resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
			
			$linha = mysqli_fetch_array($resultado);
		?>
		<fieldset>
			<form action="alterar_componente.php" method="post">				
				<label>Componente:</label>
				<input type="text" name="componente" value="<?=$linha["nome_componente"]?>" />
				<br />
				<br />
				
				<label>IP:</label>
				<input type="text" name="ip" value="<?=$linha["ip"]?>"/>
				<br />
				<br />
				
				<input type="hidden" name="id_componente" value="<?=$linha["id_componente"]?>" />

				<label>Localização:</label>				
				<select name="EndIp">
					<?php
					
						$select = "SELECT * FROM view_locais";
			
						$resultado = mysqli_query( $link, $select );
						
						while( $linha = mysqli_fetch_array( $resultado ) ){
					
							echo "<option value='" . $linha['id_cidade'] . "' > " . $linha['nome_pais'] .
							" - " . $linha['nome_estado'] . " / " . $linha["nome_cidade"] . " </option>";
						
						}
					
					?>
				</select>
				<br />
				<br />
				
				
				
				
				<input type="submit" value="Enviar"/>
			
			</form>
		</fieldset>
	</body>
</html>