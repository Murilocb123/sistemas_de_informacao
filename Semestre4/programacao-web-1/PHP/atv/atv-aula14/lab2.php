<?php
class htmlElement {
    public $name;
    public $id;
    public $style;

    public function __construct($name, $id, $style) {
        $this->name = $name;
        $this->id = $id;
        $this->style = $style;
    }

    public function renderHtml() {
        return "<{$this->name} id='{$this->id}' style='{$this->style}'></{$this->name}>";
    }
}

class htmlTable extends htmlElement {
    private $numColunas;
    private $numLinhas;
    private $elements = [];

    public function __construct($name, $id, $style, $numColunas, $numLinhas) {
        parent::__construct($name, $id, $style);
        $this->numColunas = $numColunas;
        $this->numLinhas = $numLinhas;
    }

    public function addElement(htmlElement $element) {
        $this->elements[] = $element;
    }

    public function renderHtml() {
        $table = "<table id='{$this->id}' style='{$this->style}'>";
        for ($i = 0; $i < $this->numLinhas; $i++) {
            $table .= "<tr>";
            for ($j = 0; $j < $this->numColunas; $j++) {
                $table .= "<td>";
                if (isset($this->elements[$i * $this->numColunas + $j])) {
                    $table .= $this->elements[$i * $this->numColunas + $j]->renderHtml();
                }
                $table .= "</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table>";
        return $table;
    }
}

class htmlInput extends htmlElement {
    private $titulo;
    private $valorDefault;
    private $senha;

    public function __construct($name, $id, $style, $titulo, $valorDefault, $senha) {
        parent::__construct($name, $id, $style);
        $this->titulo = $titulo;
        $this->valorDefault = $valorDefault;
        $this->senha = $senha;
    }

    public function renderHtml() {
        $type = $this->senha ? "password" : "text";
        return "<label>{$this->titulo}: <input type='{$type}' id='{$this->id}' style='{$this->style}' value='{$this->valorDefault}'></label>";
    }
}

$input = new htmlInput("input", "input1", "color: red;", "Nome", "João", false);
echo $input->renderHtml();

$table = new htmlTable("table", "table1", "border: 1px solid black;", 2, 2);
$table->addElement(new htmlInput("input", "input2", "color: blue;", "Nome", "João", false));
$table->addElement(new htmlInput("input", "input3", "color: green;", "Sobrenome", "Silva", false));
$table->addElement(new htmlInput("input", "input4", "color: red;", "Senha", "", true));
$table->addElement(new htmlInput("input", "input5", "color: yellow;", "Email", "joao.silva@gmail.com", false));
echo $table->renderHtml();
?>