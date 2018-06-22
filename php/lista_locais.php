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
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	
	<body>
	
		<?php 
			menu();
		?>
		
		<fieldset class="filtro">
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
					
					<option value="id_crescente">ID (Crescente)</option>
					<option value="id_descrecente">ID (Descrecente)</option>
					
					<option value="pais_a_z">País (A->Z)</option>
					<option value="pais_z_a">País (Z->A)</option>
					
					<option value="estado_a_z">Estado (A->Z)</option>
					<option value="estado_z_a">Estado (Z->A)</option>
					
					<option value="cidade_a_z">Cidade (A->Z)</option>
					<option value="cidade_z_a">Cidade (Z->A)</option>
					
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
				
					$where = '';
		
					if( !empty($_POST["filtroPais"]) ){
					
						$letra = $_POST['filtroPais'];
					
						$where = "WHERE nome_pais LIKE '$letra%'";
					
					}
					
					if( !empty($_POST["filtroEstado"]) ){
						
						$letra = $_POST['filtroEstado'];
						
						if( $where != '' ){
							
							$where .= " AND nome_estado LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE nome_estado LIKE '$letra%'";
							
						}
						
					}
					
					if( !empty($_POST["filtroCidade"]) ){
						
						$letra = $_POST['filtroCidade'];
						
						if( $where != '' ){
							
							$where .= " AND nome_cidade LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE nome_cidade LIKE '$letra%'";
							
						}
						
					}
					#########################################################################################################################
					
					$order = '';
					
					if( isset($_POST["ordenacaoLocL"]) || isset($_SESSION["local"]) ){
					
						if( isset($_POST["ordenacaoLocL"]) ){
						
							$_SESSION["local"] = $_POST["ordenacaoLocL"];
						
						}
						
						switch($_SESSION["local"]){
						
							case "id_crescente":
								$order = " ORDER BY id_pais";
							break;
							
							case "id_descrecente":
								$order = " ORDER BY id_pais DESC";
							break;
								
						//---------------------------------------------------------//
							case "pais_a_z":
								$order = " ORDER BY nome_pais";
							break;
							
							case "pais_z_a":
								$order = " ORDER BY nome_pais DESC";
							break;
								
						//---------------------------------------------------------//
							case "estado_a_z":
								$order = " ORDER BY nome_estado";
							break;
								
							case "estado_z_a":
								$order = " ORDER BY nome_estado DESC";
							break;
								
						//---------------------------------------------------------//
							case "cidade_a_z":
								$order = " ORDER BY nome_cidade";
							break;
							
							case "cidade_z_a":
								$order = " ORDER BY nome_cidade DESC";
							break;
							
						}
						
					}
					
					#########################################################################################################################
					
					
					$select = "SELECT * FROM view_locais $where $order";
					
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
					
						echo "<tr>";
							echo "<td>" . $linha['nome_pais'] . "</td>";
							echo "<td>" . $linha['nome_estado'] . "</td>";
							echo "<td>" . $linha['nome_cidade'] . "</td>";
							
							echo "<td> <a href='form_alterar_locais.php?id_pais=" . $linha['id_pais'] . "'>Editar</a></td>";
							
						echo "</tr>";
					
					}
				?>
			</tbody>
		</table>
	</body>

</html>