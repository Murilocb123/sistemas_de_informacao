<?php

    session_start();
    if(isset($_COOKIE["user"]) && isset($_COOKIE["started"])) {
        echo "<a href='continuar.php'>clique aqui para contiunar</a>";
    } else{
        echo "<script>alert(\"Sessão expirada!\");window.location.href = \"index.html\";</script>";
    }

?>