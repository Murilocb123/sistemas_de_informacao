<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >

<form action="ex02.php" method="get">
    valor1:<input type="number" id="valor1" name="valor1"><br>
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
    if ($v1 % 2 == 0) {
        echo "<p style=\"color:blue;\">Valor é divisivel por 2</p>";
    }else{ 
        echo "<p style=\"color:red;\">Valor não é divisivel por 2</p>";
    }

}


?>