<?php 
include ('cripto.php');
$objCripto = new Cripto();

$enviar = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);

if ($enviar)

{

//Se for 0, vai criptografar or arquivo. Se for 1, vai descriptografar
$opcao = $_POST['opcao'];
$texto= $_POST['textofile'];
$chave = $_POST['chave'];

if ($opcao == 0)
{
    $texto_encriptado = $objCripto->criptografar($texto, $chave);

    $arquivo_final = file_put_contents("/criptografado.txt", $texto_encriptado);
}

else 
{
    $texto_descriptografado = $objCripto->descriptografar($texto, chave);
    $arquivo_final = file_put_contents("/descriptografado", $texto_descriptografado);
}

if (file_exists($arquivo_final)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($arquivo_final).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($arquivo_final));
    readfile($arquivo_final);
    exit;
}
}
?>
