<!DOCTYPE html>

<?php

	include "conexao.php";
	include "funcao.php";
	
	valida_session();

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro de Invasões</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
	</head>
	
	<body>
	
		<?php
		
			menu();
		
		?>
		
		<fieldset>
		
			<legend>Cadastro de invasões</legend>
			
			<form action="cadastro_invasoes.php" method="post" >
			
				<label>Hacker que invadiu</label>
				<select name="cod_hacker" >
				
					<?php
					
						$select = "SELECT * FROM hackers";
			
						$resultado = mysqli_query( $link, $select );
						
						while( $linha = mysqli_fetch_array( $resultado ) ){
					
							echo "<option value='" . $linha['id_hacker'] . "' > " . $linha['nome_hacker'] . " </option>";
						
						}
					
					?>
				
				</select>
				
				<label>Componente Hackado</label>
				<select name="cod_comp" >
				
					<?php
					
						$select = "SELECT * FROM componentes";
			
						$resultado = mysqli_query( $link, $select );
						
						while( $linha = mysqli_fetch_array( $resultado ) ){
					
							echo "<option value='" . $linha['id_componente'] . "' > " . $linha['nome_componente'] .
							" / " . $linha['ip'] . " </option>";
						
						}
					
					?>
				
				</select>
				
				<label>Status de Hackamento</label>
				<select name="status" >
				
					<option value="Online" > Online (êxito) </option>
					<option value="Offline" > Offline (falha) </option>
				
				</select>
			
				<input type="submit" value="Cadastrar" />
			
			</form>
		
		</fieldset>
	
	</body>

</html>