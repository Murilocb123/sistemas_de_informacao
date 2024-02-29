<?php
namespace models;
use models\base\model;
use models\base\modelInterface;
require_once('base/model.php');
require_once('base/modelInterface.php');

class pessoa extends model implements modelInterface{

    private string $pesnome;
    private string $pessobrenome;

    private string $pesemail;
    
    private string $pespassword;

    private string $pescidade;

    private string $pesestado;

    public function __construct(){
        $this->table = "TBPESSOA";
        parent::__construct();
    }
    
    public function save(): bool{
        return $this->insert($this->getAllAttributesInArray());
    }

    public function find(string|null $where): array{
        return $this->select($where);
    }


    public function getAllAttributesInArray(): array{
        $array = get_object_vars($this);
        unset($array['table']);
        return $array;
    }

    public function getPesNome(): string {
        return $this->pesnome;
    }

    public function setPesNome(string $pesnome): pessoa {
        $this->pesnome = $pesnome;
        return $this;
    }

    public function getPesSobrenome(): string {
        return $this->pessobrenome;
    }

    public function setPesSobrenome(string $pessobrenome): pessoa {
        $this->pessobrenome = $pessobrenome;
        return $this;
    }

    public function getPesEmail(): string {
        return $this->pesemail;
    }

    public function setPesEmail(string $pesemail): pessoa {
        $this->pesemail = $pesemail;
        return $this;
    }

    public function getPesPassword(): string {
        return $this->pespassword;
    }

    public function setPesPassword(string $pespassword): pessoa {
        $this->pespassword = $pespassword;
        return $this;
    }

    public function getPesCidade(): string {
        return $this->pescidade;
    }

    public function setPesCidade(string $pescidade): pessoa {
        $this->pescidade = $pescidade;
        return $this;
    }

    public function getPesEstado(): string {
        return $this->pesestado;
    }

    public function setPesEstado(string $pesestado): pessoa {
        $this->pesestado = $pesestado;
        return $this;
    }
    
}
?>
