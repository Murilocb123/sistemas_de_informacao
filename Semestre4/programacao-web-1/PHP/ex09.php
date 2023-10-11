<?php 
// Juquinha seguindo o mesmo caminho que Paulinho foi comprar uma moto nova, mas pena que ele não sabia da mesma chance que Paulinho. 
// A empresa que Juquinha foi comprar a moto utiliza juros compostos para calcular o valor das parcelas. As opções de compras estudadas por ele são as mesmas de Paulinho, 
// ou seja 24, 36, 48 e 60 vezes o juro nesta empresa inicia em 2% para 24 vezes e aumenta 0,3% para as opções de parcelamento seguintes.
//  Utilizando então a fórmula de juros composto que segue abaixo, calcule o valor da parcela para cada uma das opções a ser estudada por Juquinha.


const moto = 8654;
const parcelas = [24, 36, 48, 60];
const jurosStart = 2.0;
const jurosIncrement = 0.3;
const formula = 'M = C * (1 + i)^t';


$juros = jurosStart;
foreach (parcelas as $key => $value) {
    echo "<h1>Parcelas: $value</h1>";
    $valorParcelaSemJuros = moto / $value; 
    $montante = moto * pow((1 + ($juros/100)), $value);
    $valorParcela = $montante / $value;
    echo "<h1>Valor da moto:".  moto . "</h1>";
    echo "<h1>Numero das parcelas:".  $value . "</h1>";
    echo "<h1>Valor da parcela:".  $valorParcela . "</h1>";
    echo "<h1>Valor total:".  $montante . "</h1>";
    $juros += jurosIncrement;
    echo "<br><br>";
}


?>