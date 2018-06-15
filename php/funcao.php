<?php	

	function menu(){
		
		?>
		
		<p class="link">
		
			<a href="locais.php">Cadastrar um local</a>
			<a href="componentes.php">Cadastrar um componente</a>
			<a href="invasoes.php">Cadastrar uma invasão</a>
			<a href="logout.php">Fazer Logout</a>
		
		</p>
		
		<?php
		
	}
	
	function valida_session(){
		
		session_start();
		
		if( !isset($_SESSION["codinome"]) || !isset($_SESSION["senha"]) ){
			
			header("Location: erro_login.php");
			
			exit;
			
		}
		
	}

?>