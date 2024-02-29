<?php
    require_once("pessoa.php");

    $oPessoa = new pessoa();
    $sNomeCompleto = $oPessoa->getNomeCompleto("João", "da Silva");
    echo "<h1 style=\"color:blue;\">$sNomeCompleto</h1>";


?>