
<?php 
if(isset($_POST['valor3'])){
    $valor3 = $_POST['valor3'];
}else
    $valor3 = 0;

if(isset($_POST['frutas'])){
    $frutas = json_decode(base64_decode($_POST['frutas']), true);
}else
    $frutas = json_decode("{}", true);
$condicao = (isset($_POST['valor1']) && isset($_POST['valor2'])  && isset($_POST['nome']) && $_POST['valor1'] > 0 && $_POST['valor2'] > 0 && $_POST['nome'] != "");
if ($condicao) {
    $frutas[$_POST['nome']] = json_encode(array($_POST['valor1'], $_POST['valor2']), true);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
<div style="display: flex; align-items: center; justify-content: center; text-align: center;">
<div>
<h1>Feirão das frutas</h1><br>
<form action="ex06.php" method="post">
    <input type="hidden" name="frutas" id="frutas" value="<?php echo base64_encode(json_encode($frutas)) ?>" />
    nome da fruta:<input type="text" id="nome" name="nome"><br>
    Valor da fruta:<input type="number" id="valor1" name="valor1"><br>
    kg:<input type="number" id="valor2" name="valor2"><br>
    Valor disponibilizado:<input type="number" id="valor3" name="valor3" value="<?php echo $valor3 ?>"><br>
    <input type="submit" value="addFruta"><br>
</form>

<br>
<?php



$valorTotal = 0;
foreach ($frutas as $key => $value) {
    echo "<h1 style=\"color:blue;\">A fruta $key custa ". json_decode($value)[0] ." e tem ". json_decode($value)[1] ." kg. Total de ".json_decode($value)[0] *json_decode($value)[1]  ."</h1>";
    $valorTotal += json_decode($value)[0] *json_decode($value)[1];
}
echo "<h1 >Valor total: $valorTotal</h1>";
echo "<h1 >Valor disponibilizado: $valor3</h1>";
if ($valorTotal > $valor3)
    echo "<h1 style=\"color:red\"> Valor ficou acima do disponivel por joazinho</h1>";
else 
    echo "<h1 style=\"color:blue\">Valor restante: ". ($valor3 - $valorTotal) ."</h1>";

?>
</div>
</div>
</body>
</html>


<?php

function exercicio($v1,$v2){
    $area = ($v1 * $v2)/2;
    echo "<h1 style=\"color:blue;\">A área do triangulo retângulo de lados $v1 e $v2 metros é $area metros quadrados.</h1>";
}


?>