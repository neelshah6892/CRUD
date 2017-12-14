<?php

$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');

session_start();
if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
	header("Location: login.php");
	exit;
}

?>

<!DOCTYPE html>
<html>
 <head>
 	<title>Tasks</title>
 	<link rel='stylesheet' href='style.css' />
 	<meta charset="UTF-8">

 </head>
 <body>
 	<div id="esq">
	 	<form name="tarefas" action="conexao.php" method="post" enctype="multipart/form-data">
	 		<label><b>Código da Task</b></label>
	 		<input type="text" name="idTask" disabled>
	 		<br /><br />

	 		<label><b>Nome da Task</b></label>
	 		<input type="text" name="nome" required>
			<br /><br />

	 		<label><b>Descrição</b></label>
	 		<input type="text" name="descricao" required>
	 		<br /><br />

	 		<label><b>Anexo</b></label><br /><br />
	 		<input type="file" name="fileToUpload" id="fileToUpload">
	 		<br /><br />
	 		
	 		<input type="submit" name="acao" value="inserir">
	 		<a href="logout.php">Sair</a>
	 	</form>
 	</div>

 	<div id="tasks">
 		<table>
	 		<thead>
				<th>ID</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Editar</th>
				<th>Excluir</th>
	 		</thead>
	 		<tbody>

	 		<?php
				$query = "select * from task";
				$users = $db->query($query);
				foreach ($users as $row) { 
			?>

			<tr>
				<td> <?php print $row["idTask"]; ?> </td>
			    <td> <?php print $row["nome"]; ?> </td>
				<td> <?php print $row["descricao"]; ?> </td>
				<td>
					<form action="alterar.php" method="POST"  name="alterar">
		 				<input name="id" value="<?php echo $row['idTask'] ?>" type="hidden"  />
		 				<input type="submit" value="Editar" />
					</form>
 				</td>
 				<td>
 					<form action="conexao.php" method="post"  name="excluir">
	 					<input type="hidden" name="id" value="<?php echo $row['idTask'] ?>" />
	 					<input type="hidden" name="acao" value="excluir" />
	 					<input type="submit" value="Excluir" name="excluir" />
					</form>
 				</td>
			</tr>
			<?php }
			    ?>
	 		</tbody> 			
 		</table>	
 	</div>
 </body>
</html>