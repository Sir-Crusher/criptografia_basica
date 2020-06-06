<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<title>Login</title>
</head>
<body

<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
			}
		?>

	<div class="container pt-5">
	<Form action="/php/valida.php" method="POST">
	<h1>Login</h1>
		<div class="form-group">
			<label for="user_login">Nome de Usuário:</label>
			<input id="user_login" name="usuario" type="text" class="form-control" placeholder="Digite o nome de usuário" required>
		</div>
		<div class="form-group">
			<label for="senha_login">Senha:</label>
			<input type="password" id="senha_login" name="senha" required>
		</div>
		<input type="submit" value="btnLogin">
	</Form>
</div>
</body>
</html>