<?php
require_once 'htmlelement.php';

class BodyPage extends HtmlElement {

    private $elements = [];

    public function __construct() {
        $this->setStyle('');
    }

    public function addElement(HtmlElement $element) {
        $this->elements[] = $element;
    }

    public function renderHtml() {
        $body = "<body ". $this->getStyle().">";
        foreach ($this->elements as $element) {
            $body .= $element->renderHtml();
        }
        $body .= "</body>";
        return $body;
    }

} 




?>