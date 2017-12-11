<?php

function abrirBanco(){
	$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');
	return $db;
}

/*function todasTasks(){
	$db = abrirBanco();

	$query = "SELECT * FROM task";
	$stmt = $db->prepare($query);
	$stmt->execute();
	

	while($row = $stmt->fetch(PDO::FETCH_NUM)){
		$grupo[] = $row;
	}

	return $grupo;
}*/

function selectId($id){
	$db = abrirBanco();

	$query = "SELECT * FROM task WHERE idTask=".$id;
	$stmt = $db->prepare($query);
	$stmt->execute();
	
	$selecao = $stmt->fetch(PDO::FETCH_ASSOC);

	return $selecao;
}

function voltarIndex(){
	header("Location:index.php");
}

$acao = "";
$acao = isset($_POST['acao']) ? $_POST['acao'] : '';
$acao = !empty($_POST['acao']) ? $_POST['acao'] : '';

echo $acao;

if($acao=="inserir"){
	$db = abrirBanco();

	$nome = "";
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$nome = !empty($_POST['nome']) ? $_POST['nome'] : '';

	$descricao = "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
	$descricao = !empty($_POST['descricao']) ? $_POST['descricao'] : '';

	$query = "INSERT INTO task(nome,descricao) VALUES ('$nome','$descricao')";

	$stmt = $db->prepare($query);
	$stmt->execute(array($nome,$descricao));

	voltarIndex();
}

if($acao=="excluir"){
	$db = abrirBanco();

	$id = "";
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$id = !empty($_POST['id']) ? $_POST['id'] : '';
	echo $id;

	$query = "DELETE FROM task WHERE id='$id'";

	$stmt = $db->prepare($query);
	$stmt->execute();
	
	echo $id;
	//voltarIndex();
}

if($acao=="alterar"){
	$db = abrirBanco();

	$nome = "";
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$nome = !empty($_POST['nome']) ? $_POST['nome'] : '';

	$descricao = "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
	$descricao = !empty($_POST['descricao']) ? $_POST['descricao'] : '';

	$query = "UPDATE task SET nome='$nome', descricao='$descricao'";

	$stmt = $db->prepare($query);
	$stmt->execute(array($nome,$descricao));

	voltarIndex();
}