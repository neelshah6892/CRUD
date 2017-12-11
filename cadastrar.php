<!DOCTYPE html>
<html>
	<head></head>
	<body>
	</body>
</html>
<?php

$db = new PDO('mysql:host=localhost;dbname=crud;charset=utf8mb4', 'root', '');

echo "Connected successfully";


$email = "";
$email = isset($_POST['email']) ? $_POST['email'] : '';
$email = !empty($_POST['email']) ? $_POST['email'] : '';

$senha = "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$senha = !empty($_POST['senha']) ? $_POST['senha'] : '';

echo $email;
echo $senha;

$stmt = $db->prepare("INSERT INTO usuarios(email,senha) VALUES ('$email','$senha')");
$stmt->execute(array($email,$senha));

if($db){
   echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.php'</script>";
}else{
   echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.php'</script>";
}
?>	
