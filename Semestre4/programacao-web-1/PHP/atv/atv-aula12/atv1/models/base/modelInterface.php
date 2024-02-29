<?php
namespace models\base;
interface modelInterface{
    public function save():bool;
    public function find(string|null $where):array;
}



?>