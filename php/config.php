<?php
/*
 $mysqli =  new mysqli("hostname", "username", "password", "database"); forma geral
 */

$banco =    new mysqli("localhost", "Php", "phptestbiblio", "pag_cripto");

if ($banco->connect_error)
{
    die("Erro de conex�o. " .$banco->connect_error."<br>");
}
?>