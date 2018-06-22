<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Login</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
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
			
				<div class="label">
				
					<label>Codinome Hacker: </label> <br /><br />
					<label>Senha: </label>
				
				</div>
				
				<div class="input">
				
					<input type="text" name="nome" /><br /><br />
					<input type="password" name="senha" />
				
				</div>
				
				<br />
				<br />
				
				<input type="submit" value="Logar" />
				<input type="reset" value="Limpar" />
			
			</form>
		
		</fieldset>
		
		<a class="link_c" href="cadastro_hacker.php">Cadastre-se</a>
	
	</body>

</html>