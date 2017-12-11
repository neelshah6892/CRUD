<!DOCTYPE html>
<html>
 <head>
 	<title>Cadastro</title>
 	<link rel='stylesheet' href='style.css' />
 </head>
 <body>
 	<div id="esq">
	 	<form name="login" method="post" action="autenticacao.php">
	 		<label><b>Email</b></label>
	 		<input type="text" placeholder="exemplo@exemplo.com" name="email" required>

	 		<label><b>Senha</b></label>
	 		<input type="password" placeholder="****" name="senha" required>

	 		<input type="submit" value="Entrar">

	 		<a href="cadastro.php" class="link">Cadastre-se!</a>
	 	</form>
 	</div>
 </body>
</html>