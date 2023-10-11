<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >


<form action="ex05.php" method="get">
    Base:<input type="number" id="valor1" name="valor1"><br>
    Altura:<input type="number" id="valor2" name="valor2"><br>
    <input type="submit" value="executar"><br>
</form>

<?php

$condicao = (isset($_GET['valor1']) && isset($_GET['valor2']) && $_GET['valor1'] > 0 && $_GET['valor2'] > 0);
if ($condicao) {
  exercicio($_GET['valor1'], $_GET['valor2']);
}

?>
</body>
</html>


<?php

function exercicio($v1,$v2){
    $area = ($v1 * $v2)/2;
    echo "<h1 style=\"color:blue;\">A área do triangulo retângulo de lados $v1 e $v2 metros é $area metros quadrados.</h1>";
}


?>