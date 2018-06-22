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
		
		<fieldset class="cadastro">
		
			<legend>Cadastro de componente</legend>
			
			<form action="cadastro_componente.php" method="post" >
			
				<div class="label">
				
					<label>Componente:</label>				<br /><br />
					<label>IP:</label>						<br /><br />
					<label>País - Estado / Cidade:</label>
				
				</div>
				
				<div class="input">
				
					<input type="text" name="componente" placeholder="Câmera, Servidor, Estação Espacial" /> <br /><br />
					<input type="text" name="ip" placeholder="192.000.000.000" />							 <br /><br />
					<select name="cidade" >
				
						<?php
						
							while( $linha = mysqli_fetch_array( $resultado )){
							
								echo "<option value='" . $linha['id_cidade'] . "' >" . $linha['nome_pais'] . " - " .
								$linha['nome_estado'] . " / " . $linha['nome_cidade'] . "</option>";
							
							}
						
						?>
				
					</select>
				
				</div>
				
				<br />
				<br />
				
				<input type="submit" value="Cadastrar Componente" />
			
			</form>
		
		</fieldset>
	
	</body>

</html>





