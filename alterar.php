<?php

$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');

session_start();
if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
	header("Location: login.php");
	exit;
}

$outra = "";
$outra = isset($_POST['idTask']) ? $_POST['idTask'] : '';
$outra = !empty($_POST['idTask']) ? $_POST['idTask'] : '';

include("conexao.php");
$selecao = selectId($outra);
//var_dump($selecao);

echo $selecao;

?>

<!DOCTYPE html>
<html>
 <head>
 	<title>Alterar</title>
 	<link rel='stylesheet' href='style.css' />
 	<meta charset="UTF-8">

 </head>
 <body>
 	<div id="esq">
	 	<form name="tarefas" action="conexao.php" method="post">			
	 		<?php 
	 			$query = "select * from task";
				$users = $db->query($query);

	 		?>
	 		<label><b>Código da Task</b></label>
	 		<input type="text" name="codTask" value="<?php $users["idTask"] ?>" disabled>

	 		<label><b>Nome da Task</b></label>
	 		<input type="text" name="nome" size="20" value="<?php $suers["nome"] ?>" required>

	 		<label><b>Descrição</b></label>
	 		<input type="text" name="descricao" size="50" value="<?php $users["descricao"] ?>" required>

	 		<label><b>Anexo</b></label>
	 		<input type="hidden" name="acao" value="alterar" />
	 		<input type="hidden" name="id" value="<?php $users["idTask"] ?>" />
	 		<input type="submit" name="Enviar" value="alterar" />
	 		<a href="logout.php">Sair</a>
	 	</form>
 	</div>

 </body>
</html>