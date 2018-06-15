<!DOCTYPE html>

<?php

	include "conexao.php";
	include "funcao.php";
	
	valida_session();

?>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro de Locais</title>
	
	</head>
	
	<body>
	
		<?php
		
			menu();
		
			if( !isset( $_GET["cod"] ) ){
		
		?>
	
			<p>
			
				<h1>O que você quer adicionar?</h1>
				
				<div class="link">
				
					<a href="locais.php?cod=1">Cadastrar um País</a> <br />
					<a href="locais.php?cod=2">Cadastrar um Estado</a> <br />
					<a href="locais.php?cod=3">Cadastrar uma Cidade</a>
					
				</div>
			
			</p>
			
		<?php
		
			$select = "SELECT * FROM view_locais";
			
			$resultado = mysqli_query( $link, $select );
		
			}else if( $_GET["cod"] == "1" ){
			
		?>
		
			<form action="cadastra_locais.php" method="post" >
			
				<label>Nome do País</label>
				<input type="text" name="pais" /><br />
				
				<input type="hidden" name="cod" value="<?=$_GET["cod"]?>" />
				
				<input type="submit" value="Cadastrar" />
			
			</form>
		
		<?php
		
			}else if( $_GET["cod"] == "2" ){
		
		?>
		
			<form action="cadastra_locais.php" method="post" >
			
				<label>Nome do País</label>
				<select name="pais">
				
					<?php
					
						while( $linha = mysqli_fetch_array( $resultado )){
						
							echo "<option value='" . $linha['nome_pais'] . "' >" . $linha['nome_pais'] . "</option>";
						
						}
					
					?>
				
				</select> <br />
				
				<label>Nome do Estado</label>
				<input type="text" name="estado" /><br />
				
				<input type="hidden" name="cod" value="<?=$_GET["cod"]?>" />
				
				<input type="submit" value="Cadastrar" />
			
			</form>
		
		<?php
		
			}else if( $_GET["cod"] == "3" ){
		
		?>
		
			<form action="cadastra_locais.php" method="post" >
			
				<label>Nome do País / Estado</label>
				<select name="estado">
				
					<?php
					
						while( $linha = mysqli_fetch_array( $resultado )){
						
							echo "<option value='" . $linha['cod_estado'] . "' >" . $linha['nome_pais'] . " / "
							. $linha['nome_estado'] . "</option>";
						
						}
					
					?>
				
				</select> <br />
				
				<label>Nome da Cidade</label>
				<input type="text" name="cidade" /><br />
				
				<input type="hidden" name="cod" value="<?=$_GET["cod"]?>" />
				
				<input type="submit" value="Cadastrar" />
			
			</form>
		
		<?php
		
			}
		
		?>
	
	</body>

</html>