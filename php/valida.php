<?php
session_start();
require_once 'config.php';
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
		//Pesquisar o usu�rio no BD
		
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
				    echo "Ol� ".$_SESSION['nome'].", Bem vindo <br>";
				    header("location: ./criptografar.html");
				}
				else
				{
				    $_SESSION['msg'] = "�rea restrita.";
				    header("Location: ./index.php");
				}
			}
			else
			{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: ./index.php");
			}
		}
	}
	else
	{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: ./index.php");
	}
}
else
{
	$_SESSION['msg'] = "P�gina n�o encontrada";
	header("Location: ./index.php");
}
