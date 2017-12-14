<html>
	<head>
		<title>Autenticando</title>
	</head>
	<body></body>
</html>

<?php
$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');

$email = "";
$email = isset($_POST['email']) ? $_POST['email'] : '';
$email = !empty($_POST['email']) ? $_POST['email'] : '';

$senha = "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$senha = !empty($_POST['senha']) ? $_POST['senha'] : '';

$query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

$stmt = $db->prepare($query);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_NUM);

if ($rows>0){
	session_start();
	$_SESSION['email']=$_POST['email'];
    $_SESSION['senha']=$_POST['senha'];
    echo "<script>alert('Você foi autenticado com sucesso!');window.location.href='index.php'</script>";
}
else{
	echo "<script>alert('Autenticação falhou!');window.location.href='login.php'</script>";
}

?>