<?php
	include "conexao.php";
	include "funcao.php";
	
	valida_session();
	
?>
<!DOCTYPE html>

<html lang="pt-br">

	<head>
	
		<meta charset="UTF-8" />
		<title>Página de Listagem de Componentes</title>
		<link type="text/css" rel="stylesheet" href="../css.css" />
	</head>
	
	<body>
	
		<?php 
			menu();
		?>
		
		<fieldset class="filtro">
			<form action="lista_componentes.php" method="post">
				
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
			
			<form action="lista_componentes.php" method="post" name="ordenarComponentes">
				
				<label>Ordenar</label>
				
				<select name="ordenacaoComponentes" onchange="document.ordenarComponentes.submit()">
				
					<option value="">:: Ordenar por ::</option>
					
					<option value="id_crescente">ID (Crescente)</option>
					<option value="id_descrecente">ID (Descrecente)</option>
					
					<option value="componente_a_z">Componente (A->Z)</option>
					<option value="componente_z_a">Componente (Z->A)</option>
					
					<option value="end_a_z">Endereço IP (A->Z)</option>
					<option value="end_z_a">Endereço IP (Z->A)</option>
					
					<option value="loc_a_z">Localização (A->Z)</option>
					<option value="loc_z_a">Localização (Z->A)</option>
					
				</select>
				
			</form>
			
		</fieldset>
		
		<table>
			<thead>
				<tr>
					<th>Componente</th>
					<th>Endereço IP</th>
					<th>Localização</th>
					<th colspan="2">Ação</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$where = '';
					
					if(!empty($_POST["filtroComponente"])){
						
						$letra = $_POST['filtroComponente'];
						
						if($where != ''){
							$where .= "AND nome_componente LIKE '$letra%'";
						}else{
							$where = "WHERE nome_componente LIKE '$letra%'";
						}
					}
					
					if(!empty($_POST["filtroEndIP"])){
						
						$letra = $_POST["filtroEndIP"];
						
						if($where != ''){
							$where .= "AND ip LIKE '$letra%'";
						}else{
							$where = "WHERE ip LIKE '$letra%'";
						}
					}
					
					if(!empty($_POST["filtroLoc"])){
						
						$letra = $_POST["filtroLoc"];
						
						if($where != ''){
							$where .= "AND nome_cidade LIKE '$letra%'";
						}else{
							$where = "WHERE nome_cidade LIKE '$letra%'";
						}
					}
					#########################################################################################################################
					
					$order = '';
					
					if( isset($_POST["ordenacaoComponentes"]) || isset($_SESSION["local"]) ){
					
						if( isset($_POST["ordenacaoComponentes"]) ){
						
							$_SESSION["local"] = $_POST["ordenacaoComponentes"];
						
						}
						
						switch($_SESSION["local"]){
						
							case "id_crescente":
								$order = " ORDER BY id_componente";
							break;
							
							case "id_descrecente":
								$order = " ORDER BY id_componente DESC";
							break;
								
						//---------------------------------------------------------//
							case "componente_a_z":
								$order = " ORDER BY nome_componente";
							break;
							
							case "componente_z_a":
								$order = " ORDER BY nome_componente DESC";
							break;
								
						//---------------------------------------------------------//
							case "end_a_z":
								$order = " ORDER BY ip";
							break;
								
							case "end_z_a":
								$order = " ORDER BY ip DESC";
							break;
						//---------------------------------------------------------//
							case "loc_a_z":
								$order = "ORDER BY nome_cidade";
							break;
							case "loc_z_a":
								$order = " ORDER BY nome_cidade DESC";
							break;
						}
						
					}
					
					
					#########################################################################################################################
					$select = "SELECT * FROM view_componentes $where $order";
					
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
					
						echo "<tr>";
							echo "<td>" . $linha['nome_componente'] . "</td>";
							echo "<td>" . $linha['ip'] . "</td>";
							echo "<td>" . $linha['nome_cidade'] . "</td>";
							
							
							
							echo "<td> <a href='form_alterar_componente.php?id_componente=" . $linha['id_componente'] . "'>Editar</a></td>";
							echo "<td> <a href='remove_componente.php?id_componente=" . $linha['id_componente'] . "'>Excluir</a></td>";
						echo "</tr>";
					
					}
				?>
			</tbody>
		</table>
	</body>

</html>