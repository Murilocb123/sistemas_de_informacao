<?php 

const moto = 8654;
const parcelas = [24, 36, 48, 60];
const jurosStart = 1.5;
const jurosIncrement = 0.5;

$juros = jurosStart;
foreach (parcelas as $key => $value) {
    echo "<h1>Parcelas: $value</h1>";
    $valorParcelaSemJuros = moto / $value; 
    $valorParcela = $valorParcelaSemJuros + ($valorParcelaSemJuros * ($juros/100));
    $valorTotal = ($valorParcela * $value) + moto;
    $valorJuros = $valorTotal - moto;
    echo "<h1>Valor da moto:".  moto . "</h1>";
    echo "<h1>Numero das parcelas:".  $value . "</h1>";
    echo "<h1>Valor da parcela:".  $valorParcela . "</h1>";
    echo "<h1>Valor total:".  $valorTotal . "</h1>";
    echo "<h1 style=\"color:blue;\">Paulinho pagará $valorJuros de juros no financiamento da moto.</h1>";
    $juros += jurosIncrement;
    echo "<br><br>";
}


?>