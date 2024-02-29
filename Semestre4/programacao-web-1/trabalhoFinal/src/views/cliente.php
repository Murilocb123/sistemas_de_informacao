
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
require_once '../components/HtmlAlertSucess.php';
require_once '../services/AuthenticationService.php';
$auth = new AuthenticationService();
if(!$auth->isLogged()) {
  header('Location: login.php');
}

$style='#cliente .container #cliente-row #cliente-column #cliente-box {
    margin-top: 120px;
    max-width: 600px;
    height: 580px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
  }
  #cliente .container #cliente-row #cliente-column #cliente-box #cliente-form {
    padding: 20px;
  }
  #cliente .container #cliente-row #cliente-column #cliente-box #cliente-form #register-link {
    margin-top: -85px;
  }';
  
$title = 'Cliente';

$oPage = new BasePage();
$oBody = new BodyPage();
$oForm = new FormPage();
$oInput = new HtmlImput();
$oH2 = new HtmlText('Trabalho final da disciplina de Programação Web 1 ','h2');
$oH2->addClass('text-center');


$MessageError =null;

if(isset($_GET['error'])) {
  $MessageError = new HtmlAlert(urldecode($_GET['error']), 'UTF-8');
}
if(isset($_GET['sucess'])) {
  $MessageError = new HtmlAlertSucess(urldecode($_GET['sucess']), 'UTF-8');
}

$oForm->setName('Cliente');
$oForm->setAction('../services/MainService.php');
$oForm->setFrom('../views/cliente.php');
$oForm->setTo('../views/cliente.php');
$oForm->setMainAction('insertCliente');
$oForm->setId('cliente-form');
$oForm->setMethod('POST');

// Código, Nome, Sobrenome, Data de Nascimento, Endereço de e-Mail

$oInput->setType('number');
$oInput->setName('codigo');
$oInput->setId('codigo');
$oInput->setPlaceholder('Codigo');
$oInput->setLabel('Codigo');
$oInput->addClass('form-control');
$oForm->addImput($oInput);

$oInput = new HtmlImput();
$oInput->setType('text');
$oInput->setName('nome');
$oInput->setId('nome');
$oInput->setPlaceholder('Nome');
$oInput->setLabel('Nome');
$oInput->addClass('form-control');
$oForm->addImput($oInput);

$oInput = new HtmlImput();
$oInput->setType('text');
$oInput->setName('sobrenome');
$oInput->setId('sobrenome');
$oInput->setPlaceholder('Sobrenome');
$oInput->setLabel('Sobrenome');
$oInput->addClass('form-control');
$oForm->addImput($oInput);

$oInput = new HtmlImput();
$oInput->setType('date');
$oInput->setName('dataNascimento');
$oInput->setId('dataNascimento');
$oInput->setPlaceholder('Data de Nascimento');
$oInput->setLabel('Data de Nascimento');
$oInput->addClass('form-control');
$oForm->addImput($oInput);

$oInput = new HtmlImput();
$oInput->setType('email');
$oInput->setName('email');
$oInput->setId('email');
$oInput->setPlaceholder('Endereço de e-Mail');
$oInput->setLabel('Endereço de e-Mail');
$oInput->addClass('form-control');
$oForm->addImput($oInput);

$oInput = new HtmlImput();
$oInput->setType('submit');
$oInput->setName('submit');
$oInput->setId('submit');
$oInput->setValue('Cadastrar');
$oInput->addClass('btn btn-info btn-md');
$oInput->setUseLabel(false);


$oLink = new HtmlLink();
$oLink->setValue('../views/clienteList.php');
$oLink->setName('Listar');

$divcolsm = new HtmlDiv();
$divcolsm->addClass('col-sm');
$divcolsm->addElement($oInput);

$divcolsm1 = new HtmlDiv();
$divcolsm1->addClass('col-sm justify-content-end');
$divcolsm1->addElement($oLink);



$divRowForm = new HtmlDiv();
$divRowForm->addClass('row');
$divRowForm->addElement($divcolsm);
$divRowForm->addElement($divcolsm1);




$oForm->addImput($divRowForm);

$divCliente = new HtmlDiv();
$divCliente->setId('cliente');

$divContainer = new HtmlDiv();
$divContainer->addClass('container');

$divRow = new HtmlDiv(); 
$divRow->setId('cliente-row');
$divRow->addClass('row justify-content-center align-items-center');


$divColMd6 = new HtmlDiv(); 
$divColMd6->setId('cliente-column');
$divColMd6->addClass('col-md-6');

$divColMd12 = new HtmlDiv();
$divColMd12->addClass('col-md-12');
$divColMd12->setId('cliente-box');
$divColMd12->addElement($oForm);
$divColMd6->addElement($divColMd12);
$divRow->addElement($divColMd6);
$divContainer->addElement($divRow);
$divCliente->addElement($oH2);
if($MessageError != null) {
  $divCliente->addElement($MessageError);
}
$divCliente->addElement($divContainer);


$oBody->addElement($divCliente);

$oPage->setBody($oBody);
$oPage->setStyle($style);
$oPage->setTitle($title);


echo $oPage->renderHtml();