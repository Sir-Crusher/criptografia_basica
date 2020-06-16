<?php
session_start();
require_once 'config.php';

$enviar = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);

if ($enviar)

{

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	if((!empty($usuario)) AND (!empty($senha)))
	{
		//Pesquisar o usuário no BD
	    $query_login = "SELECT nome,senha FROM usuario WHERE nome='$usuario' LIMIT 1";
		
	    $resultado_usuario = mysqli_query($banco, $query_login);
		
		if($resultado_usuario)
		{
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			
			if (password_verify($senha, $row_usuario['senha']))
			{
				$_SESSION['id'] = $row_usuario['IDLogin'];
				$_SESSION['nome'] = $row_usuario['nome'];
				header("Location: /criptografar.html");
			}
				else
				{
				    $_SESSION['msg'] = "Área restrita.";
					echo $_SESSION['msg'];
				    header("Location: /index.html");
				}
			}
			else
			{
				$_SESSION['msg'] = "Login e senha incorreto!";
				echo $_SESSION['msg'];
				header("Location: /index.html");
			}
		}
	}
	else
	{
		$_SESSION['msg'] = "Página não encontrada!";
		echo $_SESSION['msg'];
		header("Location: /index.html");
	}
// Fechar conexão
$banco->close();
?>