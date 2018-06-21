<?php	

	function menu(){
		
		?>
		
		<div class="link">
		
			<a href="locais.php">Cadastrar um local | </a>
			<a href="form_componentes.php">Cadastrar um componente | </a>
			<a href="form_invasoes.php">Cadastrar uma invasão | </a>
			<a href="logout.php">Fazer Logout</a>
		
		</div>
		
		<br />
		
		<div class="link">
		
			<a href="lista_locais.php">Listar Locais | </a>
			<a href="lista_componentes.php">Listar Componentes | </a>
			<a href="lista_invasoes.php">Listar Invasões | </a>
			<a href="lista_hackers.php">Listar Hackers</a>			
		
		</div>
		
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