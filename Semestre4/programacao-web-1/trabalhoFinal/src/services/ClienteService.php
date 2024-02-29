<?php

class ClienteService {
    private $conn;

    public function __construct() {
        // Conectar ao banco de dados
        $host = "127.0.0.1";
        $port = "5433";
        $dbname = "trabalhofinal";
        $user = "postgres";
        $password = "123456";

        try {
            $this->conn = new PDO('pgsql:host='.$host.';port='.$port.';dbname='.$dbname.';user='.$user.';password='.$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
    }

    public function inserirCliente($codigo, $nome, $sobrenome, $dataNascimento, $email) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO cliente (codigo, nome, sobrenome, data_nascimento, email) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$codigo, $nome, $sobrenome, $dataNascimento, $email]);
            echo "Cliente inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir cliente: " . $e->getMessage();
        }
    }

    public function listarClientesPorNome($nome) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE UPPER(nome) LIKE ?");
            $stmt->execute(["%" . strtoupper($nome) . "%"]);
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $e) {
            echo "Erro ao listar clientes: " . $e->getMessage();
        }
    }

    public function listarTodosClientes() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM cliente");
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $e) {
            echo "Erro ao listar clientes: " . $e->getMessage();
        }
    }
}

