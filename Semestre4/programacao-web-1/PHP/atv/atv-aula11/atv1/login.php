<?php

if(!isset($_GET['funcao'])){
    echo "Funcao nao passada na requisicao";
}else{
    $_GET['funcao']();
}


function login(){
    echo $_POST['campo_login'];
    echo $_POST['campo_senha'];
    $user = isset($_POST['campo_login'])?$_POST['campo_login']:null;
    $password = isset($_POST['campo_senha'])?$_POST['campo_senha']:null;

    $isAllInfoRequest = in_array($user,["", null]) && in_array($password,["", null]);
    if ($isAllInfoRequest){
        echo "Usuario ou senha nao passados na requisicao ou estão em branco";
        return;
    }


    createSession($user, $password);

    echo "Usuario logado com sucesso";
    echo "<br>";
    echo "Dados da sessao:";
    echo "<br>";
    echo "Identificador da sessao: ".session_id();
    echo "<br>";
    echo "Usuario: ".$_SESSION['user'];
    echo "<br>";
    echo "Senha: ".$_SESSION['password'];
    echo "<br>";
    echo "Inicio da sessao: ".$_SESSION['started'];
    echo "<br>";
    echo "Ultimo acesso: ".$_SESSION['last_access'];
    echo "<br>";
    echo "Tempo de sessao: ".$_SESSION['total_time'];
}

function createSession($user, $password){
    session_start();
    if(!isset($_SESSION["user"])){
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['started'] = time();
    }
    registerLastAccess();
}


function registerLastAccess(){
    $_SESSION['last_access'] = time();
    //calcula o  tempo de requisicao ativa
    $lastRequest = strtotime(gmdate("Y-m-d\TH:i:s\Z", $_SESSION['last_access']));
    
    if(isset($_SESSION['started'])){
        $start =  strtotime(gmdate("Y-m-d\TH:i:s\Z", $_SESSION['started']));
        $totalTime = $lastRequest-$start;
        $_SESSION['total_time'] = $totalTime;
    }
}

?>