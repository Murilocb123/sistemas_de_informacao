<?php
    class pessoa {

        private $nome;
        private $sobrenome;

        private function getNomeCompleto($nome, $sobrenome) {
            return $nome . " " . $sobrenome;
        }
    }
?>''