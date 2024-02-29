<?php 
    class Usuario {
        public $userName;
        public $userLogin;
        public $userPass;
    }

    class Session {
        public $sessionId;
        public $status;
        public $usuario;
        private $dataHoraInicio;
        private $dataHoraUltimoAcesso;

        public function iniciaSessao() {
            $this->dataHoraInicio = new DateTime();
            $this->dataHoraUltimoAcesso = new DateTime();
            $this->status = 1;
            return true;
        }

        public function finalizaSessao() {
            $this->status = 0;
            return true;
        }

        public function getUsuarioSessao() {
            return $this->usuario;
        }
    }


    $usuario = new Usuario();
    $usuario->userName = "John Doe";
    $usuario->userLogin = "johndoe";
    $usuario->userPass = "password123";

    $session = new Session();
    $session->sessionId = "123456";
    $session->status = 0;
    $session->usuario = $usuario;

    $session->iniciaSessao();
    assert($session->status == 1);

    $session->finalizaSessao();
    assert($session->status == 0);

    assert($session->getUsuarioSessao() == $usuario);
?>