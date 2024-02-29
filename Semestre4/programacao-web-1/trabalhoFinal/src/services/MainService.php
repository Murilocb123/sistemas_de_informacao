<?php 
require_once 'AuthenticationService.php';
require_once 'ClienteService.php';
$main = new MainService();
$main->run();

class MainService {
    private $from;
    private $to;
    private $action;
    private $error;
    private $sucess = null;

    public function __construct() {
        $this->from = isset($_GET['from']) ? $_GET['from'] : null;
        $this->to = isset($_GET['to']) ? $_GET['to'] : null;
        $this->action = isset($_GET['action']) ? $_GET['action'] : null;
    }

    public function run() {
        $result = false;
        try{
            if(is_null($this->from) || is_null($this->to) || is_null($this->action)) {
                throw new Exception('Parametros invalidos');
            }
            $action = $this->action;
            $result = $this->$action();
        } catch (Exception $e) {
            $this->error = $e->getMessage();
        }
        if ($result) {
            if(!is_null($this->sucess)){
                header('Location:'.$this->from.'?sucess='.$this->sucess);
            }else{
                header('Location:'.$this->to);
            }
        }else {
            header('Location:'.$this->from.'?error='. json_encode($this->error));
        }
    }

    private function auth(){
        $user = isset($_POST['user']) ? $_POST['user'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $oAuth = new AuthenticationService();
        if ($oAuth->login($user, $password)) {
            return true;
        } else {
            $this->error= 'Usuario ou senha invalidos';
            return false;
        }

    }

    private function insertCliente(){
        $validacao = !isset($_POST['codigo']) || !isset($_POST['nome']) || !isset($_POST['sobrenome']) || !isset($_POST['dataNascimento']) || !isset($_POST['email'])
        || $_POST['codigo'] == '' || $_POST['nome'] == '' || $_POST['sobrenome'] == '' || $_POST['dataNascimento'] == '' || $_POST['email'] == '';
        if($validacao){
            $this->error = 'Campo obrigatorio nao preenchido';
            return false;
        }
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $dataNascimento = $_POST['dataNascimento'];
        $email = $_POST['email'];

        $oCliente = new ClienteService();
        $oCliente->inserirCliente($codigo, $nome, $sobrenome, $dataNascimento, $email);
        $this->sucess = 'Cliente inserido com sucesso!';
        return true;
    }

    private function listarClientes(){
        $oCliente = new ClienteService();
        if(isset($_POST['nome'])){
            $nome = $_POST['nome'];
            $clientes = $oCliente->listarClientesPorNome($nome);

            return $clientes;
        }
        $clientes = $oCliente->listarTodosClientes();
        return $clientes;
    }
    
}