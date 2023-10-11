<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >

<p>Crie um programa que calcule a área de um retângulo. Você deve configurar duas variáveis que representam os lados a e b desse triangulo em metros. Após o cálculo escrever uma frase com o resultado da operação, exemplo: “A área do retângulo de lados 3 e 2 metros é 6 metros quadrados.” Caso a área for maior que 10 escreva a frase usando a tag h1, se não, escrever com h3.
</p>

<form action="ex04.php" method="get">
    valor1:<input type="number" id="valor1" name="valor1"><br>
    Valor2:<input type="number" id="valor2" name="valor2"><br>
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
    $area = $v1 * $v2;
    $cor = "black";
    if($area > 10){
        echo "<h1 style=\"color:blue;\">A área do retângulo de lados $v1 e $v2 metros é $area metros quadrados.</h1>";
    }else{
        echo "<h3 style=\"color:blue;\">A área do retângulo de lados $v1 e $v2 metros é $area metros quadrados.</h3>";
    }

}


?>