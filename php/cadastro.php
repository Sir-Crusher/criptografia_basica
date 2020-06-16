<?php
require_once 'config.php';

//Definir variaveis e inicializar com valores nulos
$usuario = $senha = $confirmar_senha = $email = "";
$usuario_erro = $senha_erro = $confirmar_senha_erro = $email_erro = "";


//validar nome de usu�rio
if (empty(trim($_POST["usuario"])))
{
    
    $usuario_erro = "Por favor digite um nome de usu�rio.";
	echo $usuario_erro;
}

else 
{
    
    //preparar uma requisi��o de sele��o
    $comando = "select IDLogin from usuario where nome = ?";

    if ($requisicao = $banco->prepare($comando))
    {
        $usuario = trim($_POST['usuario']);
		
        //Ligar as vari�veis � requisi��o preparada como par�metros
        $requisicao->bind_param("s", $usuario);
        
        
        
        //tentar executar a requisi��o
        if ($requisicao->execute())
        {
            
            //Armazenar resultado
            $requisicao->store_result();
            
            if ($requisicao->num_rows() == 1)
            {
                $usuario_erro = "Esse nome de usu�rio j� foi registrado";
				echo $usuario_erro;
            }
            else 
            {
                $usuario = trim($_POST['usuario']);
            }
        }
        else
        {
            echo 'Opa! algo deu errado. Tente de novo mais tarde';
        }
    }
}

// Validar senha

if (empty(trim($_POST["senha"])))
{
    $senha_erro = "Por favor digite uma senha.";
	echo $senha_erro;
} 

else if (strlen(trim($_POST["senha"])) < 6)
{
    $senha_erro = "Password must have atleast 6 characters.";
	echo $senha_erro;
}
else
{
    $senha = trim($_POST["senha"]);
}

// Validar a senha de confirma��o

if (empty(trim($_POST["senha_conf"])))
{
    $confirmar_senha_erro = "Por favor confirme a senha.";
	echo $confirmar_senha_erro;
}
else
{
    $confirmar_senha = trim($_POST["senha_conf"]);
    
    if (empty($senha_erro) && ($senha != $confirmar_senha))
    {
        $confirmar_senha_erro = "A senha n�o foi confirmada.";
		echo $confirmar_senha_erro;
    }
}

// Verificar por erros de entrada antes de inserir no banco de dados

if (empty($usuario_erro) && empty($senha_erro) && empty($confirmar_senha_erro) && empty($email_erro))
{
    
    // Preparar uma requisi��o de inser��o
    $comando = "Insert into usuario (nome, senha) VALUES (?, ?)";
    
    if ($requisicao = $banco->prepare($comando))
    {
	    // Definir par�metros        
        $param_usuario = $usuario;
        $param_senha = password_hash($senha, PASSWORD_DEFAULT); // Cria um hash para a senha
        
        // Ligar vari�veis � requisi��o como par�metros
        $requisicao->bind_param("ss", $param_usuario, $param_senha);
        

        
        // Tentar executar a requisi��o preparada        
        if($requisicao->execute())
        {
        
            // Redirecionar � p�gina de criptografia
					session_start();
			$_SESSION['login'] = $param_usuario;
			$_SESSION['senha'] = $param_senha;
			header("location: /criptografar.html");
        } 
        else
        {
            echo "Algo deu errado. Tente novamente.";
        }
        
        // Fechar requisi��o
        $requisicao->close();
		

    }
}

// Fechar conex�o
$banco->close();
?>