<?php
	include "conexao.php";
	include "funcao.php";
	
	valida_session();
	
?>
<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Listagem de Locais</title>
	
	</head>
	
	<body>
	
		<?php 
			menu();
		?>
		
		<fieldset>
			<form action="lista_locais.php" method="post">
				
				<label>Filtrar por Nome País: </label>
				<input type="text" name="filtroPais" />
				<br />
				<br />
				
				<label>Filtrar por Nome Estado: </label>
				<input type="text" name="filtroEstado" />
				<br />
				<br />
				
				<label>Filtrar por Nome Cidade: </label>
				<input type="text" name="filtroCidade" />
				<br />
				<br />
				
				<input type="submit" value="Enviar" />
			
			</form>
			
			<br />
			
			<form action="lista_locais.php" method="post" name="ordenarLocal">
				
				<label>Ordenar</label>
				
				<select name="ordenacaoLocL" onchange="document.ordenarLocal.submit()">
				
					<option value="">:: Ordenar por ::</option>
					
					<option value="id_a_z">ID (Crescente)</option>
					<option value="id_z_a">ID (Descrecente)</option>
					
					<option value="pai_a_z">País (A->Z)</option>
					<option value="pais_z_a">País (Z->A)</option>
					
					<option value="estado_a_z">Estado (A->Z)</option>
					<option value="estado_z_a">Estado (Z->A)</option>
					
				</select>
				
			</form>
			
		</fieldset>
		
		<table>
			<thead>
				<tr>
					<th>País</th>
					<th>Estado</th>
					<th>Cidade</th>
					<th>Ação</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 
					$select = "SELECT * FROM view_locais";
					
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
					
						echo "<tr>";
							echo "<td>" . $linha['nome_pais'] . "</td>";
							echo "<td>" . $linha['nome_estado'] . "</td>";
							echo "<td>" . $linha['nome_cidade'] . "</td>";
							
						echo "</tr>";
					
					}
				?>
			</tbody>
		</table>
	</body>

</html>