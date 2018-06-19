<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Login</title>
	
	</head>
	
	<body>
	
		<?php
		
			if( isset($_GET["erro"]) ){
			
				echo "<h1 classs='erro'>Codinome ou senha inválidos!</h1>";
			
			}
		
		?>
	
		<h1>Realize seu login</h1>
		
		<fieldset>
		
			<legend>Dados</legend>
		
			<form action="valida_login.php" method="post" >
			
				<label>Codinome Hacker: </label>
				<input type="text" name="nome" />
				
				<label>Senha: </label>
				<input type="password" name="senha" />
				
				<input type="submit" value="Login" />
				<input type="reset" value="Limpar" />
			
			</form>
		
		</fieldset>
		
		<a href="cadastro_hacker.php">Cadastre-se</a>
	
	</body>

</html>