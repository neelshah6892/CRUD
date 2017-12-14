<?php

include("conexao.php");

$outra = "";
$outra = isset($_POST['id']) ? $_POST['id'] : '';
$outra = !empty($_POST['id']) ? $_POST['id'] : '';

$registro = selectId($outra);

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
	 	<form name="tarefas" action="conexao.php" method="post" enctype="multipart/form-data">			
	 		<label><b>Código da Task</b></label>
	 		<input type="text" name="codTask" value="
	 		<?php echo $registro['idTask'] ?>
	 		" disabled />
	 		<br /><br />

	 		<label><b>Nome da Task</b></label>
	 		<input type="text" name="nome" size="20" value="<?php echo $registro['nome'] ?>" required>
	 		<br /><br />

	 		<label><b>Descrição</b></label>
	 		<input type="text" name="descricao" size="50" value="<?php echo $registro['descricao'] ?>" required>
	 		<br /><br />

	 		<label><b>Anexo</b></label><br /><br />
	 		<input type="file" name="fileToUpload" id="fileToUpload">
	 		<br /><br />
	 		
	 		<input type="hidden" name="acao" value="alterar" />
	 		<input type="hidden" name="id" value="<?php echo $registro['idTask'] ?>" />
	 		<input type="submit" name="Enviar" value="alterar" />
	 		<a href="index.php">Voltar</a>
	 	</form>
 	</div>

 </body>
</html>