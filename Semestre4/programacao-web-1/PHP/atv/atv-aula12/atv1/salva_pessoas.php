<?php
use models\pessoa;
require_once('./models/pessoa.php');

$_GET['function']();

function save(){
    $pessoa = new pessoa();

    // Array com os nomes dos atributos da classe pessoa
    $atributos = array('campo_primeiro_nome', 
                        'campo_sobrenome', 
                        'campo_email', 
                        'campo_cidade', 
                        'campo_estado', 
                        'campo_password');

    // Verifica se cada atributo foi passado no $_POST
    foreach ($atributos as $atributo) {
        if (!isset($_POST[$atributo]) || $_POST[$atributo]=="") {
            echo "<script>alert(\"Atributo $atributo não encontrado\");window.location.href = \"index.html\";</script>";
            return;
        }
    }

    // Define os valores dos atributos da pessoa
    $pessoa->setPesNome($_POST['campo_primeiro_nome'])
           ->setPesSobrenome($_POST['campo_sobrenome'])
           ->setPesEmail($_POST['campo_email'])
           ->setPesCidade($_POST['campo_cidade'])
           ->setPesEstado($_POST['campo_estado'])
            ->setPesPassword($_POST['campo_password']);

    // Salva a pessoa
    if ($pessoa->save()){
       echo "<script>alert(\"Salvo com sucesso!\");window.location.href = \"index.html\";</script>";
    }else{
        echo "<script>alert(\"Erro ao salvar!\");window.location.href = \"index.html\";</script>";
    }
}
?>