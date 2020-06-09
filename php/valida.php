<?php
session_start();
require_once '../php/config.php';
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin)
{
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	
	if((!empty($usuario)) AND (!empty($senha)))
	{
		//Gerar a senha criptografada
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		
	    $result_usuario = "SELECT id, nome, senha FROM usuario WHERE nome='$usuario' LIMIT 1";
		
	    $resultado_usuario = mysqli_query($banco, $result_usuario);
		
		if($resultado_usuario)
		{
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			
			if (password_verify($senha, $row_usuario['senha']))
			{
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				session_start();
				
				if (!empty($_SESSION['id']))
				{
				    echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
				    header("Location: ./criptografar.html");
				}
				else
				{
				    $_SESSION['msg'] = "Área restrita.";
				    header("Location: ./index.html");
				}
			}
			else
			{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: ./index.html");
			}
		}
	}
	else
	{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: ./index.html");
	}
}
else
{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: ./index.html");
}
