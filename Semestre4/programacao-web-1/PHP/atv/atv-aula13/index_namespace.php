<?php
require_once("model/pessoa.php");

$pessoa1 = new app\model\pessoa();
$pessoa1->setNome("Murilo");
$pessoa1->setSobreNome("Costa Bittencourt");
$pessoa1->setDataNascimento(new DateTime("1989-01-01"));
$pessoa1->setCpfCnpj("12345678901");

$pessoa1->getEndereco()->setLogradouro("Rua 1");
$pessoa1->getEndereco()->setBairro("Centro");
$pessoa1->getEndereco()->setCidade("São Paulo");
$pessoa1->getEndereco()->setEstado("SP");
$pessoa1->getEndereco()->setCep("12345678");
$pessoa1->getEndereco()->setNumero("123");

$pessoa1->getTelefone()->setTipo(1);
$pessoa1->getTelefone()->setNome("Celular");
$pessoa1->getTelefone()->setValor("11999999999");

$pessoa2 = new app\model\pessoa();
$pessoa2->setNome("Murilo");
$pessoa2->setSobreNome("Costa Bittencourt");
$pessoa2->setDataNascimento(new DateTime("1989-01-01"));
$pessoa2->setCpfCnpj("12345678901");

$pessoa2->getEndereco()->setLogradouro("Rua 1");
$pessoa2->getEndereco()->setBairro("Centro");
$pessoa2->getEndereco()->setCidade("São Paulo");
$pessoa2->getEndereco()->setEstado("SP");
$pessoa2->getEndereco()->setCep("12345678");
$pessoa2->getEndereco()->setNumero("123");

$pessoa2->getTelefone()->setTipo(1);
$pessoa2->getTelefone()->setNome("Celular");
$pessoa2->getTelefone()->setValor("11999999999");


$pessoa3 = new app\model\pessoa();
$pessoa3->setNome("Murilo");
$pessoa3->setSobreNome("Costa Bittencourt");
$pessoa3->setDataNascimento(new DateTime("1989-01-01"));
$pessoa3->setCpfCnpj("12345678901");

$pessoa3->getEndereco()->setLogradouro("Rua 1");
$pessoa3->getEndereco()->setBairro("Centro");
$pessoa3->getEndereco()->setCidade("São Paulo");
$pessoa3->getEndereco()->setEstado("SP");
$pessoa3->getEndereco()->setCep("12345678");
$pessoa3->getEndereco()->setNumero("123");

$pessoa3->getTelefone()->setTipo(1);
$pessoa3->getTelefone()->setNome("Celular");
$pessoa3->getTelefone()->setValor("11999999999");



$pessoa4 = new app\model\pessoa();
$pessoa4->setNome("Murilo");
$pessoa4->setSobreNome("Costa Bittencourt");
$pessoa4->setDataNascimento(new DateTime("1989-01-01"));
$pessoa4->setCpfCnpj("12345678901");

$pessoa4->getEndereco()->setLogradouro("Rua 1");
$pessoa4->getEndereco()->setBairro("Centro");
$pessoa4->getEndereco()->setCidade("São Paulo");
$pessoa4->getEndereco()->setEstado("SP");
$pessoa4->getEndereco()->setCep("12345678");
$pessoa4->getEndereco()->setNumero("123");

$pessoa4->getTelefone()->setTipo(1);
$pessoa4->getTelefone()->setNome("Celular");
$pessoa4->getTelefone()->setValor("11999999999");





echo $pessoa1->getEndereco()->getLogradouro();
echo "<br>";
echo $pessoa1->toJson();
echo "adoro o gersu";

?>