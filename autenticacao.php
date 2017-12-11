<html>
	<head>
		<title>Autenticando</title>

		<script type="text/javascript">
			function logincomsucesso(){
				setTimeout("window.location='index.php'", 5000);
			}

			function loginfailed(){
				setTimeout("window.location='login.php'", 5000);
			}
		</script>

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
    echo "Você foi autenticado com sucesso!";
    echo "<script>logincomsucesso()</script>";
}
else{
	echo "Autenticação falhou!";
	echo "<script>loginfailed()</script>";
}

?>