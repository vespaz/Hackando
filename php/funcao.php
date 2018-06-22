<?php	

	function menu(){
		
		?>
		
		<div class="link">
		
			<a class="link_i" href="index.php">Início</a> <br /><br />
			<a class="link" href="locais.php">Cadastrar um local</a> |
			<a class="link" href="form_componentes.php">Cadastrar um componente</a> |
			<a class="link" href="form_invasoes.php">Cadastrar uma invasão</a> |
			<a class="link_r" href="logout.php">Fazer Logout</a>
		
		</div>
		
		<br />
		
		<div class="link">
		
			<a class="link" href="lista_hackers.php">Listar Hackers</a> |
			<a class="link" href="lista_locais.php">Listar Locais</a> |
			<a class="link" href="lista_componentes.php">Listar Componentes</a> |
			<a class="link" href="lista_invasoes.php">Listar Invasões</a>
		
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