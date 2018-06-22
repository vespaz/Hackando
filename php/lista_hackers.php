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
			<form action="lista_hacker.php" method="post">
				
				<label>Filtrar por Codinome: </label>
				<input type="text" name="filtroCodinome" />
				<br />
				<br />
				
				<label>Filtrar por paradeiro: </label>
				<input type="text" name="filtroParadeiro" />
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
					
					<option value="codinome_a_z">Codinome (A->Z)</option>
					<option value="codinome_z_a">Codinome (Z->A)</option>
					
					<option value="paradeiro_a_z">Paradeiro (A->Z)</option>
					<option value="paradeiro_z_a">Paradeiro (Z->A)</option>
					
				</select>
				
			</form>-->
			
		</fieldset>
		
		<table>
			<thead>
				<tr>
					<th>Codinome Hacker</th>
					<th>Paradeiro Operacional</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 
					$select = "SELECT * FROM hackers";
					
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
					
						echo "<tr>";
							echo "<td>" . $linha['nome_hacker'] . "</td>";
							echo "<td>" . $linha['paradeiro'] . "</td>";
							
							
						echo "</tr>";
					
					}
				?>
			</tbody>
		</table>
	</body>

</html>