<?php 
require_once 'HtmlElement.php';

class HtmlImput extends HtmlElement {

    private $type;
    private $value;
    private $placeholder;
    private $label;
    private $useLabel = true;


    public function __construct() {
        $this->setStyle('');
    }

    public function renderHtml() {
        $imput = '<div class="form-group">';
        if ($this->useLabel){
            $imput .= '<label for="'.$this->getName().'" class="text-info">'.$this->label.'</label><br>';
        }
        $imput .= '<input type="'.$this->type.'" name="'.$this->getName().'" id="'.$this->getId().'" '.$this->getClass().' placeholder="'.$this->placeholder.'" value="'.$this->value.'">';
        $imput .= '</div>';
        return $imput;
    }


    public function setType($type) {
        $this->type = $type;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setPlaceholder($placeholder) {
        $this->placeholder = $placeholder;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setUseLabel($useLabel) {
        $this->useLabel = $useLabel;
    }

    public function getType() {
        return $this->type;
    }

    public function getValue() {
        return $this->value;
    }

    public function getPlaceholder() {
        return $this->placeholder;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getUseLabel() {
        return $this->useLabel;
    }


}
?>