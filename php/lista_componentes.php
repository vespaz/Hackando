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
			<form action="lista_componente.php" method="post">
				
				<label>Filtar por componente: </label>
				<input type="text" name="filtroComponente" />
				<br />
				<br />
				
				<label>Filtar por endereço IP: </label>
				<input type="text" name="filtroEndIP" />
				<br />
				<br />
				<label>Filtar por localização: </label>
				<input type="text" name="filtroLoc" />
				<br />
				<br />
				
				<input type="submit" value="Enviar" />
			
			</form>
			
			<br />
			
			<!-- <form action="lista_hacker.php" method="post" name="ordenarHacker">
				
				<label>Ordenar</label>
				
				<select name="ordenacaoHacker" onchange="document.ordenarHacker.submit()">
				
					<option value="">:: Ordenar por ::</option>
					
					<option value="id_a_z">ID (Crescente)</option>
					<option value="id_z_a">ID (Descrecente)</option>
					
					<option value="componente_a_z">Componente (A->Z)</option>
					<option value="componente_z_a">Componente (Z->A)</option>
					
					<option value="end_a_z">Endereço IP (A->Z)</option>
					<option value="end_z_a">Endereço IP (Z->A)</option>
					
				</select>
				
			</form>-->
			
		</fieldset>
		
		<table>
			<thead>
				<tr>
					<th>Componente</th>
					<th>Endereço IP</th>
					<th>Localização</th>
					<th>Ação</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 
					$select = "SELECT * FROM view_locais";
					
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
					
						echo "<tr>";
							echo "<td>" . $linha['nome_componente'] . "</td>";
							echo "<td>" . $linha['ip'] . "</td>";
							echo "<td>" . $linha['cod_cidade'] . "</td>";
							
							
							
							echo "<td> <a href='remove_componente.php?id_componente=" . $linha['id_componente'] . "'>Excluir</a></td>";
						echo "</tr>";
					
					}
				?>
			</tbody>
		</table>
	</body>

</html>