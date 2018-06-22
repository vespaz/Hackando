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
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
	</head>
	
	<body>
	
		<?php
		
			menu();
		
			if( !isset( $_GET["cod"] ) ){
		
		?>
	
			<p>
			
				<h1>O que você quer adicionar?</h1>
				
				<div class="link">
				
					<a class="locais" href="locais.php?cod=1">Cadastrar um País</a> 	<br />
					<a class="locais" href="locais.php?cod=2">Cadastrar um Estado</a> 	<br />
					<a class="locais" href="locais.php?cod=3">Cadastrar uma Cidade</a>
					
				</div>
			
			</p>
			
		<?php
		
			}else if( $_GET["cod"] == "1" ){
			
		?>
		
		<fieldset class="cadastro">
		
			<legend>Cadastrando um país</legend>
		
			<form action="cadastro_locais.php" method="post" >
			
				<div class="label">
				
					<label>Nome do País:</label>
				
				</div>
				
				<div class="input">
				
					<input type="text" name="pais" />
				
				</div>
				
				<input type="hidden" name="cod" value="<?=$_GET["cod"]?>" />
				
				<br />
				<br />
				
				<input type="submit" value="Cadastrar" />
			
			</form>
			
		</fieldset>
		
		<?php
		
			}else if( $_GET["cod"] == "2" ){
				
				$select = "SELECT * FROM pais ORDER BY id_pais DESC";
			
				$resultado = mysqli_query( $link, $select );
		
		?>
		
		<fieldset class="cadastro">
		
			<legend>Cadastrando um estado</legend>
		
			<form action="cadastro_locais.php" method="post" >
			
				<div class="label">
				
					<label>Nome do País:</label> 	<br /><br />
					<label>Nome do Estado:</label>
				
				</div>
				
				<div class="input">
				
					<select name="pais">
				
						<?php
						
							while( $linha = mysqli_fetch_array( $resultado )){
							
								echo "<option value='" . $linha['id_pais'] . "' >" . $linha['nome_pais'] . "</option>";
							
							}
						
						?>
				
					</select>	<br /><br />
					
					<input type="text" name="estado" />
				
				</div>
				
				<input type="hidden" name="cod" value="<?=$_GET["cod"]?>" />
				
				<br />
				<br />
				
				<input type="submit" value="Cadastrar" />
			
			</form>
			
		</fieldset>
		
		<?php
		
			}else if( $_GET["cod"] == "3" ){
				
				$select = "SELECT * FROM pais INNER JOIN estado WHERE estado.cod_pais = pais.id_pais  ORDER BY id_estado DESC";
				
				$resultado = mysqli_query( $link, $select );
		
		?>
		
		<fieldset class="cadastro">
		
			<legend>Cadastrando uma cidade</legend>
		
			<form action="cadastro_locais.php" method="post" >
			
				<div class="label">
				
					<label>Nome do País / Estado: </label> 	<br /><br />
					<label>Nome da Cidade: </label>
				
				</div>
				
				<div class="input">
				
					<select name="estado">
				
						<?php
						
							while( $linha = mysqli_fetch_array( $resultado )){
							
								echo "<option value='" . $linha['id_estado'] . "' >" . $linha['nome_pais'] . " / "
								. $linha['nome_estado'] . "</option>";
							
							}
						
						?>
					
					</select>	<br /><br />
					
					<input type="text" name="cidade" />
				
				</div>
				
				<input type="hidden" name="cod" value="<?=$_GET["cod"]?>" />
				
				<br />
				<br />
				
				<input type="submit" value="Cadastrar" />
			
			</form>
		
		</fieldset>
		
		<?php
		
			}
		
		?>
		
		<br />
		<?php
		
			if( isset($_GET["cod"]) ){
		
		?>
			<a class="link_c" href="locais.php">Cadastre outro local</a>
			
		<?php
		
			}
			
		?>
	</body>

</html>