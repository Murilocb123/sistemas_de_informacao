<?php 
require_once 'HtmlElement.php';

class HtmlLink extends HtmlElement {

    private $value;


    public function __construct() {
        $this->addClass('btn btn-primary');
        $this->setStyle('');
    }

    public function renderHtml() {
        $link = '<a href="'.$this->value.'" '.$this->getClass().' '.$this->getStyle().' '.$this->getId().'>'.$this->getName().'</a>';
        return $link;
    }

    public function setValue($value) {
        $this->value = $value;
    }


}
?>