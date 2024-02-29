<?php

class HtmlAlert extends HtmlElement {

    private $message;

    public function __construct($message) {
        $this->setStyle('margin-right: auto; margin-left: auto;width: 400px;');                    
        $this->message = $message;
    }

    public function renderHtml() {
        $html = '<div '.$this->getStyle().' class="alert alert-warning alert-dismissible fade show" role="alert">';
        $html .= $this->message;
        $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $html .= '<span aria-hidden="true">&times;</span>';
        $html .= '</button>';
        $html .= '</div>';
        return $html;
    }

}