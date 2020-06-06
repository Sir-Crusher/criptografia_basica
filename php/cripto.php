<?php 
class Cripto

{

    function encriptar ($chave, $texto)
    {
        $tamanho_texto = $texto->strlen();
        $i = 0;
        
        while ($chave->strlen() <> $texto->strlen())
        {
            //estender chave at� o tamanho do texto
            
            if ($tamanho_texto == $i)
                $i = 0;
            
            $chave +=($chave-> substr($i, 1));
            
            $i++;
        }
        
        //encriptar o texto
        
        $texto_encriptado = "";
        
        for ($i = 0; i < $tamanho_texto; $i++)
        {
            /*conseguir a posi��o do caractere em c�digo ASCII,
            somar com a posi��o relativa do caractere � chave e realizar o m�dulo 26 */
            
            $caractere_encriptado = ($texto->substr($i, 1) + $chave->substr($i, 1)) %26;
            
            //Converter a posi��o resultante em ASCII para caractere
            
            $caractere_encriptado += 'A';
            
            //Adicionar o caractere encriptado ao texto final
            
            $texto_encriptado += (string)($caractere_encriptado);
        }
        
        return $texto_encriptado;
    }
}
?>