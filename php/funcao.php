<?php	

	function menu(){
		
		?>
		
		<p class="link">
		
			<a href="locais.php">Cadastrar um local</a>
			<a href="componentes.php">Cadastrar um componente</a>
			<a href="invasoes.php">Cadastrar uma invasão</a>
		
		</p>
		
		<?php
		
	}
	
	function valida_session(){
		
		if( !isset($_SESSION["codinome"]) || !isset($_SESSION["senha"]) ){
			
			header("Location: erro_login.php");
			
			exit;
			
		}else if( isset($_SESSION["codinome"]) && isset($_SESSION["senha"]) ){
			
			$codinome = $_SESSION["codinome"];
			
			$senha = $_SESSION["senha"];
			
		}
		
	}

?>