<!DOCTYPE html>

<?php

	include "conexao.php";
	include "funcao.php";
	
	valida_session();

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro de Componentes</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
	</head>
	
	<body>
	
		<?php
		
			menu();
			
			$select = "SELECT * FROM view_locais";
			
			$resultado = mysqli_query( $link, $select );
		
		?>
		
		<fieldset>
		
			<legend>Cadastro de componente</legend>
			
			<form action="cadastro_componente.php" method="post" >
			
				<label>Componente:</label>
				<input type="text" name="componente" placeholder="Câmera, Servidor, Estação Espacial" />
				
				<label>IP:</label>
				<input type="text" name="ip" placeholder="192.000.000.000" />
				
				<label>País - Estado / Cidade:</label>
				<select name="cidade" >
				
					<?php
					
						while( $linha = mysqli_fetch_array( $resultado )){
						
							echo "<option value='" . $linha['id_cidade'] . "' >" . $linha['nome_pais'] . " - " .
							$linha['nome_estado'] . " / " . $linha['nome_cidade'] . "</option>";
						
						}
					
					?>
				
				</select>
				
				<input type="submit" value="Cadastrar Componente" />
			
			</form>
		
		</fieldset>
	
	</body>

</html>





