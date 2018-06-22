<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Cadastro Hacker</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	
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
		
		<fieldset class="cadastro">
		
			<legend>Dados</legend>
		
			<form action="valida_cadastro.php" method="post" >
			
				<div class="label">
				
					<label>Codinome Hacker: 		</label> <br /><br />
					<label>Paradeiro Operacional: 	</label> <br /><br />
					<label>Senha:					</label> <br /><br />
					<label>Confirme a senha: 		</label>
				
				</div>
				
				<div class="input">
				
					<input type="text" name="nome"/>										<br /><br />
					<input type="text" name="paradeiro" placeholder="LulzSec, Anonymous" /> <br /><br />
					<input type="password" name="senha" /> 									<br /><br />
					<input type="password" name="senha1" />
				
				</div>
				
				<br />
				<br />
				
				<input type="submit" value="Cadastrar-se" />
				<input type="reset" value="Limpar" />
			
			</form>
		
		</fieldset>
		
		<a class="link_c" href="login.php">Fazer Login</a>
	
	</body>

</html>