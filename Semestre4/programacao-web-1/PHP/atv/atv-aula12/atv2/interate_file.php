<?php
    $file = fopen('data.txt', 'r');
    if($file) {
        while(($linha = (fgets($file))) !== false) {
           $aLinha = json_decode($linha);
           echo "<br>";
           echo $linha; 
        }        
        fclose($file);
    }
 ?>