<?php
/*
 $mysqli =  new mysqli("hostname", "username", "password", "database"); forma geral
 */

$banco =    new mysqli("rationalanimal.hopto.org", "Php", "phptestbiblio", "pag_cripto");

if ($banco->connect_error)
{
    die("Erro de conexão. " .$banco->connect_error."<br>");
}
?>