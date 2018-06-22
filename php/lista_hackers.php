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
			<form action="lista_hackers.php" method="post">
				
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
			
			<form action="lista_hackers.php" method="post" name="ordenarHacker">
				
				<label>Ordenar</label>
				
				<select name="ordenacaoHacker" onchange="document.ordenarHacker.submit()">
				
					<option value="">:: Ordenar por ::</option>
					
					<option value="codinome_a_z">Codinome (A->Z)</option>
					<option value="codinome_z_a">Codinome (Z->A)</option>
					
					<option value="paradeiro_a_z">Paradeiro (A->Z)</option>
					<option value="paradeiro_z_a">Paradeiro (Z->A)</option>
					
				</select>
				
			</form>
			
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
					$where = '';
		
					if( !empty($_POST["filtroCodinome"]) ){
					
						$letra = $_POST['filtroCodinome'];
					
						$where = "WHERE nome_hacker LIKE '$letra%'";
					
					}
					
					if( !empty($_POST["filtroParadeiro"]) ){
						
						$letra = $_POST['filtroParadeiro'];
						
						if( $where != '' ){
							
							$where .= " AND paradeiro LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE paradeiro LIKE '$letra%'";
							
						}
						
					}
					
					#########################################################################################################################
					
					$order = '';
					
					if( isset($_POST["ordenacaoHacker"]) || isset($_SESSION["local"]) ){
					
						if( isset($_POST["ordenacaoHacker"]) ){
						
							$_SESSION["local"] = $_POST["ordenacaoHacker"];
						
						}
						
						switch($_SESSION["local"]){
						
							
							case "codinome_a_z":
								$order = " ORDER BY nome_hacker";
							break;
							
							case "codinome_z_a":
								$order = " ORDER BY nome_hacker DESC";
							break;
								
						//---------------------------------------------------------//
							case "paradeiro_a_z":
								$order = " ORDER BY paradeiro";
							break;
								
							case "paradeiro_z_a":
								$order = " ORDER BY paradeiro DESC";
							break;
								
						
						}
						
					}
					$select = "SELECT * FROM hackers $where $order";
					
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