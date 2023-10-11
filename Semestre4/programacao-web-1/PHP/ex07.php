<?php 
const carro = 22500;
const parcelas = 60;
const valorParcela = 489.65;
$valorTotal = parcelas * valorParcela;
$valorJuros = $valorTotal - carro;
echo "<h1>Valor do carro:".  carro . "</h1>";
echo "<h1>Numero das parcelas:".  parcelas . "</h1>";
echo "<h1>Valor da parcela:".  valorParcela . "</h1>";
echo "<h1>Valor total:".  $valorTotal . "</h1>";

echo "<h1 style=\"color:blue;\">Mariazinha pagará $valorJuros de juros no financiamento do carro.</h1>";


?>