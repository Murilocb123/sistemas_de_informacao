<?php

require_once 'htmlelement.php';


class HtmlText extends HtmlElement {

    private $content;
    private $type;

    public function __construct($content, $type) {
        $this->content = $content;
        $this->type = $type;
    }

    public function renderHtml() {
        $text = '<'.$this->type.' '.$this->getClass().' '.$this->getStyle().' '.$this->getId().'>'.$this->content.'</'.$this->type.'>';
        return $text;
    }

    public function getContent() {
        return $this->content;
    }

    public function getType() {
        return $this->type;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setType($type) {
        $this->type = $type;
    }



}