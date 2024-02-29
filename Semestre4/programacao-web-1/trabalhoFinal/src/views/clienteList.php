
<?php

require_once '../components/BodyPage.php';
require_once '../components/BasePage.php';
require_once '../components/HtmlTable.php';
require_once '../components/HtmlImput.php';
require_once '../components/FormPage.php';
require_once '../components/HtmlDiv.php';
require_once '../components/HtmlText.php';
require_once '../components/HtmlAlert.php';
require_once '../components/HtmlLink.php';
require_once '../services/ClienteService.php';
require_once '../services/AuthenticationService.php';
$auth = new AuthenticationService();
if(!$auth->isLogged()) {
  header('Location: login.php');
}
$title = 'Listar Clientes';

$oPage = new BasePage();
$oBody = new BodyPage();
$oTable = new HtmlTable();
$oH2 = new HtmlText('Trabalho final da disciplina de Programação Web 1 ','h2');
$oH2->addClass('text-center');
$MessageError =null;

if(isset($_GET['error'])) {
  //passar para utf8
  $MessageError = new HtmlAlert(urldecode($_GET['error']), 'UTF-8');
}
$clienteService = new ClienteService();
if (isset($_POST['pesquisa']) && $_POST['pesquisa'] != '') {
  $dados = $clienteService->listarClientesPorNome($_POST['pesquisa']);
} else{
  $dados = $clienteService->listarTodosClientes();
}
$oTable->setName('Cliente');
$oTable->setDados($dados);
$oTable->addHeaderTable('Codigo');
$oTable->addHeaderTable('Nome');
$oTable->addHeaderTable('Sobrenome');
$oTable->addHeaderTable('Data de Nascimento');
$oTable->addHeaderTable('Endereço de e-Mail');
$oTable->addClass('table table-dark');



$divCliente = new HtmlDiv();
$divCliente->setId('cliente');

$divContainer = new HtmlDiv();
$divContainer->addClass('container');

$divRow = new HtmlDiv(); 
$divRow->setId('cliente-row');
$divRow->addClass('row justify-content-center align-items-center');


$formPesquisa = new FormPage();
$formPesquisa->setName('Pesquisa');
$formPesquisa->setAction('');
$formPesquisa->setMethod('POST');
$inputPesquisa = new HtmlImput();
$inputPesquisa->setType('text');
$inputPesquisa->setName('pesquisa');
$inputPesquisa->setId('pesquisa');
$inputPesquisa->setPlaceholder('Pesquisa');
$inputPesquisa->addClass('form-control');
$formPesquisa->addImput($inputPesquisa);
$inputSubmit = new HtmlImput();
$inputSubmit->setType('submit');
$inputSubmit->setName('pesquisar');
$inputSubmit->setId('pesquisar');
$inputSubmit->setValue('Pesquisar');
$inputSubmit->addClass('btn btn-primary');
$formPesquisa->addImput($inputSubmit);



$divColMd12 = new HtmlDiv();
$divColMd12->addClass('col-md-12');
$divColMd12->addElement($formPesquisa);
$divColMd12->addElement($oTable);
$oLink = new HtmlLink();
$oLink->setValue('../views/cliente.php');
$oLink->setName('Cadastro de Cliente');
$divColMd12->addElement($oLink);
//add lista
$divRow->addElement($divColMd12);
$divContainer->addElement($divRow);
$divCliente->addElement($oH2);
if($MessageError != null) {
  $divCliente->addElement($MessageError);
}
$divCliente->addElement($divContainer);


$oBody->addElement($divCliente);

$oPage->setBody($oBody);
$oPage->setTitle($title);


echo $oPage->renderHtml();