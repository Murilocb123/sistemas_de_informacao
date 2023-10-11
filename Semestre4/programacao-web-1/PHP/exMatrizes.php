<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >

<form action="exMatrizes.php?function=gerar_tabela&" method="get">

    <input type="number" id="x" name="x" class="x" >
    <input type="number" id="y" name="y"  class="y">
    <input type="submit" value="Gerar">
</form>

<?php
if (isset($_GET['x']) && isset($_GET['y']) && $_GET['x'] > 0 && $_GET['y'] > 0) {
  gerar_tabela($_GET['x'], $_GET['y']);
}

?>
</body>
</html>


<?php
function getMatriz($x, $y){
    $matriz = array();
    for($i = 0; $i < $x; $i++){
        for($j = 0; $j < $y; $j++){
            $matriz[$i][$j] = rand(0, 1000);
        }
    }
    return $matriz;
}

function gerar_tabela($x, $y){
    $matriz = getMatriz($x, $y);
    echo "<table class=\"tabela\" style=\"border: 1px solid black;\">";
    for($i = 0; $i < $x; $i++){
        echo "<tr>";
        for ($j=0; $j < $y; $j++) { 
            echo "<td>". $matriz[$i][$j]  ."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


?>