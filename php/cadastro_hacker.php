<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro Hacker</title>
	
	</head>
	
	<body>
	
		<?php
	
			if( isset($_GET["erro"]) ){
			
				if($_GET["erro"] == 2){
					
					echo "<h1 class='erro'>Campos vazios</h1>";
					
				}else{
				
					echo "<h1 classs='erro'>Codinome já é resgitrado!</h1>";
				
				}
			
			}
			
		?>
	
		<h1>Realize seu cadastro</h1>
		
		<fieldset>
		
			<legend>Dados</legend>
		
			<form action="valida_cadastro.php" method="post" >
			
				<label>Codinome Hacker: </label>
				<input type="text" name="nome"/>
				
				<label>Paradeiro Operacional: </label>
				<input type="text" name="paradeiro" placeholder="LulzSec, Anonymous" />
				
				<label>Senha: </label>
				<input type="password" name="senha" />
				
				<label>Confirme a senha: </label>
				<input type="password" name="senha1" />
				
				<input type="submit" value="Login" />
				<input type="reset" value="Limpar" />
			
			</form>
		
		</fieldset>
		
		<a href="login.php">Fazer Login</a>
	
	</body>

</html>