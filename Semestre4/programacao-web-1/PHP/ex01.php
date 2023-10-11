<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >

<form action="ex01.php" method="get">
    valor1:<input type="number" id="valor1" name="valor1"><br>
    Valor2:<input type="number" id="valor2" name="valor2"><br>
    Valor3:<input type="number" id="valor3" name="valor3"><br>
    <input type="submit" value="executar"><br>
</form>

<?php

$condicao = (isset($_GET['valor1']) && isset($_GET['valor2']) && isset($_GET['valor3'])&& $_GET['valor1'] > 0 && $_GET['valor2'] > 0 && $_GET['valor3'] > 0);
if ($condicao) {
  exercicio($_GET['valor1'], $_GET['valor2'],  $_GET['valor3']);
}

?>
</body>
</html>


<?php

function exercicio($v1, $v2, $v3){
    $soma = $v1 + $v2 + $v3;
    $cor = "black";
    if($v1 > 10){
        echo "<p style=\"color:blue;\">$soma</p>";
    }
    if($v2 < $v3){
        echo "<p style=\"color:green;\">$soma</p>";
    }
    if($v3 < $v1 && $v3 < $v2){
        echo "<p style=\"color:red;\">$soma</p>";
    }

}


?>