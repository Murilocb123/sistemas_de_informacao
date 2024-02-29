
<?php

require_once '../components/BodyPage.php';
require_once '../components/BasePage.php';
require_once '../components/HtmlTable.php';
require_once '../components/HtmlImput.php';
require_once '../components/FormPage.php';
require_once '../components/HtmlDiv.php';
require_once '../components/HtmlText.php';
require_once '../components/HtmlAlert.php';

$style='#login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    height: 320px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
  }
  #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
  }
  #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -85px;
  }';
  
$title = 'Login';

$oPage = new BasePage();
$oBody = new BodyPage();
$oForm = new FormPage();
$oInput = new HtmlImput();
$oH2 = new HtmlText('Trabalho final da disciplina de Programação Web 1 ','h2');
$oH2->addClass('text-center');
$MessageError =null;

if(isset($_GET['error'])) {
  //passar para utf8
  $MessageError = new HtmlAlert(urldecode($_GET['error']), 'UTF-8');
}

$oForm->setName('Login');
$oForm->setAction('../services/MainService.php');
$oForm->setFrom('../views/login.php');
$oForm->setTo('../views/cliente.php');
$oForm->setMainAction('auth');
$oForm->setId('login-form');
$oForm->setMethod('POST');

$oInput->setType('text');
$oInput->setName('user');
$oInput->setId('user');
$oInput->setPlaceholder('Usuario');
$oInput->setLabel('Usuario');
$oInput->addClass('form-control');
$oForm->addImput($oInput);

$oInput = new HtmlImput();
$oInput->setType('password');
$oInput->setName('password');
$oInput->setId('password');
$oInput->setPlaceholder('Senha');
$oInput->setLabel('Senha');
$oInput->addClass('form-control');
$oForm->addImput($oInput);

$oInput = new HtmlImput();
$oInput->setType('submit');
$oInput->setName('submit');
$oInput->setId('submit');
$oInput->setValue('Entrar');
$oInput->addClass('btn btn-info btn-md');
$oInput->setUseLabel(false);
$oForm->addImput($oInput);

$divLogin = new HtmlDiv();
$divLogin->setId('login');

$divContainer = new HtmlDiv();
$divContainer->addClass('container');

$divRow = new HtmlDiv(); 
$divRow->setId('login-row');
$divRow->addClass('row justify-content-center align-items-center');


$divColMd6 = new HtmlDiv(); 
$divColMd6->setId('login-column');
$divColMd6->addClass('col-md-6');

$divColMd12 = new HtmlDiv();
$divColMd12->addClass('col-md-12');
$divColMd12->setId('login-box');
$divColMd12->addElement($oForm);
$divColMd6->addElement($divColMd12);
$divRow->addElement($divColMd6);
$divContainer->addElement($divRow);
$divLogin->addElement($oH2);
if($MessageError != null) {
  $divLogin->addElement($MessageError);
}
$divLogin->addElement($divContainer);


$oBody->addElement($divLogin);

$oPage->setBody($oBody);
$oPage->setStyle($style);
$oPage->setTitle($title);


echo $oPage->renderHtml();

