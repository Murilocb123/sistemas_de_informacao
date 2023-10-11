<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >

<form action="ex03.php" method="get">
quadrado Lado:<input type="number" id="valor1" name="valor1"><br>
    <input type="submit" value="executar"><br>
</form>

<?php

$condicao = (isset($_GET['valor1']) && $_GET['valor1'] > 0 );
if ($condicao) {
  exercicio($_GET['valor1']);
}

?>
</body>
</html>


<?php

function exercicio($v1){
    echo "<h3>A área do quadrado de lado $v1 é ". $v1 * $v1 ." metros quadrados</h3>";

}


?>