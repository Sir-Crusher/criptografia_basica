<?php 
class cripto {

    function criptografar ($chave, $texto)
    {
        $tamanho_texto = strlen($texto);
        
        $chave_original = $chave;
		
        for ($i = 0; strlen($chave) <> strlen($texto); $i++)
        {
            //estender chave até o tamanho do texto
            
            if ($tamanho_texto == $i)
                $i = 0;
            $chave += substr($chave_original, $i, 1);
        }
        
        //criptografar o texto
        
        $texto_encriptado = "";
        
        for ($i = 0; i < $tamanho_texto; $i++)
        {
            /*conseguir a posição do caractere em código ASCII,
            somar com a posição relativa do caractere à chave e realizar o módulo 26 */
            
            $caractere_encriptado = (substr($texto,$i, 1) + substr($chave,$i, 1)) %26;
            
            //Converter a posição resultante em ASCII para caractere
            
            $caractere_encriptado += 'A';
            
            //Adicionar o caractere encriptado ao texto final
            
            $texto_encriptado += (string)($caractere_encriptado);
        }
        
        return $texto_encriptado;
    }

function descriptografar ($chave, $texto)
    {
        $tamanho_texto = $texto->strlen();
        $i = 0;
        
        while (strlen($chave) <> strlen($texto))
        {
            //estender chave até o tamanho do texto
            
            if ($tamanho_texto == $i)
                $i = 0;
            
            $chave += substr($chave,$i, 1);
            
            $i++;
        }
        
        //desencriptar o texto
        
        $texto_desencriptado = "";
        
        for ($i = 0; i < $tamanho_texto; $i++)
        {
            /*conseguir a posição do caractere em código ASCII,
            subtrair com a posição relativa do caractere, somar 26 à chave e realizar o módulo 26 */
            
            $caractere_desencriptado = (substr($texto,$i, 1) - substr($chave,$i, 1) + 26 ) %26;
            
            //Converter a posição resultante em ASCII para caractere
            
            $caractere_desencriptado += 'A';
            
            //Adicionar o caractere encriptado ao texto final
            
            $texto_desencriptado += (string)($caractere_desencriptado);
        }
        
        return $texto_desencriptado;
    }
}
?>
