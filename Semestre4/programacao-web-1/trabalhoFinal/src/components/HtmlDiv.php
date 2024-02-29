<?php

require_once 'HtmlElement.php';

class HtmlDiv extends HtmlElement {

    private $elements=[];
    
    public function __construct() {
        $this->setStyle('');
    }


    public function renderHtml() {
        $div = '<div '.$this->getClass().' '.$this->getStyle().' '.$this->getId().'>';
        foreach ($this->elements as $element){
            $div .= $element->renderHtml();
        }
        $div .= '</div>';
        return $div;
    }

    public function addElement($element){
        $this->elements[] = $element;
    }   

    public function getElements() {
        return $this->elements;
    }
}

?>