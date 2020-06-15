<?php
/*
 $mysqli =  new mysqli("hostname", "username", "password", "database"); forma geral
 */

$banco =    new mysqli("sql10.freesqldatabase.com", "sql10348686", "9azREs2N29", "sql10348686");

if ($banco->connect_error)
{
    die("Erro de conexão. " .$banco->connect_error."<br>");
}
?>