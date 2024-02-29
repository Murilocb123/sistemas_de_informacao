<?php
class computador{
    private $status = 'a mimir';

    public function ligar(){
        $this->status = 'ligado';
    }

    public function desligar(){
        $this->status = 'a mimir';
    }

    public function getStatus(){
        return $this->status;
    }
}

$comp = new computador();

echo $comp->getStatus();

$comp->ligar();

echo $comp->getStatus();

$comp->desligar();

echo $comp->getStatus();

?>