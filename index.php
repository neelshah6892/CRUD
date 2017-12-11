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
	 	<form name="tarefas" action="conexao.php" method="post">
	 		<label><b>Código da Task</b></label>
	 		<input type="text" name="codTask" disabled>

	 		<label><b>Nome da Task</b></label>
	 		<input type="text" name="nome" required>

	 		<label><b>Descrição</b></label>
	 		<input type="text" name="descricao" required>

	 		<label><b>Anexo</b></label>

	 		<input type="submit" name="acao" value="inserir">
	 		<a href="logout.php">Sair</a>
	 	</form>
 	</div>

 	<div id="tasks">
 		<table>
	 		<thead>
	 			<th>
	 				<th>ID</th>
	 				<th>Nome</th>
	 				<th>Descrição</th>
	 				<th>Editar
	 				</th>
	 				<th>Excluir</th>
	 			</th>
	 		</thead>
	 		<tbody>
	 		<?php

			$query = "select * from task";
			$users = $db->query($query);
			foreach ($users as $row) { ?>
			<tr>
				<td></td>
				<td><br /> <?php print $row["idTask"] ?> </td>
			    <td> <?php print $row["nome"] ?> </td>
				<td> <?php print $row["descricao"] ?> </td>
				<td>
					<form action="alterar.php" method="post"  name="alterar">
		 				<input type="hidden" name="id" value=<?php $row["idTask"] ?> />
		 				<input type="submit" value="Editar" name="editar" />
					</form>
 				</td>
 				<td>
 					<form action="conexao.php" method="post"  name="excluir">
	 					<input type="hidden" name="id" value=<?php $row["idTask"] ?> />
	 					<input type="hidden" name="acao" value="excluir" />
	 					<input type="submit" value="Excluir" name="excluir" />
	 					<?php /*echo $row["idTask"];*/ ?>
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