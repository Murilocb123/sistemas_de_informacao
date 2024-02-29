<?php
namespace app\model;
use app\lib\export;

require_once("endereco.php");
require_once("contato.php");
require_once(__DIR__ . "/../lib/export.php");

class pessoa extends export{
    private $nome;
    private $sobreNome;
    private $dataNascimento;
    private $cpfCnpj;
    //tipo 1- fisica 2- juridica
    private $tipo;

    
    private $telefone;
    private $endereco;

    public function __construct(){
       $this->inicializaClasse();
    }
    private function inicializaClasse(){
        $this->tipo = 1;
        $this->telefone = new \app\model\contato;
        $this->endereco = new \app\model\endereco;
    }

    // get e set
    public function getNomeCompleto(){
        return $this->nome . " " . $this->sobreNome;
    }

    public function getIdade(){
       
        $dataNascimento = new \DateTime($this->dataNascimento);

        $diferenca = $dataNascimento->diff(new \DateTime());

        return $diferenca->y;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function setSobreNome($sobreNome)
    {
        $this->sobreNome = $sobreNome;

        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
 
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
 
    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }
}


?>