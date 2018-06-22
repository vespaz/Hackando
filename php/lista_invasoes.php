<?php
	include "conexao.php";
	include "funcao.php";
	
	valida_session();
	
?>
<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Listagem de Hackers</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	
	<body>
	
		<?php 
			menu();
		?>
		
		<fieldset class="filtro">
			<form action="lista_invasoes.php" method="post">
				
				<label>Filtar por Nome Hacker: </label>
				<input type="text" name="filtroNomeHacker" />
				<br />
				<br />
				
				<label>Filtar por Nome Componente: </label>
				<input type="text" name="filtroNomeComponente" />
				<br />
				<br />
				
				<label>Filtar por IP: </label>
				<input type="text" name="filtroIP" />
				<br />
				<br />
				
				<label>Filtar por Status: </label>
				<input type="text" name="filtroStatus" />
				<br />
				<br />
				
				<input type="submit" value="Enviar" />
			
			</form>
			
			<br />
			
			<form action="lista_invasoes.php" method="post" name="ordenarInvasoes">
				
				<label>Ordenar</label>
				
				<select name="ordenacaoInvasoes" onchange="document.ordenarInvasoes.submit()">
				
					<option value="">:: Ordenar por ::</option>
					
					<option value="nomeHacker_a_z">Nome Hacker (A->Z)</option>
					<option value="nomeHacker_z_a">Nome Hacker (Z->A)</option>
					
					<option value="nomeComponente_a_z">Nome Componente (A->Z)</option>
					<option value="nomeComponente_z_a">Nome Componente (Z->A)</option>
					
					<option value="ip_a_z">IP (Crescente)</option>
					<option value="ip_z_a">IP (Decrecente)</option>
					
					<option value="status_a_z">Status (A->Z)</option>
					<option value="status_z_a">Status (Z->A)</option>
					
				</select>
				
			</form>
			
		</fieldset>
		
		<table>
			<thead>
				<tr>
					<th>Nome Hacker</th>
					<th>Nome Componente</th>
					<th>IP</th>
					<th>Status</th>
					<th colspan="2">Ação</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 
					$where = '';
		
					if( !empty($_POST["filtroNomeHacker"]) ){
					
						$letra = $_POST['filtroNomeHacker'];
					
						$where = "WHERE nome_hacker LIKE '$letra%'";
					
					}
					
					if( !empty($_POST["filtroNomeComponente"]) ){
						
						$letra = $_POST['filtroNomeComponente'];
						
						if( $where != '' ){
							
							$where .= " AND nome_componente LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE nome_componente LIKE '$letra%'";
							
						}
						
					}
					
					if( !empty($_POST["filtroIP"]) ){
						
						$letra = $_POST['filtroIP'];
						
						if( $where != '' ){
							
							$where .= " AND ip LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE ip LIKE '$letra%'";
							
						}
						
					}
					
					if( !empty($_POST["filtroStatus"]) ){
						
						$letra = $_POST['filtroStatus'];
						
						if( $where != '' ){
							
							$where .= " AND status LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE status LIKE '$letra%'";
							
						}
						
					}
					#########################################################################################################################
					
					$order = '';
					
					if( isset($_POST["ordenacaoInvasoes"]) || isset($_SESSION["local"]) ){
					
						if( isset($_POST["ordenacaoInvasoes"]) ){
						
							$_SESSION["local"] = $_POST["ordenacaoInvasoes"];
						
						}
						
						switch($_SESSION["local"]){
						
							
							case "nomeHacker_a_z":
								$order = " ORDER BY nome_hacker";
							break;
							
							case "nomeHacker_z_a":
								$order = " ORDER BY nome_hacker DESC";
							break;
								
						//---------------------------------------------------------//
							case "nomeComponente_a_z":
								$order = " ORDER BY nome_componente";
							break;
								
							case "nomeComponente_z_a":
								$order = " ORDER BY nome_componente DESC";
							break;
								
						//---------------------------------------------------------//
							case "ip_a_z":
								$order = " ORDER BY ip";
							break;
							
							case "ip_z_a":
								$order = " ORDER BY ip DESC";
							break;
						//---------------------------------------------------------//
							case "status_a_z":
								$order = " ORDER BY status";
							break;
							
							case "status_z_a":
								$order = " ORDER BY status DESC";
							break;
						}
						
					}
					
					#########################################################################################################################
					$select = "SELECT * FROM view_invasoes $where $order";
					
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
					
						echo "<tr>";
							echo "<td>" . $linha['nome_hacker'] . "</td>";
							echo "<td>" . $linha['nome_componente'] . "</td>";
							echo "<td>" . $linha['ip'] . "</td>";
							echo "<td>" . $linha['status'] . "</td>";
							
							
							
							echo "<td> <a href='form_alterar_invasoes.php?id_invasoes=" . $linha['id_invasoes'] . "'>Editar</a></td>";
							echo "<td> <a href='remove_invasoes.php?id_invasoes=" . $linha['id_invasoes'] . "'>Excluir</a></td>";
						echo "</tr>";
					
					}
				?>
			</tbody>
		</table>
	</body>

</html>