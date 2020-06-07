<?php 
$objCripto = new Cripto();

//Se for 0, vai criptografar or arquivo. Se for 1, vai descriptografar
$opcao = $_POST['opcao'];
$texto_local = $_FILES['textofile']['tmp_name'];
$texto= file_get_contents($texto_local);
$chave = $_POST['chave'];

if ($opcao == 0)
{
    $texto_encriptado = $objCripto->criptografar($texto, $chave);

    $arquivo_final = file_put_contents("https://serverc.sytes.net/criptografado.txt", $texto_encriptado);
}

else 
{
    $texto_descriptografado = $objCripto->descriptografar($texto, chave);
    $arquivo_final = file_put_contents("https://serverc.sytes.net/descriptografado", $texto_descriptografado);
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
?>
