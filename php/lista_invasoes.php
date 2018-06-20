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
	
	</head>
	
	<body>
	
		<?php 
			menu();
		?>
		
		<fieldset>
			<form action="lista_hacker.php" method="post">
				
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
			
			<!-- <form action="lista_invasoes.php" method="post" name="ordenarInvasoes">
				
				<label>Ordenar</label>
				
				<select name="ordenacaoHacker" onchange="document.ordenarHacker.submit()">
				
					<option value="">:: Ordenar por ::</option>
					
					<option value="id_a_z">ID (Crescente)</option>
					<option value="id_z_a">ID (Descrecente)</option>
					
					<option value="nomeHacker_a_z">Nome Hacker (A->Z)</option>
					<option value="nomeHacker_z_a">Nome Hacker (Z->A)</option>
					
					<option value="nomeComponente_a_z">Nome Componente (A->Z)</option>
					<option value="nomeComponente_z_a">Nome Componente (Z->A)</option>
					
					<option value="ip_a_z">IP (A->Z)</option>
					<option value="ip_z_a">IP (Z->A)</option>
					
					<option value="status_a_z">Status (A->Z)</option>
					<option value="status_z_a">Status (Z->A)</option>
					
				</select>
				
			</form>-->
			
		</fieldset>
		
		<table>
			<thead>
				<tr>
					<th>Nome Hacker</th>
					<th>Nome Componente</th>
					<th>IP</th>
					<th>Status</th>
					<th>Ação</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 
					$select = "SELECT * FROM view_invasoes";
					
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
					
						echo "<tr>";
							echo "<td>" . $linha['nome_hacker'] . "</td>";
							echo "<td>" . $linha['nome_componente'] . "</td>";
							echo "<td>" . $linha['ip'] . "</td>";
							echo "<td>" . $linha['status'] . "</td>";
							
							
							
							echo "<td> <a href='remove_invasoes.php?id_invasoes=" . $linha['id_invasoes'] . "'>Excluir</a></td>";
						echo "</tr>";
					
					}
				?>
			</tbody>
		</table>
	</body>

</html>