<?php

session_start();
if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
	header("Location: login.php");
	exit;
}


function abrirBanco(){
	$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');
	return $db;
}

function selectId($id){
	$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');

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

	$query = "DELETE FROM task WHERE idTask='$id'";

	$stmt = $db->prepare($query);
	$stmt->execute();
	
	voltarIndex();
}

if($acao=="alterar"){
	$db = abrirBanco();

	$id = "";
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$id = !empty($_POST['id']) ? $_POST['id'] : '';

	$nome = "";
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$nome = !empty($_POST['nome']) ? $_POST['nome'] : '';

	$descricao = "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
	$descricao = !empty($_POST['descricao']) ? $_POST['descricao'] : '';

	$query = "UPDATE task SET nome='$nome', descricao='$descricao' WHERE idTask='$id'";

	$stmt = $db->prepare($query);
	$stmt->execute(array($nome,$descricao));

	voltarIndex();
}